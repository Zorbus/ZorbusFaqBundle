<?php

namespace Zorbus\FaqBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ZorbusFaqBundle:Default:index.html.twig', array('name' => $name));
    }
}
