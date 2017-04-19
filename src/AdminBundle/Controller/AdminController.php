<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Article;

class AdminController extends Controller
{
    /**
     * @Route("/orders")
     */
    public function ordersAction()
    {
        return $this->render('AdminBundle:Admin:orders.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/articles", name="adminArticlesList")
     */
    public function listAction()
    {
        return $this->render('AdminBundle:Admin:list.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/article/add", name="addArticle")
     */
    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $form = $this->createFormBuilder(new Article())
            ->add("name")
            ->add("description")
            ->add('price')
            ->add("img_url")
            ->add("number")
            ->add("category")
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
     * @Route("/article/edit/{id}")
     */
    public function editAction($id)
    {
        return $this->render('AdminBundle:Admin:edit.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/article/delete/{id}")
     */
    public function deleteAction($id)
    {
        return $this->render('AdminBundle:Admin:delete.html.twig', array(
            // ...
        ));
    }

}
