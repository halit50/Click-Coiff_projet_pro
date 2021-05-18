<?php

namespace App\Repository;

use App\Entity\PrendreRdv;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrendreRdv|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrendreRdv|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrendreRdv[]    findAll()
 * @method PrendreRdv[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrendreRdvRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrendreRdv::class);
    }

    // /**
    //  * @return PrendreRdv[] Returns an array of PrendreRdv objects
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

    /*
    public function findOneBySomeField($value): ?PrendreRdv
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
