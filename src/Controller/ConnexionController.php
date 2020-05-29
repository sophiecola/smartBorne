<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConnexionController extends AbstractController
{
    /**
     * @Route("/", name="connexion_login")
     */
    public function login()
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('borne_index');
        }

        return $this->render('connexion/login.html.twig');
    }

    /**
     * @Route("/logout", name="connexion_logout")
     */
    public function logout() 
    {
        
    }
}
