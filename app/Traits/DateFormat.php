<?php
namespace App\Traits;

trait DateFormat
{
    public static function DateToDb($sign, $data)
    {
        $explode = explode($sign,$data);
        $date = $explode[2].'-'.$explode[1].'-'.$explode[0];
        return $date;
    }
}
