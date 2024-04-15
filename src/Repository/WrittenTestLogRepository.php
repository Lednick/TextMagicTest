<?php

namespace App\Repository;

use App\Entity\WrittenTestLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WrittenTestLog>
 *
 * @method WrittenTestLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method WrittenTestLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method WrittenTestLog[]    findAll()
 * @method WrittenTestLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WrittenTestLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WrittenTestLog::class);
    }

    //    /**
    //     * @return WrittenTestLog[] Returns an array of WrittenTestLog objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('w')
    //            ->andWhere('w.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('w.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?WrittenTestLog
    //    {
    //        return $this->createQueryBuilder('w')
    //            ->andWhere('w.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
