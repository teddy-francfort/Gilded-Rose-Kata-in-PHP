<?php

namespace App\Models;

interface ItemInterface
{
    public function setQuality(int $value): int;

    public function tick(): void;

    public function decreaseQuality(): int;

    public function increaseQuality(): int;
}