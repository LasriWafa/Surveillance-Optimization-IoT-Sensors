<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Page for captors') }}
        </h2>

        <!-- Settings Dropdown -->
        <div  class="ml-3 relative">
        <x-jet-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button style="float: right; top: 70%; right: 0; transform: translateY(-100%);">
                    <div
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                        {{ __('Management') }}
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <div>
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
                {{ __('Manage Sensors') }}
                </x-jet-dropdown-link>
        
            </x-slot>
        </x-jet-dropdown>
        </div>

    </x-slot>


   

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">

            <div class="block mb-8">
                <form class="ml-4" action="{{ route('adminsCaptors.create') }}" method="GET">
                    @csrf
                    <x-jet-button type="submit" class="ml-4">{{ __('Add Sensor') }}</x-jet-button>
                </form>
            </div> <br>
            <div class="block mb-8">
                <form class="ml-4" action="{{ route('adminsCaptors.remove') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <x-jet-danger-button style=" margin-top: -70px; float: right;"  type="submit" class="ml-4">{{ __('Delete All Sensors') }}</x-jet-danger-button>
                </form><br>
            </div>
            <br>

            <div style=" margin-top: -60px;" class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    {{-- <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"> --}}
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        pic
                                    </th>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" width="100" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        User ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Type
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        IMEI
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Manufactor
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
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

                                        <td style="width:99px" class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $captor->user_id }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $captor->name }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $captor->type }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $captor->IMEI }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $captor->manufactor }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        
                                            <a style="color:rgba(8, 136, 61, 0.815)" href="{{ route('adminsCaptors.show', $captor->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View Sensor</a>
                                          
                                            
                                            <a style="color:rgba(8, 21, 136, 0.815)" href="{{ route('adminsCaptors.edit', $captor->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit Sensor</a>
                                            <br>
                                            <form class="inline-block" action="{{ route('adminsCaptors.destroy', $captor->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete Sensor">
                                            </form>

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