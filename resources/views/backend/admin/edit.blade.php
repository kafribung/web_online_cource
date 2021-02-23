<x-app-layout>
    <x-slot name='title'>
        Admin Edit
    </x-slot>

    <div class="w-100 bg-gray-200 sm:rounded-lg p-6">
        <form method="POST" action="{{ route('admin.edit', $user->email) }}">
            @csrf
            @method('PATCH')
            @include('backend.admin.form', ['btn' => 'edit'])
        </form>
    </div>

</x-app-layout>
