<?php

namespace PaT\ImageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaT\ImageBundle\Entity\Pictures;
use PaT\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;

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
        $storeFolder = "images" . $ds . "Users" . $ds . $user->getId() . $ds;

        if (!empty($_FILES)) {

        		$tempFile = $_FILES['file']['tmp_name'];          //3             
      
	    		$targetPath = __DIR__ . $ds . ".." . $ds . ".." . $ds . ".." . $ds . ".." . $ds . "web" . $ds . $storeFolder;  //4
	     
        		if(!is_dir($targetPath)){
        			mkdir($targetPath);
        		}

	    		$targetFile =  $targetPath. $_FILES['file']['name'];  //5

	    		$pic = new Pictures;

	    		$pic->setName($_FILES['file']['name']);
	    		$pic->setDate(new \DateTime());
	    		$pic->setTravel(1);
	    		$pic->setPath($storeFolder . $_FILES['file']['name']);

	    		move_uploaded_file($tempFile,$targetFile); //6

	    		$em->persist($pic);
	        	$em->flush();

	        	$response = new JsonResponse();
				$response->setData(array(
				    'data' => 123
				));
     
    		return $response;
		}
    }
}
