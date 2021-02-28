<x-app-layout>
    <x-slot name='title'>
        User Edit
    </x-slot>

    <div class="w-100 bg-gray-200 sm:rounded-lg p-6">
        <form method="POST" action="{{ route('user.update', $user->email) }}">
            @csrf
            @method('PATCH')
            @include('backend.user._form', ['btn' => 'edit'])
        </form>
    </div>

</x-app-layout>
