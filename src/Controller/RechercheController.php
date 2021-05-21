<?php

namespace App\Controller;

use App\Entity\Enseigne;
use App\Entity\CategorieFichier;
use Doctrine\ORM\EntityManagerInterface;
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
    public function index(): Response
    {
        $enseignes= $this->entityManager->getRepository(Enseigne::class)->findAll();
        $coupes= $this->entityManager->getRepository(CategorieFichier::class)->findByNom('salon');
        //dd($enseigne);
        return $this->render('recherche/index.html.twig', [
            'enseignes' => $enseignes,
            'coupes' => $coupes
        ]);
    }
}
