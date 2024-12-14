<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oculussinister extends Model
{
    protected $fillable = [
        'os_sphere',
        'os_cylinder',
        'os_axis',
        'os_add',
        'os_va',
        'pos_id',
    ];
}
