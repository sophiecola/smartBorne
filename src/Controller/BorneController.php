<?php

namespace App\Controller;

use App\Form\BorneType;
use App\Repository\BorneCampagneRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BorneController extends AbstractController
{
    /**
     * @Route("/borne", name="borne_index")
     */
    public function index(BorneCampagneRepository $borneCampagneRepository)
    {
        // $bornes = $borneCampagneRepository->getBornes();

        $form = $this->createForm(BorneType::class);

        return $this->render('borne/index.html.twig', [
           'form' => $form->createView(),
        ]);
    }
}
