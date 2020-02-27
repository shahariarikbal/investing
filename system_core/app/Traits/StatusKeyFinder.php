<?php

namespace App\Traits;

trait StatusKeyFinder
{
    public static function status($status)
    {
        //dd($status);
        if ($key = array_search($status, self::$status)) {
            return $key;
        }
        throw new \Exception('Your given status is\'t in the array.');
    }
}