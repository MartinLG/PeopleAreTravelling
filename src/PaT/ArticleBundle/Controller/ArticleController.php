<?php

namespace PaT\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaT\VoyageBundle\Entity\Travel;
use PaT\ArticleBundle\Entity\Article;
use PaT\ArticleBundle\Form\ArticleType;



class ArticleController extends Controller
{

	public function indexAction ($travelid)
	{
    $em = $this->getDoctrine()->getManager();
  
    $article = $em->getRepository('PaTArticleBundle:Article')->findByTravel_Id($travelid);

		return $this->render('PaTArticleBundle:Article:index.html.twig', array('article' => $article));
	}



	public function addAction ($travelid)
	{
    $em = $this->getDoctrine()->getManager();

    $travel = $em->getRepository('PaTVoyageBundle:Travel')->findOneById($travelid);

    if($travel == null)
    {
      throw $this->createNotFoundException('Le voyage n°'. $travelid .' n`\'est pas présent dans la base de données'); 
    }

		$articleclass = new Article;
    

		$articleform = $this->createform( new ArticleType, $articleclass);
		$request = $this->get('request');

    if($request->getMethod() == 'POST')
    {

      $articleform->bind($request);

      if($articleform->isValid())
      {

        $articleclass->setTravel($travel);

        //envois des donnees
        $em->persist($articleclass);
        $em->flush();
        $articleclass->setTravel($travel);



        //retour sur la page index
        $this->get('session')->getFlashBag()->add('info', 'Votre nouveau voyage à bien été ajouté.'); 
        return $this->redirect($this->generateUrl('pa_t_voyage_homepage'));
      }
    }

    //retourne le formulaire
    return $this->render('PaTArticleBundle:Article:add.html.twig', array('articleform' => $articleform->createView(), 'travelid' => $travelid));
	}
}