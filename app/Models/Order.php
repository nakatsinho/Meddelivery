<?php

namespace Meddelivery\Models;

use Illuminate\Database\Eloquent\Model;
use SanderVanHooft\Invoicable\IsInvoicable\IsInvoicableTrait;

class Order extends Model
{
    use IsInvoicableTrait;

    protected $table='invoices';
    protected $primaryKey='id';
    protected $fillable=['invoicable_type','invoicable_id','tax','total','currency','reference','status','receiver_info','sender_info','payment_info','note'];
}
