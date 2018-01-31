<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class EventRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Event::class);
    }

    public function getThisYearByDate(){
        $thisYear = date("Y");

        $conn = $this->getEntityManager()
            ->getConnection();
        $sql = 'SELECT * FROM event WHERE YEAR(whendate) = '.$thisYear;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function getOldByDate(){
        $thisYear = date("Y");

        $conn = $this->getEntityManager()
            ->getConnection();
        $sql = 'SELECT * FROM event WHERE YEAR(whendate) < '.$thisYear;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
