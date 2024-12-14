<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorInfo extends Model
{
    protected $fillable = [
        'doctor_fname',
        'doctor_mname',
        'doctor_lname',
        'branch_id',
        'user_id',
        

    ];
}
