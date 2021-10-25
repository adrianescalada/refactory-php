<?php

namespace Runroom\GildedRose;

use Runroom\GildedRose\Classes\ProductBuilder;
use Runroom\GildedRose\Classes\QualityAbstract;

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
            $strategy = ProductBuilder::build($item);
            $this->setUpdateQuality($item, $strategy);
        }
    }

    protected function setUpdateQuality($item, QualityAbstract $strategy)
    {
        $strategy->update($item);
    }
}