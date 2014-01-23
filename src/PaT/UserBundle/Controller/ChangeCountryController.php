<?php

namespace PaT\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaT\UserBundle\Entity\User;
use PaT\UserBundle\Form\CountryType;


class ChangeCountryController extends Controller
{
	public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        // on cree le formulair en fonction de traveleditetype 
	    $form = $this->createForm(new CountryType, $user);
	    $request = $this->get('request');

	    if($request->getMethod() == 'POST')
	    {
	       $form->bind($request);

	       if($form->isValid())
	       {

	          $em = $this->getDoctrine()->getManager();
	          $em->persist($user);
	          $em->flush();

	          $this->get('session')->getFlashBag()->add('info', 'Your country has been edited successfully');

	          return $this->redirect($this->generateUrl('Account'));
	        }
	      }

	    return $this->render('PaTUserBundle:ChangeCountry:index.html.twig', array('form' => $form->createView()));
    }
}