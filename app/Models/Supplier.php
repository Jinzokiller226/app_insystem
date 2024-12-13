<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;
use App\Models\User;

class Supplier extends Model
{
    protected $fillable = [
        'supplier_name',
        'supplier_desc',
        'supplier_contact_person',
        'supplier_contact_number',
        'branch_id',
        'user_id',

    ];

    public function branches()
    {
        return $this->hasMany(Branch::class,'id','branch_id');

    }
    public function users()
    {
        return $this->hasMany(User::class,'id','user_id');

    }


}
