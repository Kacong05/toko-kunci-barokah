<header class="bg-white dark:bg-gray-800 shadow-md z-10 sticky top-0">
    <div class="flex items-center justify-between h-16 px-6">
        <!-- Left Side: Hamburger + Page Title -->
        <div class="flex items-center space-x-4">
            <!-- Hamburger Menu -->
            <button @click="$dispatch('toggle-sidebar')" 
                    class="p-2 rounded-lg text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 lg:hidden transition">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                </svg>
            </button>

            <!-- Breadcrumb / Page Title -->
            <div class="hidden sm:block">
                <nav class="flex items-center space-x-2 text-sm">
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                    </a>
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-semibold text-gray-700 dark:text-gray-300">
                        @if(request()->routeIs('admin.dashboard'))
                            Dashboard
                        @elseif(request()->routeIs('admin.orders'))
                            Manajemen Pesanan
                        @elseif(request()->routeIs('admin.users'))
                            Manajemen Pengguna
                        @elseif(request()->routeIs('admin.ratings'))
                            Manajemen Rating
                        @elseif(request()->routeIs('admin.contacts'))
                            Pesan Kontak
                        @else
                            Admin Panel
                        @endif
                    </span>
                </nav>
            </div>
        </div>

        <!-- Right Side: Notifications, Dark Mode, Profile -->
        <div class="flex items-center space-x-2 sm:space-x-4">
            <!-- Notifications -->
            <div class="relative" x-data="notificationDropdown()" x-init="init()">
                <button @click="toggleDropdown()" 
                        class="relative p-2 rounded-lg text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 transition">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                    </svg>
                    <!-- Badge -->
                    <span x-show="unreadCount > 0" 
                          x-text="unreadCount" 
                          class="absolute -top-1 -right-1 px-1.5 min-w-[20px] h-5 bg-red-500 text-white text-xs font-bold rounded-full flex items-center justify-center animate-pulse">
                    </span>
                </button>

                <!-- Notification Dropdown -->
                <div x-show="open" 
                     @click.away="open = false"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute right-0 mt-2 w-96 bg-white dark:bg-gray-800 rounded-lg shadow-xl border border-gray-200 dark:border-gray-700 z-50"
                     style="display: none;">
                    <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                            Notifikasi 
                            <span x-show="unreadCount > 0" class="text-blue-600">(<span x-text="unreadCount"></span>)</span>
                        </h3>
                        <button @click="markAllAsRead()" 
                                x-show="unreadCount > 0"
                                class="text-xs text-blue-600 hover:text-blue-800 dark:text-blue-400 font-medium">
                            Tandai semua dibaca
                        </button>
                    </div>
                    
                    <div class="max-h-96 overflow-y-auto">
                        <template x-if="loading">
                            <div class="p-8 text-center">
                                <svg class="animate-spin h-8 w-8 text-blue-600 mx-auto" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Memuat notifikasi...</p>
                            </div>
                        </template>

                        <template x-if="!loading && notifications.length === 0">
                            <div class="p-8 text-center">
                                <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                                </svg>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Tidak ada notifikasi</p>
                            </div>
                        </template>

                        <template x-for="notification in notifications" :key="notification.id">
                            <a :href="notification.data?.url || '#'" 
                               @click="markAsRead(notification.id)"
                               class="flex items-start p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition"
                               :class="!notification.is_read ? 'bg-blue-50 dark:bg-blue-900/20' : ''">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center"
                                         :class="{
                                             'bg-blue-100 dark:bg-blue-900': notification.type === 'order',
                                             'bg-yellow-100 dark:bg-yellow-900': notification.type === 'rating',
                                             'bg-green-100 dark:bg-green-900': notification.type === 'contact'
                                         }">
                                        <template x-if="notification.type === 'order'">
                                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                            </svg>
                                        </template>
                                        <template x-if="notification.type === 'rating'">
                                            <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        </template>
                                        <template x-if="notification.type === 'contact'">
                                            <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                            </svg>
                                        </template>
                                    </div>
                                </div>
                                <div class="ml-3 flex-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white" x-text="notification.title"></p>
                                        <span x-show="!notification.is_read" class="w-2 h-2 bg-blue-600 rounded-full"></span>
                                    </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1" x-text="notification.message"></p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-1" x-text="formatTime(notification.created_at)"></p>
                                </div>
                            </a>
                        </template>
                    </div>
                    
                    <div class="p-3 border-t border-gray-200 dark:border-gray-700 text-center">
                        <a href="#" class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 font-medium">
                            Lihat semua notifikasi
                        </a>
                    </div>
                </div>
            </div>

            <script>
                function notificationDropdown() {
                    return {
                        open: false,
                        loading: false,
                        notifications: [],
                        unreadCount: 0,
                        pollInterval: null,

                        init() {
                            this.fetchNotifications();
                            // Poll every 30 seconds for new notifications
                            this.pollInterval = setInterval(() => {
                                this.fetchUnreadCount();
                            }, 30000);
                        },

                        async fetchNotifications() {
                            this.loading = true;
                            try {
                                const response = await fetch('/admin/notifications');
                                const data = await response.json();
                                this.notifications = data.notifications;
                                this.unreadCount = data.unread_count;
                            } catch (error) {
                                console.error('Error fetching notifications:', error);
                            } finally {
                                this.loading = false;
                            }
                        },

                        async fetchUnreadCount() {
                            try {
                                const response = await fetch('/admin/notifications/unread-count');
                                const data = await response.json();
                                this.unreadCount = data.count;
                            } catch (error) {
                                console.error('Error fetching unread count:', error);
                            }
                        },

                        toggleDropdown() {
                            this.open = !this.open;
                            if (this.open) {
                                this.fetchNotifications();
                            }
                        },

                        async markAsRead(notificationId) {
                            try {
                                await fetch(`/admin/notifications/${notificationId}/read`, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                        'Content-Type': 'application/json',
                                    },
                                });
                                this.fetchNotifications();
                            } catch (error) {
                                console.error('Error marking as read:', error);
                            }
                        },

                        async markAllAsRead() {
                            try {
                                await fetch('/admin/notifications/mark-all-read', {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                        'Content-Type': 'application/json',
                                    },
                                });
                                this.fetchNotifications();
                            } catch (error) {
                                console.error('Error marking all as read:', error);
                            }
                        },

                        formatTime(timestamp) {
                            const date = new Date(timestamp);
                            const now = new Date();
                            const diff = Math.floor((now - date) / 1000); // difference in seconds

                            if (diff < 60) return 'Baru saja';
                            if (diff < 3600) return Math.floor(diff / 60) + ' menit yang lalu';
                            if (diff < 86400) return Math.floor(diff / 3600) + ' jam yang lalu';
                            if (diff < 604800) return Math.floor(diff / 86400) + ' hari yang lalu';
                            return date.toLocaleDateString('id-ID');
                        }
                    }
                }
            </script>

            <!-- Dark Mode Toggle -->
            <button @click="darkMode = !darkMode" 
                    class="p-2 rounded-lg text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 transition">
                <svg x-show="!darkMode" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                </svg>
                <svg x-show="darkMode" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" style="display: none;">
                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"/>
                </svg>
            </button>

            <!-- User Profile Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" 
                        class="flex items-center space-x-3 p-1.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    <div class="w-9 h-9 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center text-white font-bold shadow-md">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="hidden sm:block text-left">
                        <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Administrator</p>
                    </div>
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" 
                     @click.away="open = false"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute right-0 mt-2 w-56 bg-white dark:bg-gray-800 rounded-lg shadow-xl border border-gray-200 dark:border-gray-700 z-50"
                     style="display: none;">
                    
                    <!-- User Info -->
                    <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                        <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email }}</p>
                    </div>

                    <!-- Menu Items -->
                    <div class="py-2">
                        <a href="{{ route('dashboard') }}" 
                           class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            <svg class="w-4 h-4 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                            Ke Website
                        </a>
                    </div>

                    <!-- Logout -->
                    <div class="border-t border-gray-200 dark:border-gray-700 py-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" 
                                    class="flex items-center w-full px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition">
                                <svg class="w-4 h-4 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"/>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    [x-cloak] { display: none !important; }
</style>