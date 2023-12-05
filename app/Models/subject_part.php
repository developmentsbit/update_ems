<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class subject_part extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public static function makeInactive($id)
    {
        subject_part::find($id)->update([
            'status' => 0,
        ]);
        return;
    }
    public static function makeActive($id)
    {
        subject_part::find($id)->update([
            'status' => 1,
        ]);
        return;
    }
}
