<?php

namespace App\Models;

class BrieItem extends Item
{
    public function tick(): void
    {
        $this->increaseQuality();

        $this->sellIn = $this->sellIn - 1;

        if ($this->sellIn < 0) {
            $this->increaseQuality();
        }
    }
}