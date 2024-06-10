<x-app-layout>
    <div class="bg-white min-h-[1200px] pt-12">
        <x-breadcrumb :breadcrumbs="[
            ['name' => 'Products', 'url' => route('products.index')],
            ['name' => 'Create Product', 'url' => route('products.create')],
        ]" />

        <!-- Product creation title and description -->
        <div class="mb-8 space-y-3">
            <h1 class="text-3xl sm:text-4xl font-semibold text-center pt-[90px]">Add Your Product</h1>
            <p class="text-gray-500 text-center text-xl">Enter the Product details.</p>
        </div>

        <!-- Product form -->
        <form action="{{ route('products.store') }}" method="POST" class="w-full" enctype="multipart/form-data">
            @csrf
            <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">

                <!-- Category dropdown -->
                <div class="lg:col-span-1">
                    <div class="space-y-2">
                        <label
                            class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="category_id">Category</label>
                        <select
                            class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            id="category_id" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}
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

                <!-- Sub category dropdown -->
                <div class="lg:col-span-1">
                    <div class="space-y-2">
                        <label
                            class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="subcategory_id">Sub Category</label>
                        <select
                            class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            id="subcategory_id" name="subcategory_id">
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}"
                                    {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }}>
                                    {{ $subcategory->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('subcategory_id')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Product Name input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="product_name">Product Name</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="product_name" placeholder="Enter the product name" type="text" name="product_name"
                        value="{{ old('product_name') }}">
                    @error('product_name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Product Slug input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="slug">Product Slug</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="slug" placeholder="Enter the Product slug" type="text" name="slug"
                        value="{{ old('slug') }}">
                    @error('slug')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Product Description input field -->
                <div class="lg:col-span-2">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="description">Product Description</label>
                    <textarea
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-20 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="description" placeholder="Enter a brief description of your Product" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Product image input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="image">Product Image</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="image" type="file" name="image">
                    <img id="image-preview" src="" alt="Product Image Preview"
                        class="min-h-[100px] w-auto pt-2 text-base">
                    @error('image')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>

                <!-- Alt Tag input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="alt_tag">Alt Tag</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="alt_tag" placeholder="Enter the alt tag for the Product image" type="text"
                        name="alt_tag" value="{{ old('alt_tag') }}">
                    @error('alt_tag')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>

                {{-- Meta title input field --}}
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="meta_title">Meta Title</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="meta_title" placeholder="Enter the Meta Title" type="text" name="meta_title"
                        value="{{ old('meta_title') }}">
                    @error('meta_title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Meta Description input field --}}
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="meta_description">Meta Description</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="meta_description" placeholder="Enter the Meta Description" type="text"
                        name="meta_description" value="{{ old('meta_description') }}">
                    @error('meta_description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                {{-- Meta Keywords input field --}}
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="meta_keyword">Meta Keywords</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="meta_keyword" placeholder="Enter the Meta Keywords" type="text" name="meta_keyword"
                        value="{{ old('meta_keyword') }}">
                    @error('meta_keyword')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Meta Canonical Input Field --}}
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="meta_canonical">Meta Canonical</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="meta_canonical" placeholder="Enter the Meta Canonical" type="text"
                        name="meta_canonical" value="{{ old('meta_canonical') }}">
                    @error('meta_canonical')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="pt-8 lg:pl-[80px] flex justify-center sm:w-fit lg:col-span-2 pb-12">
                <button
                    class="rounded-tr-2xl rounded-bl-2xl ring-offset-background focus-visible:ring-ring flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-black px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-black/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                    type="submit">
                    confirm
                </button>
            </div>
        </form>
    </div>

    <!-- JS to handle image preview -->
    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image-preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
</x-app-layout>
