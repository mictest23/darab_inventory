<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{

    public $profile;
    public $passwordDefault;
    public $fullname, $username, $email, $password, $password_confirmation;

    public function mount(){
        $this->profile = User::find(auth('web')->id());
        $this->fullname = $this->profile->name;
        $this->username = $this->profile->username;
        $this->email = $this->profile->email;
        $this->passwordDefault = $this->profile->password;
    }

    public function updateProfile(){
        $this->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'password' => 'confirmed',
        ]);


        $user = User::find($this->profile->id);
        if($this->username == $user->username){

            if($this->password == null){
                $user = User::find($this->profile->id);
                $user->name = $this->fullname;
                $user->username= $this->username;
                $user->email = $this->email;
                $user->password = $this->passwordDefault;
                $user->save();
                $this->showToastr('Successfully saved changes.', 'success');
            } else {
                $password = Hash::make($this->password);
                $user = User::find($this->profile->id);
                $user->name = $this->fullname;
                $user->username= $this->username;
                $user->email = $this->email;
                $user->password = $password;
                $user->save();
                $this->showToastr('Successfully saved changes.', 'success');
            }

        } else {
            $this->validate([
                'fullname' => 'required',
                'username' => 'required|unique:users,username',
                'email' => 'required|email',
                'password' => 'confirmed',
            ]);


            if($this->password == null){
                $user = User::find($this->profile->id);
                $user->name = $this->fullname;
                $user->username= $this->username;
                $user->email = $this->email;
                $user->password = $this->passwordDefault;
                $user->save();
                $this->showToastr('Successfully saved changes.', 'success');
            } else {
                $password = Hash::make($this->password);
                $user = User::find($this->profile->id);
                $user->name = $this->fullname;
                $user->username= $this->username;
                $user->email = $this->email;
                $user->password = $password;
                $user->save();
                $this->showToastr('Successfully saved changes.', 'success');
            }
        }
    }


    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }


    public function render()
    {
        return view('livewire.profile');
    }
}
