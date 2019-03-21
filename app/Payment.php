<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = ['payment_id', 'transaction_id', 'refno', 'auth_code', 'status', 'err_desc', 'signature', 'cc_name', 'cc_no', 'bank_name', 'country', 'amount'];
}
