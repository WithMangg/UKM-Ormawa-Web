<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tentang UKM') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg"> 
                
                <form method="POST" action=" {{route('abouts.update', $abouts->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')  
                    <div>
                        <x-input-label for="nama_organisasi" :value="__('Nama Organisasi')" />
                        <x-text-input id="nama_organisasi" class="block mt-1 w-full" type="text" name="nama_organisasi"
                         value="{{  $abouts->nama_organisasi }}"
                          required autofocus autocomplete="nama_organisasi" />
                        <x-input-error :messages="$errors->get('nama_organisasi')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="slogan" :value="__('Slogan')" />
                        <x-text-input id="slogan" class="block mt-1 w-full" type="text" name="slogan"
                         value="{{  $abouts->slogan }}"
                          required autofocus autocomplete="slogan" />
                        <x-input-error :messages="$errors->get('slogan')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="logo" :value="__('logo')" />
                        <img src="{{Storage::url($abouts->logo)}}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="logo" class="block mt-1 w-full" type="file" name="logo" autofocus autocomplete="logo" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="tentang_kami" :value="__('tentang_kami')" />
                        <textarea name="tentang_kami" id="tentang_kami" cols="30" rows="5" class="border border-slate-300 rounded-xl w-full">{{ $abouts->tentang_kami }}</textarea>
                        <x-input-error :messages="$errors->get('tentang_kami')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                         value="{{  $abouts->email }}"
                          required autofocus autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="nomer_telepon" :value="__('No Telepon')" />
                        <x-text-input id="nomer_telepon" class="block mt-1 w-full" type="text" name="nomer_telepon"
                         value="{{  $abouts->nomer_telepon }}"
                          required autofocus autocomplete="nomer_telepon" />
                        <x-input-error :messages="$errors->get('nomer_telepon')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="lokasi" :value="__('Lokasi')" />
                        <x-text-input id="lokasi" class="block mt-1 w-full" type="text" name="lokasi"
                         value="{{  $abouts->lokasi }}"
                          required autofocus autocomplete="lokasi" />
                        <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>