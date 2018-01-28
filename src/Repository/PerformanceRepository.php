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

        return $this->createQueryBuilder('e')
            ->where('YEAR(e.when) = :when')->setParameter('when', $thisYear)
            ->orderBy('e.created', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function getOldByDate(){
        $thisYear = date("Y");

        return $this->createQueryBuilder('e')
            ->where('YEAR(e.when) < :when')->setParameter('when', $thisYear)
            ->orderBy('e.created', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
}
