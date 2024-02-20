<?php

if (! function_exists('moneyFormat')) {    
    /**
     * moneyFormat
     *
     * @param  mixed $str
     * @return void
     */
    function moneyFormat($str) {
        $fmt = new NumberFormatter('id_ID', NumberFormatter::CURRENCY);
        return $fmt->formatCurrency($str, "IDR");
    }    
}