<?php
/**
 * Created by PhpStorm.
 * User: gauthier
 * Date: 20/04/2016
 * Time: 10:58
 */

namespace Project\Gateway;


use Project\Entity\Invoice;

class AccountingGateway
{

    public function persist(Invoice $invoice)
    {
        echo __METHOD__;
    }

}