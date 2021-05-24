<?php

namespace App\Controller;

use App\Classe\Panier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PanierController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/mon-panier", name="panier")
     */
    public function index(Panier $panier): Response
    {
       
        
        return $this->render('panier/index.html.twig',[
            'panier' => $panier->getFull()
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="add_to_panier")
     */
    public function add(Panier $panier, $id): Response
    {
        $panier->add($id);

        return $this->redirectToRoute('panier');
    }

    /**
     * @Route("/panier/remove", name="remove_my_panier")
     */
    public function remove (Panier $panier)
    {
        $panier->remove();

        return $this->redirectToRoute('produits');
    }

    /**
     * @Route("/panier/delete/{id}", name="delete_to_panier")
     */
    public function delete (Panier $panier, $id)
    {
        $panier->delete($id);

        return $this->redirectToRoute('panier');
    }

     /**
     * @Route("/panier/decrease/{id}", name="decrease_to_panier")
     */
    public function decrease (Panier $panier, $id)
    {
        $panier->decrease($id);

        return $this->redirectToRoute('panier');
    }
}
