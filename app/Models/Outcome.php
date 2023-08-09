<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Outcome extends Model
{
    use HasFactory;
    protected $fillable = [
        'abet_code',
        'description',
        'cat_Id'

    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'cat_Id');
    }

    public function oeffort()
    {
        return $this->belongsToMany(CourseEffort::class ,"outcome_efforts","oid","ce_code");
    }
}
