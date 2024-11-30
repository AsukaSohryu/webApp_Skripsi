<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class handoverQuestions extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [

        'questions',
        'is_active'
    ];

    protected $table = 'handover_questions';
    protected $primaryKey = 'handover_questions_id';

    public function handoverForm()
    {
        return $this->belongsToMany(handoverForm::class, 'handover_answers', 'handover_questions_id', 'handover_form_id')
                    ->withPivot('answer');
                    // ->withTimestamps();
    }
}
