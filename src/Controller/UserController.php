<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @IsGranted("ROLE_ADMIN")
     * 
     * @Route("/user", name="user_index")
     */
    public function index(UserRepository $userRepository, Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder)
    {
        $users = $userRepository->findAll();

        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $file = $user->getAvatar();
            $fileName = md5(uniqid()) . '.' . $file->getClientOriginalExtension();
            $file->move($this->getParameter('upload_avatar'), $fileName);
            $user->setAvatar($fileName);

            $password = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/index.html.twig', [
            'users' => $users,
            'form' => $form->createView()
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     *  
     * @Route("/user/delete/{id}", name="user_delete")
     */
    public function delete($id, UserRepository $userRepository, EntityManagerInterface $manager) {
        
        $user = $userRepository->find($id);
        dd($user);exit;
        $manager->remove($user);

        return $this->render('user/index.html.twig');
    }
 
}
