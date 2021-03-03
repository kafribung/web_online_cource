<div class="md:w-1/5 bg-white min-h-screen px-4">
    <div class="mb-5">
        <h3 class="text-base text-gray-800 font-medium py-2 uppercase">Dashboard</h3>
        <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:text-gray-400 py-2 {{ request()->routeIs('dashboard') ? 'font-extrabold' : '' }}">Dashboard</a>
    </div>
    @role('super-admin')
    <div class="mb-5">
        <h3 class="text-base text-gray-800 font-medium py-2 uppercase">Admin</h3>
        <a href="{{ route('admin.index') }}" class="text-sm text-gray-500 hover:text-gray-400 py-2 {{ Request::is('admin') || Request::is('admin/*')  ? 'font-extrabold' : '' }}">Admin</a>
    </div>
    <div class="mb-5">
        <h3 class="text-base text-gray-800 font-medium py-2 uppercase">Users</h3>
        <a href="{{ route('user.index') }}" class="text-sm text-gray-500 hover:text-gray-400 py-2 {{ Request::is('user') || Request::is('user/*') ? 'font-extrabold' : '' }}">User</a>
    </div>
    @endrole

    {{-- Gate::before super-admin hanya dapat mendeteksi method can --}}
    {{-- Admin : create playlist|create playlist --}}
    @if (Auth::user()->can('create category'))
    <div class="mb-5">
        <h3 class="text-base text-gray-800 font-medium py-2 uppercase">Category</h3>
        <a href="{{ route('category.index') }}" class="text-sm text-gray-500 hover:text-gray-400 py-2 {{ request()->is('category') || request()->is('category/*') ? 'font-extrabold' : '' }}">Category</a>
    </div>
    @endif
    @can('create playlist')
    <div class="mb-5">
        <h3 class="text-base text-gray-800 font-medium py-2 uppercase">Playlist</h3>
        <a href="#" class="text-sm text-gray-500 hover:text-gray-400 py-2">Playlist</a>
    </div>
    @endcan
</div>