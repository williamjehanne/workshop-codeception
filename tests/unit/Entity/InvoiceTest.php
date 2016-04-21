<?php
/**
 * Created by PhpStorm.
 * User: williamjehanne
 * Date: 21/04/16
 * Time: 09:48
 */

namespace Test\Project\Entity;

use Codeception\TestCase\Test;
use Codeception\Util\Stub;
use Project\Entity\Invoice;
use Project\Exception;
use Project\Entity\InvoiceLine;


class InvoiceTest extends Test{

    public function testComputeTotal()
    {
        //PREPARE
        $invoice = new Invoice();
        $invoiceLines = [];
        //$invoiceLines[] = $this->generateInvoiceInlineMock(44);
        //$invoiceLines[] = $this->generateInvoiceInlineMock(11);

        $invoiceLines[] = Stub::make(InvoiceLine::class, ['computeTotal' => 44]);
        $invoiceLines[] = Stub::make(InvoiceLine::class, ['computeTotal' => Stub::exactly(2, function() {return 11; })]);

        $invoice->setInvoicesLines($invoiceLines);

        //RUN
        $total = $invoice->computeTotal();

        //ASSERT
        $this->assertEquals(55, $total);
    }

    public function testInvoiceLinesAccessors()
    {
        //PREPARE
        $invoice = new Invoice();
        $invoiceLines = [];
        $invoiceLines[] = $this->getMockBuilder(InvoiceLine::class)->disableOriginalConstructor()->getMock();
        $invoiceLines[] = $this->getMockBuilder(InvoiceLine::class)->disableOriginalConstructor()->getMock();
        $invoice->setInvoicesLines($invoiceLines);

        //ASSERT
        $this->assertAttributeEquals($invoiceLines, 'invoicesLines', $invoice);
        $this->assertEquals($invoiceLines, $invoice->getInvoicesLines());
    }

    protected function generateInvoiceInlineMock($total) {
        $invoiceLine = $this->getMockBuilder(InvoiceLine::class)
            ->disableOriginalConstructor()
            ->getMock();

        $invoiceLine->expects($this->once())->method('computeTotal')->willReturn($total);

        return $invoiceLine;
    }

}