<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-2xl text-yellow-900 leading-tight">
                {{ __('Tentang Ormawa') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-indigo rounded-3xl shadow-xl p-10 space-y-8">

                {{-- Header Info Card --}}
                <div class="flex flex-col md:flex-row items-center md:justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <img src="{{ Storage::url($abouts->logo) }}"
                             alt="Logo {{ $abouts->nama_organisasi }}"
                             class="rounded-xl object-cover w-24 h-24 shadow-md border border-gray-200">
                        <div>
                            <h3 class="text-2xl font-bold text-indigo-900">{{ $abouts->nama_organisasi }}</h3>
                            <p class="text-sm text-slate-500 italic">{{ $abouts->slogan }}</p>
                        </div>
                    </div>
                    <div class="flex">
                        <a href="{{ route('tentangkami.edit', $abouts->id) }}"
                           class="px-6 py-2 rounded-full bg-indigo-700 text-white font-semibold shadow hover:bg-indigo-800 transition duration-200">
                            ✏️ Ubah Data
                        </a>
                    </div>
                </div>

                {{-- Detail Info --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-800">
                    <div class="flex gap-4 items-start">
                        <div class="text-indigo-600 text-xl">📄</div>
                        <div>
                            <h4 class="font-semibold text-lg">Tentang Kami</h4>
                            <p class="text-sm mt-1">{{ $abouts->tentang_kami }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4 items-start">
                        <div class="text-indigo-600 text-xl">📧</div>
                        <div>
                            <h4 class="font-semibold text-lg">Email</h4>
                            <p class="text-sm mt-1">{{ $abouts->email }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4 items-start">
                        <div class="text-indigo-600 text-xl">📞</div>
                        <div>
                            <h4 class="font-semibold text-lg">No Telepon</h4>
                            <p class="text-sm mt-1">{{ $abouts->nomer_telepon }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4 items-start">
                        <div class="text-indigo-600 text-xl">📍</div>
                        <div>
                            <h4 class="font-semibold text-lg">Lokasi</h4>
                            <p class="text-sm mt-1">{{ $abouts->lokasi }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

     <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session("success") }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif
</x-app-layout>
