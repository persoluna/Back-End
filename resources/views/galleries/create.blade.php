<x-app-layout>
    <div class="bg-white min-h-[800px] pt-12">
        <x-breadcrumb :breadcrumbs="[
            ['name' => 'Galleries', 'url' => route('galleries.index')],
            ['name' => 'Create Gallery', 'url' => route('galleries.create')],
        ]" />

        <!-- Gallery creation title and description -->
        <div class="mb-8 space-y-3">
            <h1 class="text-3xl sm:text-4xl font-semibold text-start pt-[90px] ml-20">Create Gallery</h1>
            <p class="text-gray-500 text-start text-xl ml-20">Enter the Gallery details.</p>
        </div>

        <!-- Gallery form -->
        <form action="{{ route('galleries.store') }}" method="POST" class="w-full" enctype="multipart/form-data">
            @csrf
            <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">

                <!-- Gallery image Alt tag input field -->
                <div class="lg:col-span-1 mt-2">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="alt_tag">Gallery Title</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-fit min-w-[400px] rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="alt_tag" placeholder="Enter the Gallery title" type="text"
                        name="alt_tag" value="{{ old('alt_tag') }}">
                    @error('alt_tag')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Category dropdown -->
                <div class="lg:col-span-1">
                    <div class="space-y-2">
                        <label
                            class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="category_id">Category</label>
                        <select
                            class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-fit min-w-[220px] rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            id="category_id" name="category_id">
                            @foreach ($galleryCategories as $gallerycategory)
                                <option value="{{ $gallerycategory->id }}"
                                    {{ old('category_id') == $gallerycategory->id ? 'selected' : '' }}>{{ $gallerycategory->name }}
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

                <!-- Gallery image input field -->
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="image">Image</label>
                    <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-fit rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                           id="image" type="file" name="image" accept="image/*">
                    <div id="image-preview" class="flex flex-wrap gap-2 pt-2">
                        <!-- Image preview will be inserted here -->
                    </div>
                    @error('image')
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
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');

        imageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    imagePreview.innerHTML = `
                        <div class="relative w-24 h-24 overflow-hidden flex items-center justify-center">
                            <img src="${event.target.result}" alt="Gallery Image Preview" class="object-cover h-full w-full">
                        </div>
                    `;
                };

                reader.readAsDataURL(this.files[0]);
            } else {
                imagePreview.innerHTML = '';
            }
        });
    </script>
</x-app-layout>