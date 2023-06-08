<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin main page') }}
        </h2>

        <!-- Settings Dropdown -->
        <div class="ml-3 relative">
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Prompt">


    <div class="p-6 sm:px-20  border-gray-200">
        <div class="grid-container">

            <div class="rounded-box">
                <div class="grid-container" style="display: flex; justify-content: center;">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button style="" class="">
                            <img style="auto;max-width: none; object-fit: cover; height: 80px; border-radius: 70%; width: 80px;"
                                class="" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>
                    @else
                        <span class="">
                            <button
                                style="max-width: none; object-fit: cover; height: 80px; border-radius: 70%; width: 80px;"
                                type="button" class="">
                                {{ Auth::user()->name }}
                            </button>
                        </span>
                    @endif
                </div>

                <div>
                    <br>
                    <p style="font-size: 27px; display: flex; justify-content: center;"> <b> {{ Auth::user()->name }}
                        </b> </p>
                    <p style="font-size: 16px; display: flex; justify-content: center;"> {{ Auth::user()->email }} </p>
                </div>

                <div style="margin-top: 50px; margin-left: -24px;" class="rounded-box2">
                    <p style="font-size: 21px; display: inline;"> Total Users </p>
                    <p style="color:cornflowerblue; font-size: 30px; display: inline; margin-left: 100px;"> <b>
                            {{ $userCount }} </b> </p>
                </div>
                <div style="margin-top: 10px; margin-left: -24px;" class="rounded-box5">
                    <p style="font-size: 21px; display: inline;"> Total Sensors </p>
                    <p style="color:cornflowerblue; font-size: 30px; display: inline; margin-left: 80px;"> <b>
                            {{ $captorCount }} </b> </p>
                </div>
            </div>


            <div class="rounded-box1">
                <p style="font-size: 27px; display: inline; "> <b> Users </b> </p>
                <a href="{{ route('users.index') }}"
                    class="font-medium rounded-md text-gray-500 bg-white hover:text-gray-700"
                    style="display: inline; margin-left: 180px;">
                    View All
                    <svg style="display: inline;" class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                <br><br>
                <div>
                    @foreach ($useros as $user)
                        <p class="button-container">
                            <img style="auto;max-width: none; object-fit: cover; height: 55px; border-radius: 70%; width: 55px;"
                                class="" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />

                            &nbsp;

                            <span
                                style="font-family:Prompt, serif; font-size: 20px; margin-top: -15px;">{{ $user->name }}
                            </span>
                            &nbsp;
                        <p style="color:rgb(116, 114, 114); margin-left: 60px;  margin-top: -28px;"> <span>
                                {{ $user->email }} </span> </p>

                        @if ($user->role === 0)
                            <p style="color:rgb(101, 199, 101); margin-left: 320px;  margin-top: -40px;">
                                {{ __('User') }} </p>
                        @endif

                        @if ($user->role === 1)
                            <p style="color:rgb(237, 100, 100); margin-left: 310px;  margin-top: -40px;">
                                {{ __('Admin') }} </p>
                        @endif


                        </p> <br><br>
                    @endforeach
                </div>

                <div class="add-container" style="margin-top: -40px;">
                    <a href="{{ route('users.create') }}" class="add-button">
                        <img class="add-icon" src="{{ url('images/plusplus.png') }}">
                    </a>
                    <p style="font-size: 20px; margin-top: 100px;" > &nbsp; Add User </p>
                </div>

            </div>

            <div class="rounded-box3">
                <p style="font-size: 27px; display: inline;"> <b> Sensors </b> </p>
                <a href="{{ route('adminsCaptors.index') }}" class="font-medium  text-gray-500  hover:text-gray-700"
                    style="display: inline; margin-left: 150px;">
                    View All
                    <svg style="display: inline;" class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                <br><br>
                <div>
                    @foreach ($captoro as $captor)
                        <p class="button-container">
                            <img style="max-width: none; object-fit: cover; height: 55px; border-radius: 70%; width: 55px;"
                                class="" src="/images/{{ $captor->image }}" alt="{{ $captor->name }}" />

                            &nbsp;

                            <span
                                style="font-family:Prompt, serif; font-size: 20px; margin-top: -15px;">{{ $captor->name }}
                            </span>
                            &nbsp;

                        <p style="color:rgb(116, 114, 114); margin-left: 60px;  margin-top: -28px;">
                            <span> ID: {{ $captor->IMEI }} </span>
                        </p>


                        @if ($captor->status == false)
                            <p style="color:rgb(237, 100, 100); margin-left: 320px;  margin-top: -40px;">
                                {{ __('OFF') }} </p>
                        @endif

                        @if ($captor->status == true)
                            <p style="color:rgb(101, 199, 101); margin-left: 310px;  margin-top: -40px;">
                                {{ __('ON') }} </p>
                        @endif



                        </p>
                        <br><br>
                    @endforeach
                </div>

                <div class="add-container" style="margin-top: -40px;">
                    <a href="{{ route('captors.create') }}" class="add-button">
                        <img class="add-icon" src="{{ url('images/plusplus.png') }}">
                    </a>
                    <p style="font-size: 20px; margin-top: 100px;" > &nbsp; Add Sensor </p>
                </div>


            </div>

        </div>
    </div>








   
    <style>

        .button-container {
            display: flex;
            align-items: center;
           
        }

        .add-container {
            display: flex;
            align-items: center;
            justify-content: center;
            /* height: 100vh; */
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            gap: 1px 1px;

        }

        .rounded-box2 {
            border-radius: 10px;
            background-color: rgb(255, 255, 255);
            padding: 25px;
            width: 300px;
        }

        .rounded-box5 {
            border-radius: 10px;
            background-color:rgb(230, 227, 227);
            padding: 25px;
            width: 300px;
        }

        .rounded-box1 {
            border-radius: 10px;
            background-color: rgb(255, 255, 255);
            padding: 25px;
            width: 400px;
            height: 440px;
        }

        .rounded-box3 {
            border-radius: 10px;
            background-color: rgb(230, 227, 227);
            padding: 25px;
            width: 400px;
            height: 440px;
        }

        .add-icon {
            width: 45px;
            height: 45px;
            margin-top: 100px;

        }

        .rounded-box {
            border-radius: 10px;
            background-color: rgb(230, 227, 227);
            padding: 25px;
            width: 300px;
            height: 220px;
           
        }
    </style>

</x-app-layout>
