<?php

namespace App\Models;

class SulfurasItem extends Item
{
    public const MAX_QUALITY = 80;
    public const MIN_QUALITY = 80;

    public function tick() : void
    {
        //NOTHING TO DO, "Sulfuras", being a legendary item, never has to be sold or decreases in Quality
    }
}