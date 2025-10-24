<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Profile Settings') }}
            </h2>
            <span class="text-sm text-gray-500 dark:text-gray-400">Kelola informasi akun Anda</span>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            {{-- Update Profile Info --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-lg transition duration-300">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a5 5 0 00-3.5 8.5A5.978 5.978 0 006 13a6 6 0 0012 0 5.978 5.978 0 00-.5-2.5A5 5 0 0010 2z" />
                        </svg>
                        {{ __('Update Profile Information') }}
                    </h3>
                </div>
                <div class="p-6">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Update Password --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-lg transition duration-300">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a6 6 0 016 6v2h1a1 1 0 011 1v6a2 2 0 01-2 2H4a2 2 0 01-2-2v-6a1 1 0 011-1h1V8a6 6 0 016-6z" />
                        </svg>
                        {{ __('Change Password') }}
                    </h3>
                </div>
                <div class="p-6">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            

            {{-- Delete Account --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-lg transition duration-300">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-red-600 dark:text-red-400 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-red-600 dark:text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H3a1 1 0 100 2h1v11a2 2 0 002 2h8a2 2 0 002-2V6h1a1 1 0 100-2h-2V3a1 1 0 00-1-1H6zm3 4a1 1 0 112 0v8a1 1 0 11-2 0V6zm-4 0a1 1 0 112 0v8a1 1 0 11-2 0V6zm8 0a1 1 0 112 0v8a1 1 0 11-2 0V6z" clip-rule="evenodd" />
                        </svg>
                        {{ __('Delete Account') }}
                    </h3>
                </div>
                <div class="p-6">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
