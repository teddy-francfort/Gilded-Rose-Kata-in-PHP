<?php

namespace App\Models;

class Item implements ItemInterface
{
    public const LOWER_QUALITY_BY = 1;

    public function __construct(public string $name, public int $quality, public int $sellIn)
    {
    }

    public function tick(): void
    {
        if ($this->quality > 0) {
            $this->quality = $this->quality - static::LOWER_QUALITY_BY;
        }

        $this->sellIn = $this->sellIn - 1;

        if ($this->sellIn < 0 && $this->quality > 0) {
            $this->quality = $this->quality - static::LOWER_QUALITY_BY;
        }
    }
}