<x-app-layout>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <header id="sticky-header" class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg shadow-lg p-6 mb-8 sticky top-16 transition-all duration-300 ease-in-out z-10">
      <div class="flex justify-between items-center">
        <div>
          <h1 class="text-4xl font-bold text-white mb-4">Global Presences</h1>
          <nav class="flex items-center space-x-4">
            <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-200">Home</a>
            <span class="text-white">/</span>
            <a href="{{ route('globalpresences.index') }}" class="text-white hover:text-gray-200">Presences</a>
          </nav>
        </div>
        <a href="{{ route('globalpresences.create') }}" class="inline-block px-6 py-3 bg-white text-indigo-600 font-semibold rounded-lg shadow-md hover:bg-indigo-600 hover:text-white transform hover:-translate-y-0.5 transition duration-300 ease-in-out">
          Create Presence
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

    <div class="bg-white rounded-lg shadow-md p-6 mb-8 overflow-x-auto">
      <table class="min-w-full leading-normal mt-8">
        <thead>
          <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider">Country</th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider">Latitude</th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider">Longitude</th>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($globalpresences as $globalpresence)
            <tr class="font-medium">
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-900">
                {{ $globalpresence->countryName }}
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-900">
                {{ $globalpresence->latitude }}
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-900">
                {{ $globalpresence->longitude }}
              </td>
              <td class="px-5 py-8 border-b border-gray-200 bg-white text-sm flex gap-3">
                <a href="{{ route('globalpresences.edit', $globalpresence->id) }}" class="inline-block px-4 py-2 bg-gray-500 text-white font-bold rounded-lg shadow-md hover:bg-gray-700">Edit</a>
                <form action="{{ route('globalpresences.destroy', $globalpresence->id) }}" method="POST" class="inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="inline-block px-4 py-2 bg-red-500 text-white font-bold rounded-lg shadow-md hover:bg-red-700" onclick="return confirm('Are you sure you want to delete this global presence?')">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
                <td colspan="4" class="text-center py-10 text-gray-500 dark:text-gray-400 font-bold">
                    No presence found!
                    <img src="{{ asset('storage/DrawKit-onlineshopping-Illustration-10.svg') }}" alt="No achievement found" class="mx-auto mb-4 h-80 w-80">
                </td>
            </tr>
          @endforelse
        </tbody>
      </table>
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

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const header = document.getElementById('sticky-header');
      let lastScrollTop = 0;

      window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > 100) {
          header.classList.add('expanded');
        } else {
          header.classList.remove('expanded');
        }

        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
      });
    });
  </script>
</x-app-layout>
