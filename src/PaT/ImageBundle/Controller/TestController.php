<?php

namespace PaT\ImageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaT\VoyageBundle\Entity\Travel;

class TestController extends Controller
{
    public function indexAction()
    {
        return $this->render('PaTImageBundle:Test:index.html.twig');
    }

    public function ajaxTestAction()
    {
    	$request = $this->container->get('request');

	    if($request->isXmlHttpRequest())
	    {
	        $em = $this->container->get('doctrine')->getEntityManager();

	        $travel = $em->getRepository('PaTVoyageBundle:Travel')->findAll();

	        return $this->container->get('templating')->renderResponse('PaTImageBundle:Test:liste.html.twig', array(
	            'TripList' => $travel
	            ));
	    }
	    else {
	        return $this->indexAction();
	    }
    }
}
