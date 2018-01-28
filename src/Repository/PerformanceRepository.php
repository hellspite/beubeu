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

        //TODO: Sistemare funzione YEAR nella query
        $emConfig = $this->getEntityManager()->getConfiguration();
        $emConfig->addCustomDatetimeFunction('YEAR', 'Stof\DoctrineExtensions\Query\Mysql\Year');

        $thisYear = date("Y");

        return $this->createQueryBuilder('e')
            ->where('YEAR(e.whendate) = :whendate')->setParameter('whendate', $thisYear)
            ->orderBy('e.created', 'DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    public function getOldByDate(){
        $thisYear = date("Y");

        return $this->createQueryBuilder('e')
            ->where('YEAR(e.whendate) < :whendate')->setParameter('whendate', $thisYear)
            ->orderBy('e.created', 'DESC')
            ->getQuery()
            ->getResult()
            ;
    }
}
