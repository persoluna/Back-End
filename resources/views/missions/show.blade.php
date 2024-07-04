<x-app-layout>
    <div class="bg-white min-h-[700px] pt-12">
        @if (isset($mission))
            <x-breadcrumb :breadcrumbs="[['name' => 'Mission & Vision', 'url' => route('missions.show', $mission->id)]]" />
        @else
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Home', 'url' => route('dashboard')],
                ['name' => 'Mission & Vision', 'url' => route('missions.show', $mission->id)],
            ]" />
        @endif
        <div class="mb-8 space-y-3 ml-2">
            <h1 class="text-3xl font-semibold text-center sm:text-left sm:pl-[80px] pt-[90px]">Mission & Vision Details
            </h1>
            <div class="ml-20 pt-10 flex justify-start gap-4">
                <a href="{{ route('missions.edit', $mission->id) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit
                    Mission & Vision 🖱️
                </a>
            </div>
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

        <div class="m-[60px] lg:pr-[200px] items-start">
            <div class="grid lg:grid-cols-6 gap-4">
                <br>

                {{-- ! Mission --}}
                <div class="md:col-span-2">
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold">{{ $mission->Mission_title }}</h3>
                        <p class="text-gray-600">{{ $mission->Mission_description }}</p>
                    </div>
                    <div class="md:col-span-6">
                        <img src="{{ asset('storage/mission/' . $mission->Mission_image) }}"
                            alt="{{ $mission->Mission_alt_tag }}" class="img-fluid w-full">
                    </div>
                </div>

                <br>

                {{-- ! Vision --}}
                <div class="md:col-span-2">
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold">{{ $mission->vision_title }}</h3>
                        <p class="text-gray-600">{{ $mission->vision_description }}</p>
                    </div>
                    <div class="md:col-span-6">
                        <img src="{{ asset('storage/vision/' . $mission->vision_image) }}"
                            alt="{{ $mission->vision_alt_tag }}" class="img-fluid w-full">
                    </div>

                </div>
                <br>
            </div>
        </div>

        <div class="m-6">
            <div class="grid gap-6 justify-start sm:justify-between lg:grid-cols-1 items-center mb-4">
                <h1 class="sm:text-4xl text-3xl font-semibold  sm:pb-4 pb-8 dark:text-white mt-6">Core Values</h1>
            </div>
            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('corevalues.create') }}"
                    class="rounded-tr-2xl rounded-bl-2xl text-white bg-gradient-to-tl from-indigo-400 from-30% to-indigo-600 to-100% hover:bg-gradient-to-br hover:from-indigo-600 hover:from-60% hover:to-indigo-400 hover:to-100% font-bold py-2 px-4 rounded">Create
                    Core Value
                </a>
            </div>
        </div>

        {{-- ! Live wire search for core value --}}
        <div class="pb-12 m-4">
            @livewire('search-core-value')
        </div>

</x-app-layout>
