<?php

namespace App;

use App\Models\Item;

class GildedRose
{
    public static function of($name, $quality, $sellIn) : Item {
        return new Item($name, $quality, $sellIn);
    }
}
