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



    


    public function store(Request $request, $id){
        $this->validate($request, [
            'docket_number' => 'required',
            // 'date_filed' => 'date',
            'nature' => 'required',
            'petitioners' => 'required',
            'lessor' => 'required',
            'lessee' => 'required',
            'location' => 'required',
            // 'date_alhc' => 'date',
            // 'area' => 'numeric',
         ]);

        function generateRandomCharacters($length = 6) {
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $randomString;
        }

        $randomChars1 = generateRandomCharacters(3);
        $randomChars2 = generateRandomCharacters(3);
        $randomChars3 = generateRandomCharacters(3);
        $randomChars4 = generateRandomCharacters(3);


        if($request->hasfile('filename1')){
            $name=$request->id."_".$randomChars1."_".$request->filename1->getClientOriginalName();
            $request->filename1->move(public_path().'/files/', $name);  
            $data1 = $name;
        }

        if($request->hasfile('filename2')){
            $name=$request->id."_".$randomChars2."_".$request->filename2->getClientOriginalName();
            $request->filename2->move(public_path().'/files/', $name);  
            $data2 = $name;  
        } else {
            $name='';
            $data2=$name;
        }

        if($request->hasfile('filename3')){
            $name=$request->id."_".$randomChars3."_".$request->filename3->getClientOriginalName();
            $request->filename3->move(public_path().'/files/', $name);  
            $data3 = $name;  
        } else {
            $name='';
            $data3=$name;
        }

        if($request->hasfile('filename4')){
            $name=$request->id."_".$randomChars4."_".$request->filename4->getClientOriginalName();
            $request->filename4->move(public_path().'/files/', $name);  
            $data4 = $name;  
        } else {
            $name='';
            $data4=$name;
        }

   
         $record= Record::find($id);
         $record->docket_number = $request->docket_number;
         $record->date_filed = $request->date_filed;
         $record->cabinet = $request->cabinet;
         $record->nature = $request->nature;
         $record->petitioners = $request->petitioners;
         $record->lessor = $request->lessor;
         $record->lessee = $request->lessee;
         $record->location = $request->location;
         $record->date_alhc = $request->date_alhc;
         $record->area = $request->area;
         $record->crops = $request->crops;
         $record->counsel = $request->counsel;
         $record->save();


         if(!empty($data1) && !empty($data2) && !empty($data3) && !empty($data4)){
            $record->file()->saveMany([new File(['filenamed' => $data1]), new File(['filenamed' => $data2]), new File(['filenamed' => $data3]), new File(['filenamed' => $data4]),]);
         } else if(!empty($data1) && empty($data2) && empty($data3) && empty($data4)){
            $record->file()->saveMany([new File(['filenamed' => $data1]),]);
         } else if (empty($data1) && !empty($data2) && empty($data3) && empty($data4)){
            $record->file()->saveMany([new File(['filenamed' => $data2]),]);
         } else if (empty($data1) && empty($data2) && !empty($data3) && empty($data4)){
            $record->file()->saveMany([new File(['filenamed' => $data3]),]);
         } else if (empty($data1) && empty($data2) && empty($data3) && !empty($data4)){
            $record->file()->saveMany([new File(['filenamed' => $data4]),]);

         } else if(!empty($data1) && !empty($data2) && empty($data3) && empty($data4)){
            $record->file()->saveMany([new File(['filenamed' => $data1]), new File(['filenamed' => $data2]),]);
         } else if(empty($data1) && !empty($data2) && !empty($data3) && empty($data4)){
            $record->file()->saveMany([new File(['filenamed' => $data2]), new File(['filenamed' => $data3]),]);
         } else if(empty($data1) && empty($data2) && !empty($data3) && !empty($data4)){
            $record->file()->saveMany([new File(['filenamed' => $data3]), new File(['filenamed' => $data4]),]);
         }
         else if(!empty($data1) && empty($data2) && !empty($data3) && empty($data4)){
            $record->file()->saveMany([new File(['filenamed' => $data1]), new File(['filenamed' => $data3]),]);
         } else if(empty($data1) && !empty($data2) && empty($data3) && !empty($data4)){
            $record->file()->saveMany([new File(['filenamed' => $data2]), new File(['filenamed' => $data4]),]);
         } else if(!empty($data1) && empty($data2) && empty($data3) && !empty($data4)){
            dd('si data 1 og data 4 naay sulod');
            $record->file()->saveMany([new File(['filenamed' => $data1]), new File(['filenamed' => $data4]),]);
         }
         else if(empty($data1) && !empty($data2) && !empty($data3) && !empty($data4)){
            $record->file()->saveMany([new File(['filenamed' => $data2]), new File(['filenamed' => $data3]), new File(['filenamed' => $data4]),]);
         } else if (!empty($data1) && empty($data2) && !empty($data3) && !empty($data4)){
            $record->file()->saveMany([new File(['filenamed' => $data1]), new File(['filenamed' => $data3]), new File(['filenamed' => $data4]),]);
         } else if (!empty($data1) && !empty($data2) && empty($data3) && !empty($data4)){
            $record->file()->saveMany([new File(['filenamed' => $data1]), new File(['filenamed' => $data2]), new File(['filenamed' => $data4]),]);
         } else if (!empty($data1) && !empty($data2) && !empty($data3) && empty($data4)){
            $record->file()->saveMany([new File(['filenamed' => $data1]), new File(['filenamed' => $data2]), new File(['filenamed' => $data3]),]);
         }
          else {
            // dd('way sulod tanan');
            $record->docket_number = $request->docket_number;
            $record->date_filed = $request->date_filed;
            $record->cabinet = $request->cabinet;
            $record->nature = $request->nature;
            $record->petitioners = $request->petitioners;
            $record->lessor = $request->lessor;
            $record->lessee = $request->lessee;
            $record->location = $request->location;
            $record->date_alhc = $request->date_alhc;
            $record->area = $request->area;
            $record->crops = $request->crops;
            $record->counsel = $request->counsel;
            $record->save();
         }

         return back();
    }
}
