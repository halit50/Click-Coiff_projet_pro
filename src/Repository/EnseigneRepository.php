<?php

namespace App\Repository;

use App\Entity\Enseigne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Enseigne|null find($id, $lockMode = null, $lockVersion = null)
 * @method Enseigne|null findOneBy(array $criteria, array $orderBy = null)
 * @method Enseigne[]    findAll()
 * @method Enseigne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnseigneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Enseigne::class);
    }

    /**
     * @return Enseigne[] Returns an array of Enseigne objects
     */
    public function recherche($criteria)
    {
//         $qb->select(array('u')) // string 'u' is converted to array internally
//    ->from('User', 'u')
//    ->where($qb->expr()->orX(
//        $qb->expr()->eq('u.id', '?1'),
//        $qb->expr()->like('u.nickname', '?2')
//   ))
            //dd($criteria);
            $qb = $this->createQueryBuilder('e')

            ->innerJoin('e.adresses', 'a')
            ->addSelect('a');
            return $qb->where($qb->expr()->andX(
                $qb->expr()->eq('e.typeCoiffeur', ':typeCoiffeur'),
                $qb->expr()->like('a.codePostal', ':codePostal')
            ))

            //$qb->Where('e.typeCoiffeur = :typeCoiffeur')
            //->andWhere('a.codePostal = :codePostal')
            ->orderBy('e.id', 'ASC')
            ->setParameter('typeCoiffeur', $criteria['typeCoiffeur'])
            ->setParameter('codePostal', $criteria['codePostal'].'%')

            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?Enseigne
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
