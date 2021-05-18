<?php

namespace App\Repository;

use App\Entity\CategorieFichier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieFichier|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieFichier|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieFichier[]    findAll()
 * @method CategorieFichier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieFichierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieFichier::class);
    }

    // /**
    //  * @return CategorieFichier[] Returns an array of CategorieFichier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategorieFichier
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
