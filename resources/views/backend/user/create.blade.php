<x-app-layout>
    <x-slot name='title'>
        User Create
    </x-slot>

    <div class="w-100 bg-gray-200 sm:rounded-lg p-6">
        <form method="POST" action="/user" novalidate>
            @csrf
            @include('backend.user._form', ['user' => new App\Models\User])
        </form>
    </div>

</x-app-layout>
