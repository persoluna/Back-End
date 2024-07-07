<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <header class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg shadow-lg p-6 mb-8">
            <h1 class="text-4xl font-bold text-white mb-4">Edit Service</h1>
            <nav class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-200">Home</a>
                <span class="text-white">/</span>
                <a href="{{ route('services.index') }}" class="text-white hover:text-gray-200">Services</a>
                <span class="text-white">/</span>
                <a href="{{ route('services.edit', $service) }}" class="text-white hover:text-gray-200">Edit Service</a>
            </nav>
        </header>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
            <div class="mb-8 space-y-3">
                <p class="text-gray-500 dark:text-gray-400 text-xl">Update the service details.</p>
            </div>

        <!-- service form -->
        <form id="editServiceForm" action="{{ route('services.update', $service->id) }}" method="POST" class="w-full" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">

                <!-- Category dropdown -->
                <div class="lg:col-span-1">
                    <div class="space-y-2">
                        <label
                            class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="category_id">
                            Category
                        </label>
                        <select
                            class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            id="category_id" name="category_id">
                            @foreach ($servicecategories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $service->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Service Name input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="name">Name</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="name" placeholder="Enter the service name" type="text" name="name"
                        value="{{ $service->name }}">
                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Slug input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="slug"> Slug</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="slug" placeholder="Enter the slug" type="text" name="slug"
                        value="{{ $service->slug }}">
                    @error('slug')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Description input field -->
                <div class="lg:col-span-2">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="description">Description</label>
                    <textarea
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-20 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="editor" placeholder="Enter a brief description" name="description">{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="hidden" id="uploadedImages" name="uploadedImages" value="">

                <!--  image input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="image">Image</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="image" type="file" name="image">
                    <img id="image-preview" src="{{ asset('storage/service_images/' . $service->image) }}"
                        alt="Image Preview" class="min-h-[100px] w-auto pt-2 text-base">
                    @error('image')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <br>

                <!-- Alt Tag input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="alt_tag">Alt Tag</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="alt_tag" placeholder="Enter the alt tag for the image" type="text"
                        name="alt_tag" value="{{ $service->alt_tag }}">
                    @error('alt_tag')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>



                {{-- Meta title input field --}}
                <!-- <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="meta_title">Meta Title</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="meta_title" placeholder="Enter the Meta Title" type="text" name="meta_title"
                        value="{{ $service->meta_title }}">
                    @error('meta_title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div> -->


                {{-- Meta Description input field --}}
                <!-- <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="meta_description">Meta Description</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="meta_description" placeholder="Enter the Meta Description" type="text"
                        name="meta_description" value="{{ $service->meta_description }}">
                    @error('meta_description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div> -->


                {{-- Meta Keywords input field --}}
                <!-- <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="meta_keyword">Meta Keywords

                    </label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="meta_keyword" placeholder="Enter the Meta Keywords" type="text" name="meta_keyword"
                        value="{{ $service->meta_keyword }}">
                    @error('meta_keyword')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div> -->

                {{-- Meta Canonical Input Field --}}
                <!-- <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="meta_canonical">Meta Canonical</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="meta_canonical" placeholder="Enter the Meta Canonical" type="text"
                        name="meta_canonical" value="{{ $service->meta_canonical }}">
                    @error('meta_canonical')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div> -->

                <!-- Meta Tags input field -->
                <div class="lg:col-span-2">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="meta_tags">Meta Tags</label>
                    <textarea
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-40 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="meta_tags" placeholder="Enter the meta tags" name="meta_tags">{{ $service->meta_tags }}</textarea>
                    @error('meta_tags')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- CUSTOM POP UP  -->
                <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">You have unsaved changes. Are you sure you want to leave?</h3>
                                <button id="leave-page" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Yes, leave page
                                </button>
                                <button id="stay-on-page" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, stay on page</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="pt-8 lg:pl-[80px] flex justify-center sm:w-fit lg:col-span-2 pb-12">
                <button
                    class="rounded-tr-2xl rounded-bl-2xl ring-offset-background focus-visible:ring-ring flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-black px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-black/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                    type="submit">
                    Confirm
                </button>
            </div>
        </form>
    </div>

    <!-- JS to handle image preview -->
    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image-preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        let uploadedImageUrls = @json($detectedImageUrls);
        let isFormSubmitted = false;
        let hasNewUploads = false;
        let isLeavingPage = false;

        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('service.ckeditor.upload') . '?_token=' . csrf_token() }}',
                }
            })
            .then(editor => {
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new MyUploadAdapter(loader);
                };
            })
            .catch(error => {
                console.error(error);
            });

        class MyUploadAdapter {
            constructor(loader) {
                this.loader = loader;
            }

            upload() {
                return this.loader.file
                    .then(file => new Promise((resolve, reject) => {
                        const data = new FormData();
                        data.append('upload', file);
                        data.append('_token', '{{ csrf_token() }}');

                        fetch('{{ route('service.ckeditor.upload') }}', {
                            method: 'POST',
                            body: data,
                        })
                        .then(response => response.json())
                        .then(response => {
                            if (response.uploaded) {
                                const imageUrl = response.url;
                                uploadedImageUrls.push(imageUrl);
                                hasNewUploads = true;  // Set this flag when a new image is uploaded
                                resolve({
                                    default: imageUrl
                                });
                            } else {
                                reject('Upload failed');
                            }
                        })
                        .catch(error => {
                            reject(error);
                        });
                    }));
            }

            abort() {
                // Handle abort if necessary
            }
        }

        // Populate the hidden input with the list of uploaded image URLs before form submission
        document.getElementById('editServiceForm').addEventListener('submit', function(event) {
            isFormSubmitted = true;
            document.getElementById('uploadedImages').value = JSON.stringify(uploadedImageUrls);
        });

        // Function to delete unused images
        async function deleteUnusedImages(imageUrls) {
            const response = await fetch('{{ route('service.images.deleteUnused') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ imageUrls })
            });
            return response.json();
        }

        // Function to show the modal
        function showModal() {
            console.log('Showing modal');
            const modal = document.getElementById('popup-modal');
            console.log('Modal element:', modal);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            console.log('Modal classes after show:', modal.classList);
        }

        function handlePageLeave(e) {
        console.log('handlePageLeave called', { isFormSubmitted, hasNewUploads, isLeavingPage });
        if (!isFormSubmitted && hasNewUploads && !isLeavingPage) {
                showModal();
                e.preventDefault();
                e.stopPropagation();
            }
        }

        // Function to hide the modal
        function hideModal() {
            const modal = document.getElementById('popup-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // Event listener for the "Yes, leave page" button
        document.getElementById('leave-page').addEventListener('click', function() {
            isLeavingPage = true;
            hideModal();
            if (hasNewUploads) {
                deleteUnusedImages(uploadedImageUrls);
            }
            window.location.href = '{{ route('services.index') }}'; // Redirect to services index
        });

        // Event listener for the "No, stay on page" button
        document.getElementById('stay-on-page').addEventListener('click', function() {
            hideModal();
        });

        // Event listener for the close button
        document.querySelector('[data-modal-hide="popup-modal"]').addEventListener('click', function() {
            hideModal();
        });

        // Warn the user before leaving the page
        window.addEventListener('beforeunload', function (e) {
            if (!isFormSubmitted && hasNewUploads && !isLeavingPage) {
                e.preventDefault(); // Cancel the event
                e.returnValue = ''; // Chrome requires returnValue to be set
                showModal();
                return ''; // This text is usually ignored by browsers
            }
        });

        // Handle the user's decision to leave the page
        window.addEventListener('unload', function () {
            if (!isFormSubmitted && hasNewUploads && isLeavingPage) {
                deleteUnusedImages(uploadedImageUrls);
            }
        });
    </script>
</x-app-layout>
