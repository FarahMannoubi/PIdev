<?php

namespace App\Repository;

use App\Entity\BilletEvenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BilletEvenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method BilletEvenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method BilletEvenement[]    findAll()
 * @method BilletEvenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BilletEvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BilletEvenement::class);
    }

    // /**
    //  * @return BilletEvenement[] Returns an array of BilletEvenement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BilletEvenement
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
