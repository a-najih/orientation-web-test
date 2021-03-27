<?php

namespace App\Service;

use App\Entity\Bill;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * Class BillingService :  Service de gestion des factures
 * @package App\Service
 */
class BillingService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * BillingService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Récupère une liste factures triés et paginés.
     *
     * @param int $page
     * @param int $nbBillsPerPage
     * @return Paginator
     */
    public function getPaginatedBills(int $page, int $nbBillsPerPage): Paginator
    {
        return $this->em->getRepository(Bill::class)->findAllPaginetedBills($page, $nbBillsPerPage);
    }
}
