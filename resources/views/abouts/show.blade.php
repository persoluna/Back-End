<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <header class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg shadow-lg p-6 mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-4xl font-bold text-white mb-4">About Us Details</h1>
                    <nav class="flex items-center space-x-4">
                        @if (isset($about))
                            <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-200">Home</a>
                            <span class="text-white">/</span>
                            <a href="{{ route('abouts.show', $about->id) }}" class="text-white hover:text-gray-200">About Us</a>
                        @else
                            <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-200">Home</a>
                            <span class="text-white">/</span>
                            <a href="{{ route('abouts.show') }}" class="text-white hover:text-gray-200">About Us</a>
                        @endif
                    </nav>
                </div>
                <div>
                    @if (isset($about))
                        <a href="{{ route('abouts.edit', $about->id) }}" class="inline-block px-6 py-3 bg-white text-indigo-600 font-semibold rounded-lg shadow-md hover:bg-indigo-600 hover:text-white transform hover:-translate-y-0.5 transition duration-300 ease-in-out">
                            Edit About Us
                        </a>
                    @endif
                </div>
            </div>
        </header>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
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
                <div class="md:col-span-6 relative">
                    <img src="{{ asset('storage/abouts/'. $about->image1) }}" alt="{{ $about->alt_tag1 }}" class="img-fluid w-full">
                    <img src="{{ asset('storage/abouts/'. $about->image2) }}" alt="{{ $about->alt_tag2 }}" class="absolute bottom-0 right-0 w-1/4">
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
                            <img src="{{ asset('storage/abouts/'. $about->owner_signature) }}" alt="{{ $about->alt_tag3 }}" class="img-fluid w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-6">
            <div class="grid gap-6 justify-start sm:justify-between lg:grid-cols-1 items-center mb-4">
                <h1 class="sm:text-4xl text-3xl font-semibold  sm:pb-4 pb-8 dark:text-white mt-6">About Us Points</h1>

                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">

                    <a href="{{ route('aboutpoints.create') }}"
                        class="rounded-tr-2xl rounded-bl-2xl text-white bg-gradient-to-tl from-indigo-400 from-30% to-indigo-600 to-100% hover:bg-gradient-to-br hover:from-indigo-600 hover:from-60% hover:to-indigo-400 hover:to-100% font-bold py-2 px-4 rounded">Create
                        Point</a>
                </div>
            </div>
        </div>
         {{-- ! Live wire search for about point --}}
        <div class="pb-12 m-4">
            @livewire('search-about-point')
        </div>
    </div>


</x-app-layout>
