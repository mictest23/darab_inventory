<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Record;
use App\Models\Cabinet;
use Illuminate\Http\Request;

class AddController extends Controller
{

    public function render(){
        $cab_select = Cabinet::all();
        // return view('pages.add_new', ['cab_select' => $cab_select]);
        return view('back.pages.add_new', ['cab_select' => $cab_select]);
    }
    
    public function store(Request $request){
        $this->validate($request, [
                'docket_number' => 'required',
                'date_filed' => 'required',
                'cabinet' => 'required',
                // 'filename' => 'required',
                // 'filename.*' => 'mimes:doc,pdf,docx,zip'
        ]);
        
        // if($request->hasfile('filename')){
        //     foreach($request->file('filename') as $file){
        //         $name=$file->getClientOriginalName();
        //         $file->move(public_path().'/files/', $name);  
        //         $data[] = $name;  
        //         $data = $name;  
        //     }
        // }

        if($request->hasfile('filename1')){
            // foreach($request->file('filename') as $file){
                $name=$request->filename1->getClientOriginalName();
                $request->filename1->move(public_path().'/files/', $name);  
                $data1 = $name;  
                // $data = $name;  
                
            // }
        }

        if($request->hasfile('filename2')){
            $name=$request->filename2->getClientOriginalName();
            $request->filename2->move(public_path().'/files/', $name);  
            $data2 = $name;  
        } else {
            $name='';
            $data2=$name;
        }

        if($request->hasfile('filename3')){
            $name=$request->filename3->getClientOriginalName();
            $request->filename3->move(public_path().'/files/', $name);  
            $data3 = $name;  
        } else {
            $name='';
            $data3=$name;
        }

        if($request->hasfile('filename4')){
            $name=$request->filename4->getClientOriginalName();
            $request->filename4->move(public_path().'/files/', $name);  
            $data4 = $name;  
        } else {
            $name='';
            $data4=$name;
        }


         $record= new Record();
         $record->docket_number = $request->docket_number;
         $record->date_filed = $request->date_filed;
         $record->cabinet = $request->cabinet;

         
         // dd($data1,$data2,$data3,$data4);
         
         $record->save();

         if(!empty($data1) && !empty($data2) && !empty($data3) && !empty($data4)){
            // dd('naay sulod tanan');
            $record->file()->saveMany([new File(['filenamed' => $data1]), new File(['filenamed' => $data2]), new File(['filenamed' => $data3]), new File(['filenamed' => $data4]),]);
         } else if(!empty($data1) && empty($data2) && empty($data3) && empty($data4)){
            // dd('si data 1 ray naay sulod');
            $record->file()->saveMany([new File(['filenamed' => $data1]),]);
         } else if (empty($data1) && !empty($data2) && empty($data3) && empty($data4)){
            // dd('si data 2 ray naay sulod');
            $record->file()->saveMany([new File(['filenamed' => $data2]),]);
         } else if (empty($data1) && empty($data2) && !empty($data3) && empty($data4)){
            // dd('si data 3 ray naay sulod');
            $record->file()->saveMany([new File(['filenamed' => $data3]),]);
         } else if (empty($data1) && empty($data2) && empty($data3) && !empty($data4)){
            // dd('si data 4 ray naay sulod');
            $record->file()->saveMany([new File(['filenamed' => $data4]),]);

         } else if(!empty($data1) && !empty($data2) && empty($data3) && empty($data4)){
            // dd('si data 1 og data 2 naay sulod');
            $record->file()->saveMany([new File(['filenamed' => $data1]), new File(['filenamed' => $data2]),]);
         } else if(empty($data1) && !empty($data2) && !empty($data3) && empty($data4)){
            // dd('si data 2 og data 3 naay sulod');
            $record->file()->saveMany([new File(['filenamed' => $data2]), new File(['filenamed' => $data3]),]);
         } else if(empty($data1) && empty($data2) && !empty($data3) && !empty($data4)){
            // dd('si data 3 og data 4 naay sulod');
            $record->file()->saveMany([new File(['filenamed' => $data3]), new File(['filenamed' => $data4]),]);
         }
         else if(!empty($data1) && empty($data2) && !empty($data3) && empty($data4)){
            // dd('si data 1 og data 3 naay sulod');
            $record->file()->saveMany([new File(['filenamed' => $data1]), new File(['filenamed' => $data3]),]);
         } else if(empty($data1) && !empty($data2) && empty($data3) && !empty($data4)){
            // dd('si data 2 og data 4 naay sulod');
            $record->file()->saveMany([new File(['filenamed' => $data2]), new File(['filenamed' => $data4]),]);
         } else if(!empty($data1) && empty($data2) && empty($data3) && !empty($data4)){
            dd('si data 1 og data 4 naay sulod');
            $record->file()->saveMany([new File(['filenamed' => $data1]), new File(['filenamed' => $data4]),]);
         }
         else if(empty($data1) && !empty($data2) && !empty($data3) && !empty($data4)){
            // dd('si data 1 ray empty');
            $record->file()->saveMany([new File(['filenamed' => $data2]), new File(['filenamed' => $data3]), new File(['filenamed' => $data4]),]);
         } else if (!empty($data1) && empty($data2) && !empty($data3) && !empty($data4)){
            // dd('si data 2 ray empty');
            $record->file()->saveMany([new File(['filenamed' => $data1]), new File(['filenamed' => $data3]), new File(['filenamed' => $data4]),]);
         } else if (!empty($data1) && !empty($data2) && empty($data3) && !empty($data4)){
            // dd('si data 3 ray empty');
            $record->file()->saveMany([new File(['filenamed' => $data1]), new File(['filenamed' => $data2]), new File(['filenamed' => $data4]),]);
         } else if (!empty($data1) && !empty($data2) && !empty($data3) && empty($data4)){
            // dd('si data 4 ray empty');
            $record->file()->saveMany([new File(['filenamed' => $data1]), new File(['filenamed' => $data2]), new File(['filenamed' => $data3]),]);
         }
          else {
            dd('way sulod tanan');
         }

        return back()->with('success', 'Your files has been successfully added');
    }

    
}
