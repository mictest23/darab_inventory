<?php

namespace App\Http\Livewire;

use App\Models\Record;
use App\Models\Cabinet;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class TableView extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $searchTerm;

    public $record_delete_id;
    public $rec_id;

    public $docket_number;
    public $date_filed;
    public $cabinet; 
    public $nature;
    public $petitioners;
    public $lessor;
    public $lessee;
    public $location;
    public $date_alhc;
    public $area;
    public $crops;
    public $counsel;
    public $name;


    public $view_record_docket_number;
    public $view_record_date_filed;
    public $view_record_cabinet; 
    public $view_record_nature;
    public $view_record_petitioners;
    public $view_record_lessor;
    public $view_record_lessee;
    public $view_record_location;
    public $view_record_date_alhc;
    public $view_record_area;
    public $view_record_crops;
    public $view_record_counsel;
    public $view_record_name;


    public $edit_id;




    public function updated($name, $value){
        $this->gotoPage(1);
    }




    // public function render(){
    //     $searchTerm = '%'.$this->searchTerm.'%';

    //     $cab_edit = Cabinet::all();
    //     $records = Record::all();
    //     return view('livewire.table-view', [
    //         'cab_edit' => $cab_edit,
    //         'records' => Record::where('docket_number','like', $searchTerm)
    //         ->orWhere('cabinet','like', $searchTerm)
    //         ->orWhere('petitioners','like', $searchTerm)
    //         ->orWhere('lessor','like', $searchTerm)
    //         ->orWhere('lessee','like', $searchTerm)->paginate(10)
    //     ])->layout('livewire.table-view');
    // }




    public function render(){
        $cab_edit = Cabinet::all();
        $records = Record::with('file')->get();
        $rec = Record::all();
        // $rec = Record::with('file')->get();
        return view('livewire.table-view', [
            'cab_edit' => $cab_edit,    
            'rec' => $rec,    
            'records' => Record::search(trim($this->searchTerm))->orderByDesc('created_at')->paginate(10)
        ])->layout('livewire.table-view');
    }




    // #################### VIEW RECORD ##################################

    public function viewRecordDetails($id){

        $record = Record::where('id', $id)->first();

        $this->view_record_id = $record->id;
        $this->view_record_docket_number = $record->docket_number;
        $this->view_record_date_filed = $record->date_filed;
        $this->view_record_cabinet = $record->cabinet;
        $this->view_record_nature = $record->nature;
        $this->view_record_petitioners = $record->petitioners;
        $this->view_record_lessor = $record->lessor;
        $this->view_record_lessee = $record->lessee;
        $this->view_record_location = $record->location;
        $this->view_record_date_alhc = $record->date_alhc;
        $this->view_record_area = $record->area;
        $this->view_record_crops = $record->crops;
        $this->view_record_counsel = $record->counsel;
        $this->view_record_name = $record->filename;

        $this->dispatchBrowserEvent('show-view-student-modal');
    }

    public function closeViewStudentModal(){
        $this->view_record_docket_number = '';
        $this->view_record_date_filed = '';
        $this->view_record_cabinet = '';
        $this->view_record_nature = '';
        $this->view_record_petitioners = '';
        $this->view_record_lessor = '';
        $this->view_record_lessee = '';
        $this->view_record_location = '';
        $this->view_record_date_alhc = '';
        $this->view_record_area = '';
        $this->view_record_crops = '';
        $this->view_record_counsel = '';
        $this->view_record_name = '';
    }

    // ########################### END VIEW RECORD ##################



    //################DELETE DATA############################ 
    public function deleteConfirmation($id){
        $this->record_delete_id = $id;

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function cancel(){
        $this->record_delete_id = '';
    }

    public function deleteRecordData(){
        $record = Record::where('id', $this->record_delete_id)->first();
        $record->delete();

        $path = Storage::disk('local')->path('public/files/'. $record->name .'');     //delete files when new file is added
        unlink($path);

        $this->showToastr('Successfully deleted to database.', 'success');
        $this->dispatchBrowserEvent('close-modal');
        $this->record_delete_id = '';
    }

    //###################### END DELETE DATA ############################# 



    // #################### EDIT DATA ###################################
    public function close()
    {
        $this->docket_number = '';
        $this->date_filed = '';
        $this->cabinet = '';
        $this->nature = '';
        $this->petitioners = '';
        $this->lessor = '';
        $this->lessee = '';
        $this->location = '';
        $this->date_alhc = '';
        $this->area = '';
        $this->crops = '';
        $this->counsel = '';
        // $this->name = '';

        // redirect()->to('/view');
    }

    public function editRecords($id){
        $record = Record::where('id', $id)->first();

        $this->rec_id = $id;

        $this->docket_number = $record->docket_number;
        $this->date_filed = $record->date_filed;
        $this->cabinet = $record->cabinet;
        $this->nature = $record->nature;
        $this->petitioners = $record->petitioners;
        $this->lessor = $record->lessor;
        $this->lessee = $record->lessee;
        $this->location = $record->location;
        $this->date_alhc = $record->date_alhc;
        $this->area = $record->area;
        $this->crops = $record->crops;
        $this->counsel = $record->counsel;

        $this->edit_id = $record->id;

        $this->dispatchBrowserEvent('show-edit-student-modal');
    }


    public function editRecordData(){
        $this->validate([
            'docket_number' => 'required',
            // 'date_filed' => 'required',
            // 'cabinet' => 'required',
            'nature' => 'required',
            'petitioners' => 'required',
            'lessor' => 'required',
            'lessee' => 'required',
            'location' => 'required',
            // 'date_alhc' => 'required',
            // 'area' => 'required',
            // 'crops' => 'required',
            'counsel' => 'required',
            // 'name' => 'required|unique:records,name'
        ]);

        
            $record = Record::where('id', $this->rec_id)->first();
            if(empty($this->name)){
                $record->docket_number = $this->docket_number;
                $record->date_filed = $this->date_filed;
                $record->cabinet = strtoupper($this->cabinet);
                $record->nature = $this->nature;
                $record->petitioners = $this->petitioners;
                $record->lessor = $this->lessor;
                $record->lessee = $this->lessee;
                $record->location = $this->location;
                $record->date_alhc = $this->date_alhc;
                $record->area = $this->area;
                $record->crops = $this->crops;
                $record->counsel = $this->counsel;
            } else {
                $fileName = Str::random(5).'-'. $this->name->getClientOriginalName();
                $this->name->storeAs('public/files', $fileName);   

                $record->docket_number = $this->docket_number;
                $record->date_filed = $this->date_filed;
                $record->cabinet = strtoupper($this->cabinet);
                $record->nature = $this->nature;
                $record->petitioners = $this->petitioners;
                $record->lessor = $this->lessor;
                $record->lessee = $this->lessee;
                $record->location = $this->location;
                $record->date_alhc = $this->date_alhc;
                $record->area = $this->area;
                $record->crops = $this->crops;
                $record->counsel = $this->counsel;

                //delete files when new file is added
                $path = Storage::disk('local')->path('public/files/'. $record->name .'');     
                unlink($path);
                $record->name = $fileName;


                redirect()->to('/view');
            }
            

            $record->save();
            $this->showToastr('Successfully udpated!', 'success');

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    // ############################## END UPDATE DATA #####################################


    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }

    
}
