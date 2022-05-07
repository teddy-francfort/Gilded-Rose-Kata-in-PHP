<?php

namespace App\Actions;

use App\Models\ItemInterface;

class TickConjuredItemAction extends TickItemAction
{
    public static function handle(ItemInterface $item) : int
    {
        //"Conjured" items degrade in Quality twice as fast as normal items
        $item->lower_quality_by = $item->lower_quality_by*2;

        parent::handle($item);

        return $item->quality;
    }
}