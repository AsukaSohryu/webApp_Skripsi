<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class handoverForm extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'status_id',
        'photo',
        'is_seen',
        'admin_feedback'
    ];

    protected $table = 'handover_form';
    protected $primaryKey = 'handover_form_id';
    public $timestamps = true;

    public function users(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function status(){

        return $this->belongsTo(status::class, 'status_id');
    }

    public function handoverQuestions()
    {
        return $this->belongsToMany(handoverQuestions::class, 'handover_answers', 'handover_questions_id', 'handover_form_id')
                    ->withPivot('answer')
                    ->withTimestamps();
    }
}
