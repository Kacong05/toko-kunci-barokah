<x-admin-layout>
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Pesan Kontak</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Kelola semua pesan dari form kontak</p>
            </div>

        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Total Pesan</p>
                    <p class="text-3xl font-bold mt-1">{{ $contacts->total() }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-400 to-green-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium">Hari Ini</p>
                    <p class="text-3xl font-bold mt-1">{{ $contacts->where('created_at', '>=', today())->count() }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium">Minggu Ini</p>
                    <p class="text-3xl font-bold mt-1">{{ $contacts->where('created_at', '>=', now()->startOfWeek())->count() }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-orange-400 to-orange-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-100 text-sm font-medium">Bulan Ini</p>
                    <p class="text-3xl font-bold mt-1">{{ $contacts->where('created_at', '>=', now()->startOfMonth())->count() }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                        <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Contacts Messages -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden" x-data="{ search: '' }">
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Pesan</h2>
                <div class="mt-3 sm:mt-0">
                    <div class="relative">
                        <input type="text" 
                               x-model="search"
                               placeholder="Cari pesan..." 
                               class="w-full sm:w-64 pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white text-sm">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Messages Cards -->
        <div class="p-6 space-y-4">
            @forelse($contacts as $contact)
                <div class="bg-gray-50 dark:bg-gray-900 rounded-xl p-6 hover:shadow-lg transition-all duration-300 border-l-4 
                    {{ $contact->created_at >= today() ? 'border-blue-500' : 'border-gray-300 dark:border-gray-600' }}"
                    x-show="search === '' || '{{ strtolower($contact->nama) }}'.includes(search.toLowerCase()) || '{{ strtolower($contact->email) }}'.includes(search.toLowerCase()) || '{{ strtolower($contact->pesan) }}'.includes(search.toLowerCase())"
                    x-transition>
                    
                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between mb-4">
                        <!-- Sender Info -->
                        <div class="flex items-start mb-4 lg:mb-0">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-md flex-shrink-0">
                                {{ strtoupper(substr($contact->nama, 0, 1)) }}
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex items-center flex-wrap gap-2">
                                    <h3 class="text-base font-semibold text-gray-900 dark:text-white">{{ $contact->nama }}</h3>
                                    @if($contact->created_at >= today())
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                            <span class="w-2 h-2 mr-1 bg-blue-500 rounded-full animate-pulse"></span>
                                            Baru
                                        </span>
                                    @endif
                                </div>
                                <a href="mailto:{{ $contact->email }}" class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 hover:underline flex items-center mt-1">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                    </svg>
                                    {{ $contact->email }}
                                </a>
                            </div>
                        </div>

                        <!-- Date & Time -->
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $contact->created_at->format('d M Y') }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $contact->created_at->format('H:i') }}</p>
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">{{ $contact->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    <!-- Message Content -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-5 mb-4 border border-gray-200 dark:border-gray-700">
                        <div class="flex items-start mb-2">
                            <svg class="w-5 h-5 text-gray-400 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pesan:</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">{{ $contact->pesan }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center space-x-2 text-xs text-gray-500 dark:text-gray-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            <span>ID: #{{ str_pad($contact->id, 4, '0', STR_PAD_LEFT) }}</span>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center space-x-2">
                            <a href="mailto:{{ $contact->email }}?subject=Re: Pesan dari {{ $contact->nama }}&body=Halo {{ $contact->nama }},%0D%0A%0D%0ATerima kasih telah menghubungi Toko Kunci Barokah.%0D%0A%0D%0A" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition shadow-md hover:shadow-lg">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                </svg>
                                Balas via Email
                            </a>

                            <form method="POST" action="{{ route('admin.contacts.delete', $contact) }}" 
                                  onsubmit="return confirm('Yakin ingin menghapus pesan ini?')"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition shadow-md hover:shadow-lg">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-gray-500 dark:text-gray-400 text-lg font-medium">Belum ada pesan</p>
                    <p class="text-gray-400 dark:text-gray-500 text-sm mt-1">Pesan dari form kontak akan muncul di sini</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($contacts->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                {{ $contacts->links() }}
            </div>
        @endif
    </div>

</x-admin-layout>