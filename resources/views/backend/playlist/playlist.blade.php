<x-app-layout>
    <x-slot name='title'>
        Playlist
    </x-slot>
    <div id="app" class="grid grid-cols-4 gap-2 h-14">
        @foreach ($playlists as $playlist)
        <div class="bg-gray-200 rounded-lg">
            <div class="m-2 font-bold text-base">{{ $playlist->title }}</div>
            <div class="m-2 leading-none italic text-xs">Rp. {{ number_format($playlist->price, 2) }}</div>
            <div class="m-2 leading-none text-xs">Author: {{ $playlist->user->name }}</div>
            {{-- <img  width="200" height="200"> --}}
            <div class="bg-rose-300">
                <img class="object-contain h-48 w-full" src="{{ $playlist->takeImg }}" alt="Error" srcset="">
            </div>
            <div>
                <div class="m-2">
                    @forelse ($playlist->categories as $category)
                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-green-500 rounded-full">{{ $category->title }}</span>
                    @empty
                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-500 rounded-full">Belum</span>
                    @endforelse
                </div>
                <div class="m-2 text-justify">{{ Str::limit($playlist->description, 20)  }}</div> 
                <div  class="flex justify-center mb-2">
                    <button   v-on:click="editPlaylist( {{ json_encode($playlist->slug)  }} )" class="border-2 border-yellow-200 rounded-md p-1 mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="h-4 w-4 text-yellow-500 hover:text-yellow-300">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </button>
                    <button  id="delete" onclick=" deleteAdmin()"  class="border-2 border-red-200 rounded-md p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="h-4 w-4 text-red-500 hover:text-red-300">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div> 
        @endforeach
        {{-- Modal --}}
        <div v-if="showModal" class="fixed overflow-x-hidden overflow-y-auto inset-0 flex justify-center items-center z-50">
            <div class="relative mx-auto w-80 max-w-2xl">
                <div class="bg-white w-full rounded shadow-2xl flex flex-col">
                    <div class="text-sm font-bold m-3">Hallo Modal</div>
                    <div class="m-3 max-w-2xl">
                        <form v-on:submit.prevent="updatePlalist" enctype="multipart/form-data">
                            <div class="mt-2">
                                <div class="bg-rose-300">
                                    <img class="object-contain h-48 w-full" :src="formDataUpdate.img">
                                </div>
                                <x-label for="img" :value="__('img')" />
                                <x-input id="img" class="block mt-1 w-full" type="file"  v-on:change="handleFileUpload" accept="image/*"  autofocus required/>
                            </div>
                            <div class="mt-2">
                                <x-label for="title" :value="__('Title')" />
                                <x-input id="title" class="block mt-2 w-full" type="text" name="title" v-model="formDataUpdate.title" required />
                            </div>
                            <div class="mt-2">
                                <x-label for="price" :value="__('Price')" />
                                <x-input id="price" class="block mt-2 w-full" type="number" name="price" v-model="formDataUpdate.price" required />
                            </div>
                            <div class="flex justify-end m-2">
                                <button @click="showModal=false" class="px-4 py-2 bg-red-500 text-white rounded mr-2">Close</button>
                                <button  class="px-4 py-2 bg-green-500 text-white rounded">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@push('after_script')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    new Vue({
        el: "#app",
        data() {
            return {
                showModal: false,
                formDataUpdate: {},
                img: null,
                slug: null,
            }
        },
        methods: {
            // Edit
            async editPlaylist(slug){
                this.showModal = !this.showModal
                this.slug = slug
                const response = await axios.get(`playlist/${slug}/edit`)
                this.formDataUpdate = response.data.data
            },
            handleFileUpload(e){
                // this.img = e.target.files[0]
                // console.log(this.formDataUpdate.img)

                let file = e.target.files[0];
                var fileReader = new FileReader();
                fileReader.readAsDataURL(file);
                fileReader.onload = (e) => {
                    this.formDataUpdate.img = e.target.result
                    console.log(this.formDataUpdate.img);
                };
            },
            // Update
            async updatePlalist(){
                // let formData = new FormData()
                // formData.append('img', this.img, this.img.name)
                // formData.append('title', this.formDataUpdate.title)
                // formData.append('price', this.formDataUpdate.price)
                // const config = {
                //     headers: { 'content-type': 'multipart/form-data' }
                // }
                // const response = await axios.post(`playlist/`, formData, config)

                const response = await axios.patch(`playlist/${this.slug}`, this.formDataUpdate)
                console.log(response)
            }
        },
    })
</script>
@endpush
</x-app-layout>
