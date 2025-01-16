<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Branch;
use App\Models\PosLog;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'product_desc',
        'product_price',
        'product_quantity',
        'category_id',
        'branch_id',
        'supplier_id',
        'user_id',

    ];

    public function categories()
    {
        return $this->hasMany(Category::class,'id','category_id');

    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class,'id','supplier_id');

    }

    
    public function branches()
    {
        return $this->hasMany(Branch::class,'id','branch_id');

    }
    
    public function users()
    {
        return $this->hasMany(User::class,'id','user_id');

    }
    public function productLogs1()
    {
        return $this->hasMany(PosLog::class, 'lens_product_id');
    }
    public function productLogs2()
    {
        return $this->hasMany(PosLog::class, 'frames_product_id');
    }
}
