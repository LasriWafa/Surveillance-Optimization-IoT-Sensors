<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Page for captors') }}
        </h2>

        <!-- Settings Dropdown -->
        <div  class="ml-3 relative">
        <x-jet-dropdown align="right" width="48">
            <x-slot  name="trigger">
                <button style="float: right; top: 70%; right: 0; transform: translateY(-100%);">
                    {{ __('> Management') }}
               </button>
            </x-slot>

            <x-slot name="content">
            <!-- Admin Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Admin Managements ') }}
                </div>

                <x-jet-dropdown-link href="{{ route('users.index') }}">
                {{ __('Manage Users') }}
                </x-jet-dropdown-link>

                <x-jet-dropdown-link href="{{ route('adminsCaptors.index') }}">
                {{ __('Manage Captors') }}
                </x-jet-dropdown-link>
        
            </x-slot>
        </x-jet-dropdown>
        </div>

    </x-slot>


    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Image
                                    </th>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" width="90" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        User ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        IMEI
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Manufactor
                                    </th>
                                  
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                  
                                @foreach ($captors as $captor)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <img style="  max-width: none; object-fit: cover; height: 40px; border-radius: 50%; width: 40px;" src="/images/{{ $captor->image }}"   alt="{{ $captor->name }}">
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $captor->id }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $captor->user_id }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $captor->name }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $captor->IMEI }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $captor->manufactor }}
                                        </td>
                                    </tr>
                                @endforeach                         
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
         
</x-app-layout>