<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Support\ResolvedAsset;
use InvalidArgumentException;

class ResolvedAssetTest extends TestCase
{
    public function test_creates_static_asset(): void
    {
        $asset = new ResolvedAsset(ResolvedAsset::TYPE_STATIC, 'resources/images/logo.png');
        
        $this->assertTrue($asset->isStatic());
        $this->assertFalse($asset->isStorage());
        $this->assertFalse($asset->isExternal());
        $this->assertEquals(ResolvedAsset::TYPE_STATIC, $asset->type);
        $this->assertEquals('resources/images/logo.png', $asset->path);
    }

    public function test_creates_storage_asset(): void
    {
        $asset = new ResolvedAsset(ResolvedAsset::TYPE_STORAGE, 'storage/uploads/test.jpg');
        
        $this->assertTrue($asset->isStorage());
        $this->assertFalse($asset->isStatic());
        $this->assertFalse($asset->isExternal());
        $this->assertEquals(ResolvedAsset::TYPE_STORAGE, $asset->type);
        $this->assertEquals('storage/uploads/test.jpg', $asset->path);
    }

    public function test_creates_external_asset(): void
    {
        $asset = new ResolvedAsset(ResolvedAsset::TYPE_EXTERNAL, 'https://example.com/image.jpg');
        
        $this->assertTrue($asset->isExternal());
        $this->assertFalse($asset->isStatic());
        $this->assertFalse($asset->isStorage());
        $this->assertEquals(ResolvedAsset::TYPE_EXTERNAL, $asset->type);
        $this->assertEquals('https://example.com/image.jpg', $asset->path);
    }

    public function test_normalized_path_removes_leading_slash(): void
    {
        $asset = new ResolvedAsset(ResolvedAsset::TYPE_STATIC, '/resources/images/logo.png');
        
        $this->assertEquals('resources/images/logo.png', $asset->getNormalizedPath());
    }

    public function test_preserves_original_path(): void
    {
        $originalPath = '/storage/uploads/test.jpg';
        $asset = new ResolvedAsset(ResolvedAsset::TYPE_STORAGE, 'storage/uploads/test.jpg', $originalPath);
        
        $this->assertEquals($originalPath, $asset->getOriginalPath());
        $this->assertEquals('storage/uploads/test.jpg', $asset->getNormalizedPath());
    }

    public function test_original_path_defaults_to_path_when_not_provided(): void
    {
        $asset = new ResolvedAsset(ResolvedAsset::TYPE_STATIC, 'logo.png');
        
        $this->assertEquals('logo.png', $asset->getOriginalPath());
    }

    public function test_throws_exception_for_invalid_type(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid asset type 'invalid'");
        
        new ResolvedAsset('invalid', 'some/path.jpg');
    }

    public function test_readonly_properties(): void
    {
        $asset = new ResolvedAsset(ResolvedAsset::TYPE_STATIC, 'logo.png', '/logo.png');
        
        $this->assertEquals(ResolvedAsset::TYPE_STATIC, $asset->type);
        $this->assertEquals('logo.png', $asset->path);
        $this->assertEquals('/logo.png', $asset->originalPath);
    }

    public function test_type_constants_are_defined(): void
    {
        $this->assertEquals('static', ResolvedAsset::TYPE_STATIC);
        $this->assertEquals('storage', ResolvedAsset::TYPE_STORAGE);
        $this->assertEquals('external', ResolvedAsset::TYPE_EXTERNAL);
    }
}