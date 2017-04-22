<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AppController extends Controller
{
    /**
     * @Route("/articles", name="articles")
     */
    public function articlesAction()
    {

        $em = $this->getDoctrine()->getManager();

        $articleRepo = $em->getRepository("AppBundle:Article");
        $articles = $articleRepo->findAll();

        return $this->render('AppBundle:App:articles.html.twig', array(
            'articles' => $articles
        ));

    }

    /**
     * @Route("/cart", name="cart")
     */
    public function cartAction()
    {
        return $this->render('AppBundle:App:cart.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/article/{id}", name="detailArticle")
     */
    public function articleAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $articleRepo = $em->getRepository("AppBundle:Article");
        $article = $articleRepo->find($id);

        return $this->render('AppBundle:App:article.html.twig', array(
            'article' => $article
        ));
    }

    /**
     * @Route("/result", name="result")
     */
    public function resultAction()
    {
        return $this->render('AppBundle:App:result.html.twig', array(
            // ...
        ));
    }

}
