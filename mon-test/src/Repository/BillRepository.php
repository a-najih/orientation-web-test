<?php

namespace App\Repository;

use App\Entity\Bill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\InvalidArgumentException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @method Bill|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bill|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bill[]    findAll()
 * @method Bill[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BillRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bill::class);
    }

    /**
     * Récupère une liste factures triés et paginés.
     *
     * @param int $page Le numéro de la page
     * @param int $nbMaxPerPage Nombre maximum de facture par page
     *
     * @return Paginator
     *
     * @throws NotFoundHttpException
     * @throws InvalidArgumentException
     */
    public function findAllPaginetedBills(int $page, int $nbMaxPerPage)
    {
        if (!is_numeric($page)) {
            throw new InvalidArgumentException(
                'La valeur de l\'argument $page est incorrecte (valeur : ' . $page . ').'
            );
        }

        if ($page < 1) {
            throw new NotFoundHttpException('La page demandée n\'existe pas');
        }

        if (!is_numeric($nbMaxPerPage)) {
            throw new InvalidArgumentException(
                'La valeur de l\'argument $nbMaxParPage est incorrecte (valeur : ' . $nbMaxPerPage . ').'
            );
        }

        $qb = $this->createQueryBuilder('b')
            ->orderBy('b.id', 'DESC');

        $query = $qb->getQuery();

        $firstResult = ($page - 1) * $nbMaxPerPage;
        $query->setFirstResult($firstResult)->setMaxResults($nbMaxPerPage);
        $paginator = new Paginator($query);

        if (($paginator->count() <= $firstResult) && $page != 1) {
            // page 404, sauf pour la première page
            throw new NotFoundHttpException('La page demandée n\'existe pas.');
        }

        return $paginator;
    }
}
