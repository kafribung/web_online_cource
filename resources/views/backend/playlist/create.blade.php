<x-app-layout>
    <x-slot name='title'>
        Dashboard
    </x-slot>

    <div class="w-100 bg-gray-200 sm:rounded-lg p-6">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <x-label for="img" :value="__('img')" />
                <x-input id="img" class="block mt-2 bg-white" type="file" name="img" accept="image/*"  required autofocus />
            </div>
            <div class="mt-2">
                <x-label for="title" :value="__('Title')" />
                <x-input id="title" class="block mt-2 w-full" type="text" name="title" :value="old('title')" required />
            </div>
            <div class="mt-2">
                <x-label for="price" :value="__('Price')" />
                <x-input id="price" class="block mt-2 w-full" type="number" name="price" :value="old('price')" required />
            </div>
            <div class="mt-2">
                <x-label for="description" :value="__('Description')" />
                <x-text-area name="description" class="block mt-2 w-full">{{ old('description') }}</x-text-area>
            </div>
            <div class="flex justify-end">
                <x-button class="mt-2">
                    {{ __('Store') }}
                </x-button>
            </div>
        </form>
    </div>

</x-app-layout>
