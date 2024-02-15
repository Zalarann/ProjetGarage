<?php

namespace App\Repository;

use App\Entity\Usedauto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Usedauto>
 *
 * @method Usedauto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usedauto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usedauto[]    findAll()
 * @method Usedauto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsedautoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Usedauto::class);
    }

//    /**
//     * @return Usedauto[] Returns an array of Usedauto objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Usedauto
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
