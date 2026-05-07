<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Exceptions\InvalidArgumentException;
use Intervention\Zodiac\Tests\Providers\ChineseDataProvider;
use Intervention\Zodiac\Tests\Providers\WesternDataProvider;
use Intervention\Zodiac\Western\Compatibility;
use Intervention\Zodiac\Western\WesternSign;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

final class CompatibilityTest extends TestCase
{
    #[DataProviderExternal(WesternDataProvider::class, 'compatibilityFactorDataProvider')]
    #[DataProviderExternal(ChineseDataProvider::class, 'compatibilityFactorDataProvider')]
    public function testCalculate(
        WesternSign|ChineseSign $a,
        WesternSign|ChineseSign $b,
        Compatibility $compatibility,
    ): void {
        $result = call_user_func($compatibility, $a, $b);
        $this->assertIsFloat($result);
        $this->assertTrue($result >= 0 && $result <= 1);
    }

    public function testDifferentAstrologies(): void
    {
        $this->expectException(InvalidArgumentException::class);
        call_user_func(new Compatibility(), WesternSign::Gemini, ChineseSign::Snake);
    }
}
