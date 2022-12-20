<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=['id'];

    public function product()
    {
        return $this->hasOne(ProdectMaster::class, 'id','product_id');
    }

    public function unit()
    {
        return $this->hasOne(Unit::class, 'id','unit_id');
    }

    public function dimension()
    {
        return $this->hasOne(ItemDimension::class, 'id','dimension_id');
    }

    public function gsmdetails()
    {
        return $this->hasOne(ItemGSM::class, 'id','thickess_id');
    }

    public function company()
    {
        return $this->hasOne(ItemCompany::class, 'id','company_id');
    }
}
