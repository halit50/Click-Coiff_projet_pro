<?php

namespace App\Repository;

use App\Entity\Produits;
use App\Classe\Recherche;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Produits|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produits|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produits[]    findAll()
 * @method Produits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produits::class);
    }

    // /**
    //  * @return Produits[] Returns an array of Produits objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

     /**
     * Requête qui me permet de récupérer les produits en fonction de la recherche de l'utilisateur
     * @return Produits[]
     */
    public function findWithRecherche(Recherche $recherche)
    {
        $query = $this
        ->createQueryBuilder('p') // p pour product
        ->select('c','p')
        ->join('p.categorie','c');

        if (!empty($recherche->categorie)){
            $query=$query
            ->andWhere('c.id IN (:categorie)')
            ->setParameter('categorie', $recherche->categorie);
        }

        if (!empty($recherche->string)){
            $query=$query
            ->andWhere('p.nom LIKE :string')
            ->setParameter('string',"%($recherche->string)%");
        }

        return $query->getQuery()->getResult();
    }

    /*
    public function findOneBySomeField($value): ?Produits
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
