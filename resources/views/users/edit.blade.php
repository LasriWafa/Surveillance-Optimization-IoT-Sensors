<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
         <br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User
        </h2>
         <br>
        <x-jet-validation-errors class="mb-4" />

        <form enctype="multipart/form-data" action="{{ route('users.update', $users->id) }}" method = "POST" >
            @csrf
            @method('PUT')
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"  value="{{ old('name', $users->name) }}"  required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"  value="{{ old('email', $users->email) }}" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="role" value="{{ __('Role') }}" />
                 <x-jet-input id="role" class="block mt-1 w-full" type="text" name="role" value="{{ old('role', $users->role) }}" list="role-options" />
                    <datalist id="role-options">
                     <option value="0">{{ __('Normal User') }}</option>
                     <option value="1">{{ __('Admin') }}</option>
                </datalist>
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Edit User') }}
                </x-jet-button>
            </div>


        </form>
    </x-jet-authentication-card>
</x-guest-layout>
