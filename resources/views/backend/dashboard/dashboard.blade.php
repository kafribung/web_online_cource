<x-app-layout>
    <x-slot name='title'>
        Dashboard
    </x-slot>
    <div class="min-h-full flex justify-center items-center">
        <div id="app" class="text-2xl">Selamat @{{ greeting }} {{ $user }}</div> 
    </div>
    @push('after_script')
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data() {
                return {
                    greeting : null
                }
            },
            mounted() {
                this.time()
            },
            methods: {
                time(){
                    var time = new Date().getHours();
                    if (time < 10) this.greeting = 'Pagi'
                    else if(time < 20) this.greeting = 'Siang'
                    else this.greeting = 'Malam'
                }
            },
        })
    </script>
    @endpush
</x-app-layout>
