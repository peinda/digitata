<?php

namespace App\Repository;

use App\Entity\Politique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Politique|null find($id, $lockMode = null, $lockVersion = null)
 * @method Politique|null findOneBy(array $criteria, array $orderBy = null)
 * @method Politique[]    findAll()
 * @method Politique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PolitiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Politique::class);
    }

    // /**
    //  * @return Politique[] Returns an array of Politique objects
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
    public function findOneBySomeField($value): ?Politique
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
