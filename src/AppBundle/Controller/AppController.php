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

    /**
     * @Route("/cart/add/{id}", name="addArticleToCart")
     */
    public function addCartAction($id, Request $request) {

        /*
         $this->getResponse()->setCookie('myCookie', serialize($data));
         $data = unserialize($this->getRequest()->getCookie('myCookie'));

        $array = array();
        $array[] = array(1,2,3);
        $array[] = array('a','b','c');
        setcookie("test",serialize($array));



         */


        // check cookie
        if(!isset($_COOKIE["test"]))
        {
            // create cookie info
            $cookie_info = array(
                'name'  => 'test',
                'value' => new \DateTime('now'),
                'time'  => time() + 3600 * 24 * 7
            );

            $data = ["1", "2", "3"];

            // create the cookie
            //$cookie = new Cookie($cookie_info['name'], $cookie_info['value'], $cookie_info['time']);
            $cookie = new Cookie('test', base64_encode($data));

            // send the cookie
            $response = new Response();
            $response->headers->setCookie($cookie);
            $response->send();
        }


        $data = base64_decode($request->cookies->get('test'));


        // Try to get cookie info (doesn't work?)
        //$cookie = $this->getResponse()->getCookie('cartCookie');
        //$data = $cookie.push($id);
        //$this->getResponse()->setCookie('cartCookie', serialize($data));


        //Clear a cookie:

        //$response = new Response();
        // $response->headers->clearCookie('varName');
        // $response->send();



        return $this->redirectToRoute("articles");
    }


}
