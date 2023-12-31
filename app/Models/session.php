<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class session extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getActive()
    {
        $data = session::where('status',1)->get();
        return $data;
    }
}
