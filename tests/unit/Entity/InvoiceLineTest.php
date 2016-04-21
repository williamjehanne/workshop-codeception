<?php
/**
 * Created by PhpStorm.
 * User: williamjehanne
 * Date: 20/04/16
 * Time: 15:47
 */

namespace Test\Project\Entity;

use Codeception\TestCase\Test;
use Project\Entity\InvoiceLine;
use Project\Exception;


class InvoiceLineTest extends Test
{
    public function testComputeTotal()
    {
        //PREPARE
        $invoiceLine = new InvoiceLine(2, 34, 20);

        //RUN
        $total = $invoiceLine->computeTotal();

        //ASSERT
        $this->assertEquals(81.60, $total);

    }

    /**
     * @dataProvider getDataForTestComputeTotal
     * @throws Exception
     */
    public function testComputeTotalFailsWithNegativeValues($q, $uP, $VAT, $expected)
    {
        //PREPARE
        $invoiceLine = new InvoiceLine($q, $uP, $VAT);

        //ASSERT
        if($expected === null) {
            $this->setExpectedException(Exception::class);
        }

        //RUN
        $total = $invoiceLine->computeTotal();

        if(!is_null($expected))
        {
            $this->assertEquals($expected, $total);
        }
    }

    public function getDataForTestComputeTotal()
    {
        return [
          [2, 34, 20, 81.6],
          [2, 34, 0, 68],
          [-1, 23, 0, null],
          [-1, -23, 0, null],
          [-1, -23, -10, null],
          [-1, -23, 0, null]
        ];
    }
}
