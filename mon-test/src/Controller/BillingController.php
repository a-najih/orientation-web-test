<?php

namespace App\Controller;

use App\Entity\Bill;
use App\Service\BillingService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BillingController : Controlleur pour gérer les factures
 *
 * @package App\Controller
 */
class BillingController extends AbstractController
{
    /**
     * @var BillingService
     */
    private $billingService;

    /**
     * BillingController constructor.
     *
     * @param BillingService $billingService
     */
    public function __construct(
        BillingService $billingService
    )
    {
        $this->billingService = $billingService;
    }
    /**
     * @Route("/billing/{page}", defaults={"page": 1}, requirements={"page" = "\d+"}, name="app_billing_list")
     *
     * @param int $page
     * @return Response
     */
    public function index(int $page)
    {
        $nbBillsPerPage = $this->getParameter('front_nb_bills_per_page');

        $bills = $this->billingService->getPaginatedBills($page, $nbBillsPerPage);

        $pagination = array(
            'page' => $page,
            'nbPages' => ceil(count($bills) / $nbBillsPerPage),
        );

        return $this->render('billing/index.html.twig', [
            'page' => $page,
            'pagination' => $pagination,
            'bills' => $bills,
            'tva' => Bill::TVA * 100,
        ]);
    }
}
