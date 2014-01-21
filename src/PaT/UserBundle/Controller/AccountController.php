<?php

namespace PaT\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PaT\UserBundle\Entity\User;


class AccountController extends Controller
{
	public function indexAction()
    {
        return $this->render('PaTUserBundle:Account:index.html.twig');  //affiche la vue correspondante
    }
}