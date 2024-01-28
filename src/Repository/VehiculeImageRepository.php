<?php

namespace App\Repository;

use App\Entity\VehiculeImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VehiculeImage>
 *
 * @method VehiculeImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method VehiculeImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method VehiculeImage[]    findAll()
 * @method VehiculeImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehiculeImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VehiculeImage::class);
    }

//    /**
//     * @return VehiculeImage[] Returns an array of VehiculeImage objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VehiculeImage
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
