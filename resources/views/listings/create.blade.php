<x-layout>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css' rel='stylesheet' />

    <div class="mx-4">
        <x-card class="rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Post a Job
                </h2>
                <p class="mb-4">Please, Insert Job Details</p>
            </header>

            <form method="POST" action="/listings" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="company" class="inline-block text-lg mb-2">Company Name</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company"
                        value="{{ old('company') }}" />
                </div>

                @error('company')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2">Job Title</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                        placeholder="Example: IT Support" value="{{ old('title') }}" />
                </div>
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mb-6">
                    <label for="address" class="inline-block text-lg mb-2">Job Location</label>
                    <!-- Load the `mapbox-gl-geocoder` plugin. -->
                    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
                    <link rel="stylesheet"
                        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css"
                        type="text/css">
                    <input type="hidden" id="address" name="address" />
                    <input type="hidden" id="longitude" name="longitude" />
                    <input type="hidden" id="latitude" name="latitude" />

                    <div id="geocoder"></div>
                    {{-- <div id="map" style="width:29rem; height:29rem; margin-top:1rem"></div> --}}


                    <script>
                        mapboxgl.accessToken =
                            '{{ env('MAPBOX_ACCESS_TOKEN') }}';

                        // const map = new mapboxgl.Map({
                        //     container: 'map',
                        //     style: 'mapbox://styles/mapbox/streets-v11',
                        //     center: [-118.2436, 34.0522],
                        //     zoom: 12
                        // });

                        var geocoder = new MapboxGeocoder({
                            accessToken: mapboxgl.accessToken,
                            mapboxgl: mapboxgl
                        });

                        geocoder.addTo('#geocoder');

                        // Add the control to the map.
                        // map.addControl(
                        //     geocoder
                        // );
                        const address = document.getElementById('address');
                        const longitude = document.getElementById('longitude');
                        const latitude = document.getElementById('latitude');


                        geocoder.on('result', function(result) {
                            address.value = result.result.place_name;
                            longitude.value = result.result.center[0];
                            latitude.value = result.result.center[1];
                        });
                    </script>
                </div>


                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                        value="{{ old('email') }}" />
                </div>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <div class="mb-6">
                    <label for="website" class="inline-block text-lg mb-2">
                        Website URL
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
                        value="{{ old('website') }}" />
                </div>
                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <div class="mb-6">
                    <label for="tags" class="inline-block text-lg mb-2">
                        Tags (Comma Separated)
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                        placeholder="Example: IT, Marketing, Los Angeles, etc" value="{{ old('tags') }}" />
                </div>
                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                {{-- <div class="mb-6">
                    <label for="logo" class="inline-block text-lg mb-2">
                        Company Logo
                    </label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
                </div>
                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror --}}

                <div class="mb-6">
                    <label for="description" class="inline-block text-lg mb-2">
                        Job Description
                    </label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                        placeholder="Include tasks, requirements, salary, etc" value="{{ old('description') }}"></textarea>
                </div>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <div class="mb-6">
                    <button class="bg-button text-white rounded py-2 px-4 hover:opacity-80">
                        Create Job Post
                    </button>

                    <a href="/" class="text-black ml-4"> Back </a>
                </div>
            </form>
    </div>
    </x-card>
</x-layout>
