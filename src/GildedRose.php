<?php

namespace App;

use App\Models\Item;
use App\Models\SpecialItem;

class GildedRose
{
    public static function of($name, $quality, $sellIn) : Item {
        return match ($name) {
            'Aged Brie',
            'Backstage passes to a TAFKAL80ETC concert',
            'Sulfuras, Hand of Ragnaros' => new SpecialItem($name, $quality, $sellIn),
            default => new Item($name, $quality, $sellIn),
        };
    }
}
