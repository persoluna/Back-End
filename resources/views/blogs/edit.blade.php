<x-app-layout>
    <div class="bg-white min-h-[800px] pt-12">
        @if (isset($blog))
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Blogs', 'url' => route('blogs.index')],
                ['name' => $blog->blog_title, 'url' => route('blogs.edit', $blog->id)],
            ]" />
        @else
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Home', 'url' => route('dashboard')],
                ['name' => 'Blogs', 'url' => route('blogs.index')],
            ]" />
        @endif

        <!-- blog edit title -->
        <div class="mb-8 space-y-3">
            <h1 class="text-3xl font-semibold text-center sm:text-left sm:pl-[80px] pt-[90px]">Edit Blog</h1>
        </div>

        <!-- blog form -->
        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" class="w-full" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">

                <!-- blog Title input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="blog_title">Blog Title</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="blog_title" placeholder="Enter the blog title" type="text" name="blog_title"
                        value="{{ old('blog_title', $blog->blog_title) }}">
                    @error('blog_title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- blog slug input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="blog_slug">Blog Title</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="blog_slug" placeholder="Enter the blog slug" type="text" name="blog_slug"
                        value="{{ old('blog_slug', $blog->blog_slug) }}">
                    @error('blog_slug')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Short Description input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="short_description">Blog Description</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="short_description" placeholder="Enter the short description Description" type="text"
                        name="short_description" value="{{ old('short_description', $blog->short_description) }}">
                    @error('short_description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- long Description input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="long_description">long Description</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="long_description" placeholder="Enter the long description" type="text"
                        name="long_description" value="{{ old('long_description', $blog->long_description) }}">
                    @error('long_description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Blog Image input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="blog_image">Blog Image</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="blog_image" type="file" name="blog_image" onchange="previewImage(event)">

                    <div id="image-container">
                        @if ($blog->blog_image)
                            <img src="{{ asset('storage/blogs/' . $blog->blog_image) }}" alt="{{ $blog->alt_tag }}"
                                class="min-h-[100px] w-auto p-2">
                        @endif
                    </div>

                    <img id="image-preview" src="" alt="Preview Image" class="min-h-[100px] w-auto pa-2"
                        style="display: none;">

                    @error('blog_image')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>

                <!-- Blog Alt Tag input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="alt_tag">Blog Image Alt Tag</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="alt_tag" placeholder="Enter the alt tag for the Blog Image" type="text" name="alt_tag"
                        value="{{ old('alt_tag', $blog->alt_tag) }}">
                    @error('alt_tag')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <br>
                <!-- Banner Image input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="banner_image">Banner Image</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="banner_image" type="file" name="banner_image" onchange="previewBannerImage(event)">

                    <div id="banner-image-container">
                        @if ($blog->banner_image)
                            <img src="{{ asset('storage/blog_banners/' . $blog->banner_image) }}"
                                alt="{{ $blog->banner_alt_tag }}" class="min-h-[100px] w-auto p-2">
                        @endif
                    </div>

                    <img id="banner-image-preview" src="" alt="Preview Banner Image"
                        class="min-h-[100px] w-auto pa-2" style="display: none;">

                    @error('banner_image')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>

                <!-- Banner Alt Tag input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="banner_alt_tag">Banner Image Alt Tag</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="banner_alt_tag" placeholder="Enter the alt tag for the banner Image" type="text"
                        name="banner_alt_tag" value="{{ old('banner_alt_tag', $blog->banner_alt_tag) }}">
                    @error('banner_alt_tag')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- posted by input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="posted_by">Posted By</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="posted_by" placeholder="Enter your name" type="text" name="posted_by"
                        value="{{ old('posted_by', $blog->posted_by) }}">
                    @error('posted_by')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- meta title input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="meta_title">Meta title</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="meta_title" placeholder="Enter mets title" type="text" name="meta_title"
                        value="{{ old('meta_title', $blog->meta_title) }}">
                    @error('meta_title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- meta description input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="meta_description">Meta description</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="meta_description" placeholder="Enter Meta description" type="text"
                        name="meta_description" value="{{ old('meta_description', $blog->meta_description) }}">
                    @error('meta_description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <!-- meta keywords input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="meta_keywords">Meta keywords</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="meta_keywords" placeholder="Enter meta keywords" type="text" name="meta_keywords"
                        value="{{ old('meta_keywords', $blog->meta_keywords) }}">
                    @error('meta_keywords')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Meta canonical input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="meta_canonical">Meta canonical</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="meta_canonical" placeholder="Enter Meta canonical" type="text" name="meta_canonical"
                        value="{{ old('meta_canonical', $blog->meta_canonical) }}">
                    @error('meta_canonical')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Update Blog button -->
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
        function previewImage(event) {
            var previewImage = document.getElementById('image-preview');
            var imageContainer = document.getElementById('image-container');

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

        function previewBannerImage(event) {
            var previewImage = document.getElementById('banner-image-preview');
            var imageContainer = document.getElementById('banner-image-container');

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
