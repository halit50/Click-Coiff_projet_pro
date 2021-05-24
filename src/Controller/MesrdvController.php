<?php

namespace App\Controller;

use App\Entity\PrendreRdv;
use App\Repository\UserRepository;
use App\Repository\PrendreRdvRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MesrdvController extends AbstractController
{
    
    /**
     * @Route("/mes-rdv", name="mesrdv")
     */
    public function index(PrendreRdvRepository $prendreRdvRepository): Response
    {
        $mesrdv = $prendreRdvRepository->findByUser($this->getUser());
        //dd($mesrdv);
        return $this->render('mesrdv/index.html.twig', [
            'mesrdv' => $mesrdv
        ]);
    }

    /**
     * @Route("/mes-rdv/{id}/delete", name="deleterdv")
     */
    public function deleterdv(PrendreRdv $prendreRdv): RedirectResponse 
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($prendreRdv);
        $em->flush();
        return $this->redirectToRoute('mesrdv');
    }
}
