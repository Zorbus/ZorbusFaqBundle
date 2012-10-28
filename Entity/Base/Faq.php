<?php

namespace Zorbus\FaqBundle\Entity\Base;

/**
 * Zorbus\FaqBundle\Entity\Faq
 */
abstract class Faq
{

    public function __toString()
    {
        return $this->getTitle();
    }

}
