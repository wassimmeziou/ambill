<?php

namespace App\Repository;

use App\Entity\EtatFacture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EtatFacture|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtatFacture|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtatFacture[]    findAll()
 * @method EtatFacture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtatFactureRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EtatFacture::class);
    }

    // /**
    //  * @return EtatFacture[] Returns an array of EtatFacture objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EtatFacture
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
