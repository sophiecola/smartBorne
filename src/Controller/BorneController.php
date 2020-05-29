<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BorneController extends AbstractController
{
    /**
     * @Route("/", name="borne_index")
     */
    public function index()
    {
        return $this->render('borne/index.html.twig', [
            
        ]);
    }
}
