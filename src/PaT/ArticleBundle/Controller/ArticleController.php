<?php

namespace PaT\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{

	public function indexAction ()
	{
		return $this->render('PaTArticleBundle:Article:index.html.twig');
	}

}