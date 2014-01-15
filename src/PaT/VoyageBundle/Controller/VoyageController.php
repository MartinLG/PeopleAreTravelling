<?php

namespace PaT\VoyageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaT\VoyageBundle\Form\BddVoyageType;
use PaT\VoyageBundle\Form\BddVoyageEditType;
use PaT\VoyageBundle\Entity\BddVoyage;


class VoyageController extends Controller
{

	public function indexAction()
	{
		$Repository = $this->getDoctrine()->getManager(); 
		$Voyage = $Repository->getRepository('PaTVoyageBundle:bddvoyage')->findAll();

		return $this->render('PaTVoyageBundle:Voyage:index.html.twig', array('nom' => 'Adrien', 'ListeVoyage' => $Voyage));
	}

	public function ajouterAction()
	{

	/*****    Partie 1    *****/
    //On déclare un nouvelle objet de type bddvoyage 
    //On crée notre formulaire en appelant le constructeur Pat/VoyageBundle/Form/BddVoyageForm
    
    $Form_Voyage = new BddVoyage;
    $form = $this->createForm(new BddVoyageType, $Form_Voyage);

    /*****    Partie 2    *****/
    //On récupére le type de la requete lors de l'accès au form
    //Si le formulaire est de type POST, on rentre dans la fonction d'envois
    //Sinon on affiche juste le formulaire (cf suite part2)

    $request = $this->get('request');

    if($request->getMethod() == 'POST')
    {
      //Lien entre Formulaire <-> Requête
      //Action de bind():
      //    La validation est exécutée
      //    Les messages d'erreurs
      //    Les valeurs par défaut
      $form->bind($request);

      /*****    Partie 3    *****/
      //Envois des données
      if($form->isValid())
      {

        $datetime1 = $Form_Voyage->getDateDebut();
        $datetime2 = $Form_Voyage->getDateFin();
        $duree = $datetime1->diff($datetime2);
        $duree = $duree->days;
        $Form_Voyage->setDuree($duree);

        $em = $this->getDoctrine()->getManager();
        $em->persist($Form_Voyage);
        $em->flush();

        $this->get('session')->getFlashBag()->add('info', 'Votre nouveau voyage à bien été ajouté.');

        return $this->redirect($this->generateUrl('pa_t_voyage_homepage'));
      }
    }

    /*****    Partie 2    *****/
    //suite : retourne le formulaire
    return $this->render('PaTVoyageBundle:Voyage:ajouter.html.twig', array('form' => $form->createView()));
	}



  public function modifierAction(BddVoyage $Voyage)
  {   
    $form = $this->createForm(new BddVoyageEditType, $Voyage);

    $request = $this->get('request');

    if($request->getMethod() == 'POST')
    {
       $form->bind($request);

       if($form->isValid())
       {

          $datetime1 = $Voyage->getDateDebut();
          $datetime2 = $Voyage->getDateFin();
          $duree = $datetime1->diff($datetime2);
          $duree = $duree->days;
          $Voyage->setDuree($duree);

          $em = $this->getDoctrine()->getManager();
          $em->persist($Voyage);
          $em->flush();

          $this->get('session')->getFlashBag()->add('info', 'Le voyage "'. $Voyage->getTitre() .'" à bien été modifié.');

          return $this->redirect($this->generateUrl('pa_t_voyage_homepage', array('id' => $Voyage->getID())));
        }
      }

    return $this->render('PaTVoyageBundle:Voyage:ajouter.html.twig', array('form' => $form->createView(), 'voyage' => $Voyage));
  }



	public function supprimerAction($id)
	{
	    $Repository = $this->getDoctrine()->getManager();
	    $voyage = $Repository->getRepository('PaTVoyageBundle:bddVoyage')->find($id);
	    $Repository->remove($voyage);
	    $Repository->flush();

      $this->get('session')->getFlashBag()->add('warning', 'Le voyage '. $id .' à bien été supprimé.');

	    return $this->redirect($this->generateUrl('pa_t_voyage_homepage'));
	}

  public function duree()
  {



  }
}