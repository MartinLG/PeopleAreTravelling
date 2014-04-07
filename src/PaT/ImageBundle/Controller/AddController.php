<?php

namespace PaT\ImageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaT\ImageBundle\Entity\Pictures;
use PaT\UserBundle\Entity\User;

class AddController extends Controller
{
    public function indexAction()
    {
	    return $this->render('PaTImageBundle:Add:index.html.twig');
    }

    public function addPicAction()
    {
    	$request = $this->container->get('request');

		$em = $this->getDoctrine()->getManager();

    	$ds = DIRECTORY_SEPARATOR;
        $user = $this->container->get('security.context')->getToken()->getUser();
        $storeFolder = "web" . $ds ."images" . $ds . "Users" /*. $ds . $user->getId() . $ds*/;

        if (!empty($_FILES)) {

        		$tempFile = $_FILES['file']['tmp_name'];          //3             
      
	    		$targetPath = __DIR__ . $ds . ".." . $ds . ".." . $ds . ".." . $ds . ".." . $ds . $storeFolder . $ds;  //4
	     
        		//$targetPath = __DIR__ . $storeFolder . $ds;

	    		$targetFile =  $targetPath. $_FILES['file']['name'];  //5

	    		$pic = new Pictures;

	    		$pic->setName($_FILES['file']['name']);
	    		$pic->setDate(new \DateTime());
	    		$pic->setTravel(1);
	    		$pic->setPath($targetFile);

	    		move_uploaded_file($tempFile,$targetFile); //6

	    		$em->persist($pic);
	        	$em->flush();
     
    		//return new JsonResponse([]);
		}
    }
}
