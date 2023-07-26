<div>

    {{-- <table class="table">
        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($records as $key => $value)
          <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->filename }}</td>
            <td>
                @foreach (json_decode($value->filename) as $test)
                <a href="files/{{ $test }}">{{ $test }}</a>
              @endforeach
            </td>
          </tr>
        @endforeach
        </tbody>
    </table> --}}


    <input class="appearance-none border py-2 px-3 text-gray-700 leading-tight focus:outline-none mb-2 w-72" type="text" placeholder="Search" wire:model="searchTerm">
    <table class="table-auto w-full bg-white">
        <thead>
          <tr class="bg-yellow-200 text-gray-700 text-sm">
            <th class="px-4 py-2">Docket No.</th>
            <th class="px-4 py-2">Cabinet</th>
            <th class="px-4 py-2">Nature of case</th>
            <th class="px-4 py-2">Petitioners</th>
            <th class="px-4 py-2">Lessors</th>
            <th class="px-4 py-2">Lessee</th>
            <th class="px-4 py-2">Location</th>
            <th class="px-4 py-2">E-Copy</th>
            <th class="px-4 py-2">Actions</th>
          </tr>
        </thead>
        <tbody class="text-gray-900">
            @if(!empty($records))
            @foreach ($records as $key => $value)
          <tr>
            <td class="border px-4 py-2 w-72">{{ $value->docket_number }}</td>
            <td class="border px-4 py-2 w-28">{{ $value->cabinet }}</td>
            <td class="border px-4 py-2 w-70">{{ $value->nature }}</td>
            <td class="border px-4 py-2 w-45">{{ $value->petitioners }}</td>
            <td class="border px-4 py-2 w-40">{{ $value->lessor }}</td>
            <td class="border px-4 py-2 w-40">{{ $value->lessee }}</td>
            <td class="border px-4 py-2 w-40">{{ $value->location }}</td>

            <td class="border px-4 py-2 w-60">
              @foreach ($value->file as $result)
                <a href="files/{{ $result->filenamed }}">{{ $result->filenamed }}</a><br>
              @endforeach
            </td>

            <td class="border py-2 text-sm w-20">
                <div class="grid grid-cols-3 p-2">
                    
                   {{-- View Icon --}}
                  <button wire:click="viewRecordDetails({{ $value->id }})">
                  <svg version="1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" enable-background="new 0 0 48 48">
                    <rect x="7" y="4" fill="#BBDEFB" width="40" height="40"/>
                    <g fill="#2196F3">
                        <rect x="13" y="26" width="4" height="4"/>
                        <rect x="13" y="18" width="4" height="4"/>
                        <rect x="13" y="34" width="4" height="4"/>
                        <rect x="13" y="10" width="4" height="4"/>
                        <rect x="21" y="26" width="14" height="4"/>
                        <rect x="21" y="18" width="14" height="4"/>
                        <rect x="21" y="34" width="14" height="4"/>
                        <rect x="21" y="10" width="14" height="4"/>
                    </g>
                  </svg>
                  </button>

                  {{-- Edit Icon Original --}}
                  {{-- <button wire:click="editRecords({{ $value->id }})">
                      <svg width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M33 3H11C8.23858 3 6 5.23858 6 8V40C6 42.7614 8.23858 45 11 45H33C35.7614 45 38 42.7614 38 40V8C38 5.23858 35.7614 3 33 3Z" fill="#EAEFF0"/>
                        <path d="M7.285 4.686C6.46181 5.59389 6.00403 6.77449 6 8V40C6.00159 41.3256 6.52888 42.5964 7.46622 43.5338C8.40356 44.4711 9.6744 44.9984 11 45H33C33.7033 44.9979 34.3981 44.8465 35.0385 44.5558C35.6789 44.2652 36.2503 43.8419 36.715 43.314L7.285 4.686Z" fill="#CDD3D3"/>
                        <path d="M33 12C33 11.7348 32.8946 11.4804 32.7071 11.2929C32.5196 11.1054 32.2652 11 32 11H15C14.7348 11 14.4804 11.1054 14.2929 11.2929C14.1054 11.4804 14 11.7348 14 12C14 12.2652 14.1054 12.5196 14.2929 12.7071C14.4804 12.8946 14.7348 13 15 13H32C32.2652 13 32.5196 12.8946 32.7071 12.7071C32.8946 12.5196 33 12.2652 33 12Z" fill="#8FA5A5"/>
                        <path d="M31.13 18C31.13 17.7348 31.0246 17.4804 30.8371 17.2929C30.6496 17.1054 30.3952 17 30.13 17H12C11.7348 17 11.4804 17.1054 11.2929 17.2929C11.1054 17.4804 11 17.7348 11 18C11 18.2652 11.1054 18.5196 11.2929 18.7071C11.4804 18.8946 11.7348 19 12 19H30.13C30.3952 19 30.6496 18.8946 30.8371 18.7071C31.0246 18.5196 31.13 18.2652 31.13 18Z" fill="#8FA5A5"/>
                        <path d="M16.667 17H12C11.7348 17 11.4804 17.1054 11.2929 17.2929C11.1054 17.4804 11 17.7348 11 18C11 18.2652 11.1054 18.5196 11.2929 18.7071C11.4804 18.8946 11.7348 19 12 19H18.19L16.667 17Z" fill="#7B8E8D"/>
                        <path d="M27.67 24C27.67 23.7348 27.5646 23.4804 27.3771 23.2929C27.1896 23.1054 26.9352 23 26.67 23H12C11.7348 23 11.4804 23.1054 11.2929 23.2929C11.1054 23.4804 11 23.7348 11 24C11 24.2652 11.1054 24.5196 11.2929 24.7071C11.4804 24.8946 11.7348 25 12 25H26.67C26.9352 25 27.1896 24.8946 27.3771 24.7071C27.5646 24.5196 27.67 24.2652 27.67 24Z" fill="#8FA5A5"/>
                        <path d="M21.238 23H12C11.7348 23 11.4804 23.1054 11.2929 23.2929C11.1054 23.4804 11 23.7348 11 24C11 24.2652 11.1054 24.5196 11.2929 24.7071C11.4804 24.8946 11.7348 25 12 25H22.762L21.238 23Z" fill="#7B8E8D"/>
                        <path d="M24.21 30C24.21 29.7348 24.1046 29.4804 23.9171 29.2929C23.7296 29.1054 23.4752 29 23.21 29H12C11.7348 29 11.4804 29.1054 11.2929 29.2929C11.1054 29.4804 11 29.7348 11 30C11 30.2652 11.1054 30.5196 11.2929 30.7071C11.4804 30.8946 11.7348 31 12 31H23.21C23.4752 31 23.7296 30.8946 23.9171 30.7071C24.1046 30.5196 24.21 30.2652 24.21 30Z" fill="#7B8E8D"/>
                        <path d="M12 35C11.7348 35 11.4804 35.1054 11.2929 35.2929C11.1054 35.4804 11 35.7348 11 36C11 36.2652 11.1054 36.5196 11.2929 36.7071C11.4804 36.8946 11.7348 37 12 37H22.08C22.3452 37 22.5996 36.8946 22.7871 36.7071C22.9746 36.5196 23.08 36.2652 23.08 36C23.08 35.7348 22.9746 35.4804 22.7871 35.2929C22.5996 35.1054 22.3452 35 22.08 35H12Z" fill="#7B8E8D"/>
                        <path d="M27.069 38.318C26.7949 38.3169 26.5239 38.2602 26.2724 38.1512C26.0209 38.0422 25.7942 37.8833 25.606 37.684C25.4196 37.4867 25.2758 37.2531 25.1836 36.9978C25.0914 36.7425 25.0527 36.4709 25.07 36.2L25.229 33.559C25.2762 32.7844 25.5025 32.0313 25.89 31.359L37.535 11.183C37.7318 10.8414 37.994 10.5419 38.3067 10.3018C38.6193 10.0616 38.9762 9.88536 39.357 9.7832C39.7378 9.68104 40.135 9.65493 40.5258 9.70637C40.9167 9.75782 41.2936 9.8858 41.635 10.083L42.501 10.583C42.8426 10.7798 43.1421 11.042 43.3822 11.3547C43.6224 11.6673 43.7986 12.0242 43.9008 12.405C44.003 12.7858 44.0291 13.183 43.9776 13.5738C43.9262 13.9647 43.7982 14.3416 43.601 14.683L31.952 34.854C31.5631 35.5257 31.024 36.0983 30.377 36.527L28.169 37.985C27.843 38.2016 27.4604 38.3174 27.069 38.318Z" fill="#009AE0"/>
                        <path d="M27.069 38.318C27.4604 38.3174 27.843 38.2016 28.169 37.985L30.377 36.527C31.024 36.0983 31.5631 35.5257 31.952 34.854L43.6 14.684C43.7972 14.3426 43.9252 13.9657 43.9766 13.5748C44.0281 13.184 44.002 12.7868 43.8998 12.406C43.7976 12.0252 43.6214 11.6683 43.3812 11.3557C43.1411 11.0431 42.8416 10.7808 42.5 10.584L42.111 10.359L26.117 38.059C26.4076 38.2238 26.735 38.3128 27.069 38.318V38.318Z" fill="#0081BD"/>
                        <path d="M42.5 10.585L41.634 10.085C41.2926 9.88778 40.9157 9.7598 40.5248 9.70836C40.134 9.65691 39.7368 9.68302 39.356 9.78518C38.9752 9.88734 38.6183 10.0636 38.3057 10.3037C37.9931 10.5439 37.7308 10.8434 37.534 11.185L36.085 13.7L42.147 17.2L43.597 14.689C43.7942 14.3476 43.9222 13.9707 43.9736 13.5798C44.0251 13.189 43.999 12.7918 43.8968 12.411C43.7946 12.0302 43.6184 11.6733 43.3782 11.3607C43.1381 11.048 42.8386 10.7858 42.497 10.589L42.5 10.585Z" fill="#0081BD"/>
                        <path d="M42.147 17.2L43.597 14.689C43.7942 14.3476 43.9222 13.9707 43.9736 13.5799C44.0251 13.189 43.999 12.7918 43.8968 12.411C43.7946 12.0302 43.6184 11.6733 43.3782 11.3607C43.1381 11.0481 42.8386 10.7858 42.497 10.589L42.108 10.364L39.16 15.471L42.147 17.2Z" fill="#00739B"/>
                        <path d="M36.5352 12.9153L35.5352 14.6473L41.5975 18.1471L42.5975 16.415L36.5352 12.9153Z" fill="#EAEFF0"/>
                        <path d="M39.6104 14.6909L38.6104 16.4229L41.5973 18.1474L42.5973 16.4154L39.6104 14.6909Z" fill="#CDD3D3"/>
                      </svg>
                  </button> --}}

                  <button><a href="/update/{{ $value->id }}">
                    <svg width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M33 3H11C8.23858 3 6 5.23858 6 8V40C6 42.7614 8.23858 45 11 45H33C35.7614 45 38 42.7614 38 40V8C38 5.23858 35.7614 3 33 3Z" fill="#EAEFF0"/>
                      <path d="M7.285 4.686C6.46181 5.59389 6.00403 6.77449 6 8V40C6.00159 41.3256 6.52888 42.5964 7.46622 43.5338C8.40356 44.4711 9.6744 44.9984 11 45H33C33.7033 44.9979 34.3981 44.8465 35.0385 44.5558C35.6789 44.2652 36.2503 43.8419 36.715 43.314L7.285 4.686Z" fill="#CDD3D3"/>
                      <path d="M33 12C33 11.7348 32.8946 11.4804 32.7071 11.2929C32.5196 11.1054 32.2652 11 32 11H15C14.7348 11 14.4804 11.1054 14.2929 11.2929C14.1054 11.4804 14 11.7348 14 12C14 12.2652 14.1054 12.5196 14.2929 12.7071C14.4804 12.8946 14.7348 13 15 13H32C32.2652 13 32.5196 12.8946 32.7071 12.7071C32.8946 12.5196 33 12.2652 33 12Z" fill="#8FA5A5"/>
                      <path d="M31.13 18C31.13 17.7348 31.0246 17.4804 30.8371 17.2929C30.6496 17.1054 30.3952 17 30.13 17H12C11.7348 17 11.4804 17.1054 11.2929 17.2929C11.1054 17.4804 11 17.7348 11 18C11 18.2652 11.1054 18.5196 11.2929 18.7071C11.4804 18.8946 11.7348 19 12 19H30.13C30.3952 19 30.6496 18.8946 30.8371 18.7071C31.0246 18.5196 31.13 18.2652 31.13 18Z" fill="#8FA5A5"/>
                      <path d="M16.667 17H12C11.7348 17 11.4804 17.1054 11.2929 17.2929C11.1054 17.4804 11 17.7348 11 18C11 18.2652 11.1054 18.5196 11.2929 18.7071C11.4804 18.8946 11.7348 19 12 19H18.19L16.667 17Z" fill="#7B8E8D"/>
                      <path d="M27.67 24C27.67 23.7348 27.5646 23.4804 27.3771 23.2929C27.1896 23.1054 26.9352 23 26.67 23H12C11.7348 23 11.4804 23.1054 11.2929 23.2929C11.1054 23.4804 11 23.7348 11 24C11 24.2652 11.1054 24.5196 11.2929 24.7071C11.4804 24.8946 11.7348 25 12 25H26.67C26.9352 25 27.1896 24.8946 27.3771 24.7071C27.5646 24.5196 27.67 24.2652 27.67 24Z" fill="#8FA5A5"/>
                      <path d="M21.238 23H12C11.7348 23 11.4804 23.1054 11.2929 23.2929C11.1054 23.4804 11 23.7348 11 24C11 24.2652 11.1054 24.5196 11.2929 24.7071C11.4804 24.8946 11.7348 25 12 25H22.762L21.238 23Z" fill="#7B8E8D"/>
                      <path d="M24.21 30C24.21 29.7348 24.1046 29.4804 23.9171 29.2929C23.7296 29.1054 23.4752 29 23.21 29H12C11.7348 29 11.4804 29.1054 11.2929 29.2929C11.1054 29.4804 11 29.7348 11 30C11 30.2652 11.1054 30.5196 11.2929 30.7071C11.4804 30.8946 11.7348 31 12 31H23.21C23.4752 31 23.7296 30.8946 23.9171 30.7071C24.1046 30.5196 24.21 30.2652 24.21 30Z" fill="#7B8E8D"/>
                      <path d="M12 35C11.7348 35 11.4804 35.1054 11.2929 35.2929C11.1054 35.4804 11 35.7348 11 36C11 36.2652 11.1054 36.5196 11.2929 36.7071C11.4804 36.8946 11.7348 37 12 37H22.08C22.3452 37 22.5996 36.8946 22.7871 36.7071C22.9746 36.5196 23.08 36.2652 23.08 36C23.08 35.7348 22.9746 35.4804 22.7871 35.2929C22.5996 35.1054 22.3452 35 22.08 35H12Z" fill="#7B8E8D"/>
                      <path d="M27.069 38.318C26.7949 38.3169 26.5239 38.2602 26.2724 38.1512C26.0209 38.0422 25.7942 37.8833 25.606 37.684C25.4196 37.4867 25.2758 37.2531 25.1836 36.9978C25.0914 36.7425 25.0527 36.4709 25.07 36.2L25.229 33.559C25.2762 32.7844 25.5025 32.0313 25.89 31.359L37.535 11.183C37.7318 10.8414 37.994 10.5419 38.3067 10.3018C38.6193 10.0616 38.9762 9.88536 39.357 9.7832C39.7378 9.68104 40.135 9.65493 40.5258 9.70637C40.9167 9.75782 41.2936 9.8858 41.635 10.083L42.501 10.583C42.8426 10.7798 43.1421 11.042 43.3822 11.3547C43.6224 11.6673 43.7986 12.0242 43.9008 12.405C44.003 12.7858 44.0291 13.183 43.9776 13.5738C43.9262 13.9647 43.7982 14.3416 43.601 14.683L31.952 34.854C31.5631 35.5257 31.024 36.0983 30.377 36.527L28.169 37.985C27.843 38.2016 27.4604 38.3174 27.069 38.318Z" fill="#009AE0"/>
                      <path d="M27.069 38.318C27.4604 38.3174 27.843 38.2016 28.169 37.985L30.377 36.527C31.024 36.0983 31.5631 35.5257 31.952 34.854L43.6 14.684C43.7972 14.3426 43.9252 13.9657 43.9766 13.5748C44.0281 13.184 44.002 12.7868 43.8998 12.406C43.7976 12.0252 43.6214 11.6683 43.3812 11.3557C43.1411 11.0431 42.8416 10.7808 42.5 10.584L42.111 10.359L26.117 38.059C26.4076 38.2238 26.735 38.3128 27.069 38.318V38.318Z" fill="#0081BD"/>
                      <path d="M42.5 10.585L41.634 10.085C41.2926 9.88778 40.9157 9.7598 40.5248 9.70836C40.134 9.65691 39.7368 9.68302 39.356 9.78518C38.9752 9.88734 38.6183 10.0636 38.3057 10.3037C37.9931 10.5439 37.7308 10.8434 37.534 11.185L36.085 13.7L42.147 17.2L43.597 14.689C43.7942 14.3476 43.9222 13.9707 43.9736 13.5798C44.0251 13.189 43.999 12.7918 43.8968 12.411C43.7946 12.0302 43.6184 11.6733 43.3782 11.3607C43.1381 11.048 42.8386 10.7858 42.497 10.589L42.5 10.585Z" fill="#0081BD"/>
                      <path d="M42.147 17.2L43.597 14.689C43.7942 14.3476 43.9222 13.9707 43.9736 13.5799C44.0251 13.189 43.999 12.7918 43.8968 12.411C43.7946 12.0302 43.6184 11.6733 43.3782 11.3607C43.1381 11.0481 42.8386 10.7858 42.497 10.589L42.108 10.364L39.16 15.471L42.147 17.2Z" fill="#00739B"/>
                      <path d="M36.5352 12.9153L35.5352 14.6473L41.5975 18.1471L42.5975 16.415L36.5352 12.9153Z" fill="#EAEFF0"/>
                      <path d="M39.6104 14.6909L38.6104 16.4229L41.5973 18.1474L42.5973 16.4154L39.6104 14.6909Z" fill="#CDD3D3"/>
                    </svg>
                  </a></button>


                  {{-- Delete Icon --}}
                  <button wire:click="deleteConfirmation({{ $value->id }})">
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
      {{ $records->links() }}
      {{-- {{ $records->links('livewire::simple-bootstrap') }} --}}






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
                    <h6>Are you sure? You want to delete this record!</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" wire:click="cancel()" data-dismiss="modal" aria-label="Close">Cancel</button>
                    <button class="btn btn-sm btn-danger" wire:click="deleteRecordData()">Yes! Delete</button>
                </div>
            </div>
        </div>
      </div>



      {{-- VIEW RECORD --}}
    <div wire:ignore.self class="modal fade" id="viewStudentModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content" style="max-width: 800px;">
              <div class="modal-header">
                  <h5 class="modal-title text-2xl">View Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeViewStudentModal">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <table class="table table-bordered">
                      <tbody>
                          <tr>
                              <th class="bg-yellow-100">Docket Number</th>
                              <td>{{ $view_record_docket_number }}</td>
                          </tr>

                          <tr>
                              <th class="bg-yellow-100">Date Filed</th>
                              <td>{{ $view_record_date_filed }}</td>
                          </tr>

                          <tr>
                              <th class="bg-yellow-100">Cabinet</th>
                              <td>{{ $view_record_cabinet }}</td>
                          </tr>

                          <tr>
                              <th class="bg-yellow-100">Nature of case </th>
                              <td>{{ $view_record_nature }}</td>
                          </tr>

                          <tr>
                            <th class="bg-yellow-100">Petitioners </th>
                            <td>{{ $view_record_petitioners }}</td>
                          </tr>

                          <tr>
                            <th class="bg-yellow-100">Lessor </th>
                            <td>{{ $view_record_lessor }}</td>
                          </tr>

                          <tr>
                            <th class="bg-yellow-100">Lessee </th>
                            <td>{{ $view_record_lessee }}</td>
                          </tr>

                          <tr>
                            <th class="bg-yellow-100">Date ALHC </th>
                            <td>{{ $view_record_date_alhc }}</td>
                          </tr>

                          <tr>
                            <th class="bg-yellow-100">Area </th>
                            <td>{{ $view_record_area }}</td>
                          </tr>

                          <tr>
                            <th class="bg-yellow-100">Crops </th>
                            <td>{{ $view_record_crops }}</td>
                          </tr>

                          <tr>
                            <th class="bg-yellow-100">Counsel </th>
                            <td>{{ $view_record_counsel }}</td>
                          </tr>

                          <tr>
                            <th class="bg-yellow-100">E-copy</th>
                            <td>{{ $view_record_name }}</td>
                          </tr>
                        
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
    </div>




    {{-- EDIT RECORD --}}
    <div wire:ignore.self class="modal fade" id="editStudentModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content" style="max-width: 800px;">
              <div class="modal-header">
                  <h5 class="modal-title text-2xl">Edit Record</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form wire:submit.prevent="editRecordData" enctype="multipart/form-data">
                      <div class="form-group row">
                          <label for="student_id" class="col-3">Docket Number</label>
                          <div class="col-9">
                              <input type="text" id="student_id" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="docket_number">
                              @error('docket_number')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="name" class="col-3">Date Filed</label>
                          <div class="col-9">
                              <input type="date" id="name" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="date_filed">
                              @error('date_filed')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="email" class="col-3">Cabinet</label>
                          <div class="col-9">

                              {{-- <input type="text" id="email" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="cabinet"> --}}
                              <select class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="cabinet">
                                @foreach ($cab_edit as $cab_edits)
                                <option value="" selected hidden>Select a cabinet</option>
                                <optgroup label="Cab {{ $cab_edits->cab_number }}">
                                  <option value="Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row1 }}" @if (empty( $cab_edits->row1 ))disabled hidden @endif >Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row1 }}</option>
                                  <option value="Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row2 }}" @if (empty( $cab_edits->row2 ))disabled hidden @endif >Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row2 }}</option>
                                  <option value="Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row3 }}" @if (empty( $cab_edits->row3 ))disabled hidden @endif >Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row3 }}</option>
                                  <option value="Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row4 }}" @if (empty( $cab_edits->row4 ))disabled hidden @endif >Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row4 }}</option>
                                  <option value="Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row5 }}" @if (empty( $cab_edits->row5 ))disabled hidden @endif >Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row5 }}</option>
                                  <option value="Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row6 }}" @if (empty( $cab_edits->row6 ))disabled hidden @endif >Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row6 }}</option>
                                  <option value="Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row7 }}" @if (empty( $cab_edits->row7 ))disabled hidden @endif >Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row7 }}</option>
                                  <option value="Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row8 }}" @if (empty( $cab_edits->row8 ))disabled hidden @endif >Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row8 }}</option>
                                  <option value="Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row9 }}" @if (empty( $cab_edits->row9 ))disabled hidden @endif >Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row9 }}</option>
                                  <option value="Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row10 }}" @if (empty( $cab_edits->row10 ))disabled hidden @endif >Cab {{ $cab_edits->cab_number }}-{{ $cab_edits->row10 }}</option>
                                </optgroup>
                                @endforeach
                              </select>
                              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-700">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                  <path d="M10 12l-6-6 1.41-1.41L10 9.17l4.59-4.58L16 6z"/>
                                </svg>
                              </div>


                              @error('cabinet')<span class="text-danger">{{ $message }}</span>@enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="phone" class="col-3">Nature</label>
                          <div class="col-9">
                              <textarea class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="" id="" cols="30" rows="10" wire:model="nature"></textarea>
                              @error('nature')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                        <label for="phone" class="col-3">Petitioners</label>
                        <div class="col-9">
                            <input type="text" id="phone" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="petitioners">
                            @error('petitioners')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="phone" class="col-3">Lessor</label>
                        <div class="col-9">
                            <input type="text" id="phone" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="lessor">
                            @error('lessor')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="phone" class="col-3">Lessee</label>
                        <div class="col-9">
                            <input type="text" id="phone" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="lessee">
                            @error('lessee')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="phone" class="col-3">Location</label>
                        <div class="col-9">
                            <input type="text" id="phone" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="location">
                            @error('location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="phone" class="col-3">Date ALHC</label>
                        <div class="col-9">
                            <input type="date" id="phone" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="date_alhc">
                            @error('date_alhc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="phone" class="col-3">Area</label>
                        <div class="col-9">
                            <input type="number" id="phone" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="area">
                            @error('area')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="phone" class="col-3">Crops</label>
                        <div class="col-9">
                            <input type="text" id="phone" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="crops">
                            @error('crops')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="phone" class="col-3">Counsel</label>
                        <div class="col-9">
                            <input type="text" id="phone" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="counsel">
                            @error('counsel')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="phone" class="col-3">E-copy</label>
                        <div class="col-9">
                            {{-- <input type="text" id="phone" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="name"> --}}
                            {{-- <input type="file" id="phone" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Filename</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rec as $recs)
                                      <tr>
                                        <td>{{ $recs->filename }}</td>
                                      </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <div class="input-group control-group increment" >
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
                              </div>

                        </div>
                      </div>

                      <div class="form-group row">
                          <label for="" class="col-3"></label>
                          <div class="col-9">
                              <button type="submit" class="py-2 px-4 bg-green-400 text-white">Save Changes</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>

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

