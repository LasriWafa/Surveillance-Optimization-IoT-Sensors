<x-app-layout>
    <x-slot name="header">
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Captor Data ') }}
        </h2>

    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">

            <div class="flex flex-col">

                <form action="{{ route('mesures.filter') }}" method="GET">
                    <div style="display: grid; grid-template-columns: auto auto auto;">
                        <div>
                            <x-jet-label for="start_date" value="{{ __('Start Date :') }}" />
                            <x-jet-input name="start_date" class="" type="date"
                                value="{{ request('start_date') }}" />
                        </div>
                        <div>
                            <x-jet-label for="end_date" value="{{ __('End Date :') }}" />
                            <x-jet-input name="end_date" class=" " type="date"
                                value="{{ request('end_date') }}" />
                        </div>

                        <div style=" padding: 15px; margin: 10px;">
                            <x-jet-button> {{ __('Filter') }} </x-jet-button>
                        </div>
                    </div>
                </form>

                <br>
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                    <tr>
                                        <th scope="col" width="60"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th scope="col" width="120"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Captor ID
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Humidity
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Temperature
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Created At
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Updated At
                                        </th>
                                    </tr>
                                </thead>

                                @if (is_array($mesures) || $mesures instanceof \Countable)
                                    @foreach ($mesures as $mesure)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $mesure->id }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $mesure->captor_id }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $mesure->humidity }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $mesure->temperature }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $mesure->created_at->format('Y-m-d H:i:s') }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $mesure->updated_at }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                @else
                                    <p>No Mesure Data Available.</p>
                                @endif
                            </table>
                        </div>
                    </div>
                    <!-- Display pagination links -->
                    {{ $mesures->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
