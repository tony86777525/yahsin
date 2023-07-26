<?php

namespace App\Services;

class OrderService
{
    public static function getNewNumber()
    {
        $serialNumber = rand(1, 999);
        $serialNumber = str_pad($serialNumber,3,'0',STR_PAD_LEFT);

        return date('YmdHis') . $serialNumber;
    }
}
