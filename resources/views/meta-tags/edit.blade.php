<x-app-layout>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <header id="sticky-header" class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg shadow-lg p-6 mb-8 sticky top-16 transition-all duration-300 ease-in-out z-10">
      <div class="flex justify-between items-center">
        <div>
          <h1 class="text-4xl font-bold text-white mb-4">Edit Meta Tag</h1>
          <nav class="flex items-center space-x-4">
            <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-200">Home</a>
            <span class="text-white">/</span>
            <a href="{{ route('meta-tags.index') }}" class="text-white hover:text-gray-200">Meta Tags</a>
            <span class="text-white">/</span>
            <span class="text-white">Edit Meta Tag</span>
          </nav>
        </div>
        <a href="{{ route('meta-tags.index') }}" class="inline-block px-6 py-3 bg-gray-200 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-gray-300 transform hover:-translate-y-0.5 transition duration-300 ease-in-out">
          Back
        </a>
      </div>
    </header>

    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
      <form action="{{ route('meta-tags.update', $metaTag->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="space-y-4">
          <!-- Title -->
          <div class="space-y-1">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $metaTag->title) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('title')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Description -->
          <div class="space-y-1">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" rows="4" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">{{ old('description', $metaTag->description) }}</textarea>
            @error('description')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Canonical -->
          <div class="space-y-1">
            <label for="canonical" class="block text-sm font-medium text-gray-700">Canonical</label>
            <input type="text" id="canonical" name="canonical" value="{{ old('canonical', $metaTag->canonical) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('canonical')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Author -->
          <div class="space-y-1">
            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
            <input type="text" id="author" name="author" value="{{ old('author', $metaTag->author) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('author')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Language -->
          <div class="space-y-1">
            <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
            <input type="text" id="language" name="language" value="{{ old('language', $metaTag->language) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('language')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Copyright -->
          <div class="space-y-1">
            <label for="copyright" class="block text-sm font-medium text-gray-700">Copyright</label>
            <input type="text" id="copyright" name="copyright" value="{{ old('copyright', $metaTag->copyright) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('copyright')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Content Type -->
          <div class="space-y-1">
            <label for="content_type" class="block text-sm font-medium text-gray-700">Content Type</label>
            <input type="text" id="content_type" name="content_type" value="{{ old('content_type', $metaTag->content_type) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('content_type')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Rating -->
          <div class="space-y-1">
            <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
            <input type="text" id="rating" name="rating" value="{{ old('rating', $metaTag->rating) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('rating')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Robots -->
          <div class="space-y-1">
            <label for="robots" class="block text-sm font-medium text-gray-700">Robots</label>
            <input type="text" id="robots" name="robots" value="{{ old('robots', $metaTag->robots) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('robots')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Googlebot -->
          <div class="space-y-1">
            <label for="googlebot" class="block text-sm font-medium text-gray-700">Googlebot</label>
            <input type="text" id="googlebot" name="googlebot" value="{{ old('googlebot', $metaTag->googlebot) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('googlebot')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Distribution -->
          <div class="space-y-1">
            <label for="distribution" class="block text-sm font-medium text-gray-700">Distribution</label>
            <input type="text" id="distribution" name="distribution" value="{{ old('distribution', $metaTag->distribution) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('distribution')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Schema -->
          <div class="space-y-1">
            <label for="schema" class="block text-sm font-medium text-gray-700">Schema</label>
            <input type="text" id="schema" name="schema" value="{{ old('schema', $metaTag->schema) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('schema')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Viewport -->
          <div class="space-y-1">
            <label for="viewport" class="block text-sm font-medium text-gray-700">Viewport</label>
            <input type="text" id="viewport" name="viewport" value="{{ old('viewport', $metaTag->viewport) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('viewport')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Keywords -->
          <div class="space-y-1">
            <label for="keywords" class="block text-sm font-medium text-gray-700">Keywords</label>
            <input type="text" id="keywords" name="keywords" value="{{ old('keywords', $metaTag->keywords) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('keywords')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Revisit After -->
          <div class="space-y-1">
            <label for="revisit_after" class="block text-sm font-medium text-gray-700">Revisit After</label>
            <input type="text" id="revisit_after" name="revisit_after" value="{{ old('revisit_after', $metaTag->revisit_after) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('revisit_after')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Refresh -->
          <div class="space-y-1">
            <label for="refresh" class="block text-sm font-medium text-gray-700">Refresh</label>
            <input type="text" id="refresh" name="refresh" value="{{ old('refresh', $metaTag->refresh) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('refresh')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- OG Title -->
          <div class="space-y-1">
            <label for="og_title" class="block text-sm font-medium text-gray-700">OG Title</label>
            <input type="text" id="og_title" name="og_title" value="{{ old('og_title', $metaTag->og_title) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('og_title')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- OG Type -->
          <div class="space-y-1">
            <label for="og_type" class="block text-sm font-medium text-gray-700">OG Type</label>
            <input type="text" id="og_type" name="og_type" value="{{ old('og_type', $metaTag->og_type) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('og_type')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- OG URL -->
          <div class="space-y-1">
            <label for="og_url" class="block text-sm font-medium text-gray-700">OG URL</label>
            <input type="text" id="og_url" name="og_url" value="{{ old('og_url', $metaTag->og_url) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('og_url')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- OG Image -->
          <div class="space-y-1">
            <label for="og_image" class="block text-sm font-medium text-gray-700">OG Image</label>
            <input type="text" id="og_image" name="og_image" value="{{ old('og_image', $metaTag->og_image) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('og_image')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- OG Description -->
          <div class="space-y-1">
            <label for="og_description" class="block text-sm font-medium text-gray-700">OG Description</label>
            <textarea id="og_description" name="og_description" rows="4" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">{{ old('og_description', $metaTag->og_description) }}</textarea>
            @error('og_description')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Twitter Card -->
          <div class="space-y-1">
            <label for="twitter_card" class="block text-sm font-medium text-gray-700">Twitter Card</label>
            <input type="text" id="twitter_card" name="twitter_card" value="{{ old('twitter_card', $metaTag->twitter_card) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('twitter_card')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Twitter Site -->
          <div class="space-y-1">
            <label for="twitter_site" class="block text-sm font-medium text-gray-700">Twitter Site</label>
            <input type="text" id="twitter_site" name="twitter_site" value="{{ old('twitter_site', $metaTag->twitter_site) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('twitter_site')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Twitter Title -->
          <div class="space-y-1">
            <label for="twitter_title" class="block text-sm font-medium text-gray-700">Twitter Title</label>
            <input type="text" id="twitter_title" name="twitter_title" value="{{ old('twitter_title', $metaTag->twitter_title) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('twitter_title')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Twitter Description -->
          <div class="space-y-1">
            <label for="twitter_description" class="block text-sm font-medium text-gray-700">Twitter Description</label>
            <textarea id="twitter_description" name="twitter_description" rows="4" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">{{ old('twitter_description', $metaTag->twitter_description) }}</textarea>
            @error('twitter_description')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Twitter Image -->
          <div class="space-y-1">
            <label for="twitter_image" class="block text-sm font-medium text-gray-700">Twitter Image</label>
            <input type="text" id="twitter_image" name="twitter_image" value="{{ old('twitter_image', $metaTag->twitter_image) }}" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @error('twitter_image')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Form Buttons -->
          <div class="flex justify-end space-x-4">
            <a href="{{ route('meta-tags.index') }}" class="inline-block px-6 py-3 bg-gray-200 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-gray-300 transform hover:-translate-y-0.5 transition duration-300 ease-in-out">
              Cancel
            </a>
            <button type="submit" class="inline-block px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transform hover:-translate-y-0.5 transition duration-300 ease-in-out">
              Update Meta Tag
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const header = document.getElementById('sticky-header');
      let lastScrollTop = 0;

      window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > 100) {
          // Scrolling down past 100px
          header.classList.add('expanded');
        } else {
          // Scrolling up or less than 100px
          header.classList.remove('expanded');
        }

        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
      });
    });
  </script>
</x-app-layout>
