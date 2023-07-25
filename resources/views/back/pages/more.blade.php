
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>More Details | Darab</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.7/dist/tailwind.min.css" />
    <livewire:styles />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  </head>
  <body class="bg-gray-100">
    <div class="flex h-screen">

      <main class="flex-1">
        <div class="content-center bg-amber-400 p-10">
          <h1>{{ $records['docket_number'] }}</h1>

            <livewire:edit-record />

        </div>
      </main>
    </div>
    <livewire:scripts />

    <script>
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






















