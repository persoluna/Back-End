<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <header class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg shadow-lg p-6 mb-8">
            <h1 class="text-4xl font-bold text-white mb-4">Add Your Testimonial</h1>
            <nav class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-200">Home</a>
                <span class="text-white">/</span>
                <a href="{{ route('testimonials.index') }}" class="text-white hover:text-gray-200">Testimonials</a>
                <span class="text-white">/</span>
                <a href="{{ route('testimonials.create') }}" class="text-white hover:text-gray-200">Create Testimonial</a>
            </nav>
        </header>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
            <div class="mb-8 space-y-3">
                <p class="text-gray-500 dark:text-gray-400 text-center text-xl">Enter the Testimonial details below.</p>
            </div>

        <!-- Testimonial form -->
        <form id="testimonialForm" action="{{ route('testimonials.store') }}" method="POST" class="w-full" enctype="multipart/form-data">
            @csrf
            <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">

                <!-- Testimonial Name input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="name">Name</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="name" placeholder="Enter the Testimonial name" type="text" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Testimonial designation input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="designation">Designation</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="designation" placeholder="Enter the testimonial designation" type="text" name="designation"
                        value="{{ old('designation') }}">
                    @error('designation')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>

                <!-- Testimonial Testimony input field -->
                <div class="lg:col-span-2">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="description">Testimony</label>
                    <textarea
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="editor" placeholder="Enter the Testimonial Testimony"
                        name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="hidden" id="uploadedImages" name="uploadedImages" value="">

                <!-- Testimonial Alt Tag input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="alt_tag">Alt Tag</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="alt_tag" placeholder="Enter the alt tag for the Testimonial image" type="text"
                        name="alt_tag" value="{{ old('alt_tag') }}">
                    @error('alt_tag')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <!-- Testimonial image input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="profile_image">Profile Image</label><span class="text-red-600 underline underline-offset-2 pl-2">Size: (80 X 80px)</span>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="profile_image" type="file" name="profile_image">
                    <img id="image-preview" src="" alt="Testimonial Image Preview"
                        class="min-h-[100px] w-auto pt-2 text-base">
                    @error('profile_image')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Add Testimonial button -->
                <div class="pt-8 flex justify-center sm:w-fit lg:col-span-2">
                    <button
                        class="rounded-tr-2xl rounded-bl-2xl ring-offset-background focus-visible:ring-ring flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-black px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-black/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                        type="submit">
                        Add Testimonial
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        const imageInput = document.getElementById('profile_image');
        const imagePreview = document.getElementById('image-preview');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            const reader = new FileReader();

            reader.onload = function(event) {
                imagePreview.src = event.target.result;
            };

            reader.readAsDataURL(file);
        });
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        let uploadedImageUrls = [];
        let isFormSubmitted = false;  // Flag to check if form is submitted

        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('testimonial.ckeditor.upload') . '?_token=' . csrf_token() }}',
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

                        fetch('{{ route('testimonial.ckeditor.upload') }}', {
                            method: 'POST',
                            body: data,
                        })
                        .then(response => response.json())
                        .then(response => {
                            if (response.uploaded) {
                                const imageUrl = response.url;
                                uploadedImageUrls.push(imageUrl);
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
        document.getElementById('testimonialForm').addEventListener('submit', function(event) {
            isFormSubmitted = true;
            document.getElementById('uploadedImages').value = JSON.stringify(uploadedImageUrls);
        });

        // Function to delete unused images
        async function deleteUnusedImages(imageUrls) {
            const response = await fetch('{{ route('testimonial.images.deleteUnused') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ imageUrls })
            });
            return response.json();
        }

        // Warn the user before leaving the page
        window.addEventListener('beforeunload', function (e) {
            if (!isFormSubmitted && uploadedImageUrls.length > 0) {
                const confirmationMessage = 'You have unsaved changes. Are you sure you want to leave?';

                e.returnValue = confirmationMessage; // For most browsers
                return confirmationMessage; // For some older browsers
            }
        });

        // Handle the user's decision to leave the page
        window.addEventListener('unload', function () {
            if (!isFormSubmitted) {
                deleteUnusedImages(uploadedImageUrls);
            }
        });
    </script>
</x-app-layout>
