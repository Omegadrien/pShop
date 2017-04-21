<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AppController extends Controller
{
    /**
     * @Route("/articles")
     */
    public function articlesAction()
    {
        return $this->render('AppBundle:App:articles.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/cart")
     */
    public function cartAction()
    {
        return $this->render('AppBundle:App:cart.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/article/{id}")
     */
    public function articleAction($id)
    {
        return $this->render('AppBundle:App:article.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/result")
     */
    public function resultAction()
    {
        return $this->render('AppBundle:App:result.html.twig', array(
            // ...
        ));
    }

}
