<?php
/**
 * Created by PhpStorm.
 * User: gauthier
 * Date: 20/04/2016
 * Time: 10:57
 */

namespace Project\Entity;
use Project\Exception;


class InvoiceLine
{

    protected $quantite;
    protected $unitPrice;
    protected $tauxVAT;

    function __construct($quantity, $unitPrice, $tauxVAT)
    {
        $this->quantite     = $quantity;
        $this->unitPrice    = $unitPrice;
        $this->tauxVAT      = $tauxVAT;
    }

    public function computeTotal()
    {
        if($this->getQuantite()<0) throw new Exception("Cannot compute total for an invoice line with quantity negative");
        if($this->getUnitPrice()<0) throw new Exception("Cannot with unitPrixe negative");
        if($this->getTauxVAT()<0) throw new Exception("Cannot with VAT negative");

        return $this->getQuantite()*$this->getUnitPrice() * (1 + ($this->getTauxVAT() /100));
    }

    /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param mixed $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    /**
     * @return mixed
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param mixed $unitPrice
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return mixed
     */
    public function getTauxVAT()
    {
        return $this->tauxVAT;
    }

    /**
     * @param mixed $tauxVAT
     */
    public function setTauxVAT($tauxVAT)
    {
        $this->tauxVAT = $tauxVAT;
    }
}