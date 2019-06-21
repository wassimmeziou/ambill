<?php

namespace App\Repository;

use App\Entity\LigneReglement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LigneReglement|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneReglement|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneReglement[]    findAll()
 * @method LigneReglement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneReglementRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LigneReglement::class);
    }

    // /**
    //  * @return LigneReglement[] Returns an array of LigneReglement objects
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
    public function findOneBySomeField($value): ?LigneReglement
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
