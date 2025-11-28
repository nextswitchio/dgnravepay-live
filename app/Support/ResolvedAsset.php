<?php

namespace App\Support;

/**
 * Data structure for type-safe asset handling
 * 
 * Represents a resolved asset with its type and path information
 */
class ResolvedAsset
{
    public const TYPE_STATIC = 'static';
    public const TYPE_STORAGE = 'storage';
    public const TYPE_EXTERNAL = 'external';
    public const TYPE_DOMAIN = 'domain';

    public function __construct(
        public readonly string $type,
        public readonly string $path,
        public readonly string $originalPath = ''
    ) {
        $this->validateType($type);
    }

    /**
     * Check if this is a static asset (processed by Vite)
     */
    public function isStatic(): bool
    {
        return $this->type === self::TYPE_STATIC;
    }

    /**
     * Check if this is a storage asset (user uploads)
     */
    public function isStorage(): bool
    {
        return $this->type === self::TYPE_STORAGE;
    }

    /**
     * Check if this is an external URL
     */
    public function isExternal(): bool
    {
        return $this->type === self::TYPE_EXTERNAL;
    }

    /**
     * Check if this is a domain asset (should use domain URL generation)
     */
    public function isDomain(): bool
    {
        return $this->type === self::TYPE_DOMAIN;
    }

    /**
     * Get the normalized path for the asset
     */
    public function getNormalizedPath(): string
    {
        return ltrim($this->path, '/');
    }

    /**
     * Get the original path that was resolved
     */
    public function getOriginalPath(): string
    {
        return $this->originalPath ?: $this->path;
    }

    /**
     * Validate that the asset type is one of the allowed types
     */
    private function validateType(string $type): void
    {
        $allowedTypes = [self::TYPE_STATIC, self::TYPE_STORAGE, self::TYPE_EXTERNAL, self::TYPE_DOMAIN];
        
        if (!in_array($type, $allowedTypes, true)) {
            throw new \InvalidArgumentException(
                "Invalid asset type '{$type}'. Must be one of: " . implode(', ', $allowedTypes)
            );
        }
    }
}