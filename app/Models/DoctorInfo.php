<?php

namespace App\Models;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class DoctorInfo extends Model
{
    protected $fillable = [
        'doctor_fname',
        'doctor_mname',
        'doctor_lname',
        'branch_id',
        'user_id',
        

    ];

    public function users()
    {
        return $this->hasMany(User::class,'id','user_id');
    }
    public function branches()
    {
        return $this->hasMany(Branch::class,'id','branch_id');
    }
    public function scopeSearch($query,$value){
        $query->join('branches', 'doctor_infos.branch_id', '=', 'branches.id')
        ->select('doctor_infos.*')
        ->whereRaw('LOWER(branches.branch_name) like ?', "%{$value}%")
        ->orWhere('doctor_infos.doctor_fname','like',"%{$value}%")
        ->orWhere('doctor_infos.doctor_mname','like',"%{$value}%")
        ->orWhere('doctor_infos.doctor_lname','like',"%{$value}%");
        
    }

}
