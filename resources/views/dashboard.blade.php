<x-app-layout>

    @php
        $currentDate = \Carbon\Carbon::now();
        $currentDateTime = \Carbon\Carbon::now();
    @endphp

    <x-slot name="header">

        <h2 class="">
            <p style="font-size: 30px;"> {{ $currentDate->format('F Y') }} </p>
            <p style="font-size: 13px; color:dimgray"> {{ $currentDate->format('l, F d, Y') }}</p>

        </h2>

        <div class="ml-3 relative">
            <div align="right" style=" position: relative; top: -40px;">
                <div style="font-size: 16px;"> Welcome, </div>
                <div style="font-size: 22px; color:rgb(147, 147, 206)"> {{ Auth::user()->name }} </div>
            </div>
        </div>

    </x-slot>

    <style>
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            gap: 1px 1px;

        }

        .split-page {
            display: flex;
        }

        .left-side,
        .right-side {
            flex: 1;
        }

        .rounded-box {
            border-radius: 10px;
            background-color: rgb(240, 240, 240);
            padding: 25px;
            width: 500px;
        }

        .temperature-icon {
            width: 70px;
            height: 70px;
            margin-top: 14px;

        }
    </style>

    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
       
        <div class="text-2xl">
           
            <div class="split-page">
                
                {{-- LEFT SIDE --}}
                <div class="left-side">
                    Today overview
                    <br><br>

                    <div class="rounded-box">
                        <div class="grid-container">
                            @if ($lastMesure)
                            <img class="temperature-icon" src="{{ url('images/thermometer.png') }}">
                            <div>
                                <p style="font-size: 22px; color:rgb(189, 189, 189)"> Temperature </p><br>
                                <b style="font-size: 40px;"> {{ $lastMesure->temperature }} °C </b>
                            </div>
                            @else
                                <p style="font-size: 20px; color:dimgrey; text-align:center;"> No Available Data </p>
                            @endif
                        </div>
                    </div> <br>

                    <div class="rounded-box">
                        <div class="grid-container">
                            @if ($lastMesure)
                            <img class="temperature-icon" src="{{ url('images/humidity.png') }}">
                            <div>
                                <p style="font-size: 22px; color:rgb(189, 189, 189)"> Humidity </p><br>
                                <b style="font-size: 40px;"> {{ $lastMesure->humidity }} % </b>
                            </div>
                            @else
                                <p style="font-size: 20px; color:dimgrey; text-align:center;"> No Available Data </p>
                            @endif
                        </div>
                    </div>

                </div>

                {{-- RIGHT SIDE --}}
                <div class="right-side" style=" position: relative; top: -30px;">
                    <p style="margin-left: 450px; font-size: 30px; top: -25px; ">{{ $currentDateTime->format('h:i A') }}</p> 
                    Average Temperature & Humidity  
                    <br><br>
                    <div class="rounded-box" style="width: 580px;">
                       
                        <!-- Include the Chart.js library -->
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                       
                        <!-- Create a canvas element for the chart -->
                        <canvas id="measure-chart"></canvas>

                        <!-- JavaScript code to render the chart -->
     
                        <script>
                       
                            var temperatures = {!! json_encode($temperatures) !!};
                            var humidities = {!! json_encode($humidities) !!};

                            var ctx = document.getElementById('measure-chart').getContext('2d');
                            var chart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
                                    datasets: [{
                                        label: 'Temperature',
                                        data: temperatures,
                                        borderColor: 'rgba(255, 99, 132, 1)',
                                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                        pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                                        pointBorderColor: 'rgba(255, 255, 255, 1)',
                                        pointHoverRadius: 6,
                                        pointHoverBackgroundColor: 'rgba(255, 99, 132, 1)',
                                        pointHoverBorderColor: 'rgba(255, 255, 255, 1)',
                                        borderWidth: 2,
                                        fill: false
                                    }, {
                                        label: 'Humidity',
                                        data: humidities,
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                        pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                                        pointBorderColor: 'rgba(255, 255, 255, 1)',
                                        pointHoverRadius: 6,
                                        pointHoverBackgroundColor: 'rgba(54, 162, 235, 1)',
                                        pointHoverBorderColor: 'rgba(255, 255, 255, 1)',
                                        borderWidth: 2,
                                        fill: false
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            grid: {
                                                drawBorder: false,
                                                color: 'rgba(0, 0, 0, 0.1)'
                                            },
                                            ticks: {
                                                fontColor: 'rgba(0, 0, 0, 0.6)',
                                                padding: 10
                                            }
                                        },
                                        x: {
                                            grid: {
                                                drawBorder: false,
                                                color: 'rgba(0, 0, 0, 0)'
                                            },
                                            ticks: {
                                                fontColor: 'rgba(0, 0, 0, 0.6)',
                                                padding: 10
                                            }
                                        }
                                    },
                                    plugins: {
                                        legend: {
                                            display: true,
                                            labels: {
                                                fontColor: 'rgba(0, 0, 0, 0.7)'
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
    </div>

</x-app-layout>
