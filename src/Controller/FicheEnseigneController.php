<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FicheEnseigneController extends AbstractController
{
    /**
     * @Route("/fiche/enseigne", name="ficheEnseigne")
     */
    public function index(): Response
    {
        return $this->render('fiche_enseigne/index.html.twig', );
    }
}
