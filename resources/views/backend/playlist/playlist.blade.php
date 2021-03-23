<x-app-layout>
    <x-slot name='title'>
        Playlist
    </x-slot>
    <div class="grid grid-cols-4 gap-2 h-14">
        @foreach ($playlists as $playlist)
        <div class="bg-gray-200 rounded-lg">
            <div class="m-2 font-bold text-base">{{ $playlist->title }}</div>
            <div class="m-2 leading-none italic text-xs">Rp. {{ number_format($playlist->price, 2) }}</div>
            <div class="m-2 leading-none text-xs">Author: {{ $playlist->user->name }}</div>
            <div class="">
                <img src="{{ $playlist->takeImg }}" alt="Error" srcset="" width="200" height="200">
            </div>
            <div>
                <div class="m-2">
                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-green-500 rounded-full">Laravel</span>
                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-green-500 rounded-full">Css</span>
                </div>
                
                <div class="m-2 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, optio?</div> 
                <div class="flex justify-center mb-2">
                    <a href="" class="border-2 border-yellow-200 rounded-md p-1 mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="h-4 w-4 text-yellow-500 hover:text-yellow-300">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </a>
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
        
    </div>
</x-app-layout>
