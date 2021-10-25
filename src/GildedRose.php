<?php

namespace Runroom\GildedRose;

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
        if ($item->name == 'Aged Brie') {
            if ($item->quality < 50) {
                $this->increaseQuality($item);
            }
            $item->sell_in = $item->sell_in - 1;
            if ($item->sell_in < 0 && $item->quality < 50) {
                $this->increaseQuality($item);
            }
        } elseif ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
            if ($item->quality < 50) {
                $this->increaseQuality($item);
            }
            if ($item->sell_in < 11 && $item->quality < 50) {
                $this->increaseQuality($item);
            }
            if ($item->sell_in < 6 && $item->quality < 50) {
                $this->increaseQuality($item);
            }
            $item->sell_in = $item->sell_in - 1;
            if ($item->sell_in < 0) {
                $item->quality = 0;
            }
        } elseif ($item->name == 'Sulfuras, Hand of Ragnaros') {

        } else {
            if ($item->quality > 0) {
                $this->decreaseQuality($item);
            }
            $item->sell_in = $item->sell_in - 1;
            if ($item->sell_in < 0 && $item->quality > 0) {
                $this->decreaseQuality($item);
            }
        }
    }

    protected function increaseQuality($item): void
    {
        $item->quality = $item->quality + 1;
    }

    protected function decreaseQuality($item): void
    {
        $item->quality = $item->quality - 1;
    }
}