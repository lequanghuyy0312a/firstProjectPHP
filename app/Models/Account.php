<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table =  'account';
    protected $filltable = 'accountID, firstname, lastname, email, password, phone, address';
    protected $primarykey = 'accountID';
    public $timestamps = false;
}
