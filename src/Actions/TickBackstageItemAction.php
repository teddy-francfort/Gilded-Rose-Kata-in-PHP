<?php

namespace App\Actions;

use App\Models\ItemInterface;

class TickBackstageItemAction extends TickItemAction
{
    public static function handle(ItemInterface $item) : int
    {
        if ($item->quality < $item->max_quality) {
            static::increaseQuality($item);

            if ($item->sellIn < 11) {
                if ($item->quality < $item->max_quality) {
                    static::increaseQuality($item);
                }
            }
            if ($item->sellIn < 6) {
                if ($item->quality < $item->max_quality) {
                    static::increaseQuality($item);
                }
            }
        }

        $item->sellIn = $item->sellIn - 1;

        if ($item->sellIn < 0) {
            $item->quality = 0;
        }

        return $item->quality;
    }
}