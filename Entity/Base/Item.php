<?php

namespace Zorbus\FaqBundle\Entity\Base;

/**
 * Zorbus\FaqBundle\Entity\Item
 */
abstract class Item
{
    public function __toString()
    {
        return $this->getQuestion();
    }
}
