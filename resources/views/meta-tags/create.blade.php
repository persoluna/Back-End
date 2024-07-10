<x-app-layout>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <header id="sticky-header" class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg shadow-lg p-6 mb-8 sticky top-16 transition-all duration-300 ease-in-out z-10">
      <div class="flex justify-between items-center">
        <div>
          <h1 class="text-4xl font-bold text-white mb-4">Create Meta Tag</h1>
          <nav class="flex items-center space-x-4">
            <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-200">Home</a>
            <span class="text-white">/</span>
            <a href="{{ route('meta-tags.index') }}" class="text-white hover:text-gray-200">Meta Tags</a>
            <span class="text-white">/</span>
            <a href="{{ route('meta-tags.create') }}" class="text-white hover:text-gray-200">Create Meta Tag</a>
          </nav>
        </div>
        <a href="{{ route('meta-tags.index') }}" class="inline-block px-6 py-3 bg-gray-200 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-gray-300 transform hover:-translate-y-0.5 transition duration-300 ease-in-out">
          Back to List
        </a>
      </div>
    </header>

    @if(session('success'))
      <div id="success-message" class="bg-green-500 text-white rounded-lg p-4 mb-8 flex justify-between items-center shadow-md">
        <div>
          <strong class="font-bold">Success!</strong>
          <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        <svg id="success-close-button" class="h-6 w-6 fill-current cursor-pointer hover:scale-110 transition duration-300 ease-in-out" viewBox="0 0 20 20">
          <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
        </svg>
      </div>
    @endif

    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
      <form action="{{ route('meta-tags.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Type Selection -->
        <div class="space-y-4">
          <label for="type" class="block text-sm font-medium text-gray-700">Select Type</label>
          <select id="type" name="metatagable_type" class="block w-full pl-3 pr-10 py-2 border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            <option value="">-- Select Type --</option>
            @foreach($types as $typeName => $typeClass)
              <option value="{{ $typeName }}">{{ $typeName }}</option>
            @endforeach
          </select>
        </div>

        <!-- Item Selection -->
        <div class="space-y-4" id="item-group" style="display: none;">
          <label for="item" class="block text-sm font-medium text-gray-700">Select Item</label>
          <select id="item" name="metatagable_id" class="block w-full pl-3 pr-10 py-2 border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            <!-- Items will be populated via JavaScript -->
          </select>
        </div>

        <input type="hidden" id="metatagable_type" name="metatagable_type">

        <!-- Meta Tag Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          @php
            $fields = [
              'title', 'description', 'canonical', 'author', 'language', 'copyright',
              'content_type', 'rating', 'robots', 'googlebot', 'distribution', 'schema',
              'viewport', 'keywords', 'revisit_after', 'refresh', 'og_title', 'og_type',
              'og_url', 'og_image', 'og_description', 'twitter_card', 'twitter_site',
              'twitter_title', 'twitter_description', 'twitter_image',
            ];
          @endphp

          @foreach($fields as $field)
            <div class="space-y-1">
              <label for="{{ $field }}" class="block text-sm font-medium text-gray-700 capitalize">{{ str_replace('_', ' ', $field) }}</label>
              <input type="text" id="{{ $field }}" name="{{ $field }}" class="block w-full pl-3 pr-10 py-2 border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            </div>
          @endforeach
        </div>

        <!-- Form Buttons -->
        <div class="flex justify-end space-x-4">
          <a href="{{ route('meta-tags.index') }}" class="inline-block px-6 py-3 bg-gray-200 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-gray-300 transform hover:-translate-y-0.5 transition duration-300 ease-in-out">
            Cancel
          </a>
          <button type="submit" class="inline-block px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transform hover:-translate-y-0.5 transition duration-300 ease-in-out">
            Create Meta Tag
          </button>
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

    document.getElementById('type').addEventListener('change', function () {
      var type = this.value;
      var itemGroup = document.getElementById('item-group');
      var itemSelect = document.getElementById('item');
      var metatagableTypeInput = document.getElementById('metatagable_type');

      if (type) {
        fetch(`/meta-tags/get-items/${type}`)
          .then(response => response.json())
          .then(data => {
            itemGroup.style.display = 'block';
            itemSelect.innerHTML = '';
            data.forEach(function (item) {
              var option = document.createElement('option');
              option.value = item.id;
              option.textContent = item.name || item.product_name || item.blog_title;
              itemSelect.appendChild(option);
            });
            metatagableTypeInput.value = type;
          });
      } else {
        itemGroup.style.display = 'none';
        itemSelect.innerHTML = '';
        metatagableTypeInput.value = '';
      }
    });
  </script>
</x-app-layout>
