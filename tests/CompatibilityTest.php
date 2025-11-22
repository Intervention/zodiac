<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Intervention\Zodiac\Chinese\Signs\Snake;
use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Tests\Providers\ChineseDataProvider;
use Intervention\Zodiac\Tests\Providers\WesternDataProvider;
use Intervention\Zodiac\Western\Compatibility;
use Intervention\Zodiac\Western\Signs\Gemini;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

final class CompatibilityTest extends TestCase
{
    #[DataProviderExternal(WesternDataProvider::class, 'compatibilityFactorDataProvider')]
    #[DataProviderExternal(ChineseDataProvider::class, 'compatibilityFactorDataProvider')]
    public function testCalculate(string $a, string $b, Compatibility $compatibility): void
    {
        $result = call_user_func($compatibility, new $a(), new $b());
        $this->assertIsFloat($result);
        $this->assertTrue($result >= 0 && $result <= 1);
    }

    public function testDifferentAstrologies(): void
    {
        $this->expectException(RuntimeException::class);
        call_user_func(new Compatibility(), new Gemini(), new Snake());
    }
}
