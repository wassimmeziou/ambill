<?php

namespace App\Repository;

use App\Entity\StockVoitures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StockVoitures|null find($id, $lockMode = null, $lockVersion = null)
 * @method StockVoitures|null findOneBy(array $criteria, array $orderBy = null)
 * @method StockVoitures[]    findAll()
 * @method StockVoitures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StockVoituresRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StockVoitures::class);
    }

    // /**
    //  * @return StockVoitures[] Returns an array of StockVoitures objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StockVoitures
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
