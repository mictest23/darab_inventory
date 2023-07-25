<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminLoginForm extends Component
{

    public $username, $password;

    public function render()
    {
        return view('livewire.admin-login-form');
    }


    public function LoginHandler(){
        $this->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => 'Enter a username',
            'password.required' => 'Enter a password',
        ]);

        $creds = array('username' => $this->username, 'password' => $this->password);
        if(Auth::guard('web')->attempt($creds)){
            return redirect()->route('dashboard');
        } else {
            session()->flash('fail', 'Incorrect email or Password');
        }
    }

}
