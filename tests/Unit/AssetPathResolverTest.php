<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Support\AssetPathResolver;
use App\Support\ResolvedAsset;

class AssetPathResolverTest extends TestCase
{
    private AssetPathResolver $resolver;

    protected function setUp(): void
    {
        parent::setUp();
        $this->resolver = new AssetPathResolver();
    }

    public function test_resolves_external_urls(): void
    {
        $resolved = $this->resolver->resolve('https://example.com/image.jpg');
        
        $this->assertTrue($resolved->isExternal());
        $this->assertEquals('https://example.com/image.jpg', $resolved->path);
        $this->assertEquals(ResolvedAsset::TYPE_EXTERNAL, $resolved->type);
    }

    public function test_resolves_storage_paths(): void
    {
        $testCases = [
            'storage/uploads/test.jpg',
            'uploads/image.png',
            'public/files/document.pdf',
            '/storage/app/public/image.jpg'
        ];

        foreach ($testCases as $path) {
            $resolved = $this->resolver->resolve($path);
            
            $this->assertTrue($resolved->isStorage(), "Failed for path: {$path}");
            $this->assertEquals(ResolvedAsset::TYPE_STORAGE, $resolved->type);
        }
    }

    public function test_resolves_static_paths(): void
    {
        $testCases = [
            'resources/images/logo.png',
            'images/banner.jpg',
            'assets/style.css',
            'logo.png',
            'favicon.ico'
        ];

        foreach ($testCases as $path) {
            $resolved = $this->resolver->resolve($path);
            
            $this->assertTrue($resolved->isStatic(), "Failed for path: {$path}");
            $this->assertEquals(ResolvedAsset::TYPE_STATIC, $resolved->type);
        }
    }

    public function test_is_storage_path_detection(): void
    {
        $this->assertTrue($this->resolver->isStoragePath('storage/uploads/test.jpg'));
        $this->assertTrue($this->resolver->isStoragePath('uploads/image.png'));
        $this->assertTrue($this->resolver->isStoragePath('public/files/doc.pdf'));
        
        $this->assertFalse($this->resolver->isStoragePath('resources/images/logo.png'));
        $this->assertFalse($this->resolver->isStoragePath('logo.png'));
    }

    public function test_is_static_path_detection(): void
    {
        $this->assertTrue($this->resolver->isStaticPath('resources/images/logo.png'));
        $this->assertTrue($this->resolver->isStaticPath('images/banner.jpg'));
        $this->assertTrue($this->resolver->isStaticPath('logo.png'));
        $this->assertTrue($this->resolver->isStaticPath('favicon.ico'));
        
        $this->assertFalse($this->resolver->isStaticPath('storage/uploads/test.jpg'));
        $this->assertFalse($this->resolver->isStaticPath('uploads/image.png'));
    }

    public function test_is_external_url_detection(): void
    {
        $this->assertTrue($this->resolver->isExternalUrl('https://example.com/image.jpg'));
        $this->assertTrue($this->resolver->isExternalUrl('http://test.com/file.png'));
        $this->assertTrue($this->resolver->isExternalUrl('ftp://files.example.com/doc.pdf'));
        
        $this->assertFalse($this->resolver->isExternalUrl('logo.png'));
        $this->assertFalse($this->resolver->isExternalUrl('/images/banner.jpg'));
        $this->assertFalse($this->resolver->isExternalUrl('resources/images/logo.png'));
    }

    public function test_has_image_extension(): void
    {
        $imageFiles = ['logo.png', 'banner.jpg', 'icon.svg', 'photo.jpeg', 'favicon.ico'];
        $nonImageFiles = ['style.css', 'script.js', 'document.pdf', 'data.json'];

        foreach ($imageFiles as $file) {
            $this->assertTrue($this->resolver->hasImageExtension($file), "Failed for: {$file}");
        }

        foreach ($nonImageFiles as $file) {
            $this->assertFalse($this->resolver->hasImageExtension($file), "Failed for: {$file}");
        }
    }

    public function test_get_extension(): void
    {
        $this->assertEquals('png', $this->resolver->getExtension('logo.png'));
        $this->assertEquals('jpg', $this->resolver->getExtension('banner.JPG'));
        $this->assertEquals('svg', $this->resolver->getExtension('icon.svg'));
        $this->assertEquals('', $this->resolver->getExtension('filename'));
    }

    public function test_is_resources_image_path(): void
    {
        $this->assertTrue($this->resolver->isResourcesImagePath('resources/images/logo.png'));
        $this->assertTrue($this->resolver->isResourcesImagePath('logo.png'));
        $this->assertTrue($this->resolver->isResourcesImagePath('favicon.ico'));
        
        $this->assertFalse($this->resolver->isResourcesImagePath('storage/uploads/test.jpg'));
        $this->assertFalse($this->resolver->isResourcesImagePath('images/banner.jpg'));
        $this->assertFalse($this->resolver->isResourcesImagePath('style.css'));
    }

    public function test_normalize_resources_path(): void
    {
        $this->assertEquals('resources/images/logo.png', 
            $this->resolver->normalizeResourcesPath('logo.png'));
        
        $this->assertEquals('resources/images/banner.jpg', 
            $this->resolver->normalizeResourcesPath('images/banner.jpg'));
        
        $this->assertEquals('resources/images/existing.png', 
            $this->resolver->normalizeResourcesPath('resources/images/existing.png'));
        
        $this->assertEquals('storage/uploads/test.jpg', 
            $this->resolver->normalizeResourcesPath('storage/uploads/test.jpg'));
    }

    public function test_resolved_asset_preserves_original_path(): void
    {
        $originalPath = '/storage/uploads/test.jpg';
        $resolved = $this->resolver->resolve($originalPath);
        
        $this->assertEquals($originalPath, $resolved->getOriginalPath());
        $this->assertEquals('storage/uploads/test.jpg', $resolved->getNormalizedPath());
    }

    public function test_defaults_to_domain_for_unknown_paths(): void
    {
        $unknownPath = 'some/unknown/path.txt';
        $resolved = $this->resolver->resolve($unknownPath);
        
        $this->assertTrue($resolved->isDomain());
        $this->assertEquals(ResolvedAsset::TYPE_DOMAIN, $resolved->type);
    }
}