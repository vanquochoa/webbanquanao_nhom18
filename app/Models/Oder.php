<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oder extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	// 'customer_id',
         'shipping_id', 'order_status','order_code'
    ];
    protected $primaryKey = 'order_id';
 	protected $table = 'tbl_order';
}
