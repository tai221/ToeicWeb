<?php


namespace App;


class CreaditCard implements PaymentInterface
{
    public function purchase()
    {
        echo 'Creadi card';
    }
}
