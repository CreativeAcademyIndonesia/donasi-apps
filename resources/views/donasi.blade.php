@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-violet-50 via-purple-50 to-pink-50 py-12 px-4 relative overflow-hidden">
        <!-- Background decorative elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div
                class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-purple-200 to-pink-200 rounded-full opacity-30 blur-3xl">
            </div>
            <div
                class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-br from-blue-200 to-purple-200 rounded-full opacity-30 blur-3xl">
            </div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full opacity-20 blur-3xl">
            </div>
        </div>

        <div class="relative z-10 flex items-center justify-center min-h-[calc(100vh-6rem)]">
            <div
                class="bg-white/80 backdrop-blur-xl shadow-2xl rounded-3xl p-8 md:p-12 max-w-md w-full mx-auto border border-white/20 relative overflow-hidden group hover:shadow-3xl transition-all duration-500">

                <!-- Decorative gradient overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 via-transparent to-pink-500/5 rounded-3xl">
                </div>

                <!-- Floating hearts animation -->
                <div class="absolute -top-2 -right-2 text-pink-300 opacity-50 animate-bounce text-2xl">💝</div>
                <div class="absolute top-8 -left-2 text-purple-300 opacity-50 animate-pulse text-xl">✨</div>

                <div class="relative z-10">
                    <!-- Header section -->
                    <div class="text-center mb-8">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl mb-4 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                        </div>
                        <h2
                            class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent mb-2">
                            Dukung Kreator Favoritmu!
                        </h2>
                        <p class="text-gray-600 text-sm">Setiap dukungan kamu sangat berarti 💜</p>
                    </div>

                    <!-- Success message -->
                    @if (session('success'))
                        <div
                            class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 text-green-700 px-4 py-3 rounded-2xl mb-6 flex items-center shadow-sm">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('donasi.store') }}" class="space-y-6">
                        @csrf

                        <!-- Name input -->
                        <div class="space-y-2">
                            <label for="nama" class="block text-sm font-semibold text-gray-700 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Nama (opsional)
                            </label>
                            <input type="text" name="nama" id="nama"
                                class="w-full px-4 py-3 rounded-2xl border-2 border-gray-200 focus:border-purple-400 focus:ring-4 focus:ring-purple-100 transition-all duration-300 bg-gray-50/50 placeholder-gray-400"
                                placeholder="Siapa nama kamu? (boleh dikosongkan)">
                        </div>

                        <!-- Donation amount selection -->
                        <div class="space-y-4">
                            <label class="block text-sm font-semibold text-gray-700 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                    </path>
                                </svg>
                                Pilih Nominal Donasi
                            </label>

                            <!-- Preset amounts -->
                            <div class="grid grid-cols-2 gap-3">
                                @foreach ([10000, 20000, 50000, 100000] as $nominal)
                                    <label class="relative cursor-pointer group">
                                        <input type="radio" name="jumlah_donasi" value="{{ $nominal }}"
                                            class="sr-only peer" required onchange="updateCustomAmount(this.value)">
                                        <div
                                            class="bg-gradient-to-br from-purple-50 to-pink-50 hover:from-purple-100 hover:to-pink-100 peer-checked:from-purple-500 peer-checked:to-pink-500 border-2 border-purple-200 peer-checked:border-purple-500 rounded-2xl p-4 text-center transition-all duration-300 shadow-sm hover:shadow-md peer-checked:shadow-lg transform hover:scale-105 peer-checked:scale-105">
                                            <span class="text-sm font-bold text-purple-700 peer-checked:text-white">
                                                Rp{{ number_format($nominal, 0, ',', '.') }}
                                            </span>
                                        </div>
                                    </label>
                                @endforeach
                            </div>

                            <!-- Custom amount input -->
                            <div class="mt-4 space-y-2">
                                <label for="custom_nominal"
                                    class="block text-xs font-medium text-gray-500 flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Atau masukkan nominal lain
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <span class="text-gray-500 text-sm font-medium">Rp</span>
                                    </div>
                                    <input type="number" min="1000" name="jumlah_donasi" id="custom_nominal"
                                        class="w-full pl-12 pr-4 py-3 rounded-2xl border-2 border-gray-200 focus:border-purple-400 focus:ring-4 focus:ring-purple-100 transition-all duration-300 bg-gray-50/50 placeholder-gray-400"
                                        placeholder="Minimal 1.000" oninput="updateRadioButtons(this.value)">
                                </div>
                            </div>

                            <script>
                                function updateCustomAmount(value) {
                                    document.getElementById('custom_nominal').value = value;
                                }

                                function updateRadioButtons(value) {
                                    const radioButtons = document.querySelectorAll('input[type="radio"]');
                                    radioButtons.forEach(radio => {
                                        radio.checked = false;
                                    });
                                }
                            </script>
                        </div>

                        <!-- Submit button -->
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-bold py-4 px-6 rounded-2xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center space-x-2 group">
                            <svg class="w-5 h-5 group-hover:animate-pulse" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                            <span>Donasi Sekarang</span>
                            <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </button>

                        <!-- Security note -->
                        <div class="text-center pt-4">
                            <p class="text-xs text-gray-500 flex items-center justify-center">
                                <svg class="w-3 h-3 mr-1 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.5-1.5a8 8 0 11-11 0"></path>
                                </svg>
                                Transaksi aman & terenkripsi
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.6s ease-out;
        }

        /* Custom radio button styling */
        input[type="radio"]:checked+div {
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            color: white;
            border-color: #8b5cf6;
        }

        /* Smooth focus transitions */
        input:focus,
        button:focus {
            outline: none;
        }

        /* Hover effects for better interactivity */
        .group:hover .transform {
            transform: scale(1.05);
        }
    </style>
@endsection
