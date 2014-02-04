<?php

namespace PaT\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PaTArticleBundle:Default:index.html.twig', array('name' => $name));
    }
}
