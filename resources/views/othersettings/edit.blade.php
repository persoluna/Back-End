<x-app-layout>
    <div class="bg-white min-h-screen pt-12">
        <x-breadcrumb :breadcrumbs="[['name' => 'Other Settings', 'url' => route('othersettings.index')]]" />

        <!-- Settings title -->
        <div class="mb-8 space-y-3">
            <h1 class="text-3xl font-semibold text-center sm:text-left sm:pl-[80px] pt-[90px]">Other Settings</h1>
        </div>

        @if (session('success'))
                    <div id="success-message"
                        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative opacity-0 transition-opacity duration-500"
                        role="alert" style="display: none;">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('message') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg id="success-close-button" class="fill-current h-6 w-6 text-green-500" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>
                    <script>
                        // Fade in the alert
                        var successMessage = document.getElementById('success-message');
                        successMessage.style.display = 'block';
                        setTimeout(function() {
                            successMessage.style.opacity = '1';
                        }, 100);

                        // Fade out the alert after 2 seconds
                        setTimeout(function() {
                            successMessage.style.opacity = '0';
                        }, 2000);

                        // Hide the alert after it has faded out
                        setTimeout(function() {
                            successMessage.style.display = 'none';
                        }, 2500);

                        // Fade out the alert when the close button is clicked
                        document.getElementById('success-close-button').addEventListener('click', function() {
                            successMessage.style.opacity = '0';
                            setTimeout(function() {
                                successMessage.style.display = 'none';
                            }, 500);
                        });
                    </script>
                @endif

        <!-- Settings form -->
        <form action="{{ route('othersettings.update', $othersetting->id) }}" method="POST" class="w-full">
            @csrf
            @method('PUT')
            <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">

                <!-- analytics code input field -->
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="analytics_code">Google Analytics Code</label>
                    <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" placeholder="Enter code" type="text" name="analytics_code" value="{{ old('analytics_code', $othersetting->analytics_code) }}">
                    @error('analytics_code')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Facebook Code input field -->
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="facebook_code">Pixel Code</label>
                    <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" placeholder="Enter code" type="text" name="facebook_code" value="{{ old('facebook_code', $othersetting->facebook_code) }}">
                    @error('facebook_code')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status dropdown -->
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="status">Status</label>
                    <select name="status" id="status" class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                        <option value="1" {{ old('status', $othersetting->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $othersetting->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Update Settings button -->
                <div class="pt-8 flex justify-center sm:w-fit lg:col-span-2">
                    <button class="rounded-tr-2xl rounded-bl-2xl ring-offset-background focus-visible:ring-ring flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-black px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-black/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50" type="submit">
                        Confirm update
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>