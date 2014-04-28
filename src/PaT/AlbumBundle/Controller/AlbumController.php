<?php

namespace PaT\AlbumBundle\Controller;

use PaT\AlbumBundle\Entity\Album;
use PaT\AlbumBundle\Form\NewAlbumType;
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

    public function newAction($idtravel)
    {
    	$em = $this->getDoctrine()->getManager();
    	if($this->container->get('security.context')->getToken()->getUser()->getId() != $em->getRepository('PaTVoyageBundle:Travel')->find($idtravel)->getIdUser()){
    		return $this->render('PaTMaquetteBundle:Maquette:notalowed.html.twig');
    	}
    	
    	$travel = $em->getRepository('PaTVoyageBundle:Travel')->findOneById($idtravel);

	    if($travel == null)
	    {
	        throw $this->createNotFoundException('Le voyage n°'. $idtravel .' n\'est pas présent dans la base de données'); 
	    }

	    $newalbum = new Album;

	    $albumform = $this->createform( new NewAlbumType, $newalbum);
		$request = $this->get('request');

		if($request->getMethod() == 'POST')
	    {

	      $albumform->bind($request);

	      if($albumform->isValid())
	      {
	      	$newalbum->setTravel($idtravel);
	        //envois des donnees
	        $em->persist($newalbum);
	        $em->flush();

	        $albumid = $newalbum->getId();

	        //retour sur la page index
	        $this->get('session')->getFlashBag()->add('info', 'New Album created, now add pictures.'); 
	        return $this->redirect($this->generateUrl('AddPicsToAlbum', array('albumid' => $albumid)));
	      }
	    }

    	return $this->render('PaTAlbumBundle:Album:new.html.twig', array('form' => $albumform->createView(), 'idtravel' => $idtravel));
    }

    public function addpicsAction($albumid){
    	return $this->redirect($this->generateUrl('pa_t_image_add', array('albumid' => $albumid)));
    }
}
