<x-app-layout>
    <x-slot name='title'>
        Category Edit
    </x-slot>

    <div class="w-100 bg-gray-200 sm:rounded-lg p-6">
        <form method="POST" action="{{ route('category.edit', $category->slug) }}" novalidate>
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            @include('backend.category._form', ['category' => $category])
        </form>
    </div>

</x-app-layout>
