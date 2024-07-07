<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <header class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg shadow-lg p-6 mb-8">
            <h1 class="text-4xl font-bold text-white mb-4">Add Your Counter</h1>
            <nav class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-200">Home</a>
                <span class="text-white">/</span>
                <a href="{{ route('counters.index') }}" class="text-white hover:text-gray-200">Counters</a>
                <span class="text-white">/</span>
                <a href="{{ route('counters.create') }}" class="text-white hover:text-gray-200">Create Counter</a>
            </nav>
        </header>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
            <div class="mb-8 space-y-3">
                <p class="text-gray-500 dark:text-gray-400 text-center text-xl">Enter the Counter details below.</p>
            </div>

        <!-- Counter form -->
        <form action="{{ route('counters.store') }}" method="POST" class="w-full" enctype="multipart/form-data">
            @csrf
            <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">

                <!-- Counter Title input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="title">Counter Title</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="title" placeholder="Enter the counter title" type="text" name="title"
                        value="{{ old('title') }}">
                    @error('title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>

                <!-- Counter Number input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="number">Counter Number</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="number" placeholder="Enter the counter number" type="number" name="number"
                        value="{{ old('number') }}">
                    @error('number')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Sign input field with dropdown -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="sign">Sign</label>
                    <div class="relative">
                        <input
                            class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            id="sign" placeholder="Enter or select a sign" type="text" name="sign"
                            value="{{ old('sign') }}">
                        <select
                            class="absolute inset-y-0 right-0 w-10 bg-transparent border-none cursor-pointer"
                            onchange="document.getElementById('sign').value = this.value">
                            <option value="">&#x25BC;</option>
                            <option value="@">@</option>
                            <option value="$">$</option>
                            <option value="%">%</option>
                            <option value="^">^</option>
                            <option value="&">&</option>
                            <option value="*">*</option>
                            <option value="€">€</option>
                            <option value="£">£</option>
                            <option value="¥">¥</option>
                            <option value="₹">₹</option>
                            <option value="¢">¢</option>
                            <option value="₣">₣</option>
                            <option value="₤">₤</option>
                            <option value="₥">₥</option>
                            <option value="₧">₧</option>
                            <option value="₨">₨</option>
                            <option value="₩">₩</option>
                            <option value="₪">₪</option>
                            <option value="₫">₫</option>
                            <option value="₲">₲</option>
                            <option value="₺">₺</option>
                            <option value="₼">₼</option>
                            <option value="₽">₽</option>
                            <option value="৳">৳</option>
                            <option value="₵">₵</option>
                            <option value="₴">₴</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    @error('sign')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Banner Alt Tag input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="alt_tag">Alt Tag</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="alt_tag" placeholder="Enter the alt tag for the Counter Icon" type="text"
                        name="alt_tag" value="{{ old('alt_tag') }}">
                    @error('alt_tag')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <!-- Counter Icon input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="icon">Counter Icon</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="icon" type="file" name="icon">
                    <img id="image-preview" src="" alt="Counter Icon Preview"
                        class="h-min[100px] w-auto pa-2 text-base">
                    @error('icon')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Add Banner button -->
                <div class="pt-8 flex justify-center sm:w-fit lg:col-span-2">
                    <button
                        class="rounded-tr-2xl rounded-bl-2xl ring-offset-background focus-visible:ring-ring flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-black px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-black/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                        type="submit">
                        Add Counter
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        const imageInput = document.getElementById('icon');
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
</x-app-layout>
