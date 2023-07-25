<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Record;
use App\Models\Cabinet;
use Livewire\Component;

class Dashboard extends Component
{

    public $record, $cabinet, $user;

    public function mount(){
        $this->record = Record::all()->count();
        $this->cabinet = Cabinet::all()->count();
        $this->user = User::all()->count();
    }

    public function render(){
        $latest = Record::latest()->take(10)->get();
        return view('livewire.dashboard', ['latest' => $latest]);
    }
}
