<?php


namespace App\Repositories;

use Midtrans\Config;
use Midtrans\Transaction;


class MidtransRepository
{

    private $order;

    public function __construct()
    {
        Config::$serverKey = env('MTS_SERVER_KEY');
        Config::$clientKey = env('MTS_CLIENT_KEY');
        Config::$isProduction = env('MTS_PRODUCTION');
        Config::$isSanitized = env('MTS_IS_SANITIZED');
        Config::$is3ds = env('MTS_IS_3DS');
    }

    public function orderStatus($orderId)
    {
        try{
            $this->order = Transaction::status($orderId);
        }catch (\Exception $exception){
            $this->order = [];
        }
        return $this;
    }

    public function getOrder()
    {
        return $this->order;
    }


}
