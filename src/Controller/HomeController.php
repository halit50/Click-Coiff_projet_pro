<?php

namespace App\Controller;

use App\Form\RechercheType;
use App\Repository\EnseigneRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
       
       
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/", name="home")
     */
    public function recherche(): Response 
    {

         $form = $this->createForm(RechercheType::class,null,['action' => $this->generateUrl('recherche')]);

         
         return $this->render('home/index.html.twig', [
            'form' => $form->createView()
            ]);
    }
}
