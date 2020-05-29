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
    const URL = "http://lucaslelaidier.fr:7200";

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MagasinCampagne::class);
    }

    public function getMagasins() {
        $json = file_get_contents(self::URL . "/magasin/magasins");
        $parse = json_decode($json);
        return $parse;
    }
}
