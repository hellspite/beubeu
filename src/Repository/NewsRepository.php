<?php

namespace App\Repository;

use App\Entity\News;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class NewsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, News::class);
    }

    public function getAllByDate(){
        return $this->createQueryBuilder('n')
            ->orderBy('n.created', 'DESC')
            ->setMaxResults(6)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findOneBySourceId($id, $source){
        return $this->createQueryBuilder('n')
            ->andWhere('n.sourceId = :id')
            ->andWhere('n.source = :source')
            ->setParameter('id', $id)
            ->setParameter('source', $source)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
