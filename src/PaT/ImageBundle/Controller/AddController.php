<?php

namespace PaT\ImageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaT\ImageBundle\Entity\Pictures;
use PaT\UserBundle\Entity\User;

class AddController extends Controller
{
    public function indexAction()
    {
		$request = $this->get('request');
    	$files = $request->files;

		$em = $this->getDoctrine()->getManager();

    	$ds = DIRECTORY_SEPARATOR;
        $user = $this->container->get('security.context')->getToken()->getUser();
        $storeFolder = "web/images/Users/"/* . $user->getId() . "/"*/;

        if (!empty($_FILES)) {

        	foreach ($files as $uploadedFile) {
        		//$tempFile = $_FILES['file']['tmp_name'];          //3             
      
	    		$targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
	     
	    		//$targetFile =  $targetPath. $_FILES['file']['name'];  //5

	    		$pic = new Pictures;

	    		$pic->setName("test");
	    		$pic->setDate(new \DateTime());
	    		$pic->setTravel(1);
	    		$pic->setPath($storeFolder);

	    		$file = $uploadedFile->move($targetPath, "test"); //6

	    		$em->persist($pic);
	        	$em->flush();
        	}
     
    		return new JsonResponse([]);
		}

	    return $this->render('PaTImageBundle:Add:index.html.twig');
    }
}
