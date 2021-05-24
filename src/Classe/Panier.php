<?php 

namespace App\Classe;

use App\Entity\Produits;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Panier
{
    private $session;

    public function __construct(EntityManagerInterface $entityManager, SessionInterface $session)
    {
        $this->session = $session;
        $this->entityManager = $entityManager;
    }
    public function add($id)
    {
        $panier= $this->session->get('panier',[]);

        if (!empty($panier[$id])){
            $panier[$id]++;
        } else {
            $panier[$id] =1;
        }

        $this->session->set('panier',$panier);
    }

    public function get()
    {
        return $this->session->get('panier');
    }

    public function remove()
    {
        return $this->session->remove('panier');
    }

    public function delete($id){
        $panier= $this->session->get('panier',[]);
        unset ($panier[$id]);
        
        return $this->session->set('panier',$panier);
    }

    public function decrease($id)
    {
        $panier= $this->session->get('panier',[]);

        if($panier[$id]>1){
            $panier[$id] --;
        }else {
            unset ($panier[$id]);
        }
        return $this->session->set('panier',$panier);
    }

    public function getFull()
    {
        $panierComplet=[];

        if ($this->get()){
        foreach ($this->get() as $id =>$quantite){
            $product_object= $this->entityManager->getRepository(Produits::class)->findOneById($id);
            if (!$product_object){   // sécurité pour empecher les visiteurs à taper un id qui n'existe ds la bdd ds la barre d'adresse
                $this->delete($id);  
                continue;
            }
            $cartComplete[] = [
                'product' => $product_object,
                'quantity'=>$quantite
            ];
        }}

        return $panierComplet;
    }
}
