<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CampagneController extends AbstractController
{
    /**
     * @Route("/campagne", name="campagne")
     */
    public function index()
    {
        return $this->render('campagne/index.html.twig', [
            'controller_name' => 'CampagneController',
        ]);
    }
}
