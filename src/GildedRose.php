<?php

namespace App;

use App\Enums\CategoryEnum;
use App\Models\Category;
use App\Models\Item;

class GildedRose
{
    public static function of($name, $quality, $sellIn) : Item {
        return match ($name) {
            'Aged Brie' => new Item($name, $quality, $sellIn,
                category: new Category(CategoryEnum::AGED_BRIE->value)),
            'Sulfuras, Hand of Ragnaros' => new Item($name, $quality, $sellIn,
                category: new Category(CategoryEnum::SULFURAS->value),min_quality: 80, max_quality: 80),
            'Backstage passes to a TAFKAL80ETC concert' => new Item($name, $quality, $sellIn,
                category: new Category(CategoryEnum::BACKSTAGE->value)),
            'Conjured Mana Cake' => new Item($name, $quality, $sellIn,
                category: new Category(CategoryEnum::CONJURED->value)),
            default => new Item($name, $quality, $sellIn),
        };
    }
}
