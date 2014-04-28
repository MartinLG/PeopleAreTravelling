<?php

namespace PaT\ImageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaT\ImageBundle\Entity\Pictures;
use PaT\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

class AddController extends Controller
{
    public function indexAction($albumid)
    {
	    return $this->render('PaTImageBundle:Add:index.html.twig', array('albumid' => $albumid));
    }

    public function addPicAction($albumid)
    {
    	$request = $this->container->get('request');

		$em = $this->getDoctrine()->getManager();

    	$ds = DIRECTORY_SEPARATOR;
        $user = $this->container->get('security.context')->getToken()->getUser();
        $storeFolder = "images" . $ds . "Users" . $ds . $user->getId() . $ds . $albumid . $ds;

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
	    		$pic->setAlbum($albumid);
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

    public function getPicsAction($albumid){
    	$encoders = array(new XmlEncoder(), new JsonEncoder());
		$normalizers = array(new GetSetMethodNormalizer());

		$serializer = new Serializer($normalizers, $encoders);

    	$em = $this->getDoctrine()->getManager();
    	if($this->container->get('security.context')->getToken()->getUser()->getId() != $em->getRepository('PaTVoyageBundle:Travel')->find($em->getRepository('PaTAlbumBundle:Album')->find($albumid)->getTravel())->getIdUser()){
    		return $this->render('PaTMaquetteBundle:Maquette:notalowed.html.twig');
    	} else{
    		$result  = array();
 
		    $pics = $em->getRepository('PaTImageBundle:Pictures')->findBy(array('album' => $albumid));                 //1
		    if ( false!==$pics ) {
		        /*foreach ( $pics as $pic ) {
		          
		            $obj['name'] = $pic->;
		            $obj['size'] = filesize($storeFolder.$ds.$pic);
		            $result[] = $obj;
		            
		        }*/
		    }
		     
		    header('Content-type: text/json');              //3
		    header('Content-type: application/json');
		    echo json_encode($result);
    	}
    }
}