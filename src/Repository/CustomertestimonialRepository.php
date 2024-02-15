<?php

namespace App\Repository;

use App\Entity\Customertestimonial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Customertestimonial>
 *
 * @method Customertestimonial|null find($id, $lockMode = null, $lockVersion = null)
 * @method Customertestimonial|null findOneBy(array $criteria, array $orderBy = null)
 * @method Customertestimonial[]    findAll()
 * @method Customertestimonial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomertestimonialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Customertestimonial::class);
    }

//    /**
//     * @return Customertestimonial[] Returns an array of Customertestimonial objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Customertestimonial
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
