<?php
/**
 * Created by PhpStorm.
 * User: gauthier
 * Date: 20/04/2016
 * Time: 10:59
 */

namespace Project\Controller;


use Project\Entity\Invoice;
use Project\Gateway\AccountingGateway;
use Project\Service\AccountingService;

class OrderController
{
    /**
     * @var AccountingService
     */
    protected $accountingService;

    public function checkoutAction()
    {
        // Handle invoicing
        $invoice = new Invoice();

        $this->getAccountingService()->save($invoice);
    }

    /**
     * @return AccountingService
     */
    public function getAccountingService()
    {
        return $this->accountingService;
    }

    /**
     * @param AccountingService $accountingService
     * @return OrderController
     */
    public function setAccountingService(AccountingService $accountingService)
    {
        $this->accountingService = $accountingService;
        return $this;
    }


}