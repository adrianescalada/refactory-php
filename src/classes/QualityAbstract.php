<?php

namespace Runroom\GildedRose\Classes;

use Runroom\GildedRose\Item;

abstract class QualityAbstract
{

    abstract public function update(Item $item);

    protected function increase($item): void
    {
        $item->quality = $item->quality + 1;
    }

    protected function decrease($item): void
    {
        $item->quality = $item->quality - 1;
    }
}