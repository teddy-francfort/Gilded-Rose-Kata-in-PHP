<?php

namespace App\Models;

class BrieItem extends Item
{
    public function tick(): void
    {
        if ($this->quality < 50) {
            $this->quality = $this->quality + 1;
        }

        $this->sellIn = $this->sellIn - 1;

        if ($this->sellIn < 0 && $this->quality < 50) {
            $this->quality = $this->quality + 1;
        }
    }
}