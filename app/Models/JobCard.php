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

    public function job_order()
    {
        return $this->hasOne(JobOrder::class, 'cob_card_id','id');
    }

    public function platesize()
    {
        return $this->hasOne(Item::class, 'id','ctp_size');
    }

    public function papertype()
    {
        return $this->hasOne(Item::class, 'id','paper_type');
    }
}
