<?php

namespace App\Actions;

use App\Models\ItemInterface;

interface TickItemActionInterface
{
    /**
     * @param ItemInterface $item
     * @return int The quality after update
     */
    public static function handle(ItemInterface $item) : int;

    public static function decreaseQuality(ItemInterface $item): int;

    public static function increaseQuality(ItemInterface $item): int;
}