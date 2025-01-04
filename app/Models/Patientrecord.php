<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Oculusdexter;
use App\Models\Oculussinister;
use App\Models\PatientInfo;
use App\Models\DoctorInfo;

class Patientrecord extends Model
{
    protected $fillable = [
        'pr_notes',
        'pr_pd',
        'patient_id',
        'doctor_id',
        'user_id',
        'os_id',
        'od_id',
        

    ];

     
    public function users()
    {
        return $this->hasMany(User::class,'id','user_id');

    }
    public function patients()
    {
        return $this->hasMany(PatientInfo::class,'id','patient_id');

    }
    public function oculusdexters()
    {
        return $this->hasMany(Oculusdexter::class,'id','od_id');

    }
    public function oculussinisters()
    {
        return $this->hasMany(Oculussinister::class,'id','os_id');

    }
    public function doctors()
    {
        return $this->hasMany(DoctorInfo::class,'id','doctor_id');

    }


}
