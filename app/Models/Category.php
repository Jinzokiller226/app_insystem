<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Branch;
use App\Models\User;

class Category extends Model
{
    protected $fillable = [
        'category_name',
        'category_desc',
        'branch_id',
        'user_id',

    ];

    public function branch()
    {
        return $this->hasMany(Branch::class,'id','branch_id');

    }
    
    public function users()
    {
        return $this->hasMany(User::class,'id','user_id');

    }

}
