<?php


namespace App\Service;


class StorePayment implements PaymentInterface
{

    private $store;

    private $paymentCode;

    private $mtsOrder;

    public function __construct($mtsOrder)
    {
        $this->mtsOrder = $mtsOrder;
    }

    public function configure()
    {
        $this->store = $this->mtsOrder->store;
        $this->paymentCode = $this->mtsOrder->payment_code;
        return $this;
    }

    public function setOutput()
    {
        return '<span>
            <span class="badge badge-light">'.ucfirst($this->store).' cstore</span> <b>'.$this->paymentCode.'</b>
        </span>';
    }
}
