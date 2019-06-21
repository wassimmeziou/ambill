<?php

namespace App\Repository;

use App\Entity\LigneFacture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LigneFacture|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneFacture|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneFacture[]    findAll()
 * @method LigneFacture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneFactureRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LigneFacture::class);
    }

    // /**
    //  * @return LigneFacture[] Returns an array of LigneFacture objects
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
    public function findOneBySomeField($value): ?LigneFacture
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
