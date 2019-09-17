<?php


namespace App;


class ApplePay implements PaymentInterface
{

    public function purchase()
    {
       echo "apple pay";
    }
}
