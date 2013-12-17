<?php

namespace PaT\MaquetteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MaquetteController extends Controller
{
    public function indexAction()
    {
        return $this->render('PaTMaquetteBundle:Maquette:index.html.twig');
    }

    public function contactAction()
    {
        return $this->render('PaTMaquetteBundle:Maquette:contact.html.twig');
    }
}
