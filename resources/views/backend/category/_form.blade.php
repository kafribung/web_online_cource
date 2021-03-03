<div class="mt-2">
    <x-label for="title" :value="__('Title')" />
    <x-input id="title" class="block mt-2 w-full" type="text" name="title" :value="old('title') ?? $category->title" autofocus required />
    <x-auth-validation-error-manual has='title'></x-auth-validation-error-manual>
</div>
<div class="flex justify-end">
    <x-button class="mt-2">
        {{ $btn ?? __('Store') }}
    </x-button>
</div>