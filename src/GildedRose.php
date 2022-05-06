<?php

namespace App;

use App\Models\BackstageItem;
use App\Models\BrieItem;
use App\Models\Item;
use App\Models\SpecialItem;

class GildedRose
{
    public static function of($name, $quality, $sellIn) : Item {
        return match ($name) {
            'Sulfuras, Hand of Ragnaros' => new SpecialItem($name, $quality, $sellIn),
            'Aged Brie' => new BrieItem($name, $quality, $sellIn),
            'Backstage passes to a TAFKAL80ETC concert' => new BackstageItem($name, $quality, $sellIn),
            default => new Item($name, $quality, $sellIn),
        };
    }
}
