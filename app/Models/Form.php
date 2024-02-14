<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Form extends Model
{
    use HasFactory;


    protected $fillable = [
        "name",
        "description"
    ];
    public function fields(): HasMany
    {
        return $this->hasMany(FormField::class);
    }
}
