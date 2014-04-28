<?php

namespace PaT\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaT\UserBundle\Entity\User;
use PaT\ImageBundle\Entity\Pictures;


class AccountController extends Controller
{
	public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();

        if(is_null($user->getProfilePicture())){
        	$profilePic = null;
        }else{
        	$profilePic = $em->getRepository('PaTImageBundle:Pictures')->find($user->getProfilePicture())->getPath();
        }
        
        return $this->render('PaTUserBundle:Account:index.html.twig', array('profilePic' => $profilePic));  //affiche la vue correspondante
    }
}