<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\PatientInfo;
use App\Models\Product;
use App\Models\Patientrecord;
use App\Models\User;
use App\Models\Branch;
class PosLog extends Model
{
    protected $fillable = [
        'pos_typeOfPurchase',
        'pos_invoice_id',
        'pos_addamount',
        'pos_deposit',
        'pos_balance',
        'pos_status',
        'lens_product_id',
        'frame_product_id',
        'pr_id',
        'patient_id',
        'branch_id',
        'user_id',

    ];
  

    public function patients()
    {
        return $this->hasMany(PatientInfo::class,'id','patient_id');

    }
    public function patientrecords()
    {
        return $this->hasMany(Patientrecords::class,'id','pr_id');

    }
    public function users(){
        return $this->hasMany(User::class,'id','user_id');
    }
    public function branches(){
        return $this->hasMany(Branch::class,'id','branch_id');
    }
    public function product1()
    {
        return $this->belongsTo(Product::class, 'lens_product_id');
    }
    public function product2()
    {
        return $this->belongsTo(Product::class, 'frame_product_id');
    }
    
    public function scopeSearch($query,$value){
        $query->leftjoin('branches', 'pos_logs.branch_id', '=', 'branches.id')
        ->leftjoin('patient_infos', 'pos_logs.patient_id', '=', 'patient_infos.id')
        ->select('pos_logs.*','patient_infos.patient_fname','patient_infos.patient_lname')    
        ->whereRaw('LOWER(branches.branch_name) like ?', "%{$value}%")
        ->orWhere('patient_infos.patient_fname','like',"%{$value}%")
        ->orWhere('patient_infos.patient_lname','like',"%{$value}%")
        ->orWhere('pos_logs.pos_typeOfPurchase','like',"%{$value}%")
        ->orWhere('pos_logs.pos_invoice_id','like',"%{$value}%")
        ->get();
    }
}
