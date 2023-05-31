<x-app-layout>

    <style>
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            gap: 1px 1px;

        }

        .imagos {
            float: left;
            width: 2800px;
            height: 300px;
            object-fit: cover;
        }

        .debox {
            width: 380px;
            padding: 50px;
            margin: 10px;
        }

        .dehone {
            color: rgb(0, 0, 0);
            font-family: courier;
            font-size: 160%;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Captors Page') }}
        </h2>
    </x-slot>

    <br>


    <div style="margin: 40px;">

        @if (count($captors) > 0)
        <form action="{{ route('captors.create') }}" method="GET">
            @csrf
            <x-jet-button type="submit" class="ml-4">{{ __('Create New Captor') }}</x-jet-button>
        </form>
        @endif

        @if (count($captors) > 0)
            <div class="grid-container">
                @foreach ($captors as $captor)
                    <div class="debox">
                        <!-- Picture -->
                        <img src="/images/{{ $captor->image }}" class="imagos" alt="">
                        <h1 class="dehone" style="text-align: center;"> {{ $captor->name }} </h1>
                        <!-- To view captor details -->
                        <form style="text-align: center;" action="{{ route('captors.show', $captor->id) }}"
                            method="GET">
                            @csrf
                            <x-jet-button style="text-align: center;" type="submit" class="ml-4">
                                {{ __('View More') }}</x-jet-button>
                        </form>
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
