<div class="mt-2">
    <x-label for="name" :value="__('name')" />
    <x-input id="name" class="block mt-2 w-full" type="text" name="name" :value="old('name') ?? $user->name" required />
    <x-auth-validation-error-manual has='name'></x-auth-validation-error-manual>
</div>
<div class="mt-2">
    <x-label for="email" :value="__('email')" />
    <x-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email') ?? $user->email" required />
    <x-auth-validation-error-manual has='email'></x-auth-validation-error-manual>
</div>
@if ($user->name)
<div class="mt-2">
    <x-label for="password" :value="__('password old')" />
    <x-input id="password" class="block mt-2 w-full" type="password" name="password"  required />
    <x-auth-validation-error-manual has='password'></x-auth-validation-error-manual>
</div>
<div class="mt-2">
    <x-label for="password_new" :value="__('password new')" />
    <x-input id="password_new" class="block mt-2 w-full" type="password" name="password_new" />
    <x-auth-validation-error-manual has='password_new'></x-auth-validation-error-manual>
</div>
@else
<div class="mt-2">
    <x-label for="password" :value="__('password')" />
    <x-input id="password" class="block mt-2 w-full" type="password" name="password"  required />
    <x-auth-validation-error-manual has='password'></x-auth-validation-error-manual>
</div>
<div class="mt-2">
    <x-label for="password_confirmation" :value="__('password_confirmation')" />
    <x-input id="password_confirmation" class="block mt-2 w-full" type="password" name="password_confirmation" />
</div>
@endif
<div class="flex justify-end">
    <x-button class="mt-2">
        {{ $btn ?? __('Store') }}
    </x-button>
</div>