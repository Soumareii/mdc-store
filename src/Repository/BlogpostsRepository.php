<?php

namespace App\Repository;

use App\Entity\Blogposts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Blogposts|null find($id, $lockMode = null, $lockVersion = null)
 * @method Blogposts|null findOneBy(array $criteria, array $orderBy = null)
 * @method Blogposts[]    findAll()
 * @method Blogposts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlogpostsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Blogposts::class);
    }

    /**
     * @return Blogposts[] Returns an array of Blogposts objects
     */
    public function lastPost() 
    {
        return $this->createQueryBuilder('d')
        ->orderBy('d.id', 'DESC')
        ->setMaxResults(3)
        ->getQuery()
        ->getResult()
    ;
    }

    // /**
    //  * @return Blogposts[] Returns an array of Blogposts objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Blogposts
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
