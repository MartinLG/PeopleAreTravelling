<?php

namespace PaT\ImageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaT\ImageBundle\Entity\Pictures;
use PaT\UserBundle\Entity\User;
use PaT\VoyageBundle\Entity\Travel;
use Symfony\Component\HttpFoundation\JsonResponse;

class ChoosePictureController extends Controller
{
    public function indexAction($ajaxRequest)
    {
    	$userid = $this->container->get('security.context')->getToken()->getUser()->getId();

    	$em = $this->getDoctrine()->getManager();
    	$travels = $em->getRepository('PaTVoyageBundle:travel')->findBy(array('iduser' => $userid));

        $albums = array();
        $i=0;

        foreach ($travels as $travel) {
            $queried_albums = $em->getRepository('PaTAlbumBundle:album')->findBy(array('travel' => $travel));

            foreach ($queried_albums as $album) {
                $albums[$i] = $album;
                $i++;
            }
        }

    	$PicsResponse = array();
    	$i=0;

    	foreach ($albums as $album) {
    		$pics = $em->getRepository('PaTImageBundle:Pictures')->findBy(array('album' => $album->getId()));
    		foreach ($pics as $pic) {
    			$PicsResponse[$i] = $pic;
    			$i++;
    		}
    	}

	    return $this->render('PaTImageBundle:ChoosePicture:index.html.twig', array('Pictures' => $PicsResponse, 'target' => $ajaxRequest));
    }

}
