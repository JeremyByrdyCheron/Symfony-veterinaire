<?php

namespace App\Repository;

use App\Entity\Appointment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Appointment>
 */
class AppointmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Appointment::class);
    }

    // Exemples de méthodes personnalisées à adapter si besoin

    //    /**
//     * @return Appointment[] Returns an array of Appointment objects
//     */
//    public function findByStatus($status): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.status = :status')
//            ->setParameter('status', $status)
//            ->orderBy('a.wantedDate', 'ASC')
//            ->getQuery()
//            ->getResult();
//    }

    //    /**
//     * @return Appointment|null
//     */
//    public function findOneByEmail(string $email): ?Appointment
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.email = :email')
//            ->setParameter('email', $email)
//            ->getQuery()
//            ->getOneOrNullResult();
//    }
}