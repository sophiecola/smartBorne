<?php

namespace App\Controller;

use App\Entity\Campagne;
use App\Form\CampagneType;
use App\Repository\CampagneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CampagneController extends AbstractController
{
    /**
     * @Route("/campagne", name="campagne_index")
     */
    public function index(CampagneRepository $campagneRepository)
    {
        $campagnes = $campagneRepository->findAll();

        return $this->render('campagne/index.html.twig', [
            'campagnes' => $campagnes,
        ]);
    }

    /**
     * @Route("/campagne/new", name="campagne_new")
     */
    public function create(Request $request, EntityManagerInterface $manager) 
    {
        $campagne = new Campagne();
        $form = $this->createForm(CampagneType::class,$campagne);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $campagne->getMedia();
            $fileName = md5(uniqid()) . '.' . $file->getClientOriginalExtension();
            $file->move($this->getParameter('upload_directory'), $fileName);
            $campagne->setMedia($fileName);

            $recurrence = $campagne->getRecurrence();
            $recurrenceToString = null;
            foreach($recurrence as $value) {
                $recurrenceToString = $recurrenceToString . $value . ';'; 
            }
            $campagne->setRecurrence($recurrenceToString);

            $manager->persist($campagne);
            $manager->flush();

            return $this->redirectToRoute('campagne_index');
        }

        return $this->render('campagne/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
