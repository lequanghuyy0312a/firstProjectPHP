<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceInfo extends Model
{
    use HasFactory;
    protected $table =  'deviceinfo';
    protected $filltable = 'serialNumber,name,address,status,accountID,shopID,showOnHomePage';
    protected $primarykey = 'serialNumber';
    public $timestamps = false;
}
