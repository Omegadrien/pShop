<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class AppController extends Controller
{
    const categoryList = ["All", "Video game", "Anime", "Manga", "Original SoundTrack", "Visual novel", "Other"];

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
    public function articlesAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $articleRepo = $em->getRepository("AppBundle:Article");
        $articles = $articleRepo->findAll();

        $defaultData = array();
        $form = $this->createFormBuilder($defaultData)
            ->add('Category', ChoiceType::class, array(
                'choices'  => array(
                    self::categoryList[0] => 0,
                    self::categoryList[1] => 1,
                    self::categoryList[2] => 2,
                    self::categoryList[3] => 3,
                    self::categoryList[4] => 4,
                    self::categoryList[5] => 5,
                    self::categoryList[6] => 6
                )))
            ->add('Search!', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $categorySelected = $form->get('Category')->getData();

            return $this->redirect("result/" . $categorySelected);
        }


        return $this->render('AppBundle:App:articles.html.twig', array(
            'articles' => $articles, 'form' => $form->createView()
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

        if ($article->getCategory() > 0 && $article->getCategory() < count(self::categoryList)) {
            $categoryName = self::categoryList[$article->getCategory()];
        }
        else {
            $categoryName = "Other";
        }

        return $this->render('AppBundle:App:article.html.twig', array(
            'article' => $article, 'categoryName' => $categoryName
        ));
    }

    /**
     * @Route("/result/{category}", name="result")
     */
    public function resultAction($category)
    {
        if ($category < 0 || $category > count(self::categoryList)) {
            $category = 0;
        }

        $em = $this->getDoctrine()->getManager();

        $articleRepo = $em->getRepository("AppBundle:Article");
        if ($category != 0) {
            $articles = $articleRepo->findByCategory($category);
        }
        else {
            $articles = $articleRepo->findAll();
        }

        return $this->render('AppBundle:App:result.html.twig', array(
            "articles" => $articles, "categoryName" => self::categoryList[$category]
        ));
    }

    /**
     * @Route("/cart", name="cart")
     */
    public function cartAction(Request $request)
    {

        $data = unserialize(base64_decode($request->cookies->get('cart')));

        //add total price to send to the view
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
    public function purchaseAction(Request $request) {

        // /!\ need to add a check-> user logged /!\
        if ($this->isGranted('ROLE_USER')) {
            $message = "Checkout succeeded!";

            $data = unserialize(base64_decode($request->cookies->get('cart')));

            foreach($data as $elem) {
                //Remove one number to article
                $em = $this->getDoctrine()->getManager();
                $article = $em->getRepository("AppBundle:Article")->find($elem["id"]);
                $article->setNumber($article->getNumber()-1);
                $em->flush();


                //Create object in database
                $user = $this->getUser();

                $order = new \AdminBundle\Entity\Orders();
                $order->setArticleId($elem["id"]);
                $order->setName($elem["name"]);
                $order->setOrderAt(new \DateTime("now"));
                $order->setUsername($user->getUsername());
                $order->setEmail($user->getEmail());

                $em = $this->getDoctrine()->getManager();

                $em->persist($order);
                $em->flush();

            }

            //Clear the cart cookie
            $response = new Response();
            $response->headers->clearCookie('cart');
            $response->send();
        }
        else {
            $message = "Error, you need to be logged.";
        }

        return $this->render('AppBundle:App:purchase.html.twig', array(
            "message" => $message
        ));
    }


}
