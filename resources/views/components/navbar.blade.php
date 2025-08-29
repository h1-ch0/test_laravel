
<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/lists" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="https://www.svgrepo.com/show/117100/letter-n.svg" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Clone</span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>

    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <x-navbar-link href="/"      :active="request()->is('/')">Home</x-navbar-link>
        {{-- <x-navbar-link href="/lists" :active="request()->is('lists')">Lists</x-navbar-link> --}}
        <x-navbar-link href="/posts" :active="request()->is('posts')">Posts</x-navbar-link>
        {{-- <x-navbar-link href="/streams" :active="request()->is('/streams')">Videos</x-navbar-link> --}}
        <x-navbar-link href="/admin" :active="request()->is('/admin')">Admin</x-navbar-link>

        @guest
        <x-navbar-link href="{{ route('register') }}" :active="request()->is('register')">Register</x-navbar-link>
        <x-navbar-link href="{{ route('login') }}" :active="request()->is('login')">Login</x-navbar-link>
        
        @endguest
        
        @auth
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-navbar-link href="" :active="false" onclick="event.preventDefault(); this.closest('form').submit();">Logout ({{ explode('@',auth()->user()->email)[0] }})</x-navbar-link>
        </form>

        @endauth
          
        

      </ul>
    </div>
  </div>
</nav>
<!-- Start sencond Navbar-->
<nav class="bg-gray-700 dark:bg-gray-700">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                <li>
                    <a href="{{ route('dashboard') }}" class="text-gray-100 dark:text-white hover:underline" aria-current="page">Dashboard</a>
                </li>
                <li class="relative group has-submenu">
                    <a href="#" class="text-gray-100 dark:text-white hover:underline">Servers<kbd class="inline-flex items-center px-2 py-1.5 text-gray-100  dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">
                      <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10">
                      <path d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/>
                      </svg>
                      </kbd></a>
                    <ul class="absolute z-50 left-0 mt-2 w-40 bg-gray-800 text-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Manage servers</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Server Monitor</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Add Load Balancer</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Install Load Balancer</a></li>
                    </ul>

                </li>                
                <li class="relative group has-submenu">
                    <a href="#" class="text-gray-100 dark:text-white hover:underline">Resellers<kbd class="inline-flex items-center px-2 py-1.5 text-gray-100  dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">
                      <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10">
                      <path d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/>
                      </svg>
                      </kbd></a>
                    <ul class="absolute z-50 left-0 mt-2 w-40 bg-gray-800 text-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Add Register</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Maname Register</a></li>
                    </ul>
                </li>                
                <li class="relative group has-submenu">
                    <a href="#" class="text-gray-100 dark:text-white hover:underline">Users<kbd class="inline-flex items-center px-2 py-1.5 text-gray-100  dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">
                      <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10">
                      <path d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/>
                      </svg>
                      </kbd></a>
                    <ul class="absolute z-50 left-0 mt-2 w-50 bg-gray-800 text-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                      <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Add Users</a></li>
                      <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Manage Users</a></li>
                      <div class="border-t border-gray-600 mt-2 pt-2">
                        {{-- <ul class="absolute z-50 left-0 mt-2 w-40 bg-gray-800 text-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300"> --}}
                          <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Add Mag Users</a></li>
                          <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Manage Mag Users</a></li>
                          <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Link Mag Users</a></li>
                        </div>
                        <div class="border-t border-gray-600 mt-2 pt-2">
                          <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Add Enigma Users</a></li>
                          <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Manage Enigma Users</a></li>
                          <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Link Enigma Users</a></li>
                          
                        </div>
                      </ul>
                    {{-- </ul> --}}

                </li>                
                <li class="relative group has-submenu">
                    <a href="{{ route('vods.index') }}" class="text-gray-100 dark:text-white hover:underline">Vods<kbd class="inline-flex items-center px-2 py-1.5 text-gray-100  dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">
                      <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10">
                      <path d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/>
                      </svg>
                      </kbd></a>
                    <ul class="absolute z-50 left-0 mt-2 w-40 bg-gray-800 text-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Add Movie</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Manage Movies</a></li>
                        <div class="border-t border-gray-600 mt-2 pt-2">
                          <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Add Series</a></li>
                          <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Manage Series</a></li>
                          <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Manage Episodes</a></li>
                        </div>
                        <div class="border-t border-gray-600 mt-2 pt-2">
                          <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Add station</a></li>
                          <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Manage stations</a></li>
                        </div>
                    </ul>

                </li>    
                </li>                
                <li class="relative group has-submenu">
                    <a href="{{ route('streams.index') }}" class="text-gray-100 dark:text-white hover:underline">Streams<kbd class="inline-flex items-center px-2 py-1.5 text-gray-100  dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">
                      <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10">
                      <path d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/>
                      </svg>
                      </kbd></a>
                    <ul class="absolute z-50 left-0 mt-2 w-40 bg-gray-800 text-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                        <li><a href="" {{route('streams.create')}} class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Add Streams</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Manage Streams</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Create Chnnel</a></li>
                    </ul>

                </li>                
                <li class="relative group has-submenu">
                    <a href="#" class="text-gray-100 dark:text-white hover:underline">Bouquets<kbd class="inline-flex items-center px-2 py-1.5 text-gray-100  dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">
                      <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10">
                      <path d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/>
                      </svg>
                      </kbd></a>
                    <ul class="absolute z-50 left-0 mt-2 w-40 bg-gray-800 text-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Add Bouquet</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Manage Bouquets</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Order Bouquets</a></li>
                    </ul>

                </li>                
                <li class="relative group has-submenu">
                    <a href="#" class="text-gray-100 dark:text-white hover:underline">Logs<kbd class="inline-flex items-center px-2 py-1.5 text-gray-100  dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500">
                      <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10">
                      <path d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/>
                      </svg>
                      </kbd></a>
                    <ul class="absolute z-50 left-0 mt-2 w-40 bg-gray-800 text-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Live connections</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Panel Logs</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Activity Logs</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Line IP Logs</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Credit Logs</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Client Logs</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Reseller Logs</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">Stream Logs</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 whitespace-nowrap">MAG Event Logs</a></li>
                    </ul>

                </li>
                <li>
                    <a href="#" class="text-gray-100 dark:text-white hover:underline">Tickets</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- end sencond Navbar-->
