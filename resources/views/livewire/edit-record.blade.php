<div>
    

    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ml-40 mr-40" method="post" wire:submit.prevent="EditRecord()">
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="full_name">Docket number</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="">
          <p class="text-red-500">@error('docket_number'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="email">Date filed</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" value="">
          <p class="text-red-500">@error('date_filed'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="phone">Cabinet</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="">
          <p class="text-red-500">@error('cabinet'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="message">Nature of case</label>
          <textarea class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" disabled></textarea>
          <p class="text-red-500">@error('nature'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="phone">Petitioner</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="">
          <p class="text-red-500">@error('petitioners'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="phone">Respondent lessor</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="">
          <p class="text-red-500">@error('lessor'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="phone">Respondent lessee</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="">
          <p class="text-red-500">@error('lessee'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="phone">Location</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="">
          <p class="text-red-500">@error('location'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="phone">Date of alhc</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" value="">
          <p class="text-red-500">@error('date_alhc'){{ $message }}@enderror</p>
        </div>
    
        <div class="grid grid-cols-2 gap-8">
            <div class="mb-4">
              <label class="block text-gray-700 font-bold mb-2" for="phone">Area</label>
              <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" value="">
              <p class="text-red-500">@error('area'){{ $message }}@enderror</p>
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 font-bold mb-2" for="phone">Crop</label>
              <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="">
              <p class="text-red-500">@error('crops'){{ $message }}@enderror</p>
            </div>
        </div>
    
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="phone">Counsel</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="tel" value="">
          <p class="text-red-500">@error('counsel'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="phone">E-copy</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" placeholder="Enter your phone number" wire:model="file">
          <p class="text-red-500">@error('file'){{ $message }}@enderror</p>
        </div>
        <div class="flex items-center justify-between">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Save changes
          </button>
        </div>
      </form>


</div>
