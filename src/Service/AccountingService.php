<?php
/**
 * Created by PhpStorm.
 * User: gauthier
 * Date: 20/04/2016
 * Time: 10:58
 */

namespace Project\Service;


use Project\Entity\Invoice;
use Project\Gateway\AccountingGateway;

class AccountingService
{

    /**
     * @var AccountingGateway
     */
    protected $accountingGateway;
    
    public function save(Invoice $invoice)
    {
        // sanity check
        $this->getAccountingGateway()->persist($invoice);
    }

    /**
     * @return AccountingGateway
     */
    public function getAccountingGateway()
    {
        return $this->accountingGateway;
    }

    /**
     * @param AccountingGateway $accountingGateway
     */
    public function setAccountingGateway($accountingGateway)
    {
        $this->accountingGateway = $accountingGateway;
    }

}