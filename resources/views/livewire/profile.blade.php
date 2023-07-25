<div>
    
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" wire:submit.prevent="updateProfile()">
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
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="full_name">New password</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" placeholder="************" wire:model="password">
          <p class="text-red-500 text-sm">@error('password'){{ $message }}@enderror</p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2" for="full_name">Verify new password</label>
          <input class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" placeholder="************" wire:model="password_confirmation">
          <p class="text-red-500 text-sm">@error('password_confirmation'){{ $message }}@enderror</p>
        </div>
        <div class="flex items-center justify-between">
          <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Save changes
          </button>
        </div>
      </form>

</div>
