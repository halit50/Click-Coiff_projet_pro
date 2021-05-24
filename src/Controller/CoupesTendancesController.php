<?php

namespace App\Controller;

use App\Entity\CategorieFichier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CoupesTendancesController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @IsGranted("ROLE_USER") or ("ROLE_ADMIN")
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
