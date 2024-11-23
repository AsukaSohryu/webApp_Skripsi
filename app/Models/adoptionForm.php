<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adoptionForm extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'animal_id',
        'status_id',
        'is_seen',
        'admin_feedback'
    ];

    protected $table = 'adoption_form';
    protected $primaryKey = 'adoption_form_id';
    public $timestamps = true;

    public function users()
    {

        return $this->belongsTo(User::class, 'user_id');
    }

    public function status()
    {

        return $this->belongsTo(status::class, 'status_id');
    }

    public function animal()
    {

        return $this->belongsTo(animal::class, 'animal_id');
    }

    public function adoptionQuestions()
    {
        return $this->belongsToMany(adoptionQuestions::class, 'adoption_answer', 'adoption_question_id', 'adoption_form_id')
            ->withPivot('answer')
            ->withTimestamps();
    }
}
