<x-app-layout>
    <x-slot name='title'>
        Dashboard
    </x-slot>

    <div class="w-100 bg-gray-200 sm:rounded-lg p-6">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="alert-danger text-sm text-red-500" style="display:none"></div>

        <form method="POST"  name="demoform" id="demoform" class="demofrom"  action="{{ route('playlist.store') }}" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="mt-2">
                <x-label for="img" :value="__('img')" />
                <x-input id="img" class="block mt-2 bg-white" type="file" name="img" accept="image/*"  required autofocus />
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
                <x-label for="category" :value="__('Category')" />
                <select  id="category"  class="select2 block mt-2 w-full"  name="category[]" multiple required />
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option> 
                    @endforeach
                </select>
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

@push('after_script')
    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    {{-- Ajax --}}
    <script>
        let token = $('meta[name="csrf-token"]').attr('content');
        $(function() {
            //form submission code goes here
            $("form[name='demoform']").submit(function(event) {
                //Make sure that the form isn't actully being sent.
                event.preventDefault();
                URL = $("#demoform").attr('action');
                // formData = $('#demoform').serialize();
                formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: URL,
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function(result){
                        // Swal.fire({
                        //     position: 'top-end',
                        //     icon: 'success',
                        //     title: 'Your work has been saved',
                        //     showConfirmButton: false,
                        //     timer: 2000
                        // })
                        // location.reload('/playlist')
                        console.log('succesc');
                    },
                    error: function(result){
                        if(result= result.responseJSON.errors)
                        {
                            jQuery.each(result, function(key, value){
                                jQuery('.alert-danger').show();
                                jQuery('.alert-danger').append('<li>'+value+'</li>');
                            });
                        }
                    },
                });
            });
        })
    </script>
@endpush
</x-app-layout>
