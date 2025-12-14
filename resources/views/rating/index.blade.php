<x-app-layout>
    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Rating & Review</h1>
                <div class="w-20 h-1 bg-blue-600 mx-auto mb-4"></div>
                <p class="text-gray-600 dark:text-gray-400">Bagikan pengalaman Anda dengan layanan kami</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Form Rating -->
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 sticky top-24">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                            {{ $userRating ? 'Edit Rating Anda' : 'Berikan Rating' }}
                        </h2>
                        
                        <form method="POST" action="{{ route('rating.store') }}" x-data="{ rating: {{ $userRating ? $userRating->rating : 0 }} }">
                            @csrf
                            
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                                        Rating Anda <span class="text-red-500">*</span>
                                    </label>
                                    
                                    <!-- Star Rating -->
                                    <div class="flex space-x-2 justify-center mb-2">
                                        <template x-for="i in 5" :key="i">
                                            <button type="button" @click="rating = i" class="focus:outline-none transition-transform hover:scale-110">
                                                <svg :class="i <= rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600'" 
                                                     class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            </button>
                                        </template>
                                    </div>
                                    
                                    <p class="text-center text-sm text-gray-600 dark:text-gray-400 mb-4">
                                        <span x-text="rating"></span> dari 5 bintang
                                    </p>
                                    
                                    <input type="hidden" name="rating" x-model="rating" required>
                                    @error('rating')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="komentar" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Komentar (Opsional)
                                    </label>
                                    <textarea id="komentar" name="komentar" rows="4"
                                        placeholder="Ceritakan pengalaman Anda..."
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition">{{ old('komentar', $userRating ? $userRating->komentar : '') }}</textarea>
                                    @error('komentar')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 rounded-lg transform hover:scale-105 transition duration-300 shadow-lg">
                                    <svg class="inline-block w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    {{ $userRating ? 'Update Rating' : 'Kirim Rating' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Daftar Review -->
                <div class="lg:col-span-2">
                    <div class="mb-6 bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl p-6 text-white">
                        <h3 class="text-xl font-bold mb-2">Statistik Rating</h3>
                        <div class="flex items-center space-x-4">
                            <div class="text-center">
                                <div class="text-4xl font-bold">
                                    {{ $ratings->count() > 0 ? number_format($ratings->avg('rating'), 1) : '0.0' }}
                                </div>
                                <div class="flex justify-center mt-1">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-5 h-5 {{ $i <= ($ratings->avg('rating') ?? 0) ? 'text-yellow-400' : 'text-gray-300' }}" 
                                             fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                            <div class="text-sm opacity-90">
                                Dari {{ $ratings->count() }} ulasan
                            </div>
                        </div>
                    </div>

                    @if($ratings->count() > 0)
                        <div class="space-y-4">
                            @foreach($ratings as $rating)
                                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 hover:shadow-xl transition duration-300 {{ $rating->user_id == Auth::id() ? 'border-2 border-blue-500' : '' }}">
                                    <div class="flex items-start justify-between mb-3">
                                        <div class="flex items-center">
                                            <div class="bg-blue-600 w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                                {{ strtoupper(substr($rating->user->name, 0, 1)) }}
                                            </div>
                                            <div class="ml-3">
                                                <h4 class="font-semibold text-gray-900 dark:text-white">
                                                    {{ $rating->user->name }}
                                                    @if($rating->user_id == Auth::id())
                                                        <span class="ml-2 text-xs bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 px-2 py-1 rounded">Anda</span>
                                                    @endif
                                                </h4>
                                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $rating->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Rating Stars -->
                                    <div class="flex mb-3">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-5 h-5 {{ $i <= $rating->rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}" 
                                                 fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @endfor
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ $rating->rating }}/5</span>
                                    </div>

                                    @if($rating->komentar)
                                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $rating->komentar }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-12 text-center">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Belum Ada Review</h3>
                            <p class="text-gray-600 dark:text-gray-400">Jadilah yang pertama memberikan rating!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>