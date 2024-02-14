<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RunningForm extends Model
{



    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }


    use HasFactory;
}
