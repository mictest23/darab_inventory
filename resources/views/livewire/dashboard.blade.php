<div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        <div class="bg-white rounded-lg shadow-lg p-5">
          <h2 class="text-lg font-bold mb-3">Total Cases</h2>
          <p class="text-3xl font-bold">{{ $record }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-5">
          <h2 class="text-lg font-bold mb-3">Cabinets</h2>
          <p class="text-3xl font-bold">{{ $cabinet }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-5">
          <h2 class="text-lg font-bold mb-3">Admins</h2>
          <p class="text-3xl font-bold">{{ $user }}</p>
        </div>
    </div>

    <div class="mt-10">
        <h2 class="text-lg font-bold mb-3">Recently added
          </h2>
        <div class="overflow-x-auto">
          <table class="table-auto w-full bg-white">
            <thead>
              <tr class="bg-yellow-200 text-gray-800">
                <th class="px-4 py-2">Docket number</th>
                <th class="px-4 py-2">Cabinet</th>
                <th class="px-4 py-2">Petitioner</th>
                <th class="px-4 py-2">Lessor</th>
                <th class="px-4 py-2">Lessee</th>
                {{-- <th class="px-4 py-2">Ecopy</th> --}}
              </tr>
            </thead>
            <tbody class="text-gray-900">
            @foreach ($latest as $latests)
              <tr>
                <td class="border px-4 py-2">{{ $latests->docket_number }}</td>
                <td class="border px-4 py-2">{{ $latests->cabinet }}</td>
                <td class="border px-4 py-2">{{ $latests->petitioners }}</td>
                <td class="border px-4 py-2">{{ $latests->lessor }}</td>
                <td class="border px-4 py-2">{{ $latests->lessee }}</td>
                {{-- <td class="border px-4 py-2"> <a href="/storage/files/{{ $latests->name }}">{{ $latests->name }}</a></td> --}}
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
    </div>

</div>
