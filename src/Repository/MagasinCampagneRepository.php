<?php

namespace App\Repository;

use App\Entity\MagasinCampagne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MagasinCampagne|null find($id, $lockMode = null, $lockVersion = null)
 * @method MagasinCampagne|null findOneBy(array $criteria, array $orderBy = null)
 * @method MagasinCampagne[]    findAll()
 * @method MagasinCampagne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MagasinCampagneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MagasinCampagne::class);
    }

    // /**
    //  * @return MagasinCampagne[] Returns an array of MagasinCampagne objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MagasinCampagne
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
