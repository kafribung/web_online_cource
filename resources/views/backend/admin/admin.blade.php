<x-app-layout>
    <x-slot name='title'>
        Admin
    </x-slot>
    <div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
    </div>
    <div>
        <div class="shadow overflow-hidden border border-gray-200 sm:rounded-lg m-6">
            <div class="bg-gray-50 flex justify-end p-2">
                <a href="{{ route('admin.create') }}" class="border-2 border-blue-200  rounded-md">
                    <svg width="25px" height="25px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Dribbble-Light-Preview" transform="translate(-340.000000, -2079.000000)" fill="#3B82F6">
                                <g id="icons" transform="translate(56.000000, 160.000000)">
                                    <path d="M304,1922 L304,1924 L301,1924 L301,1927 L299,1927 L299,1924 L296,1924 L296,1922 L299,1922 L299,1919 L301,1919 L301,1922 L304,1922 Z M286.312,1937 C287.103,1934.633 289.33,1932.92 291.958,1932.902 C291.972,1932.902 291.985,1932.906 292,1932.906 C292.015,1932.906 292.028,1932.902 292.042,1932.902 C294.671,1932.92 296.899,1934.632 297.69,1937 L286.312,1937 Z M292,1926.906 C293.103,1926.906 294,1927.803 294,1928.906 C294,1929.995 293.125,1930.879 292.042,1930.902 C292.028,1930.902 292.014,1930.9 292,1930.9 C291.986,1930.9 291.972,1930.902 291.958,1930.902 C290.875,1930.879 290,1929.995 290,1928.906 C290,1927.803 290.897,1926.906 292,1926.906 L292,1926.906 Z M295.026,1931.495 C295.625,1930.796 296,1929.899 296,1928.906 C296,1926.697 294.209,1924.906 292,1924.906 C289.791,1924.906 288,1926.697 288,1928.906 C288,1929.899 288.375,1930.796 288.974,1931.495 C286.057,1932.686 284,1935.543 284,1938.89 C284,1938.93 284.024,1939 284.024,1939 L299.994,1939 C300.216,1936.566 298.564,1932.941 295.026,1931.495 L295.026,1931.495 Z" id="profile_plus-[#1357]"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>
            </div>
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        </th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            No
                        </th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nama
                        </th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Role
                        </th>
                        <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white text-xs divide-y divide-gray-200">
                    @php
                        $angkaAwal = 1
                    @endphp
                    @foreach ($admins as $admin)
                    <tr>
                        <td class="px-2 py-4 whitespace-nowrap">
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            {{ $angkaAwal++ }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            {{ $admin->name }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            {{ $admin->email }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            {{ $admin->roles[0]->name }}
                        </td>
                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex justify-start space-x-1">
                                <a href="{{ route('admin.edit', $admin->email) }}" class="border-2 border-yellow-200 rounded-md p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" class="h-4 w-4 text-yellow-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <button class="border-2 border-red-200 rounded-md p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" class="h-4 w-4 text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>