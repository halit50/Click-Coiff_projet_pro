<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IdentityController extends AbstractController
{
    /**
     * @Route("/qui-sommes-nous", name="identity")
     */
    public function index(): Response
    {
        return $this->render('identity/identity.html.twig',);
    }
}
