<?php

namespace Runroom\GildedRose;

use Runroom\GildedRose\Classes\AgedBrie;
use Runroom\GildedRose\Classes\Backstage;
use Runroom\GildedRose\Classes\DefaultClass;
use Runroom\GildedRose\Classes\Sulfuras;

class GildedRose
{

    private $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function update_quality()
    {
        foreach ($this->items as $item) {
            $this->setUpdateQuality($item);
        }
    }

    protected function setUpdateQuality($item)
    {
        switch ($item->name) {
            case 'Aged Brie':
                (new AgedBrie())->update($item);
                break;
            case 'Backstage passes to a TAFKAL80ETC concert':
                (new Backstage())->update($item);
                break;
            case 'Sulfuras, Hand of Ragnaros':
                (new Sulfuras())->update($item);
                break;
            default:
                (new DefaultClass())->update($item);
                break;
        }
    }
}