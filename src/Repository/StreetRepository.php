<?php

namespace App\Repository;

use App\Entity\Street;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class StreetRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Street::class);
    }

    public function getThisYearByDate(){
        $thisYear = date("Y");

        $conn = $this->getEntityManager()
            ->getConnection();
        $sql = 'SELECT * FROM street WHERE YEAR(whendate) = '.$thisYear.' ORDER BY CREATED DESC';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function getOldByDate(){
        $thisYear = date("Y");

        $conn = $this->getEntityManager()
            ->getConnection();
        $sql = 'SELECT * FROM street WHERE YEAR(whendate) < '.$thisYear.' ORDER BY CREATED DESC';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
