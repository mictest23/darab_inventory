<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Cabinet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index(){
        return view('back.pages.dashboard');
    }

    
    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }


    public function cab_spec($cab_specific){
        $record_specs = DB::table('records')->where('cabinet', $cab_specific)->get();
        return view('back.pages.cabinet_specific', [
            'record_specs' => $record_specs,
            'cab_specific' => $cab_specific
        ]);
    }


    public function password(){
        $password = Hash::make('password');
        dd($password);
    }
    
}
