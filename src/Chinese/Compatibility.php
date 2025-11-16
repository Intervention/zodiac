<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Chinese;

use Intervention\Zodiac\Chinese\Signs\Dog;
use Intervention\Zodiac\Chinese\Signs\Dragon;
use Intervention\Zodiac\Chinese\Signs\Goat;
use Intervention\Zodiac\Chinese\Signs\Horse;
use Intervention\Zodiac\Chinese\Signs\Monkey;
use Intervention\Zodiac\Chinese\Signs\Ox;
use Intervention\Zodiac\Chinese\Signs\Pig;
use Intervention\Zodiac\Chinese\Signs\Rabbit;
use Intervention\Zodiac\Chinese\Signs\Rat;
use Intervention\Zodiac\Chinese\Signs\Rooster;
use Intervention\Zodiac\Chinese\Signs\Snake;
use Intervention\Zodiac\Chinese\Signs\Tiger;
use Intervention\Zodiac\Western\Compatibility as WesternCompatibility;

class Compatibility extends WesternCompatibility
{
    /**
     * @var array<string, array<string, float>> $factors
     */
    protected array $factors = [
        Rat::class => [
            Rat::class => .5,
            Ox::class => .8,
            Tiger::class => .5,
            Rabbit::class => 0,
            Dragon::class => 1,
            Snake::class => .5,
            Horse::class => .3,
            Goat::class => .2,
            Monkey::class => 1,
            Rooster::class => .5,
            Dog::class => .5,
            Pig::class => .5,
        ],
        Ox::class => [
            Rat::class => .8,
            Ox::class => .5,
            Tiger::class => .5,
            Rabbit::class => .5,
            Dragon::class => .5,
            Snake::class => 1,
            Horse::class => .2,
            Goat::class => .3,
            Monkey::class => .5,
            Rooster::class => 1,
            Dog::class => .5,
            Pig::class => .5,
        ],
        Tiger::class => [
            Rat::class => .5,
            Ox::class => .5,
            Tiger::class => .5,
            Rabbit::class => .5,
            Dragon::class => .5,
            Snake::class => .2,
            Horse::class => 1,
            Goat::class => .5,
            Monkey::class => .3,
            Rooster::class => .5,
            Dog::class => 1,
            Pig::class => .8,
        ],
        Rabbit::class => [
            Rat::class => 0,
            Ox::class => .5,
            Tiger::class => .5,
            Rabbit::class => .5,
            Dragon::class => .2,
            Snake::class => .5,
            Horse::class => .5,
            Goat::class => 1,
            Monkey::class => .5,
            Rooster::class => .3,
            Dog::class => .8,
            Pig::class => 1,
        ],
        Dragon::class => [
            Rat::class => 1,
            Ox::class => .5,
            Tiger::class => .5,
            Rabbit::class => .2,
            Dragon::class => 0,
            Snake::class => .5,
            Horse::class => .5,
            Goat::class => .5,
            Monkey::class => 1,
            Rooster::class => .8,
            Dog::class => .3,
            Pig::class => .5,
        ],
        Snake::class => [
            Rat::class => .5,
            Ox::class => 1,
            Tiger::class => .2,
            Rabbit::class => .5,
            Dragon::class => .5,
            Snake::class => .5,
            Horse::class => .5,
            Goat::class => .5,
            Monkey::class => .8,
            Rooster::class => 1,
            Dog::class => .5,
            Pig::class => .3,
        ],
        Horse::class => [
            Rat::class => .3,
            Ox::class => .2,
            Tiger::class => 1,
            Rabbit::class => .5,
            Dragon::class => .5,
            Snake::class => .5,
            Horse::class => 0,
            Goat::class => .8,
            Monkey::class => .5,
            Rooster::class => .5,
            Dog::class => 1,
            Pig::class => .5,
        ],
        Goat::class => [
            Rat::class => .2,
            Ox::class => .3,
            Tiger::class => .5,
            Rabbit::class => 1,
            Dragon::class => .5,
            Snake::class => .5,
            Horse::class => .8,
            Goat::class => .5,
            Monkey::class => .5,
            Rooster::class => .5,
            Dog::class => .5,
            Pig::class => 1,
        ],
        Monkey::class => [
            Rat::class => 1,
            Ox::class => .5,
            Tiger::class => .3,
            Rabbit::class => .5,
            Dragon::class => 1,
            Snake::class => .8,
            Horse::class => .5,
            Goat::class => .5,
            Monkey::class => .5,
            Rooster::class => .5,
            Dog::class => .5,
            Pig::class => .2,
        ],
        Rooster::class => [
            Rat::class => .5,
            Ox::class => 1,
            Tiger::class => .5,
            Rabbit::class => .3,
            Dragon::class => .8,
            Snake::class => 1,
            Horse::class => .5,
            Goat::class => .5,
            Monkey::class => .5,
            Rooster::class => 0,
            Dog::class => .2,
            Pig::class => .5,
        ],
        Dog::class => [
            Rat::class => .5,
            Ox::class => .5,
            Tiger::class => 1,
            Rabbit::class => .8,
            Dragon::class => .3,
            Snake::class => .5,
            Horse::class => 1,
            Goat::class => .5,
            Monkey::class => .5,
            Rooster::class => .2,
            Dog::class => .5,
            Pig::class => .5,
        ],
        Pig::class => [
            Rat::class => .5,
            Ox::class => .5,
            Tiger::class => .8,
            Rabbit::class => 1,
            Dragon::class => .5,
            Snake::class => .3,
            Horse::class => .5,
            Goat::class => 1,
            Monkey::class => .2,
            Rooster::class => .5,
            Dog::class => .5,
            Pig::class => 0,
        ],
    ];
}
