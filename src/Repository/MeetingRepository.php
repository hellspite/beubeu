<?php

namespace App\Repository;

use App\Entity\Meeting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class MeetingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Meeting::class);
    }

    public function getThisYearByDate(){
        $thisYear = date("Y");

        $conn = $this->getEntityManager()
            ->getConnection();
        $sql = 'SELECT * FROM performance WHERE YEAR(whendate) = '.$thisYear;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function getOldByDate(){
        $thisYear = date("Y");

        $conn = $this->getEntityManager()
            ->getConnection();
        $sql = 'SELECT * FROM performance WHERE YEAR(whendate) < '.$thisYear;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
