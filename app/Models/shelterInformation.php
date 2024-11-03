<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shelterInformation extends Model
{
    use HasFactory;

    protected $fillable = [

        'shelter_name',
        'shelter_logo',
        'address',
        'email',
        'operational_hour',
        'whatsapp_number',
        'phone_number',
        'instagram',
        'facebook',
        'twitter',
        'youtube',
        'donation_information',
        'shelter_photo',
        'about_shelter',
        'vision',
        'mission',
        'founder_photo',
        'additional_information',
        'is_accepting_report',
        'is_accepting_handover',
        'is_accepting_adoption',
        'report_information',
        'handover_information',
        'adoption_information',
    ];

    protected $table = 'shelter_information';
    protected $primaryKey = 'shelter_id';
    public $timestamps = true;
}
