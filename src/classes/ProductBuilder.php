<?php

namespace Runroom\GildedRose\Classes;

use Runroom\GildedRose\Item;

class ProductBuilder
{
    public static function build(Item $item): QualityAbstract
    {
        switch ($item->name) {
            case 'Aged Brie':
                return new AgedBrie();
                break;
            case 'Backstage passes to a TAFKAL80ETC concert':
                return new Backstage();
                break;
            case 'Sulfuras, Hand of Ragnaros':
                return new Sulfuras();
                break;
            default:
                return new DefaultClass();
                break;
        }
    }
}