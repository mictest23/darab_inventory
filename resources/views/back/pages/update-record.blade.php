@extends('back.layouts.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Update Record | Darab')
@section('pagePart', isset($pagePart) ? $pagePart : 'Update Record')
@section('content')


<a href="/view">Go back</a>

<form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" action="/file-update/{{$record->id}}" enctype="multipart/form-data">
  {{csrf_field()}}

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="full_name">Docket number</label>
        <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="BOH-VII-" name="docket_number" value="{{$record->docket_number}}">
        <p class="text-red-500 text-sm">@error('docket_number'){{ $message }}@enderror</p>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="email">Date filed</label>
        <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" placeholder="Enter your email" name="date_filed" value="{{$record->date_filed}}">
        <p class="text-red-500 text-sm">@error('date_filed'){{ $message }}@enderror</p>
      </div>


      <label class="block text-gray-700 font-bold mb-2" for="phone">Cabinet</label>
        <div class="relative inline-block w-full mb-4">
          <select class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="cabinet">
            @foreach ($cab_select as $cab_selects)
            <option value="{{$record->cabinet}}" selected hidden>{{$record->cabinet}}</option>
            <optgroup label="Cab {{ $cab_selects->cab_number }}">
              <option value="Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row1 }}" @if (empty( $cab_selects->row1 ))disabled hidden @endif >Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row1 }}</option>
              <option value="Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row2 }}" @if (empty( $cab_selects->row2 ))disabled hidden @endif >Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row2 }}</option>
              <option value="Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row3 }}" @if (empty( $cab_selects->row3 ))disabled hidden @endif >Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row3 }}</option>
              <option value="Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row4 }}" @if (empty( $cab_selects->row4 ))disabled hidden @endif >Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row4 }}</option>
              <option value="Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row5 }}" @if (empty( $cab_selects->row5 ))disabled hidden @endif >Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row5 }}</option>
              <option value="Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row6 }}" @if (empty( $cab_selects->row6 ))disabled hidden @endif >Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row6 }}</option>
              <option value="Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row7 }}" @if (empty( $cab_selects->row7 ))disabled hidden @endif >Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row7 }}</option>
              <option value="Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row8 }}" @if (empty( $cab_selects->row8 ))disabled hidden @endif >Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row8 }}</option>
              <option value="Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row9 }}" @if (empty( $cab_selects->row9 ))disabled hidden @endif >Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row9 }}</option>
              <option value="Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row10 }}" @if (empty( $cab_selects->row10 ))disabled hidden @endif >Cab {{ $cab_selects->cab_number }}-{{ $cab_selects->row10 }}</option>
            </optgroup>
            @endforeach
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
              <path d="M10 12l-6-6 1.41-1.41L10 9.17l4.59-4.58L16 6z"/>
            </svg>
          </div>
          <p class="text-red-500 text-sm">@error('cabinet'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="message">Nature of case</label>
          {{-- <textarea class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" placeholder="Enter Nature of case" wire:model="nature"></textarea> --}}
          <select class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="nature">
            <option value="{{ $record->nature }}" selected hidden>{{ $record->nature }}</option>
            <option value="Review of an Agricultural Leasehold ALHC">Review of an Agricultural Leasehold ALHC</option>
            <option value="Correction of Entry">Correction of Entry</option>
            <option value="Ejectment">Ejectment</option>
            <option value="Reinstatement with Damages">Reinstatement with Damages</option>
            <option value="Inclusion and Exclusion on Transfer Certificate">Inclusion and Exclusion on Transfer Certificate</option>
            <option value="cancellation of entry">Cancellation of entry</option>
            <option value="Summary Administrative Proceeding to Determine Just Compensation">Summary Administrative Proceeding to Determine Just Compensation</option>
            <option value="Inclusion and Exclusion on Transfer Certificate">Inclusion and Exclusion on Transfer Certificate</option>
            <option value="Recovery of Possession of a Parcel of Land with damages">Recovery of Possession of a Parcel of Land with damages</option>
            <option value="Quieting of title">Quieting of title</option>
            <option value="Dispossession of Landholding">Dispossession of Landholding</option>
            <option value="Issuance of new duplicate copy">Issuance of new duplicate copy</option>
            <option value="Issuance of lost titles">Issuance of lost titles</option>
          </select>
          <p class="text-red-500 text-sm">@error('nature'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="phone">Petitioner</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Enter petitioner" 
          name="petitioners" value="{{ $record->petitioners }}">
          <p class="text-red-500 text-sm">@error('petitioners'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="phone">Respondent</label>
          <textarea class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" placeholder="Enter respondents" name="lessor">{{ $record->lessor }}</textarea>
          <p class="text-red-500 text-sm">@error('lessor'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="phone">Respondent</label>
          <textarea class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" placeholder="Enter respondets" name="lessee">{{$record->lessee}}</textarea>
          <p class="text-red-500 text-sm">@error('lessee'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="phone">Location</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Enter location situated" name="location" value="{{$record->location}}">
          <p class="text-red-500 text-sm">@error('location'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="phone">Date of alhc</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" placeholder="Enter your phone number" name="date_alhc" value="{{$record->date_alhc}}">
          <p class="text-red-500 text-sm">@error('date_alhc'){{ $message }}@enderror</p>
        </div>

        <div class="grid grid-cols-2 gap-8">
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="phone">Area</label>
            <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Enter area of land" name="area" value="{{$record->area}}">
            <p class="text-red-500 text-sm">@error('area'){{ $message }}@enderror</p>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="phone">Crop</label>
            <select class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="crops">
              <option value="{{$record->crops}}" selected hidden>{{$record->crops}}</option>
              <option value="rice">Rice</option>
              <option value="corn">Corn</option>
              <option value="banana">Banana</option>
              <option value="camote">Kamote</option>
              <option value="balanghoy">Balanghoy</option>
              <option value="coconut">Coconut</option>
              <option value="Mango">Mango</option>
              <option value="abaca">Abaca</option>
              <option value="cofee/cacao">Coffee/Cacao</option>
              <option value="Commercial Trees/Orchard">Commercial Trees/Orchard</option>
              <option value="Palm Trees">Palm Trees</option>
              <option value="Pineapple">Pineapple</option>
              <option value="Rootcrops">Rootcrops</option>
              <option value="Vegetables">Vegetables</option>
              <option value="Others">Others</option>
            </select>
            <p class="text-red-500 text-sm">@error('crops'){{ $message }}@enderror</p>
          </div>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="phone">Counsel</label>
        <textarea class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" placeholder="Enter Counsels" name="counsel">{{$record->counsel}}</textarea>
        <p class="text-red-500 text-sm">@error('counsel'){{ $message }}@enderror</p>
      </div>

        <div class="table-auto w-full border-collapse p-8">
          <table class="table-auto w-full border-collapse">
            <thead>
                <tr>
                    <th class="px-4 py-2 bg-blue-500 text-white">Filename</th>
                    <th class="px-4 py-2 bg-blue-500 text-white">Delete</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($file as $files)
                <tr class="bg-gray-200">
                  <td class="border px-4 py-2"><a target="_blank" href="../../files/{{ $files->filenamed }}">{{ $files->filenamed }}</a></td>
                  <td class="border px-4 py-2"><a href="../delete/{{ $files->id }}">delete</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>  
        </div>



      {{-- <div class="input-group control-group increment" >
        <input type="file" name="filename[]" class="form-control">
        <div class="input-group-btn"> 
          <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
        </div>
      </div>
      <div class="clone hide">
        <div class="control-group input-group" style="margin-top:10px">
          <input type="file" name="filename[]" class="form-control">
          <div class="input-group-btn"> 
            <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
          </div>
        </div>
      </div> --}}


      <label class="block text-gray-700 font-bold mb-2" for="phone">Add File</label>
      <div class="input-group control-group increment" >
        <input type="file" name="filename1" class="form-control">
        <div class="input-group-btn"> 
        </div>
      </div>

      <div class="clone hide">
        <div class="control-group input-group" style="margin-top:10px">
          <input type="file" name="filename2" class="form-control">
          <div class="input-group-btn"> 
            <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
          </div>
        </div>
      </div>
      <div class="clone hide">
        <div class="control-group input-group" style="margin-top:10px">
          <input type="file" name="filename3" class="form-control">
          <div class="input-group-btn"> 
            <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
          </div>
        </div>
      </div>
      <div class="clone hide">
        <div class="control-group input-group" style="margin-top:10px">
          <input type="file" name="filename4" class="form-control">
          <div class="input-group-btn"> 
            <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
          </div>
        </div>
      </div>

    <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
</form> 

  <script type="text/javascript">
    $(document).ready(function() {
    
      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });
    
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });
    
    });
    </script>


@endsection