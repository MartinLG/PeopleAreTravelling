<?php

namespace PaT\ImageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PaTImageBundle:Default:index.html.twig', array('name' => $name));
    }
}
