<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Card Welcome -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl">
                <div class="p-8 text-gray-900 dark:text-gray-100 text-xl font-semibold flex items-center space-x-3">
                    🎉 <span>{{ __("Selamat Datang ") }} {{ Auth::user()->name }}, Anda berhasil login! </span>
                </div>
            </div>

            <!-- Card Grafik Anggota -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl">
                <div class="p-8">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100">📊 Statistik Keanggotaan</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">Jumlah anggota aktif di seluruh
                            organisasi Politeknik Harapan Bersama</p>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 overflow-x-auto">
                        <canvas id="anggotaChart" class="rounded-lg min-w-[1000px] h-[700px]"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Load Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Script Chart.js -->
    <script>
        const ctx = document.getElementById('anggotaChart').getContext('2d');
        const anggotaChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Jumlah Anggota',
                    data: @json($data),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session("success") }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

</x-app-layout>