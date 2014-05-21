<?php

namespace PaT\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaT\ImageBundle\Entity\Pictures;
use PaT\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;

class ChangeProfilePictureController extends Controller
{
    public function indexAction()
    {
    	$target = "changeProfilePic";
	    return $this->render('PaTUserBundle:ChangeProfilePicture:index.html.twig', array('target' => $target));
    }

    public function changePicAction()
    {
    	$request = $this->get('request');
    	$idPic = $request->request->get('idPic');

		$em = $this->getDoctrine()->getManager();

        $user = $this->container->get('security.context')->getToken()->getUser();

        $user->setProfilePicture($idPic);

        $em->persist($user);
        $em->flush();

        $this->get('session')->getFlashBag()->add('info', "You've got your new profile picture."); 

        return new JsonResponse();
        //return new JsonResponse([]);
    }
}
