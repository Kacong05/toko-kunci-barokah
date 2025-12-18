<x-app-layout>
    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen" x-data="{ showSuccessModal: {{ session('success') ? 'true' : 'false' }} }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Pemesanan Layanan</h1>
                <div class="w-20 h-1 bg-blue-600 mx-auto mb-4"></div>
                <p class="text-gray-600 dark:text-gray-400">Pesan layanan kunci sesuai kebutuhan Anda</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Form Pemesanan -->
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Form Pemesanan</h2>
                        
                        <form method="POST" action="{{ route('pemesanan.store') }}">
                            @csrf
                            
                            <div class="space-y-6">
                                <div>
                                    <label for="nama_pemesan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Nama Pemesan <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="nama_pemesan" name="nama_pemesan" value="{{ old('nama_pemesan', Auth::user()->name) }}" required
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition">
                                    @error('nama_pemesan')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="nomor_hp" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Nomor HP <span class="text-red-500">*</span>
                                    </label>
                                    <input type="tel" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}" required
                                        placeholder="085708770638"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition">
                                    @error('nomor_hp')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="jenis_layanan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Jenis Layanan <span class="text-red-500">*</span>
                                    </label>
                                    <select id="jenis_layanan" name="jenis_layanan" required
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition">
                                        <option value="">-- Pilih Layanan --</option>
                                        <option value="Kunci Rumah" {{ old('jenis_layanan') == 'Kunci Rumah' ? 'selected' : '' }}>Kunci Rumah</option>
                                        <option value="Kunci Mobil" {{ old('jenis_layanan') == 'Kunci Mobil' ? 'selected' : '' }}>Kunci Mobil</option>
                                        <option value="Kunci Motor" {{ old('jenis_layanan') == 'Kunci Motor' ? 'selected' : '' }}>Kunci Motor</option>
                                        <option value="Kunci Digital" {{ old('jenis_layanan') == 'Kunci Digital' ? 'selected' : '' }}>Kunci Digital</option>
                                        <option value="Kunci RFID" {{ old('jenis_layanan') == 'Kunci RFID' ? 'selected' : '' }}>Kunci RFID</option>
                                        <option value="Servis Kunci" {{ old('jenis_layanan') == 'Servis Kunci' ? 'selected' : '' }}>Servis Kunci</option>
                                    </select>
                                    @error('jenis_layanan')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="detail_kebutuhan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Detail Kebutuhan <span class="text-red-500">*</span>
                                    </label>
                                    <textarea id="detail_kebutuhan" name="detail_kebutuhan" rows="4" required
                                        placeholder="Jelaskan detail kebutuhan Anda, misalnya jenis kunci, jumlah yang dibutuhkan, dll."
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition">{{ old('detail_kebutuhan') }}</textarea>
                                    @error('detail_kebutuhan')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 rounded-lg transform hover:scale-105 transition duration-300 shadow-lg">
                                    <svg class="inline-block w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"/>
                                    </svg>
                                    Kirim Pemesanan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Info & Riwayat Pesanan -->
                <div class="space-y-6">
                    <!-- Info Pemesanan -->
                    <div class="bg-blue-50 dark:bg-blue-900 rounded-xl p-6">
                        <h3 class="text-lg font-bold text-blue-900 dark:text-blue-100 mb-4">Informasi Pemesanan</h3>
                        <ul class="space-y-3 text-sm text-blue-800 dark:text-blue-200">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Pesanan akan diproses dalam 1x24 jam
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Tim kami akan menghubungi via WhatsApp
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Estimasi harga akan diberikan setelah konsultasi
                            </li>

                        </ul>
                    </div>

                    <!-- Hubungi Langsung -->
                    <div class="bg-green-50 dark:bg-green-900 rounded-xl p-6">
                        <h3 class="text-lg font-bold text-green-900 dark:text-green-100 mb-4">Butuh Bantuan Cepat?</h3>
                        <p class="text-sm text-green-800 dark:text-green-200 mb-4">Hubungi kami langsung via WhatsApp untuk konsultasi</p>
                        <a href="https://wa.me/6285708770638" target="_blank"
                            class="block w-full bg-green-600 hover:bg-green-700 text-white text-center font-semibold py-3 px-4 rounded-lg transform hover:scale-105 transition duration-300">
                            <svg class="inline-block w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            Chat WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- Riwayat Pesanan -->
            @if($orders->count() > 0)
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Riwayat Pesanan Anda</h2>
                
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Jenis Layanan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Detail</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($orders as $order)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                        {{ $order->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">
                                        {{ $order->jenis_layanan }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                        {{ Str::limit($order->detail_kebutuhan, 50) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($order->status == 'pending')
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                                Pending
                                            </span>
                                        @elseif($order->status == 'proses')
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                Proses
                                            </span>
                                        @else
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                Selesai
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif

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
                                        Pemesanan Berhasil!
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Terima kasih telah memesan layanan kami. Pesanan Anda telah berhasil dikirim dan akan segera kami proses. Tim kami akan menghubungi Anda via WhatsApp dalam 1x24 jam.
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

    <style>
        [x-cloak] { display: none !important; }
    </style>
</x-app-layout>