<div>
    
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-20" method="post" wire:submit.prevent="AddAdmin()">
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="full_name">Name</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Juan Dela Cruz" wire:model="fullname">
          <p class="text-red-500 text-sm">@error('fullname'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="full_name">Username</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Juan@123" wire:model="username">
          <p class="text-red-500 text-sm">@error('username'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="full_name">Email</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="juandelacruz@gmail.com" wire:model="email">
          <p class="text-red-500 text-sm">@error('email'){{ $message }}@enderror</p>
        </div>

        <label class="block text-gray-700 font-bold mb-2">Type</label>
        <div class="inline-block w-full mb-4">
          <select class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="type">
            <option value="" selected hidden>Select a type</option>
              <option value="Admin">Admin</option>
              <option value="Super Admin">Super Admin</option>
          </select>
          {{-- <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
              <path d="M10 12l-6-6 1.41-1.41L10 9.17l4.59-4.58L16 6z"/>
            </svg>
          </div> --}}
          <p class="text-red-500 text-sm">@error('type'){{ $message }}@enderror</p>
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="full_name">Password</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" placeholder="************" wire:model="password">
          <p class="text-red-500 text-sm">@error('password'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="full_name">Verify Password</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" placeholder="************" wire:model="password_confirmation">
          <p class="text-red-500 text-sm">@error('password_confirmation'){{ $message }}@enderror</p>
        </div>
        <div class="flex items-center justify-between">
          <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Add Admin
          </button>
        </div>
      </form>


      <input class="appearance-none border py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-2 w-72" type="text" placeholder="Search" wire:model="searchTerm">
      <table class="table-auto w-full bg-white mb-18">
        <thead>
          <tr class="bg-yellow-200 text-gray-700 text-sm">
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Username</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Type</th>
            <th class="px-1 py-2">Actions</th>
          </tr>
        </thead>
        <tbody class="text-gray-900">
            @if(!empty($users))
            @foreach ($users as $user)
          <tr>
            <td class="border px-4 w-72">{{ $user->name }}</td>
            <td class="border px-4 w-28">{{ $user->username }}</td>
            <td class="border px-4 w-70">{{ $user->email }}</td>
            <td class="border px-4 w-45">{{ $user->type }}</td>
            <td class="border text-sm w-20">
                <div class="grid grid-cols-1 p-4">
                
                  {{-- Delete Icon --}}
                  <button wire:click="deleteConfirmation({{ $user->id }})">
                      <svg version="1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" enable-background="new 0 0 48 48">
                        <g fill="#D1C4E9">
                            <path d="M38,7H10C8.9,7,8,7.9,8,9v6c0,1.1,0.9,2,2,2h28c1.1,0,2-0.9,2-2V9C40,7.9,39.1,7,38,7z"/>
                            <path d="M38,19H10c-1.1,0-2,0.9-2,2v6c0,1.1,0.9,2,2,2h28c1.1,0,2-0.9,2-2v-6C40,19.9,39.1,19,38,19z"/>
                            <path d="M38,31H10c-1.1,0-2,0.9-2,2v6c0,1.1,0.9,2,2,2h28c1.1,0,2-0.9,2-2v-6C40,31.9,39.1,31,38,31z"/>
                        </g>
                        <circle fill="#F44336" cx="38" cy="38" r="10"/>
                        <g fill="#fff">
                            <rect x="36.5" y="32" transform="matrix(-.707 .707 -.707 -.707 91.74 38)" width="3" height="12"/>
                            <rect x="36.5" y="32" transform="matrix(-.707 -.707 .707 -.707 38 91.74)" width="3" height="12"/>
                        </g>
                      </svg>
                  </button>

                </div>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
      <div class="mt-8"><p class="text-xs underline">DARAB 2023</p></div>


      {{-- DELETE RECORD --}}
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
                    <h6>Are you sure? You want to delete this user!</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" wire:click="cancel()" data-dismiss="modal" aria-label="Close">Cancel</button>
                    <button class="btn btn-sm btn-danger" wire:click="deleteRecordData()">Yes! Delete</button>
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
