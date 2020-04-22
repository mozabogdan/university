<?php

namespace App\Repository;

use App\Entity\UserTax;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserTax|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserTax|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserTax[]    findAll()
 * @method UserTax[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserTaxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserTax::class);
    }

    // /**
    //  * @return UserTax[] Returns an array of UserTax objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserTax
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
