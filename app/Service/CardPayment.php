<?php


namespace App\Service;


class CardPayment implements PaymentInterface
{

    private $maskedCard;

    private $bank;

    private $mtsObj;

    private $cardType;

    public function __construct($mtsObj)
    {
        $this->mtsObj = $mtsObj;
    }

    public function configure()
    {
        $this->bank = $this->mtsObj->bank;
        $this->maskedCard = $this->mtsObj->masked_card;
        $this->cardType = $this->mtsObj->card_type;
        return $this;
    }

    public function setOutput()
    {
        return '<span>
            Kartu Kredit <b>'.$this->maskedCard.'</b> <br>
            <span class="badge badge-light" >'.strtoupper($this->bank).' '.ucfirst($this->cardType).'</span>
        </span>';
    }
}
