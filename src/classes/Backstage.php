<?php

namespace Runroom\GildedRose\Classes;

use Runroom\GildedRose\Item;

class Backstage extends QualityAbstract
{
    public function update(Item $item)
    {
        if ($item->quality < 50) {
            $this->increase($item);
        }
        if ($item->sell_in < 11 && $item->quality < 50) {
            $this->increase($item);
        }
        if ($item->sell_in < 6 && $item->quality < 50) {
            $this->increase($item);
        }
        $item->sell_in = $item->sell_in - 1;
        if ($item->sell_in < 0) {
            $item->quality = 0;
        }
    }
}