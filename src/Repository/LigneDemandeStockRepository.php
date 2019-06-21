<?php

namespace App\Repository;

use App\Entity\LigneDemandeStock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LigneDemandeStock|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneDemandeStock|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneDemandeStock[]    findAll()
 * @method LigneDemandeStock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneDemandeStockRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LigneDemandeStock::class);
    }

    // /**
    //  * @return LigneDemandeStock[] Returns an array of LigneDemandeStock objects
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
    public function findOneBySomeField($value): ?LigneDemandeStock
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
