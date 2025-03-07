<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class animal extends Model
{
    use HasFactory;

    protected $fillable = [

        'status_id',
        'animal_name',
        'animal_type',
        'birth_date',
        'detail_status',
        'sex',
        'race',
        'color',
        'weight',
        'vaccine',
        'is_sterile',
        'is_active',
        'source',
        'characteristics',
        'description',
        'medical_note',
        'photo',
    ];

    protected $table = 'animal';
    protected $primaryKey = 'animal_id';
    public $timestamps = true;

    public function status()
    {

        return $this->belongsTo(status::class, 'status_id');
    }

    public function getStatusNameAttribute()
    {
        return $this->status->status ?? 'Unknown';
    }
}
