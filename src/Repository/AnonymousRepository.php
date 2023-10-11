<?php

namespace App\Repository;

use App\Entity\Anonymous;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Anonymous>
 *
 * @method Anonymous|null find($id, $lockMode = null, $lockVersion = null)
 * @method Anonymous|null findOneBy(array $criteria, array $orderBy = null)
 * @method Anonymous[]    findAll()
 * @method Anonymous[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnonymousRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Anonymous::class);
    }

//    /**
//     * @return Anonymous[] Returns an array of Anonymous objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Anonymous
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
