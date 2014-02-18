<?php

namespace PaT\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaT\VoyageBundle\Entity\Travel;
use PaT\ArticleBundle\Entity\Article;
use PaT\ArticleBundle\Form\ArticleType;
use PaT\ArticleBundle\Form\ArticleEditType;


class ArticleController extends Controller
{

  /* Affiche l'article seul */
	public function viewAction ($travelid, $id)
	{
    $em = $this->getDoctrine()->getManager();
  
    $article = $em->getRepository('PaTArticleBundle:Article')->findById($id);

		return $this->render('PaTArticleBundle:Article:viewarticle.html.twig', array('article' => $article, 'travelid' => $travelid));
	}

 /* public function NewsviewAction($travelid)
  {
    $em = $this->getDoctrine()->getManager();
    $article = $em->getRepository('PaTArticleBundle:Article')->findByTravel($travelid);
    return $this->redirect($this->generateUrl('',array()));
  }*/


  /* Ajouter un article */
	public function addAction ($travelid)
	{
    $em = $this->getDoctrine()->getManager();

    $travel = $em->getRepository('PaTVoyageBundle:Travel')->findOneById($travelid);

    if($travel == null)
    {
      throw $this->createNotFoundException('Le voyage n°'. $travelid .' n\'est pas présent dans la base de données'); 
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
        return $this->redirect($this->generateUrl('pa_t_voyage_view', array('travelid' => $travelid)));
      }
    }

    //retourne le formulaire
    return $this->render('PaTArticleBundle:Article:add.html.twig', array('articleform' => $articleform->createView(), 'travelid' => $travelid));
	}

  /* Modifier un article */
  public function changeAction(Article $articleclass, $travelid)
  {

    $articleform = $this->createForm(new ArticleEditType, $articleclass);
    $request = $this->get('request');

    if($request->getMethod() == 'POST')
    {
       $articleform->bind($request);

       if($articleform->isValid())
       {

          $em = $this->getDoctrine()->getManager();
          $em->persist($articleclass);
          $em->flush();

          $this->get('session')->getFlashBag()->add('info', 'L\'article "' . $articleclass->getTitle() .'" à bien été modifié.');

          return $this->redirect($this->generateUrl('pa_t_article_view', array('travelid' => $travelid, 'id' => $articleclass->getID())));
        }
      }

    return $this->render('PaTArticleBundle:Article:add.html.twig', array('articleform' => $articleform->createView(), 'article' => $articleclass));
  }

  /*Supprimer un article */
  public function deleteAction(Article $articleclass, $travelid)
  {
    $articleform = $this->createFormBuilder()->getForm(); 
    $request = $this->getRequest();

    if($request->getMethod() == 'POST')
    {

      $articleform->bind($request);

      if($articleform->isValid())
      {

        $em = $this->getDoctrine()->getManager();
        $em->remove($articleclass);
        $em->flush();


        return $this->redirect($this->generateUrl('pa_t_voyage_view', array('travelid' => $travelid)));
      }

      
    }

    return $this->render('PaTArticleBundle:Article:delete.html.twig', array('article' => $articleclass, 'travelid' => $travelid,'form' => $articleform->createView()));

  }

}