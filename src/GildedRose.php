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
        switch ($item->name) {
            case 'Aged Brie':
                if ($item->quality < 50) {
                    $this->increaseQuality($item);
                }
                $item->sell_in = $item->sell_in - 1;
                if ($item->sell_in < 0 && $item->quality < 50) {
                    $this->increaseQuality($item);
                }
                break;
            case 'Backstage passes to a TAFKAL80ETC concert':
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
                break;
            case 'Sulfuras, Hand of Ragnaros':

                break;
            default:
                if ($item->quality > 0) {
                    $this->decreaseQuality($item);
                }
                $item->sell_in = $item->sell_in - 1;
                if ($item->sell_in < 0 && $item->quality > 0) {
                    $this->decreaseQuality($item);
                }
                break;
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