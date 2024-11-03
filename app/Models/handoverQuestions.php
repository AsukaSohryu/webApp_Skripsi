<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class handoverQuestions extends Model
{
    use HasFactory;

    protected $fillable = [

        'questions',
        'is_active'
    ];

    protected $table = 'handover_questions';
    protected $primaryKey = 'handover_questions_id';
    public $timestamps = true;

    public function handoverForm()
    {
        return $this->belongsToMany(handoverForm::class, 'handover_answers', 'handover_questions_id', 'handover_form_id', )
                    ->withPivot('answer')
                    ->withTimestamps();
    }
}
