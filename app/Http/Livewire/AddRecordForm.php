<?php

namespace App\Http\Livewire;

use App\Models\Record;
use App\Models\Cabinet;
use Livewire\Component;
use Livewire\WithFileUploads;


class AddRecordForm extends Component
{

    use WithFileUploads;
    public $docket_number, $date_filed, $cabinet, $nature, $petitioners, $lessor, $lessee, $location, $date_alhc, $area, $crops, $counsel, $file;

    public function AddRecord(){
        $this->validate([
            'docket_number' => 'required|unique:records,docket_number',
            'date_filed' => 'required',
            'cabinet' => 'required',
            'nature' => 'required',
            'petitioners' => 'required',
            'lessor' => 'required',
            'lessee' => 'required',
            'location' => 'required',
            'date_alhc' => 'required',
            'area' => 'required|numeric',
            'crops' => 'required',
            'counsel' => 'required',
            'filename' => 'required',
            // 'file.*' => 'mimes:doc,pdf,docx,zip'
        ]);


        $recordModel = new Record;
        if($this->hasfile('file')) {

            foreach($request->file('file') as $file){
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $data[] = $name;  
            }

            


            $recordModel->docket_number = $this->docket_number;
            $recordModel->date_filed = $this->date_filed;
            $recordModel->cabinet = strtoupper($this->cabinet);
            $recordModel->nature = $this->nature;
            $recordModel->petitioners = $this->petitioners;
            $recordModel->lessor = $this->lessor;
            $recordModel->lessee = $this->lessee;
            $recordModel->location = $this->location;
            $recordModel->date_alhc = $this->date_alhc;
            $recordModel->area = $this->area;
            $recordModel->crops = $this->crops;
            $recordModel->counsel = $this->counsel;
            $recordModel->save();
            $file->filename=json_encode($data);

            $this->reset();
            $this->showToastr('Successfully added to database.', 'success');
        }
        
    }


    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }


    public function render(){
        $cab_select = Cabinet::all();
        return view('livewire.add-record-form', ['cab_select' => $cab_select]);
    }
}




// $fileName = $this->file->getClientOriginalName();
            // $filePath = $this->file->storeAs('files', $fileName, 'public');
            // $recordModel->name = $this->file->getClientOriginalName();
            // $recordModel->file_path = '/public/' . $filePath;