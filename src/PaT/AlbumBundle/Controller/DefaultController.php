<?php

namespace PaT\AlbumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PaTAlbumBundle:Default:index.html.twig', array('name' => $name));
    }
}
