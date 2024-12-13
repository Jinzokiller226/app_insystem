<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Branch;

class Role extends Model
{
    //
 
    protected $fillable = [
        'role_name',
        'role_desc',
        'is_admin',
        'is_employee',
        'user_id',
        'branch_id',

    ];

  
    
    public function user()
    {
        return $this->hasMany(User::class,'id','user_id');

    }
    
    public function branch(): HasMany
    {
        return $this->hasMany(Branch::class,'id','branch_id');

    }

    
}
