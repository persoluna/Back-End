<x-app-layout>
    <div class="bg-white min-h-[800px] pt-12">
        <x-breadcrumb :breadcrumbs="[
            ['name' => 'Why us', 'url' => route('whychooseus.index')],
            ['name' => 'Create Why choose us', 'url' => route('whychooseus.create')],
        ]" />

        <!-- whychooseus creation title and description -->
        <div class="mb-8 space-y-3">
            <h1 class="text-3xl sm:text-4xl font-semibold text-center pt-[90px]">Add Your why us</h1>
            <p class="text-gray-500 text-center text-xl">Enter the Why us details.</p>
        </div>

        <!-- whychooseus form -->
        <form id="whychooseusForm" action="{{ route('whychooseus.store') }}" method="POST" class="w-full" enctype="multipart/form-data">
            @csrf
            <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">

                <!-- whychooseus Title input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="why_title">Why us Title</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="why_title" placeholder="Enter the whychooseus title" type="text" name="why_title"
                        value="{{ old('why_title') }}">
                    @error('why_title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- whychooseus Description input field -->
                <div class="lg:col-span-2">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="why_description">why us Description</label>
                    <textarea
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-20 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="editor" placeholder="Enter a brief description of your whychooseus" name="why_description">{{ old('why_description') }}</textarea>
                    @error('why_description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="hidden" id="uploadedImages" name="uploadedImages" value="">

                <!-- whychooseus Alt Tag input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="alt_tag">Alt Tag</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="alt_tag" placeholder="Enter the alt tag for the whychooseus image" type="text"
                        name="alt_tag" value="{{ old('alt_tag') }}">
                    @error('alt_tag')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>

                <!-- whychooseus image input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="why_image">Why us Image</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="why_image" type="file" name="why_image">
                    <img id="image-preview" src="" alt="why us image Preview"
                        class="min-h-[100px] w-auto pt-2 text-base">
                    @error('why_image')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Add whychooseus button -->
                <div class="pt-8 flex justify-center sm:w-fit lg:col-span-2">
                    <button
                        class="rounded-tr-2xl rounded-bl-2xl ring-offset-background focus-visible:ring-ring flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-black px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-black/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                        type="submit">
                        Confirm
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        const imageInput = document.getElementById('why_image');
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
                    uploadUrl: '{{ route('whychooseus.ckeditor.upload') . '?_token=' . csrf_token() }}',
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

                        fetch('{{ route('whychooseus.ckeditor.upload') }}', {
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
        document.getElementById('whychooseusForm').addEventListener('submit', function(event) {
            isFormSubmitted = true;
            document.getElementById('uploadedImages').value = JSON.stringify(uploadedImageUrls);
        });

        // Function to delete unused images
        async function deleteUnusedImages(imageUrls) {
            const response = await fetch('{{ route('whychooseus.images.deleteUnused') }}', {
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
