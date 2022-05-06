<?php

namespace App\Models;

class ConjuredItem extends Item
{
    public const LOWER_QUALITY_BY = parent::LOWER_QUALITY_BY*2;
}