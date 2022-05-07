<?php

namespace App\Models;

use App\Exceptions\InvalidItemQuantityException;

class Item implements ItemInterface
{
    public const LOWER_QUALITY_BY = 1;
    public const INCREASE_QUALITY_BY = 1;
    public const MAX_QUALITY = 50;
    public const MIN_QUALITY = 0;

    public function __construct(public string $name, public int $quality, public int $sellIn)
    {
        $this->setQuality($quality);
    }

    public function setQuality(int $value) : int
    {
        if($value < static::MIN_QUALITY || $value > static::MAX_QUALITY)
        {
            throw new InvalidItemQuantityException(
                "The value must be between " .
                static::MIN_QUALITY . " and " . static::MAX_QUALITY .
                ", value given $value"
            );
        }
        $this->quality = $value;
        return $this->quality;
    }

    public function tick(): void
    {
        if ($this->quality > static::MIN_QUALITY) {
            $this->decreaseQuality();
        }

        $this->sellIn = $this->sellIn - 1;

        if ($this->sellIn < 0 && $this->quality > static::MIN_QUALITY) {
            $this->decreaseQuality();
        }
    }

    /**
     * @return void
     */
    protected function decreaseQuality(): void
    {
        $quality = $this->quality - static::LOWER_QUALITY_BY;
        if($quality < 0)
        {
            $quality = 0;
        }
        $this->setQuality($quality);
    }

    /**
     * @return void
     */
    protected function increaseQuality(): void
    {
        $quality = $this->quality + static::INCREASE_QUALITY_BY;
        if($quality > static::MAX_QUALITY)
        {
            $quality = static::MAX_QUALITY;
        }
        $this->setQuality($quality);
    }

}