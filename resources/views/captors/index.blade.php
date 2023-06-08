<x-app-layout>

    <style>
        .grid-container {
            display: grid;
            grid-template-columns: auto auto ;
            /* gap: 1px 1px; */
            grid-row-gap: -20px; 

        }

        .imagos {
            float: left;
            width: 2800px;
            height: 300px;
            object-fit: cover;
        }

        .debox {
            width: 380px;
            padding: 10px;
            margin: 10px;
            margin-left: 40px;
        }

        .dehone {
            color: rgb(0, 0, 0);
            font-family: courier;
            font-size: 160%;
        }

        .button-container {
            display: flex;
            align-items: center;
           
        }
        .rounded-box3 {
            border-radius: 10px;
            background-color: rgb(230, 227, 227);
            padding: 25px;
            width: 500px;
            height: 240px;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sensors main page') }}
        </h2>
    </x-slot>

    <br>


    <div style="margin: 40px;">

        @if (count($captors) > 0)
        <form action="{{ route('captors.create') }}" method="GET">
            @csrf
            <x-jet-button type="submit" class="ml-4">{{ __('Create New Sensor') }}</x-jet-button>
        </form>
        @endif

        @if (count($captors) > 0)
            <div class="grid-container">
                @foreach ($captors as $captor)
                    <div class="debox">

                        <div class="rounded-box3">

                            <a href="{{ route('captors.show', $captor->id) }}" class="font-medium  text-gray-500  hover:text-gray-700"
                            style="display: inline; margin-left: 330px;">
                            View Details
                            <svg style="display: inline;" class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            </a>

                        <p class="button-container">

                            <img style=" height: 160px; border-radius: 70%; width: 160px; margin-top: 8px; margin-left: -190px;"
                                class="" src="/images/{{ $captor->image }}" alt="{{ $captor->name }}" />

                            &nbsp;

                            <span
                                style=" font-family:Prompt, serif; font-size: 28px; margin-top: -15px;">&nbsp;&nbsp;{{ $captor->name }}
                            </span>
                            &nbsp;

                            <p style="color:rgb(116, 114, 114); margin-left: 178px; font-size: 15px; margin-top: -81px;">
                                <span> ID: {{ $captor->IMEI }} </span>
                            </p>

                        </p></div>

                      
                    </div>
                @endforeach
            </div>
    </div>
@else
    <div style="display: flex; justify-content: center;">
        <div class="rounded-box">

            <div class="button-container">
                <img class="sorry-icon" src="{{ url('images/sorry.png') }}">
            </div>
            <br><br>
            <h3 style="text-align: center">
                You Have No Captors to Display <br> how about adding one.
            </h3> 

            <br><br>

            <div class="button-container">
                <a href="{{ route('captors.create') }}" class="add-button">
                    <img class="add-icon" src="{{ url('images/plus.png') }}">
                </a>
                <p style="font-size: 22px; margin-top: 18px;" > &nbsp; Add a Captor </p>
            </div>

        </div>
    </div>

    @endif

    <div style=" padding: 10px; margin: 60px; "> </div>

    <style>
        .button-container {
            display: flex;
            align-items: center;
            justify-content: center;
            /* height: 100vh; */
        }

        .rounded-box {
            border-radius: 30px;
            background-color: rgb(226, 226, 226);
            padding: 60px;
            width: 400px;

        }

        .add-icon {
            width: 45px;
            height: 45px;
            margin-top: 14px;

        }
        .sorry-icon {
            width: 90px;
            height: 90px;
            margin-top: 14px;
            
        }
    </style>
</x-app-layout>
