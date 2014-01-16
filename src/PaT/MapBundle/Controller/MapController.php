<?php

namespace PaT\MapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MapController extends Controller
{
    public function mapAction()
    {
        return $this->render('PaTMapBundle:Map:map.html.twig'); //Affiche la vus map.html.twig
    }
}
