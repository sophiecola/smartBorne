<?php

namespace App\Controller;

use App\Repository\MagasinCampagneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client_index")
     */
    public function index(MagasinCampagneRepository $magasinCampagneRepository)
    {

        $clients = $magasinCampagneRepository->getMagasins();

        return $this->render('client/index.html.twig', [
            'clients' => $clients,
        ]);
    }
}
