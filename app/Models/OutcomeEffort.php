<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutcomeEffort extends Model
{
    use HasFactory;
    protected $fillable = [
        'oid',
        'ce_code',
        'pname',
        'semester',
        'year',
        'c_code',
        'abet_code',
        'p_num',
        'avg_num'



    ];

}
