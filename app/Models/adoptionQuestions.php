<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adoptionQuestions extends Model
{
    use HasFactory;

    protected $fillable = [

        'questions',
        'is_active'
    ];

    protected $table = 'adoption_questions';
    protected $primaryKey = 'adoption_questions_id';
    public $timestamps = true;

    public function adoptionForm()
    {
        return $this->belongsToMany(adoptionForm::class, 'adoption_answer', 'adoption_form_id', 'adoption_question_id' )
                    ->withPivot('answer')
                    ->withTimestamps();
    }
}
