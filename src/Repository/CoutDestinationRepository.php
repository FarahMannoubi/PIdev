<?php

namespace App\Repository;

use App\Entity\CoutDestination;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CoutDestination|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoutDestination|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoutDestination[]    findAll()
 * @method CoutDestination[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoutDestinationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoutDestination::class);
    }

    // /**
    //  * @return CoutDestination[] Returns an array of CoutDestination objects
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
    public function findOneBySomeField($value): ?CoutDestination
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
