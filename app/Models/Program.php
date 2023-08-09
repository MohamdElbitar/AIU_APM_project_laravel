<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;


class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'pname',
        'cat_Id'


    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'cat_Id');
    }

    public function pcourse()
    {
        return $this->belongsToMany(Course::class ,"program_courses","pid","c_code");
    }
}
