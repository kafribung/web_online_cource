<x-app-layout>
    <x-slot name='title'>
        Category Create
    </x-slot>

    <div class="w-100 bg-gray-200 sm:rounded-lg p-6">
        <form method="POST" action="{{ route('category.create') }}" novalidate>
            @csrf
            @include('backend.category._form', ['category' => new App\Models\Category])
        </form>
    </div>

</x-app-layout>
