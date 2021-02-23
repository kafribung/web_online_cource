@if ($errors->has($data= $attributes->get('has')))
    <div class="text-sm italic text-red-600">{{ $errors->first($data) }}</div>
@endif