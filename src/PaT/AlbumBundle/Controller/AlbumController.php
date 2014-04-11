<?php

namespace PaT\AlbumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlbumController extends Controller
{
    public function viewAction($idalbum)
    {
        $em = $this->getDoctrine()->getManager();
        $album = $em->getRepository('PaTAlbumBundle:Album')->find($idalbum);
        $pics = $em->getRepository('PaTImageBundle:Pictures')->findBy(array('album' => $idalbum));
        return $this->render('PaTAlbumBundle:Album:index.html.twig', array('Pics' => $pics, 'Album' => $album));
    }
}
