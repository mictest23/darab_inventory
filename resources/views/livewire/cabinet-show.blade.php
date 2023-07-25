<div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4">
    @foreach ($cabinet as $cabinets)
        <div class="bg-white shadow-lg rounded-lg p-4">
            <div class="grid grid-cols-2 gap-3">
                <button class="text-sm text-black px-2 bg-blue-200" wire:click="editCabinet({{ $cabinets->id }})">update</button>
                <button class="text-sm text-black px-2 bg-red-200" wire:click="deleteConfirmation({{ $cabinets->id }})">delete</button>
            </div>
            
          <h2 class="text-xl font-bold text-gray-800">Cab {{ ucwords($cabinets->cab_number) }}</h2>
          <div>

            <button @if (empty($cabinets->row1))hidden @endif class="w-full bg-gray-100 hover:bg-gray-300 mb-1" wire:click="viewSpecific({{ $cabinets->cab_number }},'{{$cabinets->row1}}', {{$cabinets->id}})">
                <h1 class="text-lg">{{  ucwords($cabinets->row1) }}</h1>
            </button>

            <button @if (empty($cabinets->row2))hidden @endif class="w-full bg-gray-100 hover:bg-gray-300 mb-1" wire:click="viewSpecific({{ $cabinets->cab_number }},'{{$cabinets->row2}}', {{$cabinets->id}})">
                <h1 class="text-lg">{{  ucwords($cabinets->row2) }}</h1>
            </button>

            <button @if (empty($cabinets->row3))hidden @endif class="w-full bg-gray-100 hover:bg-gray-300 mb-1" wire:click="viewSpecific({{ $cabinets->cab_number }},'{{$cabinets->row3}}', {{$cabinets->id}})">
                <h1 class="text-lg">{{  ucwords($cabinets->row3) }}</h1>
            </button>

            <button @if (empty($cabinets->row4))hidden @endif class="w-full bg-gray-100 hover:bg-gray-300 mb-1" wire:click="viewSpecific({{ $cabinets->cab_number }},'{{$cabinets->row4}}', {{$cabinets->id}})">
                <h1 class="text-lg">{{  ucwords($cabinets->row4) }}</h1>
            </button>

            <button @if (empty($cabinets->row5))hidden @endif class="w-full bg-gray-100 hover:bg-gray-300 mb-1" wire:click="viewSpecific({{ $cabinets->cab_number }},'{{$cabinets->row5}}', {{$cabinets->id}})">
                <h1 class="text-lg">{{  ucwords($cabinets->row5) }}</h1>
            </button>

            <button @if (empty($cabinets->row6))hidden @endif class="w-full bg-gray-100 hover:bg-gray-300 mb-1" wire:click="viewSpecific({{ $cabinets->cab_number }},'{{$cabinets->row6}}', {{$cabinets->id}})">
                <h1 class="text-lg">{{  ucwords($cabinets->row6) }}</h1>
            </button>

            <button @if (empty($cabinets->row7))hidden @endif class="w-full bg-gray-100 hover:bg-gray-300 mb-1" wire:click="viewSpecific({{ $cabinets->cab_number }},'{{$cabinets->row7}}', {{$cabinets->id}})">
                <h1 class="text-lg">{{  ucwords($cabinets->row7) }}</h1>
            </button>

            <button @if (empty($cabinets->row8))hidden @endif class="w-full bg-gray-100 hover:bg-gray-300 mb-1" wire:click="viewSpecific({{ $cabinets->cab_number }},'{{$cabinets->row8}}', {{$cabinets->id}})">
                <h1 class="text-lg">{{  ucwords($cabinets->row8) }}</h1>
            </button>

            <button @if (empty($cabinets->row9))hidden @endif class="w-full bg-gray-100 hover:bg-gray-300 mb-1" wire:click="viewSpecific({{ $cabinets->cab_number }},'{{$cabinets->row9}}', {{$cabinets->id}})">
                <h1 class="text-lg">{{  ucwords($cabinets->row9) }}</h1>
            </button>

            <button @if (empty($cabinets->row10))hidden @endif class="w-full bg-gray-100 hover:bg-gray-300 mb-1" wire:click="viewSpecific({{ $cabinets->cab_number }},'{{$cabinets->row10}}', {{$cabinets->id}})">
                <h1 class="text-lg">{{  ucwords($cabinets->row10) }}</h1>
            </button>
          </div>
        </div>
    @endforeach
    </div>



    {{-- DELETE TABLE --}}
    <div wire:ignore.self class="modal fade" id="deleteStudentModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>Are you sure you want to delete this cabinet?<br><br> deleting this cabinet means you need to update all the records assigned to this cabinet! you can update the cabs assigned at the View record tab.</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" wire:click="cancel()" data-dismiss="modal" aria-label="Close">Cancel</button>
                    <button class="btn btn-sm btn-danger" wire:click="deleteCabinet()">Yes! Delete</button>
                </div>
            </div>
        </div>
    </div>





    {{-- EDIT CABINET --}}
    <div wire:ignore.self class="modal fade" id="editStudentModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="max-width: 800px;">
                <div class="modal-header">
                    <h5 class="modal-title text-2xl">Edit Cabinet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    

                    <form class="p-6" method="post" wire:submit.prevent="EditCabinetData()">
                        <div class="mb-2">
                          <label class="block text-gray-700 text-sm font-bold mb-2">Cabinet Number</label>
                          <input type="text" placeholder="Just input the number" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 w-full" wire:model="cab_number">
                          <p class="text-red-500 text-sm">@error('cab_number'){{ $message }}@enderror</p>
                        </div>
                
                        <ul class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600 grid grid-cols-2">
                                <div class="flex items-center pl-3">
                                    <input id="vue-checkbox" type="radio" value="a" wire:model="row1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="vue-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Row 1 | A</label>
                                </div>
                                <div class="flex items-center pl-3">
                                    <input id="vue-checkbox" type="radio" value="" wire:model="row1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="vue-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remove Row</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600 grid grid-cols-2">
                                <div class="flex items-center pl-3">
                                    <input id="react-checkbox" type="radio" value="b" wire:model="row2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="react-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Row 2 | B</label>
                                </div>
                                <div class="flex items-center pl-3">
                                    <input id="vue-checkbox" type="radio" value="" wire:model="row2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="vue-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remove Row</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600 grid grid-cols-2">
                                <div class="flex items-center pl-3">
                                    <input id="angular-checkbox" type="radio" value="c" wire:model="row3" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="angular-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Row 3 | C</label>
                                </div>
                                <div class="flex items-center pl-3">
                                    <input id="vue-checkbox" type="radio" value="" wire:model="row3" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="vue-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remove Row</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600 grid grid-cols-2">
                                <div class="flex items-center pl-3">
                                    <input id="laravel-checkbox" type="radio" value="d" wire:model="row4" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="laravel-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Row 4 | D</label>
                                </div>
                                <div class="flex items-center pl-3">
                                    <input id="vue-checkbox" type="radio" value="" wire:model="row4" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="vue-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remove Row</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600 grid grid-cols-2">
                                <div class="flex items-center pl-3">
                                    <input id="laravel-checkbox" type="radio" value="e" wire:model="row5" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="laravel-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Row 5 | E</label>
                                </div>
                                <div class="flex items-center pl-3">
                                    <input id="vue-checkbox" type="radio" value="" wire:model="row5" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="vue-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remove Row</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600 grid grid-cols-2">
                                <div class="flex items-center pl-3">
                                    <input id="laravel-checkbox" type="radio" value="f" wire:model="row6" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="laravel-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Row 6 | F</label>
                                </div>
                                <div class="flex items-center pl-3">
                                    <input id="vue-checkbox" type="radio" value="" wire:model="row6" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="vue-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remove Row</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600 grid grid-cols-2">
                                <div class="flex items-center pl-3">
                                    <input id="laravel-checkbox" type="radio" value="g" wire:model="row7" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="laravel-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Row 7 | G</label>
                                </div>
                                <div class="flex items-center pl-3">
                                    <input id="vue-checkbox" type="radio" value="" wire:model="row7" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="vue-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remove Row</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600 grid grid-cols-2">
                                <div class="flex items-center pl-3">
                                    <input id="laravel-checkbox" type="radio" value="h" wire:model="row8" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="laravel-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Row 8 | H</label>
                                </div>
                                <div class="flex items-center pl-3">
                                    <input id="vue-checkbox" type="radio" value="" wire:model="row8" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="vue-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remove Row</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600 grid grid-cols-2">
                                <div class="flex items-center pl-3">
                                    <input id="laravel-checkbox" type="radio" value="i" wire:model="row9" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="laravel-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Row 9 | I</label>
                                </div>
                                <div class="flex items-center pl-3">
                                    <input id="laravel-checkbox" type="radio" value="" wire:model="row9" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="laravel-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remove Row</label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600 grid grid-cols-2">
                                <div class="flex items-center pl-3">
                                    <input id="laravel-checkbox" type="radio" value="j" wire:model="row10" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="laravel-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Row 10 | J</label>
                                </div>
                                <div class="flex items-center pl-3">
                                    <input id="laravel-checkbox" type="radio" value="" wire:model="row10" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="laravel-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remove Row</label>
                                </div>
                            </li>
                        </ul>
                
                        <div class="flex">
                          <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Save changes
                          </button>
                        </div>
                    </form>


                </div>
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
