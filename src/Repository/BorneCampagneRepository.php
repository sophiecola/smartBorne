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
    const URL = "http://lucaslelaidier.fr:7200";

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BorneCampagne::class);
    }

    public function getBornes() {
        $json = file_get_contents(self::URL . "/borne/bornes");
        $parse = json_decode($json);
        return $parse;
    }
}
