<?php

namespace App\Repository;

use App\Entity\SuperHero;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SuperHero|null find($id, $lockMode = null, $lockVersion = null)
 * @method SuperHero|null findOneBy(array $criteria, array $orderBy = null)
 * @method SuperHero[]    findAll()
 * @method SuperHero[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuperHeroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SuperHero::class);
    }

    // /**
    //  * @return SuperHero[] Returns an array of SuperHero objects
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
    public function findOneBySomeField($value): ?SuperHero
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
