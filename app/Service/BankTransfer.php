<?php


namespace App\Service;


class BankTransfer extends Payment implements PaymentInterface
{
    protected $mtsOrder;

    private $bankTransfer;

    public function __construct($mtsOrder)
    {
        $this->mtsOrder = $mtsOrder;

    }

    public function configure()
    {
       if (property_exists($this->mtsOrder,'permata_va_number')){
           $this->bankTransfer = new VirtualAccountBank('permata',$this->mtsOrder->permata_va_number);
           return $this;
       }else{
           $this->bankTransfer = new VirtualAccountBank(
               $this->mtsOrder->va_numbers[0]->bank,
               $this->mtsOrder->va_numbers[0]->va_number
           );
           return $this;
       }
    }

    public function setOutput()
    {
        return '<span>
            <span class="badge badge-light">'.strtoupper($this->bankTransfer->getBank()).
            ' Virtual Account </span> <b>'.$this->bankTransfer->getVaNumber().'</b>
        </span>';
    }
}
