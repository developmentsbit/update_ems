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

    public static function DbtoDate($sign, $data)
    {
        $explode = explode($sign,$data);
        $date = $explode[2].'/'.$explode[1].'/'.$explode[0];
        return $date;
    }

    public static function getMonth($data)
    {
        if($data == 1)
        {
            $month = 'January';
        }
        elseif($data == 2)
        {
            $month = 'February';
        }
        elseif($data == 3)
        {
            $month = 'March';
        }
        elseif($data == 4)
        {
            $month = 'April';
        }
        elseif($data == 5)
        {
            $month = 'May';
        }
        elseif($data == 6)
        {
            $month = 'June';
        }
        elseif($data == 7)
        {
            $month = 'July';
        }
        elseif($data == 8)
        {
            $month = 'August';
        }
        elseif($data == 9)
        {
            $month = 'September';
        }
        elseif($data == 10)
        {
            $month = 'October';
        }
        elseif($data == 11)
        {
            $month = 'November';
        }
        elseif($data == 12)
        {
            $month = 'December';
        }

        return $month;
    }

    public static function DbToMonthDate($sign, $data)
    {
        $explode = explode($sign,$data);
        if($explode[1] == 1)
        {
            $month = 'January';
        }
        elseif($explode[1] == 2)
        {
            $month = 'February';
        }
        elseif($explode[1] == 3)
        {
            $month = 'March';
        }
        elseif($explode[1] == 4)
        {
            $month = 'April';
        }
        elseif($explode[1] == 5)
        {
            $month = 'May';
        }
        elseif($explode[1] == 6)
        {
            $month = 'June';
        }
        elseif($explode[1] == 7)
        {
            $month = 'July';
        }
        elseif($explode[1] == 8)
        {
            $month = 'August';
        }
        elseif($explode[1] == 9)
        {
            $month = 'September';
        }
        elseif($explode[1] == 10)
        {
            $month = 'October';
        }
        elseif($explode[1] == 11)
        {
            $month = 'November';
        }
        elseif($explode[1] == 12)
        {
            $month = 'December';
        }
        // $date = $explode[2].''.$month.' '.$explode[0];
        $date = $month.' '. $explode[2]. ', '.$explode[0];
        return $date;
    }
}
