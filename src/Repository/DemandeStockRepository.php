<?php

namespace App\Repository;

use App\Entity\DemandeStock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DemandeStock|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandeStock|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandeStock[]    findAll()
 * @method DemandeStock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeStockRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DemandeStock::class);
    }

    // /**
    //  * @return DemandeStock[] Returns an array of DemandeStock objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DemandeStock
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
