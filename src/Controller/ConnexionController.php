<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConnexionController extends AbstractController
{
    /**
     * @Route("/login", name="connexion_login")
     */
    public function login()
    {
        return $this->render('connexion/login.html.twig');
    }

    /**
     * @Route("/logout", name="connexion_logout")
     */
    public function logout() 
    {
        
    }
}
