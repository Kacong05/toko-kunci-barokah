<x-admin-layout>
    <!-- Page Header -->
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Manajemen Rating</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Kelola semua rating dan review dari pelanggan</p>
            </div>

        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-6">
        <!-- Rating Rata-rata -->
        <div class="md:col-span-2 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-yellow-100 text-sm font-medium uppercase">Rating Rata-rata</p>
                    <div class="flex items-end mt-2">
                        <p class="text-5xl font-bold">{{ number_format($ratings->avg('rating') ?? 0, 1) }}</p>
                        <span class="text-2xl ml-2 mb-1">/5.0</span>
                    </div>
                </div>
                <div class="bg-white bg-opacity-20 p-4 rounded-lg">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
            </div>
            <div class="flex items-center">
                @for($i = 1; $i <= 5; $i++)
                    <svg class="w-6 h-6 {{ $i <= round($ratings->avg('rating') ?? 0) ? 'text-white' : 'text-yellow-300' }}" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                @endfor
                <span class="ml-3 text-sm">Dari {{ $ratings->total() }} ulasan</span>
            </div>
        </div>

        <!-- 5 Stars -->
        <div class="bg-gradient-to-br from-green-400 to-green-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium">⭐⭐⭐⭐⭐</p>
                    <p class="text-3xl font-bold mt-1">{{ $ratings->where('rating', 5)->count() }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- 4 Stars -->
        <div class="bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">⭐⭐⭐⭐</p>
                    <p class="text-3xl font-bold mt-1">{{ $ratings->where('rating', 4)->count() }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- 3 Stars & Below -->
        <div class="bg-gradient-to-br from-orange-400 to-orange-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-100 text-sm font-medium">⭐⭐⭐ & Below</p>
                    <p class="text-3xl font-bold mt-1">{{ $ratings->where('rating', '<=', 3)->count() }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Rating Distribution Chart -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Distribusi Rating</h3>
        <div class="space-y-3">
            @for($i = 5; $i >= 1; $i--)
                @php
                    $count = $ratings->where('rating', $i)->count();
                    $percentage = $ratings->total() > 0 ? ($count / $ratings->total()) * 100 : 0;
                @endphp
                <div class="flex items-center">
                    <div class="w-24 flex items-center">
                        @for($j = 1; $j <= 5; $j++)
                            <svg class="w-4 h-4 {{ $j <= $i ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                    <div class="flex-1 mx-4">
                        <div class="bg-gray-200 dark:bg-gray-700 rounded-full h-3 overflow-hidden" style="--bar-width: {{ number_format($percentage, 2) }}%;">
                            <div class="bg-gradient-to-r from-yellow-400 to-yellow-600 h-3 rounded-full transition-all duration-500" 
                                 style="width: var(--bar-width);"></div>
                        </div>
                    </div>
                    <div class="w-20 text-right">
                        <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $count }}</span>
                        <span class="text-xs text-gray-500 dark:text-gray-400 ml-1">({{ number_format($percentage, 1) }}%)</span>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <!-- Ratings Table -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden" x-data="{ search: '' }">
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Rating & Review</h2>
                <div class="mt-3 sm:mt-0">
                    <div class="relative">
                        <input type="text" 
                               x-model="search"
                               placeholder="Cari review..." 
                               class="w-full sm:w-64 pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white text-sm">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ratings Grid/Cards -->
        <div class="p-6 space-y-4">
            @forelse($ratings as $rating)
                <div class="bg-gray-50 dark:bg-gray-900 rounded-xl p-6 hover:shadow-lg transition-all duration-300 border border-gray-200 dark:border-gray-700"
                    x-show="search === '' || '{{ strtolower($rating->user->name) }}'.includes(search.toLowerCase()) || '{{ strtolower($rating->user->email) }}'.includes(search.toLowerCase()) || '{{ strtolower($rating->komentar ?? '') }}'.includes(search.toLowerCase()) || '{{ $rating->rating }}'.includes(search)"
                    x-transition>
                    <div class="flex items-start justify-between mb-4">
                        <!-- User Info -->
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-md">
                                {{ strtoupper(substr($rating->user->name, 0, 1)) }}
                            </div>
                            <div class="ml-4">
                                <h3 class="text-base font-semibold text-gray-900 dark:text-white">{{ $rating->user->name }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $rating->user->email }}</p>
                            </div>
                        </div>

                        <!-- Rating Stars & Date -->
                        <div class="text-right">
                            <div class="flex items-center justify-end mb-1">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= $rating->rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                                <span class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">{{ $rating->rating }}/5</span>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $rating->created_at->diffForHumans() }}</p>
                            <p class="text-xs text-gray-400 dark:text-gray-500">{{ $rating->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>

                    <!-- Comment -->
                    @if($rating->komentar)
                        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 mb-4 border-l-4 border-blue-500">
                            <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">
                                "{{ $rating->komentar }}"
                            </p>
                        </div>
                    @else
                        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 mb-4 border-l-4 border-gray-300">
                            <p class="text-sm text-gray-500 dark:text-gray-400 italic">
                                Tidak ada komentar
                            </p>
                        </div>
                    @endif

                    <!-- Actions -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center space-x-4">
                            <!-- User Stats -->
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                </svg>
                                Total pesanan: <span class="font-semibold ml-1">{{ $rating->user->orders_count ?? 0 }}</span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center space-x-2">
                            <a href="mailto:{{ $rating->user->email }}" 
                               class="inline-flex items-center px-3 py-1.5 bg-blue-100 hover:bg-blue-200 dark:bg-blue-900 dark:hover:bg-blue-800 text-blue-700 dark:text-blue-200 rounded-lg text-xs font-medium transition">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                </svg>
                                Email
                            </a>

                            <form method="POST" action="{{ route('admin.ratings.delete', $rating) }}" 
                                  onsubmit="return confirm('Yakin ingin menghapus rating ini?')"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="inline-flex items-center px-3 py-1.5 bg-red-100 hover:bg-red-200 dark:bg-red-900 dark:hover:bg-red-800 text-red-700 dark:text-red-200 rounded-lg text-xs font-medium transition">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                    <p class="text-gray-500 dark:text-gray-400 text-lg font-medium">Belum ada rating</p>
                    <p class="text-gray-400 dark:text-gray-500 text-sm mt-1">Rating dari pelanggan akan muncul di sini</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($ratings->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                {{ $ratings->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
