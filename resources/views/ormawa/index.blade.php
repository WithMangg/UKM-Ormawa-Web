<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Ormawa') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        
        <div class="bg-white p-10 rounded-xl shadow-lg space-y-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">


                    <div class="item-card flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($ormawa->logo) }}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">

                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    {{$ormawa->name}}
                                </h3>
                                <p class="text-slate-500 text-sm">

                                </p>
                            </div>
                        </div>
                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="{{route('ormawa.edit', $ormawa->id)}}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Edit Company
                            </a>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold">About</h3>
                        <p>
                            {{$ormawa->about}}
                        </p>
                    </div>

                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold">Batas Tanggal Pendaftaran</h3>
                        <p>
                            {{$ormawa->batas_pendaftaran}}
                        </p>
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