<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobCard extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    public function customerName()
    {
        return $this->hasOne(Customer::class, 'id','customer_id');
    }
}
