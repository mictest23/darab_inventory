@extends('back.layouts.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Update Record | Darab')
@section('pagePart', isset($pagePart) ? $pagePart : 'Update Record')
@section('content')


<a href="/view">Go back</a>

<form method="post" action="" enctype="multipart/form-data">
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
                  <td class="border px-4 py-2"><a href="/{{ $files->id }}">delete</a></td>
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