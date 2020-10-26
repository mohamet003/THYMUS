<?php

namespace App\Repository;

use App\Entity\Patient;
use App\Entity\Search;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Patient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Patient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Patient[]    findAll()
 * @method Patient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Patient::class);
    }

    /**
     * @param Search $search
     * @return Patient[] Returns an array of Patient objects
     */
    public function SearchPatient(Search $search)
    {
        $query = $this->createQueryBuilder('p');

        if ($search->getNom()){
            $query->andWhere(' upper(p.nom) LIKE upper(:nom) ')
                ->setParameter('nom','%'.$search->getNom().'%');
        }
        if ($search->getPrenom()){
            $query->andWhere('upper(p.prenom) LIKE upper(:prenom)')
                ->setParameter('prenom','%'.$search->getPrenom().'%');
        }
        if ($search->getIpp()){
            $query->andWhere(' p.ipp = :ipp ')
                ->setParameter('ipp',$search->getIpp());
        }

        if ($search->getEpisode()){
            $query->andWhere(' p.episode = :episode ')
                ->setParameter('episode',$search->getEpisode());
        }

        if ($search->getReferent()){
            $query->andWhere(' p.chirurgien_referent = :spec ')
                ->setParameter('spec',$search->getReferent());
        }

        if ($search->getDateChirDeb()){
            $query->andWhere('p.chir_date_ope >= :dateStart')
                ->setParameter('dateStart', $search->getDateChirDeb());
        }

        if ($search->getDateChirFin()){
            $query->andWhere('p.chir_date_ope <= :dateend')
                ->setParameter('dateend', $search->getDateChirFin());
        }


        if ($search->getDateNaissance()){
            $query->andWhere('p.ddn = :ddn')
                ->setParameter('ddn',$search->getDateNaissance());
        }



        return $query->orderBy('p.prenom', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    // /**
    //  * @return Patient[] Returns an array of Patient objects
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
    public function findOneBySomeField($value): ?Patient
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * @param $value
     * @return Patient[] Returns an array of Patient objects
     */

    public function getlistOfPatient($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.id IN (:val)')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

}
