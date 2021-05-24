<?php

namespace App\Controller;

use App\Entity\Enseigne;
use App\Classe\Recherche;
use App\Form\RechercheType;
use App\Entity\CategorieFichier;
use App\Repository\EnseigneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RechercheController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/recherche", name="recherche")
     */
    public function index(Request $request, EnseigneRepository $enseigneRepository): Response
    {
        
        $form = $this->createForm(RechercheType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $critere = $form->getData();
            //dd($critere);
        $enseignes = $enseigneRepository->recherche($critere);
        //dd($enseigne);
        $coupes= $this->entityManager->getRepository(CategorieFichier::class)->findByNom('salon');
        return $this->render('recherche/index.html.twig', [
            'enseignes' => $enseignes,
            'coupes' => $coupes,
        ]);
        }

        return $this->redirectToRoute('home');
        

        
        //dd($enseigne);
        
    }
}
