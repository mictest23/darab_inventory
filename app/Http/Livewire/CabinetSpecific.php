<?php

namespace App\Http\Livewire;

use App\Models\Record;
use Livewire\Component;
use Illuminate\Support\Facades\Response;

class CabinetSpecific extends Component
{
    
    public $record_specs, $cab_specific;
    public $currenturl;
    public $search;
    

    public function mount($record_specs, $cab_specific){
        $this->record_specs = $record_specs;
        $this->cab_specific = $cab_specific;
        $this->currenturl = url()->full();
    }
    

    public function deleteConfirmation(){
        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function render(){
        $search = '%'.$this->search.'%';
        return view('livewire.cabinet-specific',  [
            'recs' => Record::where('docket_number','like', $search)->where('cabinet', $this->cab_specific)->get()
        ])->layout('livewire.cabinet-specific');;
    }
}
