<x-app-layout>
    <div class="bg-white min-h-[800px] pt-12">
        @if (isset($mission))
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Mission & Vision', 'url' => route('missions.index')],
                ['name' => 'Edit Mission & Vision', 'url' => route('missions.edit', $mission->id)],
            ]" />
        @else
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Home', 'url' => route('dashboard')],
                ['name' => 'mission & Vision', 'url' => route('missions.show')],
            ]" />
        @endif

        <!-- Mission & Vision edit title -->
        <div class="mb-8 space-y-3">
            <h1 class="text-3xl font-semibold text-center sm:text-left sm:pl-[80px] pt-[90px]">Mission & Vision</h1>
        </div>

        <!-- Mision and vision form -->
        <form action="{{ route('missions.update', $mission->id) }}" method="POST" class="w-full"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-10 items-center grid lg:grid-cols-8 gap-8 m-[80px] justify-center">

                <!-- Mission Title input field -->
                <div class="lg:col-span-3">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="Mission_title">Mission Title</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="Mission_title" placeholder="Enter the Mission_title" type="text" name="Mission_title"
                        value="{{ old('Mission_title', $mission->Mission_title) }}">
                    @error('Mission_title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Mission description input field -->
                <div class="lg:col-span-6">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="Mission_description">Mission Description</label>
                    <textarea
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-20 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="Mission_description" placeholder="Enter the Mission description" type="text" name="Mission_description">{{ old('Mission_description', $mission->Mission_description) }}</textarea>
                    @error('Mission_description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <!-- Mission alt tag input field -->
                <div class="lg:col-span-2">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="Mission_alt_tag">Mission alt tag</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="Mission_alt_tag" placeholder="Enter the mission alt tag" type="text"
                        name="Mission_alt_tag" value="{{ old('Mission_alt_tag', $mission->Mission_alt_tag) }}">
                    @error('Mission_alt_tag')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>

                <!-- Mission image input field -->
                <div class="lg:col-span-6">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="Mission_image">Mission_image</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="Mission_image" type="file" name="Mission_image"
                        onchange="previewImage(event, 'image-preview1')">

                    <div id="image-container1">
                        @if ($mission->Mission_image)
                            <img src="{{ asset('storage/mission/' . $mission->Mission_image) }}"
                                alt="{{ $mission->Mission_image }}" class="min-h-[100px] w-auto p-2">
                        @endif
                    </div>

                    <img id="image-preview1" src="" alt="Preview Image" class="min-h-[100px] w-auto pa-2"
                        style="display: none;">

                    @error('Mission_image')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>


                <!-- Vision Title input field -->
                <div class="lg:col-span-3">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="vision_title">Vision Title</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="vision_title" placeholder="Enter the vision title" type="text" name="vision_title"
                        value="{{ old('vision_title', $mission->vision_title) }}">
                    @error('vision_title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <!-- vision description input field -->
                <div class="lg:col-span-6">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="vision_description">Vision description</label>
                    <textarea
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-20 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="vision_description" placeholder="Enter the vision description" type="text" name="vision_description">{{ old('vision_description', $mission->vision_description) }}</textarea>
                    @error('vision_description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>

                <!-- Vision alt tag input field -->
                <div class="lg:col-span-2">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="vision_alt_tag">Vision alt tag</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="vision_alt_tag" placeholder="Enter the vision alt tag" type="text" name="vision_alt_tag"
                        value="{{ old('vision_alt_tag', $mission->vision_alt_tag) }}">
                    @error('vision_alt_tag')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>

                <!-- Vision image input field -->

                <div class="lg:col-span-6">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="vision_image">Vision_image</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="vision_image" type="file" name="vision_image"
                        onchange="previewImage(event, 'image-preview2')">

                    <div id="image-container2">
                        @if ($mission->vision_image)
                            <img src="{{ asset('storage/vision/' . $mission->vision_image) }}"
                                alt="{{ $mission->vision_image }}" class="min-h-[100px] w-auto p-2">
                        @endif
                    </div>

                    <img id="image-preview2" src="" alt="Preview Image" class="min-h-[100px] w-auto pa-2"
                        style="display: none;">

                    @error('vision_image')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>


                <!-- Core Title input field -->

                <div class="lg:col-span-3">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="Core_title">Core Title</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="Core_title" placeholder="Enter the Core title" type="text" name="Core_title"
                        value="{{ old('Core_title', $mission->Core_title) }}">
                    @error('Core_title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>


                <!-- Core description input field -->
                <div class="lg:col-span-6">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="Core_description">Core description</label>
                    <textarea
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-20 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="Core_description" placeholder="Enter the Core description" type="text" name="Core_description">{{ old('Core_description', $mission->Core_description) }}</textarea>
                    @error('Core_description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <!-- Core alt tag input field -->
                <div class="lg:col-span-2">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="Core_alt_tag">Core alt tag</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="Core_alt_tag" placeholder="Enter the Core alt tag" type="text" name="Core_alt_tag"
                        value="{{ old('Core_alt_tag', $mission->Core_alt_tag) }}">
                    @error('Core_alt_tag')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>

                <!-- Core image input field -->

                <div class="lg:col-span-6">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="Core_image">Core_image</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="Core_image" type="file" name="Core_image"
                        onchange="previewImage(event, 'image-preview3')">

                    <div id="image-container3">
                        @if ($mission->Core_image)
                            <img src="{{ asset('storage/core/' . $mission->Core_image) }}"
                                alt="{{ $mission->Core_image }}" class="min-h-[100px] w-auto p-2">
                        @endif
                    </div>

                    <img id="image-preview3" src="" alt="Preview Image" class="min-h-[100px] w-auto pa-2"
                        style="display: none;">

                    @error('Core_image')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>



                <!-- Update Mission & Vision button -->
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
