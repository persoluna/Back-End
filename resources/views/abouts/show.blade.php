<x-app-layout>
    <div class="bg-white min-h-[700px] pt-12">
        @if (isset($about))
            <x-breadcrumb :breadcrumbs="[['name' => 'About Us', 'url' => route('abouts.show', $about->id)]]" />
        @else
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Home', 'url' => route('dashboard')],
                ['name' => 'About Us', 'url' => route('abouts.show', $about->id)],
            ]" />
        @endif

        <div class="mb-8 space-y-3">
            <h1 class="text-3xl font-semibold text-center sm:text-left sm:pl-[80px] pt-[90px]">About Us Details</h1><br>
        </div>
        @if (session('success'))
            <div id="success-message"
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative opacity-0 transition-opacity duration-500"
                role="alert" style="display: none;">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
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

        <div class="m-[80px] justify-center items-start">
            <div class="grid md:grid-cols-12 gap-6">
                <div class="md:col-span-6">
                    <img src="{{ asset('storage/abouts/' . $about->image1) }}" alt="{{ $about->alt_tag1 }}"
                        class="img-fluid w-full">
                </div>
                <br>
                <div class="md:col-span-6">
                    <img src="{{ asset('storage/abouts/' . $about->image2) }}" alt="{{ $about->alt_tag2 }}"
                        class="img-fluid w-full">
                </div>
                <div class="md:col-span-6">
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold">{{ $about->title }}</h3>
                        <h4 class="text-xl font-semibold">{{ $about->sub_title }}</h4>
                        <p class="text-gray-600">
                            {{ $about->description }}</p>
                        <p class="text-xl font-semibold">{{ $about->owner_name }}</p>
                        <p class="text-xl font-semibold">{{ $about->owner_designation }}</p>
                        <div class="md:col-span-6">
                            <img src="{{ asset('storage/abouts/' . $about->owner_signature) }}"
                                alt="{{ $about->alt_tag3 }}" class="img-fluid w-full">
                        </div>
                    </div>
                    <div class="mt-8 flex justify-start gap-4">
                        <a href="{{ route('abouts.edit', $about->id) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit
                            About
                            Us
                            🖱️</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
