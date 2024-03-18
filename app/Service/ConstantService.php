<?php


namespace App\Service;

use Illuminate\Support\Facades\Date;

class ConstantService{

    public static function CurrentYearToPreviousYear($decrement = 5)
    {
        $data = [];
        $year = Date("Y");
        for($i=0;$i<$decrement;$i++){
            $data[] = $year-$i;
        }

        return $data;
    }
}
