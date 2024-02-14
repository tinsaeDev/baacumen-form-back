<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{


    protected $fillable = [


        'type',
        'title',

        "options",
        // Validation
        'min',
        'max',
        'regex',
        'required'


    ];

    protected $appends = [
        "validation"
    ];

    protected $casts = [
        "required_field" => "boolean",
        "options" => "array"
    ];

    use HasFactory;


    protected function getValidationAttribute()
    {
        return [
            "required_field" => $this->required,
            "min" => $this->min,
            "max" => $this->max,
            "regex" => $this->regex,
        ];
    }
}
