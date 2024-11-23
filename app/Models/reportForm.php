<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reportForm extends Model
{
    use HasFactory;

    protected $fillable = [

        'status_id',
        'user_id',
        'animal_type',
        'location',
        'location_map',
        'photo',
        'description',
        'is_seen',
        'admin_feedback'
    ];

    protected $table = 'report_form';
    protected $primaryKey = 'report_form_id';
    public $timestamps = true;

    public function users(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function status(){

        return $this->belongsTo(status::class, 'status_id');
    }
}
