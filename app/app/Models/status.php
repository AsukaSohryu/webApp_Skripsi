<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;

    protected $fillable = [

        'config',
        'key',
        'status',
    ];

    protected $table = 'status_configuration';
    protected $primaryKey = 'status_id';
    public $timestamps = true;
}
