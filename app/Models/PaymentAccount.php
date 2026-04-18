<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentAccount extends Model
{
    protected $fillable = [
        'type',
        'provider',
        'account_title',
        'account_number',
        'status',
    ];}
