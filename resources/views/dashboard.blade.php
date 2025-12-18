<x-app-layout>
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-fade-in">Selamat Datang di Toko Kunci Barokah</h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90">Solusi Lengkap untuk Semua Kebutuhan Kunci Anda</p>
            <div class="flex justify-center space-x-4">
                <a href="{{ route('pemesanan.index') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transform hover:scale-105 transition duration-300">
                    Pesan Sekarang
                </a>
                <a href="#kontak" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transform hover:scale-105 transition duration-300">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>

    <!-- Section Tentang -->
    <section id="tentang" class="py-16 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Tentang Kami</h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto"></div>
            </div>
            
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <svg class="w-full h-64 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Toko Kunci Barokah</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4 leading-relaxed">
                        Toko Kunci Barokah adalah toko kunci terpercaya yang telah melayani masyarakat selama bertahun-tahun. Kami menyediakan berbagai layanan pembuatan dan duplikat kunci untuk berbagai kebutuhan.
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 mb-4 leading-relaxed">
                        Dengan tenaga ahli yang berpengalaman dan peralatan modern, kami siap membantu Anda untuk segala kebutuhan kunci, mulai dari kunci rumah, kunci motor, kunci mobil, hingga kunci digital dan RFID.
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                        Kami juga melayani servis kunci yang rusak, pembuatan kunci master, dan konsultasi keamanan kunci untuk rumah atau kantor Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Layanan -->
    <section id="layanan" class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Layanan Kami</h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto mb-4"></div>
                <p class="text-gray-600 dark:text-gray-400">Berbagai layanan profesional untuk kebutuhan kunci Anda</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Layanan 1 -->
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-6 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="bg-blue-100 dark:bg-blue-900 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Kunci Rumah</h3>
                    <p class="text-gray-600 dark:text-gray-400">Pembuatan dan duplikat kunci rumah dengan berbagai model dan jenis</p>
                </div>

                <!-- Layanan 2 -->
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-6 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="bg-blue-100 dark:bg-blue-900 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                            <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Kunci Mobil</h3>
                    <p class="text-gray-600 dark:text-gray-400">Duplikat kunci mobil berbagai merk dengan teknologi terkini</p>
                </div>

                <!-- Layanan 3 -->
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-6 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="bg-blue-100 dark:bg-blue-900 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Kunci Motor</h3>
                    <p class="text-gray-600 dark:text-gray-400">Pembuatan kunci motor semua jenis termasuk remote</p>
                </div>

                <!-- Layanan 4 -->
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-6 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="bg-blue-100 dark:bg-blue-900 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Kunci Digital</h3>
                    <p class="text-gray-600 dark:text-gray-400">Instalasi dan pemrograman kunci digital dan smart lock</p>
                </div>

                <!-- Layanan 5 -->
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-6 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="bg-blue-100 dark:bg-blue-900 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Kunci RFID</h3>
                    <p class="text-gray-600 dark:text-gray-400">Pemrograman kartu RFID dan akses kontrol</p>
                </div>

                <!-- Layanan 6 -->
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-6 hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
                    <div class="bg-blue-100 dark:bg-blue-900 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Servis Kunci</h3>
                    <p class="text-gray-600 dark:text-gray-400">Perbaikan kunci rusak dan pembuatan kunci master</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Maps -->
    <section id="maps" class="py-16 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Lokasi Kami</h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto mb-4"></div>
                <p class="text-gray-600 dark:text-gray-400">Kunjungi toko kami di alamat berikut</p>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden relative z-0">
                <div id="map" class="w-full h-96 relative z-0"></div>
            </div>
        </div>
    </section>

    <!-- Section Kontak -->
    <section id="kontak" class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Hubungi Kami</h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                <!-- Informasi Kontak -->
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Informasi Kontak</h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Alamat</h4>
                                <p class="text-gray-600 dark:text-gray-400">Jl. Bukit Barisan, Gading Kasri,<br>Kec. Klojen, Kota Malang, Jawa Timur 65115</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">WhatsApp</h4>
                                <a href="https://wa.me/6285708770638" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline">+62 857-0877-0638</a>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Jam Operasional</h4>
                                <p class="text-gray-600 dark:text-gray-400">
                                    Senin - Jumat: 08:00 - 17:00<br>
                                    Sabtu: 08:00 - 15:00<br>
                                    Minggu: Tutup
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Kontak -->
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8" x-data="{ showSuccessModal: {{ session('status') ? 'true' : 'false' }} }">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Kirim Pesan</h3>
                    
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <svg class="inline w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                    </svg>
                                    Nama
                                </label>
                                <input type="text" id="nama" name="nama" value="{{ Auth::user()->name }}" required 
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white transition duration-200"
                                    placeholder="Masukkan nama lengkap">
                                @error('nama')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <svg class="inline w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                    </svg>
                                    Email Address
                                </label>
                                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required 
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white transition duration-200"
                                    placeholder="nama@email.com">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="pesan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    <svg class="inline w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
                                    </svg>
                                    Pesan
                                </label>
                                <textarea id="pesan" name="pesan" rows="4" required 
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white transition duration-200"
                                    placeholder="Tulis pesan Anda di sini..."></textarea>
                                @error('pesan')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <button type="submit" 
                                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-3 px-6 rounded-lg transform hover:scale-105 transition duration-300 shadow-lg flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                                </svg>
                                Kirim Pesan
                            </button>
                        </div>
                    </form>

                    <!-- Success Modal -->
                    <div x-show="showSuccessModal" 
                         x-cloak
                         class="fixed inset-0 z-50 overflow-y-auto" 
                         aria-labelledby="modal-title" 
                         role="dialog" 
                         aria-modal="true"
                         style="display: none;">
                        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <!-- Background overlay -->
                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" 
                                 @click="showSuccessModal = false"
                                 x-transition:enter="ease-out duration-300"
                                 x-transition:enter-start="opacity-0"
                                 x-transition:enter-end="opacity-100"
                                 x-transition:leave="ease-in duration-200"
                                 x-transition:leave-start="opacity-100"
                                 x-transition:leave-end="opacity-0"></div>

                            <!-- Modal panel -->
                            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                                 x-transition:enter="ease-out duration-300"
                                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                 x-transition:leave="ease-in duration-200"
                                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 dark:bg-green-900 sm:mx-0 sm:h-10 sm:w-10">
                                            <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modal-title">
                                                Pesan Terkirim!
                                            </h3>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                                    Terima kasih telah menghubungi kami. Pesan Anda telah berhasil dikirim dan akan kami proses segera.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button type="button" 
                                            @click="showSuccessModal = false" 
                                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        OK
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Leaflet Map Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize map
            var map = L.map('map').setView([-7.970838, 112.613345], 16);

            // Add tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Add marker
            var marker = L.marker([-7.970838, 112.613345]).addTo(map);
            marker.bindPopup('<b>Toko Kunci Barokah</b><br>Jl. Bukit Barisan, Gading Kasri, Klojen, Kota Malang 65115').openPopup();
        });
    </script>

    <style>
        [x-cloak] { display: none !important; }
        
        /* Fix Leaflet map z-index to prevent covering navigation */
        .leaflet-pane,
        .leaflet-top,
        .leaflet-bottom {
            z-index: 1 !important;
        }
        
        .leaflet-control {
            z-index: 2 !important;
        }
        
        #map {
            position: relative;
            z-index: 0;
        }
    </style>
</x-app-layout>
