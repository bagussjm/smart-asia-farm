<?php


namespace App\Service;


class VirtualAccountBank
{
    private $bank;

    private $vaNumber;

    public function __construct($bank,$vaNumber)
    {
        $this->bank = $bank;
        $this->vaNumber = $vaNumber;
    }

    public function getVaNumber()
    {
        return $this->vaNumber;
    }

    public function getBank()
    {
        return $this->bank;
    }
}
