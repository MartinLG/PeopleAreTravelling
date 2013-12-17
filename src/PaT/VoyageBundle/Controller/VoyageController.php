<?php

namespace PaT\VoyageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VoyageController extends Controller
{
		public function indexAction()
	{
		//$Repository = $this->getDoctrine()->getManager(); 
		//$Voyage = $Repository->getRepository('PaTVoyageBundle:bddvoyage')->findAll();
		return $this->render('PaTVoyageBundle:Voyage:index.html.twig', array('nom' => 'Adrien', 'test' => 'ceci est un test', 'ListeVoyage' => $Voyage));
	}
}