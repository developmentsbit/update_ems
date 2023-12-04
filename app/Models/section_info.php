<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class section_info extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'addsection';

    protected $guarded = [];
}
