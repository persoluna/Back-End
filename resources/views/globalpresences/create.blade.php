<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <header class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg shadow-lg p-6 mb-8">
            <h1 class="text-4xl font-bold text-white mb-4">Add Your Global Presence</h1>
            <nav class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-200">Home</a>
                <span class="text-white">/</span>
                <a href="{{ route('globalpresences.index') }}" class="text-white hover:text-gray-200">Presences</a>
                <span class="text-white">/</span>
                <a href="{{ route('globalpresences.create') }}" class="text-white hover:text-gray-200">Create Presence</a>
            </nav>
        </header>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
            <div class="mb-8 space-y-3">
                <p class="text-gray-500 dark:text-gray-400 text-center text-xl">Enter the details below.</p>
            </div>

        <!-- form -->
        <form action="{{ route('globalpresences.store') }}" method="POST" class="w-full" enctype="multipart/form-data">
            @csrf
            <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">

                <!-- Country dropdown -->
                <div class="lg:col-span-2 w-fit">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="countryName">Country</label>
                    <select id="countryName" name="countryName" class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                        <option value="">Select a country</option>
                    </select>
                    @error('countryName')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- latitude input field -->
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="latitude">Latitude</label>
                    <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="latitude" placeholder="Enter the latitude" type="text" name="latitude" value="{{ old('latitude') }}">
                    @error('latitude')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- longitude input field -->
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="longitude">Longitude</label>
                    <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="longitude" placeholder="Enter the longitude" type="text" name="longitude" value="{{ old('longitude') }}">
                    @error('longitude')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Description input field -->
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="description">Description</label>
                    <textarea class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-20 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="description" placeholder="Enter a brief description" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>

                <!-- Flag Icon input field -->
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="flag_icon">Flag Icon</label>
                    <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-80 rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="flag_icon" type="file" name="flag_icon">
                    <img id="image-preview" src="" alt="Icon Preview" class="h-min[100px] w-auto pa-2 text-base">
                    @error('flag_icon')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Confirm -->
                <div class="pt-8 flex justify-center sm:w-fit lg:col-span-2">
                    <button class="rounded-tr-2xl rounded-bl-2xl ring-offset-background focus-visible:ring-ring flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-black px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-black/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50" type="submit">
                        Confirm
                    </button>
                </div>
            </div>
        </form>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const countrySelect = document.getElementById('countryName');
            const latitudeInput = document.getElementById('latitude');
            const longitudeInput = document.getElementById('longitude');
            const imageInput = document.getElementById('flag_icon');
            const imagePreview = document.getElementById('image-preview');

            // Fetch countries and populate the dropdown
            axios.get('https://restcountries.com/v3.1/all')
                .then(function (response) {
                    const countries = response.data;
                    countries.sort((a, b) => a.name.common.localeCompare(b.name.common));

                    countries.forEach(country => {
                        const option = document.createElement('option');
                        option.value = country.name.common;
                        option.textContent = country.name.common;
                        option.dataset.lat = country.latlng[0];
                        option.dataset.lng = country.latlng[1];
                        countrySelect.appendChild(option);
                    });

                    // Initialize Select2 after populating the dropdown
                    $(countrySelect).select2({
                        placeholder: 'Select a country',
                        allowClear: true
                    });
                })
                .catch(function (error) {
                    console.error('Error fetching countries:', error);
                });

            // Handle country selection
            $(countrySelect).on('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                latitudeInput.value = selectedOption.dataset.lat || '';
                longitudeInput.value = selectedOption.dataset.lng || '';
            });

            // Handle image preview
            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                const reader = new FileReader();

                reader.onload = function(event) {
                    imagePreview.src = event.target.result;
                };

                if (file) {
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</x-app-layout>