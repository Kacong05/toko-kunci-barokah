<!-- Sidebar -->
<aside x-data="{ sidebarOpen: true }" 
       :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
       class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-blue-800 to-blue-900 text-white transform transition-transform duration-300 ease-in-out lg:translate-x-0">
    
    <!-- Logo & Toggle Button -->
    <div class="flex items-center justify-between h-16 px-6 bg-blue-900 border-b border-blue-700">
        <div class="flex items-center space-x-3">
            <div class="bg-white bg-opacity-20 p-2 rounded-lg">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z"/>
                </svg>
            </div>
            <div>
                <p class="text-sm font-bold">Kunci Barokah</p>
                <p class="text-xs text-blue-200">Admin Panel</p>
            </div>
        </div>
        <button @click="sidebarOpen = false" class="lg:hidden text-white hover:bg-blue-700 p-1 rounded">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </button>
    </div>

    <!-- User Info -->
    <div class="px-6 py-4 bg-blue-800 bg-opacity-50">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs text-blue-200 truncate">{{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 px-3 py-6 space-y-2 overflow-y-auto">
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700 text-white shadow-lg' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
            <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600' : 'bg-blue-800 group-hover:bg-blue-600' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                </svg>
            </div>
            <span>Dashboard</span>
            @if(request()->routeIs('admin.dashboard'))
                <svg class="w-4 h-4 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            @endif
        </a>

        <!-- Orders -->
        <a href="{{ route('admin.orders') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.orders') ? 'bg-blue-700 text-white shadow-lg' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
            <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.orders') ? 'bg-blue-600' : 'bg-blue-800 group-hover:bg-blue-600' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                </svg>
            </div>
            <span>Pesanan</span>
            @if(request()->routeIs('admin.orders'))
                <svg class="w-4 h-4 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            @endif
        </a>

        <!-- Users -->
        <a href="{{ route('admin.users') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.users') ? 'bg-blue-700 text-white shadow-lg' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
            <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.users') ? 'bg-blue-600' : 'bg-blue-800 group-hover:bg-blue-600' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                </svg>
            </div>
            <span>Pengguna</span>
            @if(request()->routeIs('admin.users'))
                <svg class="w-4 h-4 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            @endif
        </a>

        <!-- Ratings -->
        <a href="{{ route('admin.ratings') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.ratings') ? 'bg-blue-700 text-white shadow-lg' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
            <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.ratings') ? 'bg-blue-600' : 'bg-blue-800 group-hover:bg-blue-600' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
            </div>
            <span>Rating</span>
            @if(request()->routeIs('admin.ratings'))
                <svg class="w-4 h-4 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            @endif
        </a>

        <!-- Contacts -->
        <a href="{{ route('admin.contacts') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.contacts') ? 'bg-blue-700 text-white shadow-lg' : 'text-blue-100 hover:bg-blue-700 hover:text-white' }}">
            <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg {{ request()->routeIs('admin.contacts') ? 'bg-blue-600' : 'bg-blue-800 group-hover:bg-blue-600' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                </svg>
            </div>
            <span>Pesan Kontak</span>
            @if(request()->routeIs('admin.contacts'))
                <svg class="w-4 h-4 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            @endif
        </a>

        <!-- Divider -->
        <div class="border-t border-blue-700 my-4"></div>

        <!-- Back to Website -->
        <a href="{{ route('dashboard') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-blue-100 hover:bg-blue-700 hover:text-white transition-all duration-200 group">
            <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-blue-800 group-hover:bg-blue-600">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                </svg>
            </div>
            <span>Ke Website</span>
            <svg class="w-4 h-4 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </a>
    </nav>

    <!-- Logout Button -->
    <div class="px-3 py-4 border-t border-blue-700">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" 
                class="flex items-center w-full px-4 py-3 text-sm font-medium rounded-lg text-red-200 hover:bg-red-600 hover:text-white transition-all duration-200 group">
                <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-lg bg-red-900 bg-opacity-50 group-hover:bg-red-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>

<!-- Mobile Sidebar Overlay -->
<div x-show="sidebarOpen" 
     @click="sidebarOpen = false" 
     x-cloak
     class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"
     x-transition:enter="transition-opacity ease-linear duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-opacity ease-linear duration-300"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0">
</div>

<style>
    [x-cloak] { display: none !important; }
</style>