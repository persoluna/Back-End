<x-app-layout>
    <div class="note-container py-12">
        <x-breadcrumb :breadcrumbs="[['name' => 'Blogs', 'url' => route('blogs.index')]]" />
        <div class="m-4 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden flex-col">

                <div class="grid gap-6 justify-start sm:justify-between lg:grid-cols-1 items-center mb-4">
                    <h1 class="sm:text-4xl text-3xl font-semibold  sm:pb-4 pb-8">Blogs</h1>

                    <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">

                        <a href="{{ route('blogs.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded sm:max-w-[200px]">Create
                            New
                            Blog</a>
                        <a href="{{ route('headings.edit', 5) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded sm:max-w-[200px] max-w-[130px]">
                            Update Title
                        </a>
                    </div>
                </div>

                <a href="{{ route('blogs.export') }}"
                    class="inline-flex items-center px-4 py-2 bg-yellow-400 text-white rounded-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 float-right">
                    <i class="fas fa-download mr-2"></i> Export Blogs Data
                </a>
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
                        'input[wire:model="blogs.status"]');

                    toggleCheckbox.addEventListener('change', function() {
                        if (this.checked) {
                            toggleMessage.textContent = 'blog status changed to Active.';
                            toggleMessage.classList.remove('hidden'); // Show the message
                        } else {
                            toggleMessage.textContent = 'blog status changed to Inactive.';
                            toggleMessage.classList.remove('hidden'); // Show the message
                        }

                        // A timeout to hide the message automatically after some time:
                        setTimeout(() => {
                            toggleMessage.textContent = '';
                            toggleMessage.classList.add('hidden'); // Hide the message again
                        }, 3000); // Hide after 3 seconds
                    });
                </script>
                {{-- ! Live wire search for Application --}}
                <div class="py-12">
                    @livewire('search-blog')
                </div>
            </div>
        </div>

        <div class="grid justify-end">
            <form action="{{ route('blogs.import') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="file" class="form-label block text-sm font-medium text-gray-700">Import Blogs
                        Data</label>
                    <input type="file" name="file" id="file"
                        class="form-control block w-fit px-3 rounded-md border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <button type="submit" id="importButton"
                    class="items-center px-4 py-2 bg-gray-400 text-white rounded-md hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 hidden">
                    <i class="mr-2"></i> Import Blogs Data
                </button>
            </form>
            <script>
                const fileInput = document.getElementById('file');
                const importButton = document.getElementById('importButton');

                fileInput.addEventListener('change', function() {
                    if (this.files.length > 0) {
                        importButton.classList.remove('hidden');
                    } else {
                        importButton.classList.add('hidden');
                    }
                });
            </script>
        </div>

    </div>
</x-app-layout>
