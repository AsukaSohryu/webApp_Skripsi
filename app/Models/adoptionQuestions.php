<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adoptionQuestions extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [

        'questions',
        'is_active'
    ];

    protected $table = 'adoption_questions';
    protected $primaryKey = 'adoption_question_id';

    public function adoptionForm()
    {
        return $this->belongsToMany(adoptionForm::class, 'adoption_answers', 'adoption_questions_id', 'adoption_form_id')
                    ->withPivot('answer');
                    // ->withTimestamps();
    }
}
