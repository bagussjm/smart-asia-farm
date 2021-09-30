<?php


namespace App\Service;


class EChannelPayment extends Payment implements PaymentInterface
{
    protected $mtsOrder;

    private $bankTransfer;

    public function __construct($mtsOrder)
    {
        $this->mtsOrder = $mtsOrder;
    }

    public function configure()
    {
        if (property_exists($this->mtsOrder,'bill_key')){
            $this->bankTransfer = new VirtualAccountBank('mandiri',$this->mtsOrder->bill_key);
            return $this;
        }

        return $this;
    }

    public function setOutput()
    {
        return '<span>
            <span class="badge badge-light">'.ucfirst($this->bankTransfer->getBank()).
            ' Bill</span> <b>'.$this->bankTransfer->getVaNumber().'</b>
        </span>';
    }
}
