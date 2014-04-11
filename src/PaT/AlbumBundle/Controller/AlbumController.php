<?php

namespace PaT\AlbumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlbumController extends Controller
{
    public function viewAction($album)
    {
        $em = $this->getDoctrine()->getManager();
        $pics = $em->getRepository('PaTImageBundle:Pictures')->findByAlbum($album);
        return $this->render('PaTAlbumBundle:Album:index.html.twig', array('pics' => $pics, 'album' => $album));
    }
}
