<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosLog extends Model
{
    protected $fillable = [
        'pos_typeOfPurchase',
        'pos_pd',
        'Note',
        'pos_addamount',
        'pos_deposit',
        'pos_balance',
        'pos_status',
        'doctor_id',
        'ocusin_id',
        'ocudex_id',
        'lens_product_id',
        'frame_product_id',
        'patient_id',
        'branch_id',
        'user_id',

    ];
}
