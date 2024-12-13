<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Branch;

class PatientInfo extends Model
{
    protected $fillable = [
        'patient_fname',
        'patient_mname',
        'patient_lname',
        'patient_address',
        'patient_contact_number',
        'patient_age',
        'patient_gender',
        'patient_lname',
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

    public function scopeSearch($query,$value){
        $query->join('branches', 'patient_infos.branch_id', '=', 'branches.id')
        ->select('patient_infos.*')
        ->whereRaw('LOWER(branches.branch_name) like ?', "%{$value}%")
        ->orWhere('patient_infos.patient_fname','like',"%{$value}%")
        ->orWhere('patient_infos.patient_lname','like',"%{$value}%")
        ->orWhere('patient_infos.patient_address','like',"%{$value}%")
        ->orWhere('patient_infos.patient_contact_number','like',"%{$value}%");
    }
}
