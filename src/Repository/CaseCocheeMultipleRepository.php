<?php

namespace App\Repository;

use App\Entity\CaseCocheeMultiple;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CaseCocheeMultiple|null find($id, $lockMode = null, $lockVersion = null)
 * @method CaseCocheeMultiple|null findOneBy(array $criteria, array $orderBy = null)
 * @method CaseCocheeMultiple[]    findAll()
 * @method CaseCocheeMultiple[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CaseCocheeMultipleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CaseCocheeMultiple::class);
    }

    // /**
    //  * @return CaseCocheeMultiple[] Returns an array of CaseCocheeMultiple objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CaseCocheeMultiple
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
