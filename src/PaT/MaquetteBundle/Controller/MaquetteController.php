<?php

namespace PaT\MaquetteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MaquetteController extends Controller
{
    public function indexAction()
    {
        return $this->render('PaTMaquetteBundle:Maquette:index.html.twig');  //affiche la vue correspondante
    }

    public function aboutAction()
    {
        return $this->render('PaTMaquetteBundle:Maquette:about.html.twig');  //affiche la vue correspondante
    }
}
