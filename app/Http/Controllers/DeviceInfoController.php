<?php

namespace App\Http\Controllers;

use App\Models\DeviceInfo;
use App\Models\DeviceLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mosquitto\Client as MosquittoClient;

class DeviceInfoController extends Controller
{

    public function device() {
        $listDevices = DB::select("select * from DeviceInfo where accountID = ?", [session('loginID')]);
        session()->put('countDevices',count($listDevices)); 
        if(!session('loginID'))
            return view('auth.login');
        else
            return view('auth.device', ['listDevices' => $listDevices]);               
    }
    public function detail($serialNumber) {       
        $detail = DeviceLog::WHERE('devicelog.serialNumber', $serialNumber)
                           ->WHERE('deviceinfo.serialNumber', $serialNumber)
                           ->WHERE('account.accountID', session('loginID'))
                           ->JOIN('deviceinfo', 'devicelog.serialNumber', '=', 'deviceinfo.serialNumber')
                           ->JOIN('account', 'deviceinfo.accountID', '=', 'account.accountID')
                           ->SELECT('devicelog.*')
                           ->ORDERBY('devicelog.publishedOnUTC','DESC')
                           ->first();
        if(session('loginID')){
            return view('auth.detail', ['detail' => $detail]);
        }
           
        else
            return view('auth.login');
    }

    
}
