<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">

        <!-- Search Input -->
        <div class="mb-4">
            <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search certificate..."
                class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500">
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full leading-normal mt-8">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                            Title
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                            Image
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                            Actions
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($achievements as $achievement)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-300">
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm text-gray-900 dark:text-gray-300">
                                {{ $achievement->title }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                                <div class="w-[100px] h-12 overflow-hidden">
                                    <img src="{{ asset('storage/achievements/' . $achievement->image) }}"
                                        alt="{{ $achievement->title }}" class="object-cover w-full h-full">
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                                <div class="flex gap-2">
                                    <a href="{{ route('certificates.edit', $achievement->id) }}"
                                        class="inline-flex items-center px-3 py-1 bg-gradient-to-r from-gray-400 to-gray-500 text-white text-xs sm:text-sm font-semibold rounded-md shadow-sm hover:from-gray-500 hover:to-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition duration-300">Edit</a>
                                    <form action="{{ route('certificates.destroy', $achievement->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-1 bg-gradient-to-r from-red-500 to-red-600 text-white text-xs sm:text-sm font-semibold rounded-md shadow-sm hover:from-red-600 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition duration-300"
                                            onclick="return confirm('Are you sure you want to delete this achievement?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" wire:model="achievement.status"
                                        wire:change="updateAchievementStatus({{ $achievement->id }})" class="sr-only peer"
                                        {{ $achievement->status ? 'checked' : '' }}>
                                    <div
                                        class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                    </div>
                                    <span
                                        class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $achievement->status ? 'Active' : 'Inactive' }}</span>
                                </label>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-10 text-gray-500 dark:text-gray-400 font-bold">
                                No certificates found for "{{ $search }}"!
                                <img src="{{ asset('storage/DrawKit-onlineshopping-Illustration-10.svg') }}" alt="No achievement found" class="mx-auto mb-4 h-80 w-80">
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        @if ($achievements->count() > 0)
            <div class="mt-4">
                {{ $achievements->links() }}
            </div>
        @endif
    </div>
</div>
