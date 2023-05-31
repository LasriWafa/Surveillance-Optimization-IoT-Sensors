<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        <form action="{{ route('captors.update', $captor->id) }}" method = "POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <label for="name"></label>

            <div>
                <x-jet-label for="name" value="{{ __('Captor Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $captor->name }}" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="type" value="{{ __('Type') }}" />
                <x-jet-input id="type" class="block mt-1 w-full" type="text" name="type" value="{{ $captor->type }}" required autofocus autocomplete="type" />
            </div>

            <div class="mt-4">
                <x-jet-label for="IMEI" value="{{ __('IMEI') }}" />
                <x-jet-input id="IMEI" class="block mt-1 w-full" type="text" name="IMEI" value="{{ $captor->IMEI }}" required autofocus autocomplete="IMEI" />
            </div>
            

            

            <div class="mt-4">
                <x-jet-label for="manufactor" value="{{ __('Manufactor') }}" />
                <x-jet-input id="manufactor" class="block mt-1 w-full" type="text" name="manufactor" value="{{ $captor->manufactor }}" required autofocus autocomplete="manufactor" />
            </div>

            <div class="mt-4">
                <x-jet-label for="image" value="{{ __('Choose picture') }}" />
                <x-jet-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus autocomplete="image" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Update Captor') }}
                </x-jet-button>
            </div>

        </form>
    </x-jet-authentication-card>
</x-guest-layout>
