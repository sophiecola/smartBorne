<?php

namespace App\Repository;

use App\Entity\BorneCampagne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BorneCampagne|null find($id, $lockMode = null, $lockVersion = null)
 * @method BorneCampagne|null findOneBy(array $criteria, array $orderBy = null)
 * @method BorneCampagne[]    findAll()
 * @method BorneCampagne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BorneCampagneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BorneCampagne::class);
    }

    // /**
    //  * @return BorneCampagne[] Returns an array of BorneCampagne objects
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
    public function findOneBySomeField($value): ?BorneCampagne
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
