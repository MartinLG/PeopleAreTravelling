<?php

namespace PaT\VoyageBundle\Controller;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaT\VoyageBundle\Entity\Travel;
use PaT\VoyageBundle\Form\TravelType;
use PaT\VoyageBundle\Form\TravelEditType;
use PaT\UserBundle\Entity\User;



class VoyageController extends Controller
{

  /**************************************************************
    Affiche la liste des 10 dernier voyages dans la section news
   **************************************************************/
	public function newstravelAction()
	{
		$Repository = $this->getDoctrine()->getManager(); 

		$travel = $Repository->getRepository('PaTVoyageBundle:travel')->findBy(array(), array('publicationdate' => 'desc'), 10, 0);
    $i = 0;
    foreach ($travel as &$trav) {
      $trav['user'] = $Repository->getRepository('PaTUserBundle:user')->findById($trav->getIduser());
    }
    //$user = $Repository->getRepository('PaTUserBundle:user')->findById($travel->getIduser());

		return $this->render('PaTVoyageBundle:Voyage:newsview.html.twig', array('TripList' => $travel));
	}



  /******************************************************
    Affichage des voyages d'un utilisateur en particulié
   ******************************************************/
  public function traveluserAction ($userid)
  {
    $userId = $this->container->get('security.context')->getToken()->getUser()->getId();

    if($userId == true)
    {
      $Repository = $this->getDoctrine()->getManager();
      $traveluser = $Repository->getRepository('PaTVoyageBundle:travel')->findBy(array('iduser' => $userid), array('publicationdate' =>'desc'), 10, 0);
      
      return $this->render('PaTVoyageBundle:Voyage:index.html.twig', array('TripList' => $traveluser));
    }
    else
    {
      throw new AccessDeniedException('Vous ne disposez pas des droits nécéssaire pour accéder à cette page');
    }
  }


  
  /*******************************************
    Affiche des articles associé a un voyage
  ********************************************/
  public function viewAction($travelid)
  {
    //Se connect et recupére les articles
    $em = $this->getDoctrine()->getManager();
    $article = $em->getRepository('PaTArticleBundle:Article')->findByTravel($travelid);

    if ($article == false)
    {
      $this->get('session')->getFlashBag()->add('warning', 'Aucun articles associé à ce voyage pour le moment'); 
    }
    
    return $this->render('PaTVoyageBundle:Voyage:view.html.twig', array('travelid' => $travelid, 'article' => $article));
  }



  /****************************
    Ajouter un nouveau voyage 
  *****************************/
	public function addtravelAction()
	{
    //creation de la classe et du formulaire
    $travelclass = new Travel;
    $travelform = $this->createForm(new TravelType, $travelclass);

    //annalyse du type de requete
    $request = $this->get('request');

    if($request->getMethod() == 'POST')
    {

      $travelform->bind($request);

      if($travelform->isValid())
      {

        //Remplissage du champs Duration
        $travelclass->setDuration($this->Duration($travelclass->getStartdate(), $travelclass->getEnddate()));

        //Remplissage du champs iduser
        $user = $this->container->get('security.context')->getToken()->getUser();
        //$user = $this->getId();
        $travelclass->setIduser($user->getId());

        //envois des donnees
        $em = $this->getDoctrine()->getManager();
        $em->persist($travelclass);
        $em->flush();

        //retour sur la page index
        $this->get('session')->getFlashBag()->add('info', 'Votre nouveau voyage à bien été ajouté.'); 
        return $this->redirect($this->generateUrl('pa_t_voyage_traveluser', array('userid' => $user->getId() )));
      }
    }

    //retourne le formulaire
    return $this->render('PaTVoyageBundle:Voyage:ajouter.html.twig', array('travelform' => $travelform->createView()));
	}



  /*********************
    Modifier un voyage
  **********************/
  public function changeAction(Travel $travelclass)
  {  
    // on cree le formulair en fonction de traveleditetype 
    $travelform = $this->createForm(new TravelEditType, $travelclass);
    $request = $this->get('request');

    if($request->getMethod() == 'POST')
    {
       $travelform->bind($request);

       if($travelform->isValid())
       {

          //Remplissage du champs iduser
          $user = $this->container->get('security.context')->getToken()->getUser();

          //Remplissage automatique du champ duration
          $travelclass->setDuration($this->Duration($travelclass->getStartdate(), $travelclass->getEnddate()));

          $em = $this->getDoctrine()->getManager();
          $em->persist($travelclass);
          $em->flush();

          $this->get('session')->getFlashBag()->add('info', 'Le voyage "'. $travelclass->getTitle() .'" à bien été modifié.');

          return $this->redirect($this->generateUrl('pa_t_voyage_traveluser', array('userid' => $user->getId() )));
        }
      }

    return $this->render('PaTVoyageBundle:Voyage:ajouter.html.twig', array('travelform' => $travelform->createView(), 'voyage' => $travelclass));
  }



  /***********************
    Supprimer un voyage
   ***********************/
	public function supprimerAction(Travel $travelclass)
	{

    $travelform = $this->createFormBuilder()->getForm();
    $request = $this->getRequest();

    if( $request->getMethod() == 'POST')
    {

      $travelform->bind($request);

      if( $travelform->isValid())
      {

        $em = $this->getDoctrine()->getManager();
        $em->remove($travelclass);
        $em->flush();

        $this->get('session')->getFlashBag()->add('warning', 'Le voyage '. $travelclass->getId() .' à bien été supprimé.');
        return $this->redirect($this->generateUrl('pa_t_voyage_homepage'));
      }
    }

    return $this->render('PaTVoyageBundle:Voyage:delete.html.twig', array('voyage' => $travelclass, 'form' => $travelform->createView()));
	}



  /*****************************************************************
  * Retourne le nombre de jours en fonction de la date selectionné
  ******************************************************************/
  private function Duration( $datetime1,  $datetime2)
  {
    $duration = $datetime1->diff($datetime2);
    return $duration = $duration->days;    
  }

}