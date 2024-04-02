<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('uang')) {
    function uang($uang)
    {
        $hasil = "Rp " . number_format($uang, 0, ',', '.');
        return $hasil;
    }
}
