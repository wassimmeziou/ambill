<?php

namespace App\Repository;

use App\Entity\LigneInventaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LigneInventaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneInventaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneInventaire[]    findAll()
 * @method LigneInventaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneInventaireRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LigneInventaire::class);
    }

    // /**
    //  * @return LigneInventaire[] Returns an array of LigneInventaire objects
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
    public function findOneBySomeField($value): ?LigneInventaire
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
