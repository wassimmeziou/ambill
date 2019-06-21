<?php

namespace App\Repository;

use App\Entity\PieceReglement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PieceReglement|null find($id, $lockMode = null, $lockVersion = null)
 * @method PieceReglement|null findOneBy(array $criteria, array $orderBy = null)
 * @method PieceReglement[]    findAll()
 * @method PieceReglement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PieceReglementRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PieceReglement::class);
    }

    // /**
    //  * @return PieceReglement[] Returns an array of PieceReglement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PieceReglement
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
