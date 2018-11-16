<?php

namespace App\Repository;

use App\Entity\Stylist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Stylist|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stylist|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stylist[]    findAll()
 * @method Stylist[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StylistRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Stylist::class);
    }

    // /**
    //  * @return Stylist[] Returns an array of Stylist objects
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
    public function findOneBySomeField($value): ?Stylist
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
