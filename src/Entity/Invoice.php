<?php
/**
 * Created by PhpStorm.
 * User: williamjehanne
 * Date: 20/04/16
 * Time: 12:00
 */

namespace Project\Entity;

class Invoice {

    /**
     * @var array of InvoiceLine
     */
    protected $invoicesLines = [];

    protected $total;

    public function computeTotal()
    {
        foreach($this->getInvoicesLines() as $iL)
        {
            $this->setTotal($iL->computeTotal());
        }

        return $this->getTotal();
    }

    /**
     * @return array
     */
    public function getInvoicesLines()
    {
        return $this->invoicesLines;
    }

    /**
     * @param array $invoicesLines
     */
    public function setInvoicesLines($invoicesLines)
    {
        $this->invoicesLines = $invoicesLines;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total += $total;
    }
}