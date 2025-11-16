<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Intervention\Zodiac\Tests\Providers\ChineseDataProvider;
use Intervention\Zodiac\Tests\Providers\WesternDataProvider;
use Intervention\Zodiac\Western\Compatibility;
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
}
