<?php

namespace App\Repository;

use App\Entity\LigneBonSortie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LigneBonSortie|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneBonSortie|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneBonSortie[]    findAll()
 * @method LigneBonSortie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneBonSortieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LigneBonSortie::class);
    }

    // /**
    //  * @return LigneBonSortie[] Returns an array of LigneBonSortie objects
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
    public function findOneBySomeField($value): ?LigneBonSortie
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
