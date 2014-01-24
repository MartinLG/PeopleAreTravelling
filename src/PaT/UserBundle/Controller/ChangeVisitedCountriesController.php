<?php

namespace PaT\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaT\UserBundle\Entity\User;
use PaT\UserBundle\Form\VisitedCountriesType;


class ChangeVisitedCountriesController extends Controller
{
	public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        // on cree le formulair en fonction de traveleditetype 
	    $form = $this->createForm(new VisitedCountriesType, $user);
	    $request = $this->get('request');

	    if($request->getMethod() == 'POST')
	    {
	       $form->bind($request);

	       if($form->isValid())
	       {

	          $em = $this->getDoctrine()->getManager();
	          $em->persist($user);
	          $em->flush();

	          $this->get('session')->getFlashBag()->add('info', 'Your visited countries had been edited successfully');

	          return $this->redirect($this->generateUrl('Account'));
	        }
	      }

	    return $this->render('PaTUserBundle:ChangeVisitedCountries:index.html.twig', array('form' => $form->createView()));
    }
}