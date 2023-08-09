<?php

namespace App\Models;
use App\Models\Program;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Category extends Model
{
    use HasFactory;


    protected $fillable = [
        'cat_name'

    ];

    public function programs(): HasMany
    {
        return $this->hasMany(Program::class);
    }

    public function outcomes(): HasMany
    {
        return $this->hasMany(Outcome::class);
    }
}
