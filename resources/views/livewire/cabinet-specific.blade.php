<div>

    {{-- {!! QrCode::size(118)->backgroundColor(183,244,216)->generate($currenturl) !!} --}}
    <h2>{{ strtoupper($cab_specific) }}</h1>
  <input class="appearance-none border py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-2 w-72" type="text" placeholder="Search" wire:model="search">
  <button class="bg-green-500 px-2 py-2 text-white" wire:click="deleteConfirmation()">Generate QR Code</button>
  <a class="bg-red-500 px-2 py-2 text-white" href="/cabinet">Go back</a>
  <table class="table-auto w-full bg-white">
    <thead>
      <tr class="bg-yellow-200 text-gray-700 text-sm">
        <th class="px-4 py-2">Docket No.</th>
        <th class="px-4 py-2">Cabinet</th>
        <th class="px-4 py-2">Petitioners</th>
        <th class="px-4 py-2">Lessors</th>
        <th class="px-4 py-2">Lessee</th>
        <th class="px-4 py-2">E-Copy</th>
      </tr>
    </thead>
    <tbody class="text-gray-900">
        @foreach ($recs as $record )
      <tr>
        <td class="border px-4 py-2 w-72">{{ $record->docket_number }}</td>
        <td class="border px-4 py-2 w-28">{{ $record->cabinet }}</td>
        <td class="border px-4 py-2 w-45">{{ $record->petitioners }}</td>
        <td class="border px-4 py-2 w-40">{{ $record->lessor }}</td>
        <td class="border px-4 py-2 w-40">{{ $record->lessee }}</td>
        <td class="border px-4 py-2 w-60"><a href="../storage/files/{{ $record->name }}" target="_blank">{{ $record->name }}</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>


 {{-- QR --}}
 <div wire:ignore.self class="modal fade" id="deleteStudentModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-body">
            {!! QrCode::size(320)->backgroundColor(183,244,216)->generate($currenturl) !!}
      </div>
        <h1 class="text-center">{{ strtoupper($cab_specific) }}</h1>
    </div>
  </div>
</div>



</div>

@push('scripts')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#addStudentModal').modal('hide');
            $('#editStudentModal').modal('hide');
            $('#deleteStudentModal').modal('hide');
        });

        window.addEventListener('show-edit-student-modal', event =>{
            $('#editStudentModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteStudentModal').modal('show');
        });

        window.addEventListener('show-view-student-modal', event =>{
            $('#viewStudentModal').modal('show');
        });
    </script>
@endpush


