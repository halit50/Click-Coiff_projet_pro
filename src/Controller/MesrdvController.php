<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MesrdvController extends AbstractController
{
    /**
     * @Route("/mes-rdv", name="mesrdv")
     */
    public function index(): Response
    {
        
        return $this->render('mesrdv/index.html.twig');
    }
}
