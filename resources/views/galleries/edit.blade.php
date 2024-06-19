<x-app-layout>
    <div class="bg-white min-h-[800px] pt-12">
        @if (isset($gallery))
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Galleries', 'url' => route('galleries.index')],
                ['name' => 'edit', 'url' => route('galleries.edit', $gallery->id)],
            ]" />
        @else
          <h1>SHIT</h1>
        @endif

        <!-- gallery edit title -->
        <div class="mb-8 space-y-3">
            <h1 class="text-3xl font-semibold text-center sm:text-left sm:pl-[80px] pt-[90px]">Edit Gallery</h1>
        </div>

        <!-- Gallery form -->
        <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" class="w-full"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">

                <!-- Gallery Alt Tag input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="alt_tag">Alt Tag</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="alt_tag" placeholder="Enter the alt tag for the Gallery Image" type="text"
                        name="alt_tag" value="{{ old('alt_tag', $gallery->alt_tag) }}">
                    @error('alt_tag')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <br>

            <!-- Gallery Image input field -->
            <div class="lg:col-span-1">
                <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="image_names">Gallery Images</label>
                <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="image_names" type="file" name="image_names[]" multiple>
                    <div id="image-preview-container" class="flex flex-wrap gap-2 pt-2">
                        @foreach ($existingImageNames as $imageName)
                            <div class="relative w-24 h-24 overflow-hidden flex items-center justify-center">
                                <img src="{{ asset('storage/galleries/' . $imageName) }}" alt="{{ $gallery->alt_tag }}" class="object-cover h-full w-full">
                                <div class="absolute top-0 left-0 bg-gray-800 bg-opacity-50 flex items-center justify-center w-full h-full opacity-0 hover:opacity-100 transition-opacity duration-300">
                                    <label class="flex items-center justify-center cursor-pointer">
                                        <input type="checkbox" name="existing_images[]" value="{{ $imageName }}" class="form-checkbox h-5 w-5 text-indigo-600 transition duration-150 ease-in-out">
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @error('image_names')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
                <!-- Update Gallery button -->
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
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image_names');
            const imagePreviewContainer = document.getElementById('image-preview-container');
            const galleryForm = document.querySelector('form');
            let selectedFiles = [];
            let existingImageNames = @json(json_decode($gallery->image_names));

            // Display existing previews
            displayPreviews(existingImageNames, true);

            imageInput.addEventListener('change', function() {
                const newFiles = Array.from(this.files);
                selectedFiles = selectedFiles.concat(newFiles);
                displayPreviews(selectedFiles, false);
            });

            function displayPreviews(files, isExisting) {
                if (isExisting) {
                    imagePreviewContainer.innerHTML = ''; // Clear existing previews
                }

                files.forEach((file, index) => {
                    const imgContainer = document.createElement('div');
                    imgContainer.classList.add('relative', 'w-24', 'h-24', 'overflow-hidden', 'flex', 'items-center', 'justify-center');

                    const img = document.createElement('img');
                    img.alt = 'Gallery Image Preview';
                    img.classList.add('object-cover', 'h-full', 'w-full');

                    const removeButton = document.createElement('button');
                    removeButton.classList.add('absolute', 'top-0', 'right-0', 'bg-red-600', 'text-white', 'rounded-full', 'p-1', 'focus:outline-none', 'remove-image-button');
                    removeButton.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    `;
                    removeButton.setAttribute('data-tooltip', 'Delete');

                    removeButton.addEventListener('click', function() {
                        if (isExisting) {
                            existingImageNames.splice(index, 1);
                            deleteImageFromGallery(file);
                        } else {
                            selectedFiles.splice(index, 1);
                        }
                        imagePreviewContainer.removeChild(imgContainer);
                    });

                    if (file instanceof File) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            img.src = event.target.result;
                            imgContainer.appendChild(img);
                            imgContainer.appendChild(removeButton);
                            imagePreviewContainer.appendChild(imgContainer);
                        }
                        reader.readAsDataURL(file);
                    } else {
                        img.src = "{{ asset('storage/galleries/') }}/" + file;
                        imgContainer.appendChild(img);
                        imgContainer.appendChild(removeButton);
                        imagePreviewContainer.appendChild(imgContainer);
                    }
                });
            }

            function deleteImageFromGallery(imageName) {
                axios.post('{{ route('galleries.delete-image') }}', { imageName: imageName })
                    .then(response => {
                        alert(response.data.message);
                        existingImageNames = JSON.parse(response.data.image_names);
                    })
                    .catch(error => {
                        console.error(error);
                        alert('An error occurred while deleting the image.');
                    });
            }

            galleryForm.addEventListener('submit', function(event) {
                const formData = new FormData();
                selectedFiles.forEach((file) => {
                    if (file instanceof File) {
                        formData.append('image_names[]', file);
                    }
                });

                // Remove any existing hidden input fields
                const hiddenInputs = galleryForm.querySelectorAll('input[type="hidden"][name^="image_names"]');
                hiddenInputs.forEach((input) => input.remove());

                if (formData.has('image_names[]')) {
                    for (const [key, value] of formData.entries()) {
                        const hiddenField = document.createElement('input');
                        hiddenField.type = 'hidden';
                        hiddenField.name = key;
                        hiddenField.value = value;
                        galleryForm.appendChild(hiddenField);
                    }
                }
            });
        });
    </script>
</x-app-layout>
