<?php

use App\GildedRose;

describe('GildedRose of',function (){
   it('Create a normal item by default',function (){
       $item = GildedRose::of('foo',10,10);
       expect($item)->toBeAnInstanceOf(\App\Models\Item::class);
   });

    it('Create a backstage item when the name is \'Backstage passes to a TAFKAL80ETC concert\'',function (){
        $item = GildedRose::of('Backstage passes to a TAFKAL80ETC concert',10,10);
        expect($item)->toBeAnInstanceOf(\App\Models\BackstageItem::class);
    });

    it('Create a Brie item when the name is \'Aged Brie\'',function (){
        $item = GildedRose::of('Aged Brie',10,10);
        expect($item)->toBeAnInstanceOf(\App\Models\BrieItem::class);
    });
});