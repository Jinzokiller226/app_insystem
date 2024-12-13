<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
class ProductSettings extends Model
{
    protected $fillable = [
        'ps_name',
        'ps_dangerlevel',
        'ps_greenlevel',
        'user_id',
        

    ];
    public function users()
    {
        return $this->hasMany(User::class,'id','user_id');

    }
}
