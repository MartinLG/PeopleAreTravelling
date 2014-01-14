<?php

namespace PaT\MapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PaTMapBundle:Default:index.html.twig', array('name' => $name));
    }
}
