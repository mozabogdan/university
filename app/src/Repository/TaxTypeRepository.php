<?php

namespace App\Repository;

use App\Entity\TaxType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TaxType|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaxType|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaxType[]    findAll()
 * @method TaxType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaxTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TaxType::class);
    }

    // /**
    //  * @return TaxType[] Returns an array of TaxType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TaxType
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
