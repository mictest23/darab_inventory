<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Record;
use App\Models\Cabinet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function update($record){
        $record = Record::find($record);
        $file = $record->file;
        // dd($file);
        $cab_select = Cabinet::all();
        return view('back.pages.update-record', [
            'record' => $record,
            'cab_select' => $cab_select,
            'file' => $file
        ]);
    }

    public function delete($id){
        $file = File::where('id', $id)->value('filenamed'); 
        unlink('files/'.$file.'');   
        $delete = File::destroy($id);
        // dd('files/'.$file.'');
        return back();
    }
}
