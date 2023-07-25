<?php

namespace App\Http\Livewire;

use App\Models\Record;
use App\Models\Cabinet;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CabinetShow extends Component
{

    public $cabinet_delete_id;
    public $rec_id;
    public $row1, $row2, $row3, $row4, $row5, $row6, $row7, $row8, $row9, $row10, $cab_number;





    public function render(){
        $cabinet = Cabinet::all();
        return view('livewire.cabinet-show', ['cabinet' => $cabinet]);
    }

    public function viewSpecific($number, $test, $id){
        $cab_specific = 'cab '.$number.'-'.$test.'';
        return redirect()->route('cabinet_specific', $cab_specific);
    }



    ############################### DELETE FUNCTION ##############################
    public function deleteConfirmation($id){
        $this->cabinet_delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function cancel(){
        $this->cabinet_delete_id = '';
    }

    public function deleteCabinet(){
        $cabinet = Cabinet::where('id', $this->cabinet_delete_id)->first();
        $cabinet->delete();

        $this->showToastr('Successfully deleted to database.', 'success');
        $this->dispatchBrowserEvent('close-modal');
        $this->cabinet_delete_id = '';
    }
    ##################### DELETE FUNCTION ENDS HERE ###############################







    ########################## EDIT DATA ###################################
    public function close(){
        $this->cab_number = '';
        $this->row1 = '';
        $this->row2 = '';
        $this->row3 = '';
        $this->row4 = '';
        $this->row5 = '';
        $this->row6 = '';
        $this->row7 = '';
        $this->row8 = '';
        $this->row9 = '';
        $this->row10 = '';
    }

    public function editCabinet($id){
        $cabinet = Cabinet::where('id', $id)->first();

        $this->rec_id = $cabinet->id;

        $this->cab_number = $cabinet->cab_number;
        $this->row1 = $cabinet->row1;
        $this->row2 = $cabinet->row2;
        $this->row3 = $cabinet->row3;
        $this->row4 = $cabinet->row4;
        $this->row5 = $cabinet->row5;
        $this->row6 = $cabinet->row6;
        $this->row7 = $cabinet->row7;
        $this->row8 = $cabinet->row8;
        $this->row9 = $cabinet->row9;
        $this->row10 = $cabinet->row10;

        $this->dispatchBrowserEvent('show-edit-student-modal');
    }

    public function EditCabinetData(){
        $this->validate([
            'cab_number' => 'required|numeric',
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


        $cabinetModel = Cabinet::where('id', $this->rec_id)->first();
        if($cabinetModel->cab_number == $this->cab_number){
            
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
            $this->showToastr('You successfully edited a cabinet!', 'success');

        } else {
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
            $this->showToastr('You successfully edited a cabinet!', 'success');
            
        }

    }
    ########################## EDIT DATA ENDS HERE ###################################






    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }

}
