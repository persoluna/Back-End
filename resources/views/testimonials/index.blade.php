<x-app-layout>
    <div class="note-container py-12">
        <x-breadcrumb :breadcrumbs="[['name' => 'Testimonials', 'url' => route('testimonials.index')]]" />
        <div class="m-4 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden flex-col">

                <div class="grid gap-6 justify-start sm:justify-between lg:grid-cols-1 items-center mb-4">
                    <h1 class="sm:text-4xl text-3xl font-semibold  sm:pb-4 pb-8">Testimonials</h1>

                    <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">

                        <a href="{{ route('testimonials.create') }}"
                            class="rounded-tr-2xl rounded-bl-2xl text-white bg-gradient-to-tl from-indigo-400 from-30% to-indigo-600 to-100% hover:bg-gradient-to-br hover:from-indigo-600 hover:from-60% hover:to-indigo-400 hover:to-100% font-bold py-2 px-4 rounded">Create
                            Testimonial</a>
                        <a href="{{ route('headings.edit', 3) }}"
                            class="rounded-tr-2xl rounded-bl-2xl text-white bg-gradient-to-tl from-indigo-400 from-30% to-indigo-600 to-100% hover:bg-gradient-to-br hover:from-indigo-600 hover:from-60% hover:to-indigo-400 hover:to-100% font-bold py-2 px-4 rounded">
                            Update Title
                        </a>
                    </div>
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


                <script>
                    const toggleMessage = document.getElementById('toggle-message');
                    const toggleCheckbox = document.querySelector(
                        'input[wire:model="testimonial.status"]');

                    toggleCheckbox.addEventListener('change', function() {
                        if (this.checked) {
                            toggleMessage.textContent = 'testimonial status changed to Active.';
                            toggleMessage.classList.remove('hidden'); // Show the message
                        } else {
                            toggleMessage.textContent = 'testimonial status changed to Inactive.';
                            toggleMessage.classList.remove('hidden'); // Show the message
                        }

                        // A timeout to hide the message automatically after some time:
                        setTimeout(() => {
                            toggleMessage.textContent = '';
                            toggleMessage.classList.add('hidden'); // Hide the message again
                        }, 3000); // Hide after 3 seconds
                    });
                </script>
                {{-- ! Live wire search for Testimonial --}}
                <div class="py-12">
                    @livewire('search-testimonial')
                </div>
            </div>
        </div>


         <!-- Arrow Icon -->
        <div class="absolute right-4 cursor-pointer" id="arrow-icon" style="top: 35%;">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path id="arrow-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </div>

        <!-- Container with File Selection -->
        <div class="fixed right-0 transform transition-all duration-500 ease-in-out translate-x-full opacity-0 pr-6 pt-4" id="file-container" style="top: 30%;">
            <div class="bg-white rounded-lg shadow-md p-6 w-96">
                <h5 class="text-xl font-bold mb-4">Import testimonials Data</h5>
                <div class="flex justify-end mb-4">
                    <div class="w-full pr-6 pl-12">
                        <form action="{{ route('testimonials.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="file" class="flex items-center justify-center w-full h-24 px-4 transition bg-white border-2 border-gray-300 border-dashed rounded-md appearance-none cursor-pointer hover:border-gray-400 focus:outline-none">
                                    <span class="flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <span id="file-name" class="font-medium text-sm text-gray-600">Drop files to Attach, or<span class="text-blue-600 underline ml-[4px]">browse</span></span>
                                    </span>
                                    <input type="file" name="file" id="file" class="hidden" accept=".csv,.xls,.xlsx">
                                </label>
                            </div>
                            <button type="submit" id="importButton" class="items-center px-3 py-2 bg-gray-400 text-white rounded-md text-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 hidden">
                                <i class="mr-2"></i> Import testimonials Data
                            </button>
                        </form>
                        <br>
                            <h5 class="text-xl font-bold mb-4">Or</h5>
                        <br>
                       <a href="{{ route('testimonials.export') }}"
                        class="rounded-tr-2xl rounded-bl-2xl text-white bg-gradient-to-tl from-yellow-400 from-30% to-yellow-600 to-100% hover:bg-gradient-to-br hover:from-yellow-600 hover:from-30% hover:to-yellow-400 hover:to-100% font-bold py-2 px-4 rounded">
                        <i class="fas fa-download mr-2"></i> Export Testimonials Data
                        </a>
                        <script>
                            const fileInput = document.getElementById('file');
                            const importButton = document.getElementById('importButton');
                            const fileNameSpan = document.getElementById('file-name');
                            fileInput.addEventListener('change', function() {
                                if (this.files.length > 0) {
                                    importButton.classList.remove('hidden');
                                    fileNameSpan.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg> ${this.files[0].name}`;
                                } else {
                                    importButton.classList.add('hidden');
                                    fileNameSpan.innerHTML = 'Drop files to Attach, or<span class="text-blue-600 underline ml-[4px]">browse</span>';
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const arrowIcon = document.getElementById('arrow-icon');
            const arrowPath = document.getElementById('arrow-path');
            const fileContainer = document.getElementById('file-container');
            let isContainerOpen = false;

            arrowIcon.addEventListener('click', function() {
                isContainerOpen = !isContainerOpen;
                if (isContainerOpen) {
                    fileContainer.classList.remove('translate-x-full', 'opacity-0');
                    fileContainer.classList.add('translate-x-0', 'opacity-100');
                    arrowPath.style.transform = 'rotate(180deg)';
                } else {
                    fileContainer.classList.remove('translate-x-0', 'opacity-100');
                    fileContainer.classList.add('translate-x-full', 'opacity-0');
                    arrowPath.style.transform = 'rotate(0deg)';
                }
            });

            document.addEventListener('click', function(event) {
                const target = event.target;
                if (!arrowIcon.contains(target) && !fileContainer.contains(target)) {
                    fileContainer.classList.remove('translate-x-0', 'opacity-100');
                    fileContainer.classList.add('translate-x-full', 'opacity-0');
                    arrowPath.style.transform = 'rotate(0deg)';
                    isContainerOpen = false;
                }
            });
        </script>




    </div>
</x-app-layout>
