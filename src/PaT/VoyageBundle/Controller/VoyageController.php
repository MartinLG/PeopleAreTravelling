<?php

namespace PaT\VoyageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaT\VoyageBundle\Entity\Travel;
use PaT\VoyageBundle\Form\TravelType;
use PaT\VoyageBundle\Form\TravelEditType;



class VoyageController extends Controller
{

	public function indexAction()
	{
		$Repository = $this->getDoctrine()->getManager(); 
		$travel = $Repository->getRepository('PaTVoyageBundle:travel')->findBy(array('iduser' => 1), array('publicationdate' => 'desc'), 10, 0);

		return $this->render('PaTVoyageBundle:Voyage:index.html.twig', array('TripList' => $travel));
	}

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

        //Remplissage automatique du champ duration
        $datetime1 = $travelclass->getStartdate();
        $datetime2 = $travelclass->getEnddate();
        $duration = $datetime1->diff($datetime2);
        $duration = $duration->days;
        $travelclass->setDuration($duration);

        //envois des donnees
        $em = $this->getDoctrine()->getManager();
        $em->persist($travelclass);
        $em->flush();

        //retour sur la page index
        $this->get('session')->getFlashBag()->add('info', 'Votre nouveau voyage à bien été ajouté.'); 
        return $this->redirect($this->generateUrl('pa_t_voyage_homepage'));
      }
    }

    //retourne le formulaire
    return $this->render('PaTVoyageBundle:Voyage:ajouter.html.twig', array('travelform' => $travelform->createView()));
	}



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

          //Remplissage automatique du champ duration
          $datetime1 = $travelclass->getStartdate();
          $datetime2 = $travelclass->getEnddate();
          $duration = $datetime1->diff($datetime2);
          $duration = $duration->days;
          $travelclass->setDuration($duration);

          $em = $this->getDoctrine()->getManager();
          $em->persist($travelclass);
          $em->flush();

          $this->get('session')->getFlashBag()->add('info', 'Le voyage "'. $travelclass->getTitle() .'" à bien été modifié.');

          return $this->redirect($this->generateUrl('pa_t_voyage_homepage', array('id' => $travelclass->getID())));
        }
      }

    return $this->render('PaTVoyageBundle:Voyage:ajouter.html.twig', array('travelform' => $travelform->createView(), 'voyage' => $travelclass));
  }



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

  public function duree()
  {



  }
}