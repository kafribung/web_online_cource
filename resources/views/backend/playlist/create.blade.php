<x-app-layout>
    <x-slot name='title'>
        Dashboard
    </x-slot>

    <div class="w-100 bg-gray-200 sm:rounded-lg p-6">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        <form method="POST"  name="demoform" id="demoform" class="demofrom"  action="{{ route('playlist.store') }}" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="mt-2">
                <x-label for="img" :value="__('img')" />
                {{-- <x-input id="img" class="block mt-2 bg-white" type="file" name="img" accept="image/*"  required autofocus /> --}}
                <div id="dropzoneDragArea" class="dz-default dz-message dropzoneDragArea">
                    <span>Upload file</span>
                </div>
                <div class="dropzone-previews"></div>
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

@push('after_css')
    <link rel="stylesheet" href="{{ asset('backend/dropzone/dist/min/dropzone.min.css') }}">
    <style>
        .dropzoneDragArea {
		    background-color: #fbfdff;
		    border: 1px dashed #c0ccda;
		    border-radius: 6px;
		    padding: 60px;
		    text-align: center;
		    margin-bottom: 15px;
		    cursor: pointer;
		}
		.dropzone{
			box-shadow: 0px 2px 20px 0px #f2f2f2;
			border-radius: 10px;
		}
    </style>
@endpush
@push('after_script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('backend/dropzone/dist/dropzone.js') }}"></script>
    <script>
        Dropzone.autoDiscover = false;
        // Dropzone.options.demoform = false;	
        let token = $('meta[name="csrf-token"]').attr('content');
        $(function() {
        var myDropzone = new Dropzone("div#dropzoneDragArea", { 
            paramName: 'file',
            url: "{{ url('/playlist') }}",
            previewsContainer: 'div.dropzone-previews',
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            autoProcessQueue: false,
            uploadMultiple: false,
            parallelUploads: 1,
            maxFiles: 1,
            params: {
                _token: token
            },
            // The setting up of the dropzone
            init: function() {
                var myDropzone = this;
                //form submission code goes here
                $("form[name='demoform']").submit(function(event) {
                    //Make sure that the form isn't actully being sent.
                    event.preventDefault();
                    URL = $("#demoform").attr('action');
                    formData = $('#demoform').serialize();
                    $.ajax({
                        type: 'POST',
                        url: URL,
                        data: formData,
                        success: function(result){
                            if(result.status == "success"){
                                // fetch the useid 
                                // var userid = result.user_id;
                                // $("#userid").val(userid); // inseting userid into hidden input field
                                console.log('success')
                                //process the queue
                                myDropzone.processQueue();
                            }else{
                                console.log("error");
                            }
                        }
                    });
                });
                //Gets triggered when we submit the image.
                this.on('sending', function(file, xhr, formData){
                //fetch the user id from hidden input field and send that userid with our image
                console.log('sending')
                });
                
                this.on("success", function (file, response) {
                    //reset the form
                    $('#demoform')[0].reset();
                    //reset dropzone
                    $('.dropzone-previews').empty();
                });
                this.on("queuecomplete", function () {
                
                });
                
                // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
                // of the sending event because uploadMultiple is set to true.
                this.on("sendingmultiple", function() {
                // Gets triggered when the form is actually being sent.
                // Hide the success button or the complete form.
                });
                
                this.on("successmultiple", function(files, response) {
                // Gets triggered when the files have successfully been sent.
                // Redirect user or notify of success.
                });
                
                this.on("errormultiple", function(files, response) {
                // Gets triggered when there was an error sending the files.
                // Maybe show form again, and notify user of error
                });
            }
            });
        });
    </script>
@endpush
</x-app-layout>
