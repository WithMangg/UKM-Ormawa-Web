<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit User') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow rounded-lg p-8">
                <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" id="name" name="name"
                                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="email" id="email" name="email"
                                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-6">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="password" name="password"
                                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <span class="text-sm text-gray-500">Kosongkan jika tidak ingin mengubah password</span>
                            @error('password')
                                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Confirm Password -->
                        <div class="mb-6">
                            <label for="password_confirmation"
                                class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('password_confirmation')
                                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>



                        <!-- Avatar
                        <div class="mb-6">
                            <label for="avatar" class="block text-sm font-medium text-gray-700">Avatar</label>
                            <input type="file" id="avatar" name="avatar" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @if($user->avatar)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="w-20 h-20 object-cover rounded-full">
                                    <div class="mt-2">
                                        <button type="button" class="text-sm text-red-500 hover:text-red-700" onclick="event.preventDefault(); document.getElementById('remove-avatar').submit();">Hapus Avatar</button>
                                    </div>
                                </div>
                            @endif
                            @error('avatar')
                                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div> -->


                        <!-- Roles -->
                        <div class="mb-6">
                            <label for="roles" class="block text-sm font-medium text-gray-700">Roles</label>
                            <select id="roles" name="roles[]" multiple
                                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('roles')
                                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end gap-4 mt-6">
                        <button type="submit"
                            class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500">Simpan</button>
                        <a href="{{ route('users.index') }}"
                            class="px-6 py-3 bg-gray-300 text-gray-800 font-semibold rounded-lg shadow-sm hover:bg-gray-400 focus:ring-2 focus:ring-gray-500">Batal</a>
                    </div>
                </form>

                <!-- Hidden Form to Remove Avatar -->
                @if($user->avatar)
                    <form id="remove-avatar" action="{{ route('users.removeAvatar', $user->id) }}" method="POST"
                        style="display:none;">
                        @csrf
                        @method('DELETE')
                    </form>
                @endif
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