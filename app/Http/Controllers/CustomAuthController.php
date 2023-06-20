<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Psy\Readline\Hoa\Console;
use TheSeer\Tokenizer\Exception;

class CustomAuthController extends Controller
{
    public function home(){
        return view("auth.home");
    }
    //
    public function login(){
        $this->logout();
        return view("auth.login");
    }


    public function register(){ 
        $this->logout();
        return view("auth.register");
    }

    public function registerAccount(Request $request){ 
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:account',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:1|max:32'
        ]);
        $account = new Account();
        $account->firstname = $request->firstname;
        $account->lastname = $request->lastname;
        $account->email = $request->email;
        $account->phone = $request->phone;
        $account->address = $request->address;
        $account->password = $request->password;
        $res = $account->save();
        if($res) {
            return view("auth.login");
        }else {
            return back()->withErrors(['error' => 'Something wrong.']);
        }            
    }
    public function loginAccount(Request $request){ 
      
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:1|max:32'
        ]);
        try{
            $account = Account::where('email', '=', $request->email)-> first();     
            if($account){
                $data = Account::where('email', '=', $request->email)-> first();  
                if(($request->password == $account->password)){   
                    $request->session()->put('loginEmail', $data['email']); 
                    $request->session()->put('loginID', $data['accountID']); 
                    $request->session()->put('loginName', $data['firstname']);   
                    return redirect('/');          
                } else {
                    return redirect()->back()->withErrors(['error' => 'Password do not match.']);
                }
            }else {
                return redirect()->back()->withErrors(['error' => 'This gmail is not registered.']);
            }
        }
        catch(Exception $e) {
            Log::error($e->getMessage());
            return response()->view('errors.custom', ['exception' => $e], 500);
        }   
        
    }

    public function logout() {
        Auth::logout();
        session()->flush();
        session()->regenerate();
        return redirect('/');
    }
}
