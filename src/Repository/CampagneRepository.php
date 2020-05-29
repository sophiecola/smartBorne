<?php

namespace App\Repository;

use App\Entity\Campagne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Campagne|null find($id, $lockMode = null, $lockVersion = null)
 * @method Campagne|null findOneBy(array $criteria, array $orderBy = null)
 * @method Campagne[]    findAll()
 * @method Campagne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampagneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Campagne::class);
    }

    public function findAllWithMagasin()
    {
        return $this->createQueryBuilder('c')
            ->select('c as campagne')
            ->join('c.magasinCampagnes', 'mc')
            ->addSelect('mc.magasinName')
            ->orderBy('c.dateFin')
            ->getQuery()
            ->getResult()
        ;
    }

}
