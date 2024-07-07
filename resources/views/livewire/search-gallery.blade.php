<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">

            <div class="flex flex-col sm:flex-row items-center justify-between mb-4 space-y-4 sm:space-y-0">
                <div class="w-full sm:w-1/2">
                    <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search gallery..."
                        class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500">
                </div>
                <div class="flex space-x-2">
                    <!-- Add export and import buttons here if needed -->
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full leading-normal mt-8">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Alt tag
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                First Image
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galleries as $gallery)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-300">
                                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm text-gray-900 dark:text-gray-300 truncate">
                                    {{ $gallery->alt_tag }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                                    @if ($gallery->image)
                                        <img src="{{ asset('storage/galleries/' . $gallery->image) }}" alt="{{ $gallery->alt_tag }}" class="w-24 h-14 object-cover">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                                    <div class="flex gap-2">
                                        <a href="{{ route('galleries.edit', $gallery->id) }}" class="inline-flex items-center px-3 py-1 bg-gradient-to-r from-gray-400 to-gray-500 text-white text-xs sm:text-sm font-semibold rounded-md shadow-sm hover:from-gray-500 hover:to-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition duration-300">Edit</a>
                                        <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-gradient-to-r from-red-500 to-red-600 text-white text-xs sm:text-sm font-semibold rounded-md shadow-sm hover:from-red-600 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition duration-300" onclick="return confirm('Are you sure you want to delete this gallery?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-10 text-gray-500 dark:text-gray-400">
                                    <p class="font-bold mb-4">No gallery found for "{{ $search }}"!</p>
                                    <img src="{{ asset('storage/DrawKit-onlineshopping-Illustration-10.svg') }}" alt="No gallery found" class="mx-auto h-40 w-40 sm:h-60 sm:w-60">
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($galleries->count() > 0)
                <div class="mt-4">
                    {{ $galleries->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
