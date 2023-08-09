<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Course extends Model
{
    use HasFactory;
    protected $primaryKey = 'code';
    protected $keyType = 'string';
        protected $fillable = [
        'cname',
        'code'
    ];
    public function cefforts(): HasMany
    {
        return $this->hasMany(CourseEffort::class,'c_code');
    }
    public function cprogram()
    {
        return $this->belongsToMany(Program::class ,"program_courses","c_code","pid");
    }
}
