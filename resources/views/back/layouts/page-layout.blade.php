<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('pageTitle')</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.7/dist/tailwind.min.css" />
    <livewire:styles />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <style>
      /* Additional custom styles for the modal */
      .modal {
        display: none;
        background-color: rgba(0, 0, 0, 0.5);
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 9999;
        align-items: center;
        justify-content: center;
      }
    
      .modal-content {
        background-color: #fff;
        max-width: 400px;
        padding: 20px;
        border-radius: 4px;
      }
    </style>

  </head>
  <body class="bg-gray-100">
    <div class="flex h-screen">

      <aside class="fixed left-0 top-0 h-screen bg-gray-700 w-28 sm:w-44">
        <div class="h-auto flex flex-col justify-between">
          <div class="flex items-center justify-center h-16 text-white mb-4 mt-4">
            {{-- <span class="text-lg font-bold"> --}}
              <img src="{{url('/image/darab_logo.png')}}" alt="darab logo" width="120" height="120">
            {{-- </span> --}}
          </div>
           @include('back.layouts.inc.nav')

           <a class="bg-red-500 text-white lg:py-2 lg:px-4 sm:px-1 text-sm mt-40" id="openModal">Logout</a>
          <div class="bg-gray-900 text-white lg:py-2 lg:px-4 sm:px-1 text-sm">
            © DARAB 2023
          </div>
        </div>
      </aside>

      <main class="ml-24 sm:ml-44 flex-1">
        <div class="h-full bg-amber-400 p-10">

          <div class="grid grid-cols-6">
            <div class="col-start-1 col-end-3">
              <h1 class="text-2xl font-bold mb-5">@yield('pagePart')</h1>
            </div>
            <div class="col-end-7 col-span-2 px-7 grid justify-items-end">
              <a href="/profile" class="text-sm sm:text-lg mb-5 px-3 py-1 bg-gray-900 shadow-sm rounded-sm text-white">
                <span class="font-bold">{{ Auth::user()->name }} | </span>
                <span class="text-sm">{{ Auth::user()->type }}</span>
              </a>
            </div>
          </div>

          @yield('content')

        </div>
      </main>
    </div>
    

    

    {{-- LOGOUT MODAL --}}
    <div id="modal" class="modal">
      <div class="modal-content bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-4">Logout Confirmation</h2>
      <p>Are you sure you want to log out?</p>
      <div class="mt-4 flex justify-end">
        <button id="closeModal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Cancel</button>
        <button  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</button>
        <form action="{{ route('logout') }}" id="logout-form" method="POST">@csrf</form>
      </div>
      </div>
    </div>


    <script>
      // TOASTR SCRIPT
      window.addEventListener('showToastr', function(event){
        toastr.remove();
        if(event.detail.type === 'info'){
          toastr.info(event.detail.message);
        } else if(event.detail.type === 'success'){
          toastr.success(event.detail.message);
        } else if(event.detail.type === 'error'){
          toastr.error(event.detail.message);
        } else if(event.detail.type === 'warning'){
          toastr.warning(event.detail.message);
        } else {
          return false;
        }
      });


      // MODAL SCRIPT
      const openModalButton = document.getElementById('openModal');
      const closeModalButton = document.getElementById('closeModal');
      const modal = document.getElementById('modal');

      openModalButton.addEventListener('click', () => {
        modal.style.display = 'flex';
      });

      closeModalButton.addEventListener('click', () => {
        modal.style.display = 'none';
      });
    </script>



    {{-- Bootstrap Scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
    @stack('scripts')
    <livewire:scripts />

  </body>
</html>
