<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adoptionAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'adoption_form_id',
        'adoption_question_id',
        'answer'
    ];

    
}
