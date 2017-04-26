<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use AppBundle\Entity\Article;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class AdminController extends Controller
{
    /**
     * @Route("/orders", name="orders")
     */
    public function ordersAction()
    {
        $em = $this->getDoctrine()->getManager();

        $orders = $em->getRepository("AdminBundle:Orders")->findAll();

        return $this->render('AdminBundle:Admin:orders.html.twig', array(
            'orders' => $orders
        ));

    }

    /**
     * @Route("/articles", name="adminArticlesList")
     */
    public function listAction()
    {

        $em = $this->getDoctrine()->getManager();

        $articleRepo = $em->getRepository("AppBundle:Article");
        $articles = $articleRepo->findAll();

        return $this->render('AdminBundle:Admin:list.html.twig', array(
            'articles' => $articles
        ));
    }

    /**
     * @Route("/article/add", name="addArticle")
     */
    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createFormBuilder(new Article())
            ->add("name", TextType::class)
            ->add("description", TextType::class)
            ->add('price', NumberType::class)
            ->add("img_url", TextType::class)
            ->add("number", NumberType::class)
            ->add("category", NumberType::class)
            ->add("submit", SubmitType::class, array('label' => 'Add article'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $article = $form->getData();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute("adminArticlesList");
        }

        return $this->render('AdminBundle:Admin:add.html.twig', array(
            'form' => $form->createView()
        ));

    }

    /**
     * @Route("/article/edit/{id}", name="editArticle")
     */
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $articleRepo = $em->getRepository("AppBundle:Article");
        $article = $articleRepo->find($id);

        $form = $this->createFormBuilder(new Article())
            ->add("name", TextType::class, array('data' => $article->GetName()))
            ->add("description", TextType::class, array('data' => $article->GetDescription()))
            ->add('price', NumberType::class, array('data' => $article->GetPrice()))
            ->add("img_url", TextType::class, array('data' => $article->GetImgUrl()))
            ->add("number", NumberType::class, array('data' => $article->GetNumber()))
            ->add("category", NumberType::class, array('data' => $article->GetCategory()))
            ->add("submit", SubmitType::class, array('label' => 'Edit article'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $newArticle = $form->getData();
            $em->persist($newArticle);
            $em->remove($article);
            $em->flush();

            return $this->redirectToRoute("adminArticlesList");
        }

        return $this->render('AdminBundle:Admin:add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/article/delete/{id}", name="deleteArticle")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $articleRepo = $em->getRepository("AppBundle:Article");
        $article = $articleRepo->find($id);
        $em->remove($article);
        $em->flush();

        return $this->redirectToRoute("adminArticlesList");
    }

}
