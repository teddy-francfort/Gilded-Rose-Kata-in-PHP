<?php

namespace App\Models;

use App\Actions\TickBackstageItemAction;
use App\Actions\TickBrieItemAction;
use App\Actions\TickConjuredItemAction;
use App\Actions\TickItemAction;
use App\Exceptions\InvalidItemQuantityException;

class Item implements ItemInterface
{
    public function __construct(
        public string $name,
        public int $quality,
        public int $sellIn,
        public int $min_quality = 0,
        public int $max_quality = 50,
        public int $lower_quality_by = 1,
        public int $increase_quality_by = 1,

    )
    {
        $this->setQuality($quality);
    }

    public function setQuality(int $value) : int
    {
        if($value < $this->min_quality || $value > $this->max_quality)
        {
            throw new InvalidItemQuantityException(
                "The value must be between " .
                $this->min_quality . " and " . $this->max_quality .
                ", value given $value"
            );
        }
        $this->quality = $value;
        return $this->quality;
    }

    public function tick(): void
    {
         match ($this->name) {
             'Aged Brie' => TickBrieItemAction::handle($this),
             'Sulfuras, Hand of Ragnaros' => null,
             'Backstage passes to a TAFKAL80ETC concert' => TickBackstageItemAction::handle($this),
             'Conjured Mana Cake' => TickConjuredItemAction::handle($this),
             default => TickItemAction::handle($this),
        };
    }
}