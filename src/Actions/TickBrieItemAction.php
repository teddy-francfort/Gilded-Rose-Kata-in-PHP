<?php

namespace App\Actions;

use App\Models\ItemInterface;

class TickBrieItemAction extends TickItemAction
{
    public static function handle(ItemInterface $item) : int
    {
        static::increaseQuality($item);

        $item->sellIn = $item->sellIn - 1;

        if ($item->sellIn < 0) {
            static::increaseQuality($item);
        }

        return $item->quality;
    }
}