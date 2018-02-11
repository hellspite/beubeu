<?php

namespace App\Repository;

use App\Entity\Performance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PerformanceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Performance::class);
    }

    public function getThisYearByDate(){
        $thisYear = date("Y");

        $conn = $this->getEntityManager()
            ->getConnection();
        $sql = 'SELECT * FROM performance WHERE YEAR(whendate) = '.$thisYear.' ORDER BY CREATED DESC';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function getOldByDate(){
        $thisYear = date("Y");

        $conn = $this->getEntityManager()
            ->getConnection();
        $sql = 'SELECT * FROM performance WHERE YEAR(whendate) < '.$thisYear.' ORDER BY CREATED DESC';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
