<?php

namespace Zorbus\FaqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlockController extends Controller
{
    public function defaultAction($block)
    {
        $parameters = json_decode($block->getParameters());
        $faq = $this->getDoctrine()->getRepository('ZorbusFaqBundle:Faq')->find($parameters->faq_id);
        $items = $faq->getItems();

        return $this->render('ZorbusFaqBundle:Block:default.html.twig', array(
            'block' => $block, 'faq' => $faq, 'items' => $items
        ));
    }
}
