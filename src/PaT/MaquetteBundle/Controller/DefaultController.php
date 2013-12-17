<?php

namespace PaT\MaquetteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PaTMaquetteBundle:Default:index.html.twig', array('name' => $name));
    }
}
