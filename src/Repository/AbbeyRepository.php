<?php

namespace App\Repository;

use App\Entity\Abbey;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Abbey|null find($id, $lockMode = null, $lockVersion = null)
 * @method Abbey|null findOneBy(array $criteria, array $orderBy = null)
 * @method Abbey[]    findAll()
 * @method Abbey[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AbbeyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Abbey::class);
    }

    public function findOneById($value): ?Abbey
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
