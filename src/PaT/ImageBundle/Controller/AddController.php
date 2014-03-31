<?php

namespace PaT\ImageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaT\ImageBundle\Entity\Pictures;
use PaT\ImageBundle\Form\AddPictureType;

class AddController extends Controller
{
    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        // on cree le formulair en fonction de traveleditetype 
	    $form = $this->createForm(new AddPictureType);
	    $request = $this->get('request');

	    if($request->getMethod() == 'POST')
	    {
	       $form->bind($request);

	       if($form->isValid())
	       {

	          $em = $this->getDoctrine()->getManager();
	          $em->persist($user);
	          $em->flush();

	          $this->get('session')->getFlashBag()->add('info', 'Your picture has been edited successfully');

	          return $this->redirect($this->generateUrl('Account'));
	        }
	      }

	    return $this->render('PaTImageBundle:Add:index.html.twig', array('form' => $form->createView()));
    }
}
