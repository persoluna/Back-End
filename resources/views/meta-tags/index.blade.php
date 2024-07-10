<x-app-layout>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <header id="sticky-header" class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg shadow-lg p-6 mb-8 sticky top-16 transition-all duration-300 ease-in-out z-10">
      <div class="flex justify-between items-center">
        <div>
          <h1 class="text-4xl font-bold text-white mb-4">Meta Tags</h1>
          <nav class="flex items-center space-x-4">
            <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-200">Home</a>
            <span class="text-white">/</span>
            <a href="{{ route('meta-tags.index') }}" class="text-white hover:text-gray-200">Meta Tags</a>
          </nav>
        </div>
        <a href="{{ route('meta-tags.create') }}" class="inline-block px-6 py-3 bg-white text-indigo-600 font-semibold rounded-lg shadow-md hover:bg-indigo-600 hover:text-white transform hover:-translate-y-0.5 transition duration-300 ease-in-out">
          Create Meta Tag
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
    <div class="overflow-x-auto">
      <table class="min-w-full leading-normal mt-8 divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($metaTags as $metaTag)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $metaTag->id }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $metaTag->metatagable_type }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 truncate">{{ $metaTag->title }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <a href="{{ route('meta-tags.edit', $metaTag->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                <form action="{{ route('meta-tags.destroy', $metaTag->id) }}" method="POST" class="inline-block ml-4">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      </div>
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
  </script>
</x-app-layout>
