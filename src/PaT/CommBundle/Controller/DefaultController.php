<?php

namespace PaT\CommBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PaTCommBundle:Default:index.html.twig', array('name' => $name));
    }
}
