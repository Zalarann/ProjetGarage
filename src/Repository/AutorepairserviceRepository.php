<?php

namespace App\Repository;

use App\Entity\Autorepairservice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Autorepairservice>
 *
 * @method Autorepairservice|null find($id, $lockMode = null, $lockVersion = null)
 * @method Autorepairservice|null findOneBy(array $criteria, array $orderBy = null)
 * @method Autorepairservice[]    findAll()
 * @method Autorepairservice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutorepairserviceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Autorepairservice::class);
    }

//    /**
//     * @return Autorepairservice[] Returns an array of Autorepairservice objects
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

//    public function findOneBySomeField($value): ?Autorepairservice
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
