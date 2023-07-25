<?php

namespace App\Http\Livewire;

use App\Models\Cabinet;
use Livewire\Component;

class CabinetAddForm extends Component
{

    public $cab_number, $row1, $row2, $row3, $row4, $row5, $row6, $row7, $row8, $row9, $row10;

    public function AddCabinet(){
        $this->validate([
            'cab_number' => 'required|numeric|unique:cabinets,cab_number',
            'row1' => 'alpha|nullable',
            'row2' => 'alpha|nullable',
            'row3' => 'alpha|nullable',
            'row4' => 'alpha|nullable',
            'row5' => 'alpha|nullable',
            'row6' => 'alpha|nullable',
            'row7' => 'alpha|nullable',
            'row8' => 'alpha|nullable',
            'row9' => 'alpha|nullable',
            'row10' => 'alpha|nullable',
        ]);


        $cabinetModel = new Cabinet;
        $cabinetModel->cab_number = $this->cab_number;
        $cabinetModel->row1 = $this->row1;
        $cabinetModel->row2 = $this->row2;
        $cabinetModel->row3 = $this->row3;
        $cabinetModel->row4 = $this->row4;
        $cabinetModel->row5 = $this->row5;
        $cabinetModel->row6 = $this->row6;
        $cabinetModel->row7 = $this->row7;
        $cabinetModel->row8 = $this->row8;
        $cabinetModel->row9 = $this->row9;
        $cabinetModel->row10 = $this->row10;
        $cabinetModel->save();
        $this->reset();
        $this->showToastr('You successfully added a cabinet.', 'success');
    }



    public function render()
    {
        return view('livewire.cabinet-add-form');
    }


    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }

}
