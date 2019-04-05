<?php

namespace Clunch\EventBundle\Repository;

/**
 * EventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EventRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Query To get Event By Current User Company
     *
     * @param $company
     * @return array
     * @throws \Exception
     */
    public function findByUserCompany($company)
    {
        $current_date = New \DateTime();

        $query = $this->createQueryBuilder('p')
            ->where('p.date >= :current_date')
            ->leftJoin('p.user', 'u')
            ->andWhere('u.company IS NOT NULL')
            ->andWhere('u.company = :company')
            ->setParameter('current_date', $current_date)
            ->setParameter('company', $company);

        return $query->getQuery()->getResult();
    }

    /**
     * Query To get Event Related to the Current User
     *
     * @param $user
     * @return array
     * @throws \Exception
     */
    public function findByRelatedUser($user)
    {
        $current_date = New \DateTime();

        $query = $this->createQueryBuilder('p')
            ->leftJoin('p.participants', 'u')
            ->where('p.user = :user')
            ->orWhere(':user MEMBER OF p.participants')
            ->andWhere('p.date >= :current_date')
            ->setParameter('current_date', $current_date)
            ->setParameter('user', $user);

        return $query->getQuery()->getResult();
    }

    /**
     * Query To get Event By Current User Company And Date
     *
     * @param $company
     * @return array
     * @throws \Exception
     */
    public function findByUserCompanyAndDate($company, $date)
    {
        $query = $this->createQueryBuilder('p')
            ->where('p.date = :current_date')
            ->leftJoin('p.user', 'u')
            ->andWhere('u.company IS NOT NULL')
            ->andWhere('u.company = :company')
            ->setParameter('current_date', $date)
            ->setParameter('company', $company);

        return $query->getQuery()->getResult();
    }
}


