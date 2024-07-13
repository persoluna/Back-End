<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <header class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg shadow-lg p-6 mb-8">
            <h1 class="text-4xl font-bold text-white mb-4">Add Quality Controls</h1>
            <nav class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-200">Home</a>
                <span class="text-white">/</span>
                <a href="{{ route('qualitycontrols.index') }}" class="text-white hover:text-gray-200">Quality Controls</a>
                <span class="text-white">/</span>
                <a href="{{ route('qualitycontrols.create') }}" class="text-white hover:text-gray-200">Create Quality Control</a>
            </nav>
        </header>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
            <div class="mb-8 space-y-3">
                <p class="text-gray-500 dark:text-gray-400 text-center text-xl">Enter the Quality Control details below.</p>
            </div>

        <!-- form -->
        <form id="qualitycontrolForm" action="{{ route('qualitycontrols.store') }}" method="POST" class="w-full" enctype="multipart/form-data">
            @csrf
            <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">

                <!-- Title input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="title">Title</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="title" placeholder="Enter the title" type="text" name="title"
                        value="{{ old('title') }}">
                    @error('title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- sub_title input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="sub_title">Sub Title</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="sub_title" placeholder="Enter the sub_title" type="text" name="sub_title"
                        value="{{ old('sub_title') }}">
                    @error('sub_title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <br>

                <!-- Description input field -->
                <div class="lg:col-span-2">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="description">Description</label>
                    <textarea
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-20 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="editor" placeholder="Enter a detailed description" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="hidden" id="uploadedImages" name="uploadedImages" value="">

                <!-- Image input field -->
                <div class="lg:col-span-2">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="images">Images</label>
                    <div id="drop-zone" class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center cursor-pointer hover:border-blue-500 transition-colors">
                        <p>Drag and drop images here or click to select</p>
                    </div>
                    <input class="hidden" id="file-input" type="file" name="images[]" multiple accept="image/*">
                    <button type="button" id="select-button" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors">Select Images</button>
                    <p id="selected-files-count" class="mt-2 text-sm text-gray-600"></p>
                    <div id="selected-images" class="mt-4 flex flex-wrap">
                        @if(isset($qualityControl) && $qualityControl->image)
                            @foreach(json_decode($qualityControl->image) as $image)
                                <div class="image-wrapper relative mx-2 mb-2" data-image="{{ $image }}">
                                    <img src="{{ asset('storage/quality_control_images/' . $image) }}" class="w-32 h-32 object-cover rounded-lg">
                                    <button type="button" class="absolute top-1 right-1 h-6 w-6 bg-gray-700 text-white text-xs rounded-full flex items-center justify-center opacity-50 hover:opacity-100 transition-opacity focus:outline-none">&times;</button>
                                    <input type="hidden" name="existing_images[]" value="{{ $image }}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    @error('images')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <br>
            </div>
            <div class="pt-8 lg:pl-[80px] flex justify-center sm:w-fit lg:col-span-2">
                <button
                    class="ring-offset-background focus-visible:ring-ring flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-black px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-black/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                    type="submit">
                    Confirm
                </button>
            </div>

        </form>
    </div>

    <!-- Include the JS to handle image preview -->
    <script>
        const fileInput = document.getElementById("file-input");
        const dropZone = document.getElementById("drop-zone");
        const selectedImages = document.getElementById("selected-images");
        const selectButton = document.getElementById("select-button");
        const selectedFilesCount = document.getElementById("selected-files-count");
        let newFiles = new DataTransfer();

        selectButton.addEventListener("click", () => {
            fileInput.click();
        });

        fileInput.addEventListener("change", handleFiles);
        dropZone.addEventListener("dragover", handleDragOver);
        dropZone.addEventListener("dragleave", handleDragLeave);
        dropZone.addEventListener("drop", handleDrop);

        function handleFiles(event) {
            const fileList = event.target.files;
            displayImages(fileList, false);
        }

        function handleDragOver(event) {
            event.preventDefault();
            dropZone.classList.add("border-blue-500", "text-blue-500");
        }

        function handleDragLeave(event) {
            event.preventDefault();
            dropZone.classList.remove("border-blue-500", "text-blue-500");
        }

        function handleDrop(event) {
            event.preventDefault();
            const fileList = event.dataTransfer.files;
            displayImages(fileList, false);
            dropZone.classList.remove("border-blue-500", "text-blue-500");
        }

        function displayImages(fileList, isExisting) {
            for (const file of fileList) {
                const imageWrapper = createImageWrapper(file, isExisting);
                selectedImages.appendChild(imageWrapper);
                if (!isExisting) {
                    newFiles.items.add(file);
                }
            }
            updateFileInput();
            updateSelectedFilesCount();
        }

        function createImageWrapper(file, isExisting) {
            const imageWrapper = document.createElement("div");
            imageWrapper.classList.add("relative", "mx-2", "mb-2");

            const image = document.createElement("img");
            image.src = isExisting ? file : URL.createObjectURL(file);
            image.classList.add("w-32", "h-32", "object-cover", "rounded-lg");

            const removeButton = document.createElement("button");
            removeButton.innerHTML = "&times;";
            removeButton.classList.add(
                "absolute", "top-1", "right-1", "h-6", "w-6", "bg-gray-700", "text-white",
                "text-xs", "rounded-full", "flex", "items-center", "justify-center",
                "opacity-50", "hover:opacity-100", "transition-opacity", "focus:outline-none"
            );
            removeButton.addEventListener("click", () => removeImage(imageWrapper, file, isExisting));

            imageWrapper.appendChild(image);
            imageWrapper.appendChild(removeButton);

            if (isExisting) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'existing_images[]';
                input.value = file;
                imageWrapper.appendChild(input);
            }

            return imageWrapper;
        }

        function removeImage(imageWrapper, file, isExisting) {
            imageWrapper.remove();
            if (!isExisting) {
                const newFilesList = Array.from(newFiles.files).filter(f => f !== file);
                newFiles = new DataTransfer();
                newFilesList.forEach(f => newFiles.items.add(f));
                updateFileInput();
            }
            updateSelectedFilesCount();
        }

        function updateFileInput() {
            fileInput.files = newFiles.files;
        }

        function updateSelectedFilesCount() {
            const count = selectedImages.children.length;
            selectedFilesCount.textContent = count > 0 ? `${count} file${count === 1 ? "" : "s"} selected` : "";
        }

        // Initialize existing images
        document.querySelectorAll('.image-wrapper[data-image]').forEach(wrapper => {
            const imageName = wrapper.dataset.image;
            const removeButton = wrapper.querySelector('button');
            removeButton.addEventListener('click', () => removeImage(wrapper, imageName, true));
        });

        // Initial count update
        updateSelectedFilesCount();
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        let uploadedImageUrls = [];
        let isFormSubmitted = false;  // Flag to check if form is submitted

        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('qualitycontrol.ckeditor.upload') . '?_token=' . csrf_token() }}',
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

                        fetch('{{ route('qualitycontrol.ckeditor.upload') }}', {
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
        document.getElementById('qualitycontrolForm').addEventListener('submit', function(event) {
            isFormSubmitted = true;
            document.getElementById('uploadedImages').value = JSON.stringify(uploadedImageUrls);
        });

        // Function to delete unused images
        async function deleteUnusedImages(imageUrls) {
            const response = await fetch('{{ route('qualitycontrol.images.deleteUnused') }}', {
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
