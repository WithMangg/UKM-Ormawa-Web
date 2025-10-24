<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit UKM') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black-100">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl p-8">

                <form method="POST" action="{{ route('ukm.update', $ukm->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Nama UKM --}}
                    <div>
                        <x-input-label for="name" :value="__('Nama UKM')" />
                        <x-text-input id="name"
                            class="block mt-1 w-full bg-white text-gray-900 border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                            type="text" name="name" value="{{ $ukm->name }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    {{-- Logo UKM --}}
                    <div class="mt-6">
                        <x-input-label for="logo" :value="__('Logo UKM')" />
                        <div class="flex items-center space-x-4 mt-2">
                            <img src="{{ Storage::url($ukm->logo) }}" alt="Logo UKM"
                                class="rounded-xl object-cover w-[90px] h-[90px] border border-gray-300">
                            <x-text-input id="logo"
                                class="block w-full bg-white text-gray-900 border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                                type="file" name="logo" autocomplete="logo" />
                        </div>
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>

                    {{-- Tentang UKM --}}
                    <div class="mt-6">
                        <x-input-label for="about" :value="__('Tentang UKM')" />
                        <textarea name="about" id="about" rows="5"
                            class="mt-1 w-full bg-white text-gray-900 border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm">{{ $ukm->about }}</textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    {{-- Batas Pendaftaran --}}
                    <div class="relative mt-6">
                        <x-input-label for="batas_pendaftaran" :value="__('Batas Pendaftaran')" />
                        <div class="relative">
                            <input type="date" id="batas_pendaftaran" name="batas_pendaftaran"
                                value="{{ old('batas_pendaftaran', $ukm->batas_pendaftaran) }}"
                                class="w-full bg-white text-gray-900 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" />
                            <div class="absolute left-3 top-2.5 pointer-events-none">
                                <i class="fas fa-calendar-alt text-white bg-indigo-600 p-1 rounded"></i>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('batas_pendaftaran')" class="mt-2" />
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="flex items-center justify-end mt-8">
                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-full transition duration-300">
                            Update UKM
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>