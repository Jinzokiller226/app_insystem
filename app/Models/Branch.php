<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Branch extends Model
{
    protected $fillable = [
        'branch_name',
        'branch_desc',
        'user_id',
        

    ];
    public function mount(){
        $this->branches = Branch::all();
    }
    public function user(): HasMany
    {
        return $this->hasMany(User::class,'id','user_id');

    }
}
