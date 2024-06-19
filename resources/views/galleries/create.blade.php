<x-app-layout>
    <div class="bg-white min-h-[800px] pt-12">
        <x-breadcrumb :breadcrumbs="[
            ['name' => 'Galleries', 'url' => route('galleries.index')],
            ['name' => 'Create Gallery', 'url' => route('galleries.create')],
        ]" />

        <!-- Gallery creation title and description -->
        <div class="mb-8 space-y-3">
            <h1 class="text-3xl sm:text-4xl font-semibold text-center pt-[90px]">Create Gallery</h1>
            <p class="text-gray-500 text-center text-xl">Enter the Gallery details.</p>
        </div>

        <!-- Gallery form -->
        <form action="{{ route('galleries.store') }}" method="POST" class="w-full" enctype="multipart/form-data">
            @csrf
            <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">

                <!-- Gallery images Alt tag input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="alt_tag">Gallery Title</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="alt_tag" placeholder="Enter the Gallery title" type="text"
                        name="alt_tag" value="{{ old('alt_tag') }}">
                    @error('alt_tag')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <!-- Gallery image input field -->
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="image_names">Images</label>
                    <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                           id="image_names" type="file" name="image_names[]" multiple>
                    <div id="image-preview-container" class="flex flex-wrap gap-2 pt-2">
                        <!-- Image previews will be inserted here -->
                    </div>
                    @error('image_names')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

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
        const galleryForm = document.querySelector('form');
        const imageInput = document.getElementById('image_names');
        const imagePreviewContainer = document.getElementById('image-preview-container');
        let selectedFiles = [];

        imageInput.addEventListener('change', function() {
            const newFiles = Array.from(this.files);
            selectedFiles = selectedFiles.concat(newFiles);

            displayPreviews();
        });

        function displayPreviews() {
            imagePreviewContainer.innerHTML = ''; // Clear existing previews

            selectedFiles.forEach((file, index) => {
                const reader = new FileReader();

                reader.onload = function(event) {
                    const imgContainer = document.createElement('div');
                    imgContainer.classList.add('relative', 'w-24', 'h-24', 'overflow-hidden', 'flex', 'items-center', 'justify-center');

                    const img = document.createElement('img');
                    img.src = event.target.result;
                    img.alt = 'Gallery Image Preview';
                    img.classList.add('object-cover', 'h-full', 'w-full');

                    const removeButton = document.createElement('button');
                    removeButton.classList.add('absolute', 'top-0', 'right-0', 'bg-red-600', 'text-white', 'rounded-full', 'p-1', 'focus:outline-none');
                    removeButton.innerHTML = '&times;'; // Cross symbol

                    removeButton.addEventListener('click', function() {
                        selectedFiles.splice(index, 1);
                        displayPreviews();
                    });

                    imgContainer.appendChild(img);
                    imgContainer.appendChild(removeButton);
                    imagePreviewContainer.appendChild(imgContainer);
                };

                reader.readAsDataURL(file);
            });
        }

        galleryForm.addEventListener('submit', function(event) {
            const formData = new FormData();
            selectedFiles.forEach((file, index) => {
                formData.append('image_names[]', file);
            });

            if (selectedFiles.length > 0) {
                for (const [key, value] of formData.entries()) {
                    const hiddenField = document.createElement('input');
                    hiddenField.type = 'hidden';
                    hiddenField.name = key;
                    hiddenField.value = value;
                    galleryForm.appendChild(hiddenField);
                }
            }
        });
    </script>

</x-app-layout>
