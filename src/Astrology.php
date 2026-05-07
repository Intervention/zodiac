<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Generator;
use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Western\WesternSign;

enum Astrology
{
    case WESTERN;
    case CHINESE;

    /**
     * Yield all possible sign instances of the current astrology.
     */
    public function signs(): Generator
    {
        $cases = match ($this) {
            self::WESTERN => WesternSign::cases(),
            self::CHINESE => ChineseSign::cases(),
        };

        foreach ($cases as $sign) {
            yield $sign;
        }
    }
}
