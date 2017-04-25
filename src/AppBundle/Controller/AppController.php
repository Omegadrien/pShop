<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;

class AppController extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function homeAction() { //create the cookie if doesn't exists, and redirect to /articles

        if(!isset($_COOKIE["cart"]))
        {
            $data = array();
            $cookie = new Cookie('cart', base64_encode(serialize($data)));

            // send the cookie
            $response = new Response();
            $response->headers->setCookie($cookie);
            $response->send();
        }

        return $this->redirectToRoute("articles");
    }


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

    /**
     * @Route("/cart", name="cart")
     */
    public function cartAction(Request $request)
    {

        $data = unserialize(base64_decode($request->cookies->get('cart')));

        //add total to send
        $totalPrice = 0;
        foreach($data as $elem) {
            $totalPrice += $elem["price"];
        }

        return $this->render('AppBundle:App:cart.html.twig', array(
            'articlesData' => $data, "total" => $totalPrice
        ));
    }

    /**
     * @Route("cart/delete", name="deleteCart")
     */

    public function deleteCartAction() {

        //Clear the cart cookie
        $response = new Response();
        $response->headers->clearCookie('cart');
        $response->send();

        return $this->redirectToRoute("home");
    }

    /**
     * @Route("/cart/add/{id}", name="addArticleToCart")
     */
    public function addCartAction($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $articleRepo = $em->getRepository("AppBundle:Article");
        $article = $articleRepo->find($id);

        $data = unserialize(base64_decode($request->cookies->get('cart')));
        array_push($data, array("id" => $id, "name" => $article->getName(), "price" => $article->getPrice()));
        $cookie = new Cookie('cart', base64_encode(serialize($data)));

        // send the cookie
        $response = new Response();
        $response->headers->setCookie($cookie);
        $response->send();

        return $this->redirectToRoute("articles");
    }

    /**
     * @Route("/purchase", name="purchase")
     */
    public function purchaseAction() {

        //need to add a check-> user logged

        return $this->render('AppBundle:App:purchase.html.twig', array(
            // ...
        ));
    }


}
