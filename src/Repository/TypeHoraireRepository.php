<?php

namespace App\Repository;

use App\Entity\TypeHoraire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeHoraire|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeHoraire|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeHoraire[]    findAll()
 * @method TypeHoraire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeHoraireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeHoraire::class);
    }

    // /**
    //  * @return TypeHoraire[] Returns an array of TypeHoraire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeHoraire
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
