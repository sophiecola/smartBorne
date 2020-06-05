<?php

namespace App\Controller;

use App\Entity\Campagne;
use App\Form\CampagneType;
use App\Entity\MagasinCampagne;
use App\Repository\CampagneRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\MagasinCampagneRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CampagneController extends AbstractController
{
    /**
     * @Route("/campagne", name="campagne_index")
     */
    public function index(CampagneRepository $campagneRepository)
    {
        $campagnes = $campagneRepository->findAllWithMagasin();
    
        return $this->render('campagne/index.html.twig', [
            'campagnes' => $campagnes,
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * 
     * @Route("/campagne/new", name="campagne_new")
     */
    public function create(Request $request, EntityManagerInterface $manager, MagasinCampagneRepository $magasinCampagneRepository) 
    {
        $campagne = new Campagne();
        $form = $this->createForm(CampagneType::class,$campagne);

        $clients = $magasinCampagneRepository->getMagasins();
        
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // dd($request->get('clients'));
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

            $magasinCampagne = new MagasinCampagne();
            $id = explode("/", $request->get('clients'))[0];
            $name = explode("/", $request->get('clients'))[1];
            $magasinCampagne->setUuidMagasin($id);
            $magasinCampagne->setMagasinName($name);
            $magasinCampagne->setUuidCampagne($campagne);
            $manager->persist($magasinCampagne);
            $manager->flush();

            return $this->redirectToRoute('campagne_index');
        }

        return $this->render('campagne/new.html.twig', [
            'form' => $form->createView(),
            'clients' => $clients
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * 
     * @Route("/campagne/delete/{id}", name="campagne_delete")
     */
    public function delete(Campagne $campagne, ObjectManager $manager) 
    {
        $manager->remove($campagne);
        $manager->flush();

        return $this->redirectToRoute('campagne_index');

    }
}
