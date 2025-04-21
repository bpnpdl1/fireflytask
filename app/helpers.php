<?php

function nepali_money_format($number)
{
    $number = (float) $number;
    $decimal = substr(number_format($number, 2, '.', ''), -3); // get .00
    $number = floor($number); // remove decimals for now

    $numberStr = '';
    $number = (string) $number;

    if (strlen($number) > 3) {
        $last3 = substr($number, -3);
        $restUnits = substr($number, 0, -3);
        $restUnits = preg_replace("/\B(?=(\d{2})+(?!\d))/", ',', $restUnits);
        $numberStr = $restUnits.','.$last3;
    } else {
        $numberStr = $number;
    }

    return $numberStr.$decimal;
}
