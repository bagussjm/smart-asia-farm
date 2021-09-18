<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans;

class PaymentCheckoutController extends Controller
{


    public function pay()
    {
       return view('backend.payment.index');
    }

    public function process()
    {
        Midtrans\Config::$serverKey = 'SB-Mid-server-Vucxcv6_ySUi_dC1Eue9h2Dq';
        Midtrans\Config::$clientKey = 'SB-Mid-client-08UP2Fy1QBzxofOH';

        Midtrans\Config::$isSanitized = Midtrans\Config::$is3ds = true;

        // Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => 94000, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => 'a1',
            'price' => 18000,
            'quantity' => 3,
            'name' => "Apple"
        );

        // Optional
        $item2_details = array(
            'id' => 'a2',
            'price' => 20000,
            'quantity' => 2,
            'name' => "Orange"
        );

        // Optional
        $item_details = array ($item1_details, $item2_details);

        // Optional
        $billing_address = array(
            'first_name'    => "Andri",
            'last_name'     => "Litani",
            'address'       => "Mangga 20",
            'city'          => "Jakarta",
            'postal_code'   => "16602",
            'phone'         => "081122334455",
            'country_code'  => 'IDN'
        );

        // Optional
        $shipping_address = array(
            'first_name'    => "Obet",
            'last_name'     => "Supriadi",
            'address'       => "Manggis 90",
            'city'          => "Jakarta",
            'postal_code'   => "16601",
            'phone'         => "08113366345",
            'country_code'  => 'IDN'
        );

        // Optional
        $customer_details = array(
            'first_name'    => "Andri",
            'last_name'     => "Litani",
            'email'         => "andri@litani.com",
            'phone'         => "081122334455",
            'billing_address'  => $billing_address,
            'shipping_address' => $shipping_address
        );

        // Optional, remove this to display all available payment methods
        $enable_payments = array('credit_card','cimb_clicks','mandiri_clickpay','echannel');

        // Fill transaction details
        $transaction = array(
            'enabled_payments' => $enable_payments,
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        );

        $snap_token = '';
        try {
            $snap_token = Midtrans\Snap::getSnapToken($transaction);
        }
        catch (\Exception $e) {
            dd($e->getMessage());
        }

        $data['snapToken']= $snap_token;

        return view('backend.payment.pay',$data);

    }

    function printExampleWarningMessage() {
        if (strpos(Midtrans\Config::$serverKey, 'your ') != false ) {
            echo "<code>";
            echo "<h4>Please set your server key from sandbox</h4>";
            echo "In file: " . __FILE__;
            echo "<br>";
            echo "<br>";
            echo htmlspecialchars('Midtrans\Config::$serverKey = \'SB-Mid-server-Vucxcv6_ySUi_dC1Eue9h2Dq\';');
            die();
        }
    }

}
