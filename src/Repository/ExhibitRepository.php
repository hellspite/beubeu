<?php

namespace App\Repository;

use App\Entity\Exhibit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ExhibitRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Exhibit::class);
    }

    public function getThisYearByDate(){
        $thisYear = date("Y");

        return $this->createQueryBuilder('e')
            ->where('e.year = :year')->setParameter('year', $thisYear)
            ->orderBy('e.created', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function getOldByDate(){
        $thisYear = date("Y");

        return $this->createQueryBuilder('e')
            ->where('e.year < :year')->setParameter('year', $thisYear)
            ->orderBy('e.created', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
}
