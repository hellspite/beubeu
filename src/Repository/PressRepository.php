<?php

namespace App\Repository;

use App\Entity\Press;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Press|null find($id, $lockMode = null, $lockVersion = null)
 * @method Press|null findOneBy(array $criteria, array $orderBy = null)
 * @method Press[]    findAll()
 * @method Press[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PressRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Press::class);
    }

    public function findOneById($value): ?Press
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
