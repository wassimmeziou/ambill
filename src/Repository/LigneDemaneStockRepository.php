<?php

namespace App\Repository;

use App\Entity\LigneDemaneStock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LigneDemaneStock|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneDemaneStock|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneDemaneStock[]    findAll()
 * @method LigneDemaneStock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneDemaneStockRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LigneDemaneStock::class);
    }

    // /**
    //  * @return LigneDemaneStock[] Returns an array of LigneDemaneStock objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LigneDemaneStock
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
