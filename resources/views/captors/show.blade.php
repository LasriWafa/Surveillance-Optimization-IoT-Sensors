<x-app-layout>

    <style>
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            gap: 5px 5px;
        }

        .gridos-container {
            display: grid;
            grid-template-columns: auto auto auto auto;
            gap: 5px 5px;
        }

        .imagos {
            width: 320px;
            height: 300px;
            border-radius: 10%;
            /* margin-top: 40px; */
        }

        .grid-item {

            padding: 10px;
            font-size: 30px;
            text-align: center;
        }

        .rounded-box {
            border-radius: 10px;
            background-color: rgb(240, 240, 240);
            padding: 25px;
            width: 500px;
        }

        .rounded-box1 {
            border-radius: 10px;
            background-color: rgb(240, 240, 240);
            padding: 25px;
        }

        .button {
            display: inline-block;
            padding: 10px 10px;
            border-radius: 20px;
            background-color: rgb(236, 12, 12);
        }

        .ONbutton {
            display: inline-block;
            padding: 10px 10px;
            border-radius: 20px;
            background-color: rgb(16, 172, 81);
        }

        .offo {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .offo p {
            font-size: 20px;
            margin-left: 10px;
        }
    </style>
    <style>
        .onButton {
            background-color: rgb(68, 204, 68);
            color: white;
            border: none;
            padding: 8px 11px;
            font-size: 12px;
            cursor: pointer;
            border-radius: 30px;
        }

        .offButton {
            background-color: rgb(245, 73, 73);
            color: white;
            border: none;
            padding: 8px 11px;
            font-size: 12px;
            cursor: pointer;
            border-radius: 30px;
        }
    </style>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Captor Information') }}
        </h2>
    </x-slot>


    <div style="margin: 40px;">

        <div class="block mb-8">
            <a href="{{ route('captors.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">
                Go Back
            </a>
        </div>

        {{-- -------------------------------   ON/OFF   --------------------------------------- --}}

        <div style=" text-align: right;  margin-top: -40px;">
            <form id="sensorForm" method="POST" action="{{ route('control-sensor', $captor->id) }}">
                @csrf
                <button class="onButton" type="submit" name="command" value="on">ON</button>
                <button class="offButton" type="submit" name="command" value="off">OFF</button>
            </form>
        </div>
        <br>
        {{-- -------------- END OF ON/OFF -------------------------------------------------------- --}}

        <div class="grid-container">

            <div class="grid-item">
                <p style="font-size: 20px; "> Sensor Image </p>
                <img src="/images/{{ $captor->image }}" class="imagos" alt=""> <br>

                @if ($lastMesure)
                    <div class="rounded-box1">
                        <p style="font-size: 20px; position: relative; color:rgb(174, 180, 180); left: -100px;"> Status
                        </p>
                        @if ($captor->status == false)
                            <div class="offo">
                                <a href="#" class="button"></a>
                                <p style="font-size: 20px; "> OFF </p>
                            </div>
                        @else
                            <div class="offo">
                                <a href="#" class="ONbutton"></a>
                                <p style="font-size: 20px; "> ON </p>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="rounded-box1" style="width: 320px;">
                        <p style="font-size: 20px; position: relative; color:rgb(174, 180, 180); left: -100px;"> Status
                        </p>
                        @if ($captor->status == false)
                            <div class="offo">
                                <a href="#" class="button"></a>
                                <p style="font-size: 20px; "> OFF </p>
                            </div>
                        @else
                            <div class="offo">
                                <a href="#" class="ONbutton"></a>
                                <p style="font-size: 20px; "> ON </p>
                            </div>
                        @endif
                    </div>

                @endif
            </div>

            <div class="grid-item">
                <p style="font-size: 20px;"> Sensor Information </p>
                <div class="rounded-box">
                    <x-jet-label for="name" value="{{ __('Captor Name :') }}" />
                    <x-jet-input class="block mt-1 w-full" type="text" value="{{ $captor->name }}" readonly />
                    <x-jet-label for="name" value="{{ __('IMEI :') }}" />
                    <x-jet-input class="block mt-1 w-full" type="text" value="{{ $captor->IMEI }}" readonly />
                    <x-jet-label for="name" value="{{ __('Type :') }}" />
                    <x-jet-input class="block mt-1 w-full" type="text" value="{{ $captor->type }}" readonly />
                    <x-jet-label for="name" value="{{ __('Created At :') }}" />
                    <x-jet-input class="block mt-1 w-full" type="text" value="{{ $captor->created_at }}" readonly />
                    <x-jet-label for="name" value="{{ __('Updated At :') }}" />
                    <x-jet-input class="block mt-1 w-full" type="text" value="{{ $captor->updated_at }}" readonly />
                    <x-jet-label for="name" value="{{ __('User ID :') }}" />
                    <x-jet-input class="block mt-1 w-full" type="text" value="{{ $captor->user_id }}" readonly />
                </div>
            </div>

            @if ($lastMesure)
                <div class="grid-item">
                    <p style="font-size: 20px;"> Temperature & Humidity Overview </p>
                    <div class="rounded-box" style="width: 100%;height: 86%;">

                        <canvas id="last-values-chart"></canvas>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <script>
                            var temperature = {!! json_encode($lastMesure->temperature) !!};
                            var humidity = {!! json_encode($lastMesure->humidity) !!};

                            var ctx = document.getElementById('last-values-chart').getContext('2d');
                            var chart = new Chart(ctx, {
                                type: 'doughnut',
                                data: {
                                    datasets: [{
                                        data: [temperature, humidity],
                                        backgroundColor: ['rgba(255, 99, 132, 0.8)', 'rgba(54, 162, 235, 0.8)'],
                                        borderWidth: 0,
                                        hoverOffset: 4,
                                    }],
                                    labels: [
                                        temperature + '°C' + 'Temperature ',
                                        humidity + '%' + 'Humidity '
                                    ]
                                },
                                options: {
                                    cutout: '70%',
                                    plugins: {
                                        legend: {
                                            display: true,
                                            position: 'bottom',
                                            align: 'center',
                                            labels: {
                                                font: {
                                                    size: 14
                                                }
                                            }
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
        </div>
    </div>
    @endif

    @if ($lastMesure)
        <div style="margin: 60px;">

            <div class="gridos-container">

                <div>
                    <form class="ml-4" action="{{ route('captors.edit', $captor->id) }}" method="">
                        @csrf
                        <x-jet-button type="submit" class="ml-4">{{ __('Edit Captor') }}</x-jet-button>
                    </form>
                </div>

                <div>
                    <form class="ml-4" action="{{ route('mesures.index', $captor->id) }}" method="">
                        @csrf
                        <x-jet-button type="submit" class="ml-4">{{ __('View Captor Data') }}</x-jet-button>
                    </form>
                </div>

                <div>
                    <form class="ml-4" action="{{ route('chart.index', $captor->id) }}" method="get">
                        @csrf
                        <x-jet-button type="submit" class="ml-4">{{ __('Visualize Graph') }}</x-jet-button>
                    </form>
                </div>

                <div>
                    <form class="ml-4" action="{{ route('captors.delete', $captor->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-jet-danger-button class="ml-3" type="submit">{{ __('Delete Captor') }}
                        </x-jet-danger-button>
                    </form>
                </div>

            </div>
        </div>
    @else
        <div style="margin: 60px;">

            <div
                style="border-radius: 10px; background-color: rgb(240, 240, 240); padding: 25px; height:300px; width: 300px;">

                <br>
                <div>
                    <form class="ml-4" action="{{ route('captors.edit', $captor->id) }}" method="">
                        @csrf
                        <x-jet-button type="submit" class="ml-4">{{ __('Edit Captor') }}</x-jet-button>
                    </form>
                </div> <br>

                <div>
                    <form class="ml-4" action="{{ route('mesures.index', $captor->id) }}" method="">
                        @csrf
                        <x-jet-button type="submit" class="ml-4">{{ __('View Captor Data') }}</x-jet-button>
                    </form>
                </div> <br>

                <div>
                    <form class="ml-4" action="{{ route('chart.index', $captor->id) }}" method="get">
                        @csrf
                        <x-jet-button type="submit" class="ml-4">{{ __('Visualize Graph') }}</x-jet-button>
                    </form>
                </div> <br>

                <div>
                    <form class="ml-4" action="{{ route('captors.delete', $captor->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-jet-danger-button class="ml-3" type="submit">{{ __('Delete Captor') }}
                        </x-jet-danger-button>
                    </form>
                </div>

            </div>
        </div>
    @endif

    <div style=" padding: 10px; margin: 30px; "> </div>

</x-app-layout>
