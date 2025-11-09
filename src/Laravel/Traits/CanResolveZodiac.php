<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Laravel\Traits;

use Intervention\Zodiac\Exceptions\NotReadableException;
use Intervention\Zodiac\Interfaces\SignInterface;
use Intervention\Zodiac\Laravel\ZodiacFacade;

trait CanResolveZodiac
{
    protected string $birthdayAttribute = 'birthday';

    public function getZodiacAttribute(): ?SignInterface
    {
        $birthday = data_get($this->attributes, $this->birthdayAttribute);

        try {
            return ZodiacFacade::make($birthday);
        } catch (NotReadableException) {
            return null;
        }
    }
}
