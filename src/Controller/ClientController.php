<?php

namespace App\Controller;

use App\Form\ClientType;
use App\Repository\MagasinCampagneRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client_index")
     */
    public function index(MagasinCampagneRepository $magasinCampagneRepository)
    {

        $clients = $magasinCampagneRepository->getMagasins();

        $form = $this->createForm(ClientType::class);

        return $this->render('client/index.html.twig', [
            'clients' => $clients,
            'form' => $form->createView()
        ]);
    }
}
