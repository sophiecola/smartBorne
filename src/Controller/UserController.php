<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user_index")
     */
    public function index()
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/user/new", name="user_new")
     */
        public function new(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder)
        {
            $user = new User();

            $form = $this->createForm(UserType::class, $user);

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
                $password = $encoder->encodePassword($user, $user->getPassword());
                $user->setPassword($password);

                $manager->persist($user);
                $manager->flush();

                return $this->redirectToRoute('user_index');
            }

            return $this->render('user/new.html.twig', [
                'form' => $form->createView()
            ]);
        }
}
