<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <header class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg shadow-lg p-6 mb-8">
            <h1 class="text-4xl font-bold text-white mb-4">Edit Your Video</h1>
            <nav class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-200">Home</a>
                <span class="text-white">/</span>
                <a href="{{ route('videos.index') }}" class="text-white hover:text-gray-200">Videos</a>
                <span class="text-white">/</span>
                <a href="{{ route('videos.edit', $video->id) }}" class="text-white hover:text-gray-200">Edit Video</a>
            </nav>
        </header>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
            <div class="mb-8 space-y-3">
                <p class="text-gray-500 dark:text-gray-400 text-center text-xl">Update the Video details below.</p>
            </div>
            <!-- Video form -->
            <form id="videoForm" action="{{ route('videos.update', $video->id) }}" method="POST" class="w-full" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 justify-center">

                    <!-- Video Title input field -->
                    <div class="lg:col-span-1 mt-2">
                        <label for="title" class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Video Title</label>
                        <input
                            id="title"
                            name="title"
                            type="text"
                            class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2"
                            placeholder="Enter the video title"
                            value="{{ old('title', $video->title) }}">
                        @error('title')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Category dropdown -->
                    <div class="lg:col-span-1">
                        <div class="space-y-2">
                            <label for="category_id" class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Category</label>
                            <select
                                id="category_id"
                                name="category_id"
                                class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $video->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Video Description input field -->
                    <div class="lg:col-span-2">
                        <label for="description" class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Video Description</label>
                        <textarea
                            id="description"
                            name="description"
                            class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-20 w-full rounded-md border px-3 py-2 text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2"
                            placeholder="Enter a brief description of your video">{{ old('description', $video->description) }}</textarea>
                        @error('description')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Current Video preview and upload field -->
                    <div class="lg:col-span-1">
                        <label for="video" class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Current Video</label>
                        <video id="current-video" class="w-full rounded-md" controls>
                            <source src="{{ asset('storage/' . $video->url) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <label for="video" class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 mt-4">Change Video</label>
                        <input
                            id="video"
                            name="video"
                            type="file"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            accept="video/*">
                        @error('video')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Update Video button -->
                    <div class="mt-8 flex justify-end">
                        <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold rounded-lg shadow-md hover:from-indigo-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-300">
                            Update Video
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript for form handling and preview (if needed) -->
    <script>
        // Add any JavaScript you need here, e.g., for file previews or additional form validation
    </script>
</x-app-layout>
