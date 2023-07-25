<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class AddUserForm extends Component
{

    public $fullname, $username, $email, $type, $password, $password_confirmation;
    public $record_delete_id;
    public $searchTerm;



    public function AddAdmin(){
        $this->validate([
            'fullname' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email',
            'type' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $password = Hash::make($this->password);
        $user = new User;
        $user->name = $this->fullname;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->type = $this->type;
        $user->password = $password;
        $user->save();
        $this->reset();
        $this->showToastr('Successfully added an Admin.', 'success');
    }

    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }


    
    ################# DELETE USER ########################
    public function deleteConfirmation($id){
        $this->record_delete_id = $id;

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function cancel(){
        $this->record_delete_id = '';
    }

    public function deleteRecordData(){
        $user = User::where('id', $this->record_delete_id)->first();
        $user->delete();

        $this->showToastr('Successfully deleted to database.', 'success');
        $this->dispatchBrowserEvent('close-modal');
        $this->record_delete_id = '';
    }
    ################# DELETE USER ########################



    public function render()
    {
        $search = '%'.$this->searchTerm.'%';
        $users = User::all();
        return view('livewire.add-user-form', ['users' => User::where('name','like', $search)->get()]);
    }
}
