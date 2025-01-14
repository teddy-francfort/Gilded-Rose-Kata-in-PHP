<?php

namespace App\Models;

class BackstageItem extends Item
{

    public function tick(): void
    {

        if ($this->quality < static::MAX_QUALITY) {
            $this->increaseQuality();

            if ($this->sellIn < 11) {
                if ($this->quality < static::MAX_QUALITY) {
                    $this->increaseQuality();
                }
            }
            if ($this->sellIn < 6) {
                if ($this->quality < static::MAX_QUALITY) {
                    $this->increaseQuality();
                }
            }
        }

        $this->sellIn = $this->sellIn - 1;

        if ($this->sellIn < 0) {
            $this->quality = 0;
        }
    }
}