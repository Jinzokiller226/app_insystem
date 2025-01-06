<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oculusdexter extends Model
{
    protected $fillable = [
        'od_sphere',
        'od_cylinder',
        'od_axis',
        'od_add',
        'od_va',
        'patient_id',
    ];
}
