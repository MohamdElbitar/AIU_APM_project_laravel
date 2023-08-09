<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class CourseEffort extends Model
{
    use HasFactory;
    protected $fillable = [
        'semester',
        'year',
        'c_code'


    ];
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class,'c_code');
    }

    public function coutcome()
    {
        return $this->belongsToMany(Outcome::class,"outcome_efforts","ce_code","oid");
    }
}
