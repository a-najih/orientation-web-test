<?php

namespace App\DataFixtures;

use App\Entity\Bill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Class BillFixtures : Fixture pour alimenter les factures
 *
 * @package App\DataFixtures
 */
class BillFixtures extends Fixture
{
    const BILL_COUNT = 100;
    const BILL_DESIGNATION = 'Facture n° : %s';
    const BILL_DESCRIPTION = 'Description de la facture n° %s. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= self::BILL_COUNT; $i++) {
            $bill = new Bill();
            $bill->setDesignation(sprintf(self::BILL_DESIGNATION, $i));
            $bill->setDescription(sprintf(self::BILL_DESCRIPTION, $i));
            $bill->setPriceHt(rand(1, 1000000) / 10);

            $manager->persist($bill);
        }
        $manager->flush();
    }
}
