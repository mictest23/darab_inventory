<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Cabinet Add | Darab</title>
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

    <livewire:cabinet-add-form />

    {{-- Bootstrap Scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
    @stack('scripts')
    <livewire:scripts />

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
    </script>

  </body>
</html>
