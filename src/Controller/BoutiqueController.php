<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Classe\Recherche;
use App\Form\ProduitRechercheType;
use App\Repository\ProduitsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BoutiqueController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    /**
     * @Route("/boutique", name="boutique")
     */
    public function index(Request $request, ProduitsRepository $produitsRepository): Response
    {
        $recherche = new Recherche();
        $form= $this->createForm(ProduitRechercheType::class,$recherche);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $produits= $produitsRepository->findWithRecherche($recherche);
        } else {
            $produits= $produitsRepository->findAll();
        }
        
        return $this->render('boutique/index.html.twig', [
            'produits' => $produits,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/nos-produits/{slug}", name="produit")
     */
    public function show($slug, ProduitsRepository $produitsRepository): Response
    {
        $produit= $produitsRepository-> findOneBySlug($slug);
        $produits = $this->entityManager->getRepository(Produits::class)->findByIsbest(1);

        if (!$produit){
            return $this->redirectToRoute('produits');
        }

       
        return $this->render('boutique/achat.html.twig', [
            'produit' => $produit,
            'produits'=> $produits
        ]);

        
    }
}
