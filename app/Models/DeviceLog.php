<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceLog extends Model
{
    use HasFactory;
    
    protected $table = 'devicelog';
    protected $filltable = 'logID,serialNumber,battery,gas,puslishedOnUTC';
    protected $primarykey = 'logID';
    public $timestamps = false;
}
