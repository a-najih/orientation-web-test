<?php

namespace App\Tests\Entity;

use App\Entity\Bill;
use PHPUnit\Framework\TestCase;

/**
 * Class BillTest
 * @package App\Tests\Entity
 */
class BillTest extends TestCase
{
    public function testGetPriceTtc()
    {
        $bill = new Bill();
        $bill->setPriceHt(30.50);

        // assert that the price TTC is correctly calculated!
        $this->assertEquals($bill->getPriceTtc() + Bill::TVA * $bill->getPriceTtc(), $bill->getPriceTtc());
    }
}
