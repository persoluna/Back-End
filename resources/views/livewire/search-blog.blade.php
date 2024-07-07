<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">

            <div class="flex flex-col sm:flex-row items-center justify-between mb-4 space-y-4 sm:space-y-0">
                <div class="w-full sm:w-1/2">
                    <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search blogs..."
                        class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500">
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('blogs.export') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white font-semibold rounded-lg shadow-md hover:from-yellow-600 hover:to-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition duration-300">
                        <i class="fas fa-download mr-2"></i>
                        Export
                    </a>
                    <form action="{{ route('blogs.import') }}" method="POST" enctype="multipart/form-data" class="inline-block">
                        @csrf
                        <label for="import-file" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold rounded-lg shadow-md hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300 cursor-pointer">
                            <i class="fas fa-upload mr-2"></i>
                            Import
                        </label>
                        <input id="import-file" type="file" name="file" class="hidden" accept=".csv,.xls,.xlsx" onchange="this.form.submit()">
                    </form>
                </div>
            </div>

            <div class="relative">
                <button id="metaTagsDropdown" data-dropdown-toggle="metaTagsDropdownMenu" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-green-700 rounded-lg shadow-md hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-300" type="button">Meta Status
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <div id="metaTagsDropdownMenu" class="absolute right-0 mt-2 bg-white dark:bg-gray-700 divide-y divide-gray-100 rounded-lg shadow-lg w-44 z-10 hidden">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="metaTagsDropdown">
                        <li>
                            <a href="{{ route('blogs.index', ['meta_tags' => 'all']) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{ $metaTagsFilter === 'all' ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : '' }}">All</a>
                        </li>
                        <li>
                            <a href="{{ route('blogs.index', ['meta_tags' => 'complete']) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{ $metaTagsFilter === 'complete' ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : '' }}">Complete</a>
                        </li>
                        <li>
                            <a href="{{ route('blogs.index', ['meta_tags' => 'incomplete']) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{ $metaTagsFilter === 'incomplete' ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : '' }}">Incomplete</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="overflow-x-auto mt-8">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                User Visits
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Title
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Blog Image
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Posted By
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($blogs as $blog)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-300">
                                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                                    {{ $blog->user_visits }}
                                    @if ($hasMetaTags($blog))
                                        <span class="ml-3 bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                            Meta Completed
                                        </span>
                                    @else
                                        <span class="ml-3 bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                            Meta Incomplete
                                        </span>
                                    @endif
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                                    {{ $blog->blog_title }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                                    <div class="w-[100px] h-12 overflow-hidden">
                                        <img src="{{ asset('storage/blogs/' . $blog->blog_image) }}" alt="{{ $blog->alt_tag }}"
                                            class="object-cover w-full h-full">
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                                    {{ $blog->posted_by }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                                    <div class="flex gap-2">
                                        <a href="{{ route('blogs.edit', $blog->id) }}" class="inline-flex items-center px-3 py-1 bg-gradient-to-r from-gray-400 to-gray-500 text-white text-xs sm:text-sm font-semibold rounded-md shadow-sm hover:from-gray-500 hover:to-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition duration-300">Edit</a>
                                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-gradient-to-r from-red-500 to-red-600 text-white text-xs sm:text-sm font-semibold rounded-md shadow-sm hover:from-red-600 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition duration-300" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" wire:model="blog.status" wire:change="updateBlogStatus({{ $blog->id }})" class="sr-only peer" {{ $blog->status ? 'checked' : '' }}>
                                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:bg-blue-600 peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600">
                                        </div>
                                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $blog->status ? 'Active' : 'Inactive' }}</span>
                                    </label>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center pt-10 text-gray-500 dark:text-gray-400 font-bold">
                                    No blog found for "{{ $search }}"!
                                    <img src="{{ asset('storage/DrawKit-onlineshopping-Illustration-10.svg') }}" alt="No blog found" class="mx-auto mb-4 h-80 w-80">
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if ($blogs->count() > 0)
                    <div class="mt-4">
                        {{ $blogs->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
