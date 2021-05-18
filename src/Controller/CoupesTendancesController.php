<?php

namespace App\Controller;

use App\Entity\Fichier;
use App\Entity\Enseigne;
use App\Entity\CategorieFichier;
use App\Repository\FichierRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CoupesTendancesController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/coupes-tendances", name="coupes_tendances")
     */
    public function index(): Response
    {
        
        $coupes= $this->entityManager->getRepository(CategorieFichier::class)->findByNom('Coupe Tendance');
        
        //dd($coupes);
        return $this->render('coupes_tendances/index.html.twig', [
            'coupes' => $coupes,
        ]);
    }
}
