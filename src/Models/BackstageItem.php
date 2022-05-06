<?php

namespace App\Models;

class BackstageItem extends Item
{
    public function tick(): void
    {

        if ($this->quality < 50) {
            $this->quality = $this->quality + 1;

            if ($this->sellIn < 11) {
                if ($this->quality < 50) {
                    $this->quality = $this->quality + 1;
                }
            }
            if ($this->sellIn < 6) {
                if ($this->quality < 50) {
                    $this->quality = $this->quality + 1;
                }
            }
        }

        $this->sellIn = $this->sellIn - 1;

        if ($this->sellIn < 0) {
            $this->quality = $this->quality - $this->quality;
        }
    }
}