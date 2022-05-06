<?php

namespace App\Models;

class Item
{
    use Tickable;

    public function __construct(public string $name, public int $quality, public int $sellIn)
    {
    }
}