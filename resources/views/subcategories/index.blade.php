<x-app-layout>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <header id="sticky-header" class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg shadow-lg p-6 mb-8 sticky top-16 transition-all duration-300 ease-in-out z-10">
      <div class="flex justify-between items-center">
        <div>
          <h1 class="text-4xl font-bold text-white mb-4">Sub Categories</h1>
          <nav class="flex items-center space-x-4">
            <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-200">Home</a>
            <span class="text-white">/</span>
            <a href="{{ route('subcategories.index') }}" class="text-white hover:text-gray-200">Sub Categories</a>
        </div>
        <a href="{{ route('subcategories.create') }}" class="inline-block px-6 py-3 bg-white text-indigo-600 font-semibold rounded-lg shadow-md hover:bg-indigo-600 hover:text-white transform hover:-translate-y-0.5 transition duration-300 ease-in-out">
          Create Category
        </a>
      </div>
    </header>

    @if (session('success'))
      <div id="success-message" class="hidden bg-green-500 text-white rounded-lg p-4 mb-8 flex justify-between items-center shadow-md">
        <div>
          <strong class="font-bold">Success!</strong>
          <span class="block sm:inline">{{ session('message') }}</span>
        </div>
        <svg id="success-close-button" class="h-6 w-6 fill-current cursor-pointer hover:scale-110 transition duration-300 ease-in-out" viewBox="0 0 20 20">
          <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
        </svg>
      </div>
    @endif

    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
      {{-- Live wire search for Sub Category --}}
      @livewire('search-subcategory')
    </div>
  </div>

  <script>
    // Success message handling
    const successMessage = document.getElementById('success-message');
    const closeButton = document.getElementById('success-close-button');

    function showSuccessMessage() {
      successMessage.classList.remove('hidden');
      setTimeout(() => {
        hideSuccessMessage();
      }, 5000);
    }

    function hideSuccessMessage() {
      successMessage.classList.add('hidden');
    }

    closeButton.addEventListener('click', hideSuccessMessage);

    // Show the message if it exists
    @if (session('success'))
      showSuccessMessage();
    @endif

    // Sticky header effect
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
