<x-app-layout>
    <x-slot name='title'>
        Admin Create
    </x-slot>

    <div class="w-100 bg-gray-200 sm:rounded-lg p-6">
        <form method="POST" action="{{ route('admin.create') }}">
            @csrf
            @include('backend.admin._form', ['user' => new App\Models\User])
        </form>
    </div>

</x-app-layout>
