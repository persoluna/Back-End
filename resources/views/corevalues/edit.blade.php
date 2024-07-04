<x-app-layout>
    <div class="bg-white min-h-[800px] pt-12">
        @if (isset($corevalue))
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Mission & Vision', 'url' => route('missions.index')],
                ['name' => 'Edit Core Value', 'url' => route('corevalues.edit', $corevalue->id)],
            ]" />
        @else
            <h1>Page Not Found</h1>
        @endif

        <!-- Title and Description -->
        <div class="mb-8 space-y-3">
            <h1 class="text-3xl sm:text-4xl font-semibold text-start pt-[90px] ml-12">Enter Your Core Value</h1>
        </div>

        <!-- Form -->
        <form action="{{ route('corevalues.update', $corevalue->id) }}" method="POST" enctype="multipart/form-data" class="w-full">
            @csrf
            @method('PUT')
            <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">

                <!-- Core Title input field -->
                <div class="lg:col-span-2">
                    <label for="Core_title" class="text-base font-medium leading-none">Core Title</label>
                    <input
                        id="Core_title"
                        type="text"
                        name="Core_title"
                        value="{{ old('Core_title', $corevalue->Core_title) }}"
                        placeholder="Enter the Core title"
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                    >
                    @error('Core_title')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <br>

                <!-- Core Description input field -->
                <div class="lg:col-span-2">
                    <label for="Core_description" class="text-base font-medium leading-none">Core Description</label>
                    <textarea
                        id="Core_description"
                        name="Core_description"
                        placeholder="Enter the Core description"
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-20 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                    >{{ old('Core_description', $corevalue->Core_description) }}</textarea>
                    @error('Core_description')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Core Alt Tag input field -->
                <div class="lg:col-span-1">
                    <label for="Core_alt_tag" class="text-base font-medium leading-none">Alt Tag</label>
                    <input
                        id="Core_alt_tag"
                        type="text"
                        name="Core_alt_tag"
                        value="{{ old('Core_alt_tag', $corevalue->Core_alt_tag) }}"
                        placeholder="Enter the Core alt tag"
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                    >
                    @error('Core_alt_tag')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <br>

                <!-- Core Image input field -->
                <div class="lg:col-span-2">
                    <label for="Core_image" class="text-base font-medium leading-none">Core Image</label>
                    <input
                        id="Core_image"
                        type="file"
                        name="Core_image"
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        onchange="previewImage(event, 'image-preview')"
                    >
                    <div id="image-container" class="pt-2">
                        @if ($corevalue->Core_image)
                            <img src="{{ asset('storage/corevalues/' . $corevalue->Core_image) }}" alt="{{ $corevalue->Core_image }}" class="min-h-[100px] w-auto">
                        @endif
                    </div>
                    <img id="image-preview" src="" alt="Preview Image" class="min-h-[100px] w-auto pt-2" style="display: none;">
                    @error('Core_image')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <br>

                <!-- Confirm button -->
                <div class="pt-8 flex justify-center sm:w-fit lg:col-span-2">
                    <button
                        type="submit"
                        class="rounded-tr-2xl rounded-bl-2xl ring-offset-background focus-visible:ring-ring flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-black px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-black/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                    >
                        Confirm
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script>
        function previewImage(event) {
            var previewImage = document.getElementById('image-preview');
            var imageContainer = document.getElementById('image-container');

            if (event.target.files.length > 0) {
                var reader = new FileReader();
                reader.onload = function() {
                    previewImage.src = reader.result;
                    previewImage.style.display = 'block';
                    imageContainer.style.display = 'none';
                }
                reader.readAsDataURL(event.target.files[0]);
            } else {
                previewImage.src = '';
                previewImage.style.display = 'none';
                imageContainer.style.display = 'block';
            }
        }
    </script>
</x-app-layout>
