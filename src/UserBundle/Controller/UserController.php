<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;

class UserController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction()
    {
        return $this->render('UserBundle:User:login.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createFormBuilder(new User())
            ->add("username", TextType::class)
            ->add("email", EmailType::class)
            ->add("password", PasswordType::class)
            ->add("created_at", DateType::class)
            ->add("role", HiddenType::class)
            ->add("submit", SubmitType::class, array('label' => 'Register'))
            ->getForm();

        $form->get('created_at')->setData(new \DateTime('now'));
        $form->get('role')->setData('USER_ROLE');

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $user = $form->getData();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute("login");
        }

        return $this->render('UserBundle:User:register.html.twig', array(
            'form' => $form->createView()
        ));

    }

}
