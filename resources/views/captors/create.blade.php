<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <style>
            #map {
                height: 400px;
                width: 100%;
            }
        </style>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6NR7fWfcEEFom44-pngEMoOlzPhSxr1c&libraries=places">
        </script>

        <x-jet-validation-errors class="mb-4" />
        <form action="{{ route('captors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <label for="name"></label>

            <div>
                <x-jet-label for="name" value="{{ __('Captor Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="type" value="{{ __('Type') }}" />
                <x-jet-input id="type" class="block mt-1 w-full" type="text" name="type"
                    :value="old('type')" required autofocus autocomplete="type" />
            </div>

            <div class="mt-4">
                <x-jet-label for="IMEI" value="{{ __('IMEI') }}" />
                <x-jet-input id="IMEI" class="block mt-1 w-full" type="text" name="IMEI" :value="old('IMEI')"
                    required autofocus autocomplete="IMEI" />
            </div>

            <div class="mt-4">
                <x-jet-label for="manufactor" value="{{ __('Manufactor') }}" />
                <x-jet-input id="manufactor" class="block mt-1 w-full" type="text" name="manufactor"
                    :value="old('manufactor')" required autofocus autocomplete="manufactor" />
            </div>

           
<!--
            <div class="mt-4">
                <x-jet-label for="location" value="{ { __ ('Location') }}" />
                <x-jet-input id="location-input" name="location" onclick="openGoogleMaps()" class="block mt-1 w-full"
                    type="text" : value=" old('location')"  autofocus autocomplete="location" />
            </div>
            <div id="map"></div> 

            <script>
                var map;
                var marker;
                var autocomplete;

                function initMap() {
                    // Initialize the map
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: {
                            lat: 0,
                            lng: 0
                        },
                        zoom: 2
                    });

                    // Initialize the marker
                    marker = new google.maps.Marker({
                        map: map,
                        draggable: true
                    });

                    // Initialize the autocomplete functionality
                    var input = document.getElementById('location-input');
                    autocomplete = new google.maps.places.Autocomplete(input);

                    // When the user selects a suggestion, update the map and marker
                    autocomplete.addListener('place_changed', function() {
                        var place = autocomplete.getPlace();
                        if (place.geometry) {
                            map.setCenter(place.geometry.location);
                            map.setZoom(14);
                            marker.setPosition(place.geometry.location);
                            input.value = place.formatted_address;
                        }
                    });

                    // When the user drags the marker, update the input field
                    marker.addListener('dragend', function() {
                        var position = marker.getPosition();
                        reverseGeocode(position);
                    });

                    // When the user clicks on the map, update the marker and input field
                    map.addListener('click', function(e) {
                        marker.setPosition(e.latLng);
                        reverseGeocode(e.latLng);
                    });
                }

                function reverseGeocode(latLng) {
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({
                        'location': latLng
                    }, function(results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                var input = document.getElementById('location-input');
                                input.value = results[0].formatted_address;
                            }
                        }
                    });
                }

                function openGoogleMaps() {
                    var input = document.getElementById('location-input');
                    var location = input.value;
                    if (location) {
                        var url = 'https://www.google.com/maps/place/' + encodeURIComponent(location);
                        window.open(url, '_blank');
                    }
                }
            </script>

            <script>
                // Initialize the map and marker after Google Maps API is loaded
                google.maps.event.addDomListener(window, 'load', initMap);
            </script>

-->

            <div class="mt-4">
                <x-jet-label for="image" value="{{ __('Choose picture') }}" />
                <x-jet-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')"
                    required autofocus autocomplete="image" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Create Captor') }}
                </x-jet-button>
            </div>

        </form>
    </x-jet-authentication-card>
</x-guest-layout>
