<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ValidationCompteController extends AbstractController
{
    /**
     * @Route("/validation/compte", name="validationcompte")
     */
    public function index(): Response
    {
        return $this->render('validation_compte/index.html.twig');
    }
}
