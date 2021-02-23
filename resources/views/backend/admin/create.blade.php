<x-app-layout>
    <x-slot name='title'>
        Admin Create
    </x-slot>

    <div class="w-100 bg-gray-200 sm:rounded-lg p-6">

        <form method="POST" action="{{ route('admin.create') }}">
            @csrf
            <div class="mt-2">
                <x-label for="name" :value="__('name')" />
                <x-input id="name" class="block mt-2 w-full" type="text" name="name" :value="old('name')" required />
                <x-auth-validation-error-manual has='name'></x-auth-validation-error-manual>
            </div>
            <div class="mt-2">
                <x-label for="email" :value="__('email')" />
                <x-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required />
                <x-auth-validation-error-manual has='email'></x-auth-validation-error-manual>
            </div>
            <div class="mt-2">
                <x-label for="password" :value="__('password')" />
                <x-input id="password" class="block mt-2 w-full" type="password" name="password"  required />
                <x-auth-validation-error-manual has='password'></x-auth-validation-error-manual>
            </div>
            <div class="mt-2">
                <x-label for="password_confirmation" :value="__('password_confirmation')" />
                <x-input id="password_confirmation" class="block mt-2 w-full" type="password" name="password_confirmation" />
            </div>
            <div class="flex justify-end">
                <x-button class="mt-2">
                    {{ __('Store') }}
                </x-button>
            </div>
        </form>
    </div>

</x-app-layout>
