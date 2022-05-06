<?php

use App\GildedRose;

describe('GildedRose of',function (){
   it('Creates a normal item by default',function (){
       $item = GildedRose::of('foo',10,10);
       expect($item)->toBeAnInstanceOf(\App\Models\Item::class);
   });

    it('Creates a backstage item when the name is \'Backstage passes to a TAFKAL80ETC concert\'',function (){
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert',10,10);
        expect($item)->toBeAnInstanceOf(\App\Models\BackstageItem::class);
    });

    it('Creates a Brie item when the name is \'Aged Brie\'',function (){
        $item = GildedRose::of('Aged Brie',10,10);
        expect($item)->toBeAnInstanceOf(\App\Models\BrieItem::class);
    });

    it('Creates a Sulfuras item when the name is \'Sulfuras, Hand of Ragnaros\'',function (){
        $item = GildedRose::of('Sulfuras, Hand of Ragnaros',10,10);
        expect($item)->toBeAnInstanceOf(\App\Models\SulfurasItem::class);
    });
});