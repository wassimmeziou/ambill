<?php

namespace App\Repository;

use App\Entity\Facture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Facture|null find($id, $lockMode = null, $lockVersion = null)
 * @method Facture|null findOneBy(array $criteria, array $orderBy = null)
 * @method Facture[]    findAll()
 * @method Facture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FactureRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Facture::class);
    }

    // /**
    //  * @return Facture[] Returns an array of Facture objects
    //  */
    public function findByExampleField($value)
    {
        // return $this->createQueryBuilder('f')
        //     ->andWhere('f.commercial.cin = :val')
        //     ->setParameter('val', $value)
        //   //  ->orderBy('f.id', 'ASC')
        //  //   ->setMaxResults(10)
        //     ->getQuery()
        //     ->getResult()
        // ;
        return $this->createQueryBuilder('p')
        // p.category refers to the "category" property on product
        ->innerJoin('p.commercial', 'c')
        // selects all the category data to avoid the query
        ->addSelect('c')
        ->andWhere('p.id = :id')
        ->setParameter('id', $value)
        ->getQuery()
        ->getOneOrNullResult();
    }
    

    /*
    public function findOneBySomeField($value): ?Facture
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
