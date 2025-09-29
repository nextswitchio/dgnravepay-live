<?php

namespace App\Support;

class HtmlSanitizer
{
  /**
   * Sanitize Quill/HTML content using a conservative allowlist.
   */
  public static function clean(?string $html): string
  {
    if (!$html) {
      return '';
    }

    // Quick strip of dangerous blocks
    $html = preg_replace('#<\s*(script|style)[^>]*>.*?<\s*/\s*\1\s*>#is', '', $html ?? '');

    // Try DOM-based sanitize; fallback to strip_tags if DOM not available
    if (!class_exists(\DOMDocument::class)) {
      return strip_tags($html, '<p><br><strong><em><u><s><ul><ol><li><h2><h3><h4><blockquote><code><pre><a><img><figure><figcaption><hr><span>');
    }

    $allowedTags = [
      'div',
      'p',
      'br',
      'strong',
      'b',
      'em',
      'i',
      'u',
      's',
      'ul',
      'ol',
      'li',
      'h1',
      'h2',
      'h3',
      'h4',
      'h5',
      'h6',
      'blockquote',
      'code',
      'pre',
      'a',
      'img',
      'figure',
      'figcaption',
      'hr',
      'span',
      'sup',
      'sub',
      'del',
      'mark',
      'table',
      'thead',
      'tbody',
      'tr',
      'td',
      'th'
    ];
    $globalAllowedAttrs = ['class'];
    $tagAllowedAttrs = [
      'div' => ['class'],
      'a' => ['href', 'title', 'target', 'rel', 'class'],
      'img' => ['src', 'alt', 'title', 'class'],
      'code' => ['class'],
      'span' => ['class'],
      'p' => ['class'],
      'h1' => ['class'],
      'h2' => ['class'],
      'h3' => ['class'],
      'h4' => ['class'],
      'h5' => ['class'],
      'h6' => ['class'],
      'blockquote' => ['class'],
      'pre' => ['class'],
      'sup' => ['class'],
      'sub' => ['class'],
      'del' => ['class'],
      'mark' => ['class'],
      'table' => ['class'],
      'thead' => ['class'],
      'tbody' => ['class'],
      'tr' => ['class'],
      'td' => ['class'],
      'th' => ['class'],
    ];

    $doc = new \DOMDocument();
    $doc->encoding = 'UTF-8';
    libxml_use_internal_errors(true);
    // Wrap in a div to keep fragments
    // Prepend encoding hint so multibyte characters (like emojis) are preserved
    $doc->loadHTML('<?xml encoding="utf-8" ?>' . '<div>' . $html . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
      | LIBXML_NOERROR | LIBXML_NOWARNING);
    libxml_clear_errors();

    $walker = function ($node) use (&$walker, $allowedTags, $globalAllowedAttrs, $tagAllowedAttrs) {
      if ($node->nodeType === XML_ELEMENT_NODE) {
        $tag = strtolower($node->nodeName);
        if (!in_array($tag, $allowedTags, true)) {
          // Replace disallowed node with its children
          $parent = $node->parentNode;
          if ($parent) {
            while ($node->firstChild) {
              $parent->insertBefore($node->firstChild, $node);
            }
            $parent->removeChild($node);
          }
          return; // Node removed, stop walking this branch
        }

        // Filter attributes
        $allowedAttrs = $tagAllowedAttrs[$tag] ?? $globalAllowedAttrs;
        if ($node->hasAttributes()) {
          for ($i = $node->attributes->length - 1; $i >= 0; $i--) {
            $attr = $node->attributes->item($i);
            $name = strtolower($attr->name);
            $value = (string) $attr->value;

            // Remove event handlers and styles
            if (str_starts_with($name, 'on') || $name === 'style') {
              $node->removeAttributeNode($attr);
              continue;
            }
            if (!in_array($name, $allowedAttrs, true)) {
              $node->removeAttributeNode($attr);
              continue;
            }
            // Attr-specific validation
            if ($tag === 'a' && $name === 'href') {
              // Allow absolute URLs and safe relative anchors/paths
              if (!preg_match('#^(https?:|mailto:|tel:|/)#i', $value)) {
                $node->removeAttribute('href');
              } else {
                // Security best practices
                $node->setAttribute('rel', 'noopener noreferrer');
              }
            }
            if ($tag === 'img' && $name === 'src') {
              // Allow http/https and local paths (incl. /storage)
              if (!preg_match('#^(https?:|/)#i', $value)) {
                $node->removeAttribute('src');
              }
            }
          }
        }
      }
      // Iterate children (use snapshot as we may modify DOM)
      if ($node->childNodes) {
        $children = [];
        foreach (iterator_to_array($node->childNodes) as $child) {
          $children[] = $child;
        }
        foreach ($children as $child) {
          $walker($child);
        }
      }
    };

    // Start from body/div root
    $root = $doc->getElementsByTagName('div')->item(0) ?? $doc->documentElement;
    if ($root) {
      $walker($root);
    }

    // Return inner HTML of wrapper div
    $result = '';
    foreach ($root->childNodes as $child) {
      $result .= $doc->saveHTML($child);
    }
    return $result;
  }
}
