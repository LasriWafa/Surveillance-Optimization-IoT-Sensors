<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
         <br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Sensor
        </h2>
         <br>
        <x-jet-validation-errors class="mb-4" />

        <form enctype="multipart/form-data" action="{{ route('adminsCaptors.update', $captors->id) }}" method = "POST" >
            @csrf
            @method('PUT')
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"  value="{{ old('name', $captors->name) }}"  required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="manufactor" value="{{ __('Manufactor') }}" />
                <x-jet-input id="manufactor" class="block mt-1 w-full" type="manufactor" name="manufactor"  value="{{ old('manufactor', $captors->manufactor) }}" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="type" value="{{ __('Type') }}" />
                <x-jet-input id="type" class="block mt-1 w-full" type="type" name="type"  value="{{ old('type', $captors->type) }}" required />
            </div>

            
            <div class="mt-4">
                <x-jet-label for="IMEI" value="{{ __('IMEI') }}" />
                <x-jet-input id="IMEI" class="block mt-1 w-full" type="IMEI" name="IMEI"  value="{{ old('IMEI', $captors->IMEI) }}" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="image" value="{{ __('Choose picture') }}" />
                <x-jet-input id="image" class="block mt-1 w-full" type="file" name="image" value="{{ old('image', $captors->image) }}" required autofocus autocomplete="image" />
            </div>
          


            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Edit Sensor') }}
                </x-jet-button>
            </div>


        </form>
    </x-jet-authentication-card>
</x-guest-layout>
