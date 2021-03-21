<x-app-layout>
    <x-slot name='title'>
        Dashboard
    </x-slot>

    <div class="w-100 bg-gray-200 sm:rounded-lg p-6">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form>

        <form method="POST"  action="{{ route('playlist.store') }}" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="mt-2">
                <x-label for="img" :value="__('img')" />
                {{-- <x-input id="img" class="block mt-2 bg-white" type="file" name="img" accept="image/*"  required autofocus /> --}}
                <x-auth-validation-error-manual has='img'></x-auth-validation-error-manual>
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

@push('after_css')
    <link rel="stylesheet" href="{{ asset('backend/dropzone/dist/min/dropzone.min.css') }}">
@endpush
@push('after_script')
    <script src="{{ asset('backend/dropzone/dist/dropzone.js') }}"></script>
@endpush
</x-app-layout>
