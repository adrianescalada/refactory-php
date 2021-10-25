<?php

namespace Runroom\GildedRose\Classes;

use Runroom\GildedRose\Item;

class DefaultClass extends QualityAbstract
{
    public function update(Item $item)
    {
        if ($item->quality > 0) {
            $this->decrease($item);
        }
        $item->sell_in = $item->sell_in - 1;
        if ($item->sell_in < 0 && $item->quality > 0) {
            $this->decrease($item);
        }
    }
}