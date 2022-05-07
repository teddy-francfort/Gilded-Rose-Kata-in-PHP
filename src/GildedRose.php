<?php

namespace App;

use App\Models\Item;

class GildedRose
{
    public static function of($name, $quality, $sellIn) : Item {
        return match ($name) {
            'Sulfuras, Hand of Ragnaros' => new Item($name, $quality, $sellIn, min_quality: 80, max_quality: 80),
            default => new Item($name, $quality, $sellIn),
        };
    }
}
