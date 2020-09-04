<?php

namespace App\Repository;

use App\Entity\Horaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Horaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Horaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Horaire[]    findAll()
 * @method Horaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HoraireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Horaire::class);
    }

    // /**
    //  * @return Horaire[] Returns an array of Horaire objects
    //  */
    public function findByName($nom)
    {
        return $this->createQueryBuilder('horaire')
            ->andWhere('horaire.nom LIKE :nom')
            ->setParameter('nom', '%'.$nom.'%')
            ->orderBy('horaire.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Horaire
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
