<?php

namespace App\Actions;

use App\Models\ItemInterface;

class TickItemAction implements TickItemActionInterface
{
    public static function handle(ItemInterface $item) : int
    {
        if ($item->quality > $item->min_quality) {
            static::decreaseQuality($item);
        }

        $item->sellIn = $item->sellIn - 1;

        if ($item->sellIn < 0 && $item->quality > $item->min_quality) {
            static::decreaseQuality($item);
        }

        return $item->quality;
    }

    /**
     * @return void
     */
    public static function decreaseQuality(ItemInterface $item): int
    {
        $quality = $item->quality - $item->lower_quality_by;
        if($quality < 0)
        {
            $quality = 0;
        }
        return $item->setQuality($quality);
    }

    /**
     * @return void
     */
    public static function increaseQuality(ItemInterface $item): int
    {
        $quality = $item->quality + $item->increase_quality_by;
        if($quality > $item->max_quality)
        {
            $quality = $item->max_quality;
        }
        return $item->setQuality($quality);
    }
}