

<nav class="flex-1">
    <ul class="space-y-2">
      <li>
        <a href="/dashboard" class="block lg:py-2 lg:px-4 sm:px-1 bg-gray-200 hover:bg-gray-100 text-gray-900 hover:text-gray-800 {{ request()->is('dashboard') ? 'bg-blue-100':'' }}">
          Dashboard
        </a>
      </li>
      <li>
        <a href="/add" class="block lg:py-2 lg:px-4 bg-gray-200 hover:bg-gray-100 text-gray-900 hover:text-gray-800 {{ request()->is('add') ? 'bg-blue-100':'' }}">
          Add Record
        </a>
      </li>
      <li>
        <a href="/view" class="block lg:py-2 lg:px-4 bg-gray-200 hover:bg-gray-100 text-gray-900 hover:text-gray-800 {{ request()->is('view') ? 'bg-blue-100':'' }}">
          View Record
        </a>
      </li>
      <li>
        <a href="/cabinet" class="block lg:py-2 lg:px-4 bg-gray-200 hover:bg-gray-100 text-gray-900 hover:text-gray-800 {{ request()->is('cabinet') ? 'bg-blue-100':'' }}">
          Cabinet
        </a>
      </li>

      @if (Auth::user()->type == 'Super Admin')
      <li>
        <a href="/add-user" class="block lg:py-2 lg:px-4 bg-gray-200 hover:bg-gray-100 text-gray-900 hover:text-gray-800 {{ request()->is('add-user') ? 'bg-blue-100':'' }}">
          Add Admin
        </a>
      </li>
      @elseif (Auth::user()->type == 'Admin')
      <li hidden>
        <a href="/add-user" class="block lg:py-2 lg:px-4 bg-gray-200 hover:bg-gray-100 text-gray-900 hover:text-gray-800 {{ request()->is('add-user') ? 'bg-blue-100':'' }}">
          Add Admin
        </a>
      </li>
      @endif

      <li>
        <a href="https://app.sketchup.com/viewer/3dw?WarehouseModelId=b78e0817-0211-44b5-9728-23d82bae42ab&binaryName=s21&token=v34piEkzrMk=" target="_blank" class="block lg:py-2 lg:px-4 bg-gray-200 hover:bg-gray-100 text-gray-900 hover:text-gray-800 {{ request()->is('model') ? 'bg-blue-100':'' }}">
          Model
        </a>
      </li>
    </ul>
</nav>
