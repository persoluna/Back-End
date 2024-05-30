<x-app-layout>
    <div class="bg-white min-h-[800px] pt-12">
        @if (isset($about))
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'About Us', 'url' => route('abouts.show', $about->id)],
                ['name' => 'Edit About Us', 'url' => route('abouts.edit', $about->id)],
            ]" />
        @else
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Home', 'url' => route('dashboard')],
                ['name' => 'About Us', 'url' => route('abouts.show')],
            ]" />
        @endif

        <!-- About us edit title -->
        <div class="mb-8 space-y-3">
            <h1 class="text-3xl font-semibold text-center sm:text-left sm:pl-[80px] pt-[90px]">About Us</h1>
        </div>

        <!-- About us form -->
        <form action="{{ route('abouts.update', $about->id) }}" method="POST" class="w-full" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-10 items-center grid lg:grid-cols-8 gap-8 m-[80px] justify-center">

                <!-- About Title input field -->
                <div class="lg:col-span-3">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="title">Title</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-60 rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="title" placeholder="Enter the About us title" type="text" name="title"
                        value="{{ old('title', $about->title) }}">
                    @error('title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>

                <!-- Application Image input field -->
                <div class="lg:col-span-6">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="image1">Image 1</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-80 rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="image1" type="file" name="image1" onchange="previewImage(event, 'image-preview1')">

                    <div id="image-container1">
                        @if ($about->image1)
                            <img src="{{ asset('storage/abouts/' . $about->image1) }}" alt="{{ $about->alt_tag1 }}"
                                class="min-h-[100px] max-h-[500px] w-auto p-2">
                        @endif
                    </div>

                    <img id="image-preview1" src="" alt="Preview Image" class="min-h-[100px] w-auto pa-2"
                        style="display: none;">

                    @error('image1')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <!-- About us image Alt Tag1 input field -->
                <div class="lg:col-span-2">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="alt_tag">Alt Tag1</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="alt_tag1" placeholder="_____" type="text" name="alt_tag"
                        value="{{ old('alt_tag1', $about->alt_tag1) }}">
                    @error('alt_tag1')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <!-- Application Image input field -->
                <div class="lg:col-span-6">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="image2">Image 2</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-80 rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="image2" type="file" name="image2" onchange="previewImage(event, 'image-preview2')">

                    <div id="image-container2">
                        @if ($about->image2)
                            <img src="{{ asset('storage/abouts/' . $about->image2) }}" alt="{{ $about->alt_tag2 }}"
                                class="min-h-[100px] w-auto p-2">
                        @endif
                    </div>

                    <img id="image-preview2" src="" alt="Preview Image" class="min-h-[100px] w-auto pa-2"
                        style="display: none;">

                    @error('image2')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <!-- Application Alt Tag input field -->
                <div class="lg:col-span-2">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="alt_tag2">Alt Tag2</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="alt_tag2" placeholder="_____" type="text" name="alt_tag2"
                        value="{{ old('alt_tag2', $about->alt_tag2) }}">
                    @error('alt_tag2')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <br>

                <!-- About Sub Title input field -->
                <div class="lg:col-span-6">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="sub_title">Sub Title</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-80 rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="sub_title" placeholder="Enter the About us Sub title" type="text" name="sub_title"
                        value="{{ old('title', $about->sub_title) }}">
                    @error('sub_title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>

                <!-- About Description input field -->
                <div class="lg:col-span-6">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="description">About Description</label>
                    <textarea
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-40 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="description" placeholder="Enter a brief description" name="description">{{ old('description', $about->description) }}</textarea>
                    @error('description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>


                <!-- Owner Name input field -->
                <div class="lg:col-span-2">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="owner_name">Owner Name</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="owner_name" placeholder="Enter the Owner Name" type="text" name="owner_name"
                        value="{{ old('owner_name', $about->owner_name) }}">
                    @error('owner_name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <!-- About Owner Designation input field -->
                <div class="lg:col-span-3">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="owner_designation">Owner Designation</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="owner_designation" placeholder="Enter the About us owner_designation" type="text"
                        name="owner_designation" value="{{ old('owner_name', $about->owner_designation) }}">
                    @error('owner_designation')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <!-- Owner_signature-->
                <div class="lg:col-span-6">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="owner_signature">Signature</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-80 rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="owner_signature" type="file" name="owner_signature"
                        onchange="previewImage(event, 'image-preview3')">

                    <div id="image-container3">
                        @if ($about->owner_signature)
                            <img src="{{ asset('storage/abouts/' . $about->owner_signature) }}"
                                alt="{{ $about->alt_tag3 }}" class="min-h-[100px] w-auto p-2">
                        @endif
                    </div>

                    <img id="image-preview3" src="" alt="Preview Image" class="min-h-[100px] w-auto pa-2"
                        style="display: none;">

                    @error('owner_signature')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <!--  Alt Tag3 input field -->
                <div class="lg:col-span-6">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="alt_tag3">Alt Tag3</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-60 rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="alt_tag3" placeholder="_____" type="text" name="alt_tag3"
                        value="{{ old('alt_tag3', $about->alt_tag3) }}">
                    @error('alt_tag3')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <br>
                <!-- Update Application button -->
                <div class="pt-8 flex justify-center sm:w-fit lg:col-span-2">
                    <button
                        class="ring-offset-background focus-visible:ring-ring flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-black px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-black/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                        type="submit">
                        Confirm
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event, previewId) {
            var previewImage = document.getElementById(previewId);
            var imageContainer = document.getElementById(previewId.replace('preview', 'container'));

            if (event.target.files.length > 0) {
                var reader = new FileReader();
                reader.onload = function() {
                    if (previewImage) {
                        previewImage.src = reader.result;
                        previewImage.style.display = 'block';
                        if (imageContainer) {
                            imageContainer.style.display = 'none';
                        }
                    }
                }
                reader.readAsDataURL(event.target.files[0]);
            } else {
                previewImage.src = '';
                previewImage.style.display = 'none';
                if (imageContainer) {
                    imageContainer.style.display = 'block';
                }
            }
        }
    </script>
</x-app-layout>
