<?php

namespace PaT\VoyageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaT\VoyageBundle\Form\BddVoyageType;
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
    //On crée notyre formulaire en appelant le constructeur Pat/VoyageBundle/Form/BddVoyageForm
    
    $Form_Voyage = new bddvoyage;
    $form = $this->createForm(new bddvoyageType, $Form_Voyage);

    /*****    Partie 2    *****/
    //On récupére le type de la requete lors de l'acée au form
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
        $em = $this->getDoctrine()->getManager();
        $em->persist($Form_Voyage);
        $em->flush();

        return $this->redirect($this->generateUrl('pa_t_voyage_homepage', array('id' => $Form_Voyage->getID())));
      }
    }

    /*****    Partie 2    *****/
    //suite : retourne le formulaire
    return $this->render('PaTVoyageBundle:Voyage:ajouter.html.twig', array('form' => $form->createView()));
	}


	public function supprimerAction($id)
	{

	    //$em = $this->getDoctrine()->getManager();
	    $Repository = $this->getDoctrine()->getManager();
	    $voyage = $Repository->getRepository('PaTVoyageBundle:bddVoyage')->find($id);
	    $Repository->remove($voyage);
	    $Repository->flush();

	    return $this->redirect($this->generateUrl('pa_t_voyage_homepage'));
	}
}