<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">

            <div class="flex flex-col sm:flex-row items-center justify-between mb-4 space-y-4 sm:space-y-0">
                <div class="w-full sm:w-1/2">
                    <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search products"
                        class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500">
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('products.export') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white font-semibold rounded-lg shadow-md hover:from-yellow-600 hover:to-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition duration-300">
                        <i class="fas fa-download mr-2"></i>
                        Export
                    </a>
                    <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data" class="inline-block">
                        @csrf
                        <label for="import-file" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold rounded-lg shadow-md hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300 cursor-pointer">
                            <i class="fas fa-upload mr-2"></i>
                            Import
                        </label>
                        <input id="import-file" type="file" name="file" class="hidden" accept=".csv,.xls,.xlsx" onchange="this.form.submit()">
                    </form>
                </div>
            </div>

            <div class="pl-2 space-y-4">
                <!-- Category Dropdown -->
                <button id="categoryDropdown" data-dropdown-toggle="categoryDropdownMenu" class="text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Category
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <div id="categoryDropdownMenu" class="hidden bg-white dark:bg-gray-700 divide-y divide-gray-100 rounded-lg shadow w-44">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="categoryDropdown">
                        <li>
                            <a href="{{ route('products.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{ is_null($selectedCategory) ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : '' }}">All</a>
                        </li>
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('products.index', ['category' => $category->id]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{ $selectedCategory == $category->id ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : '' }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Meta Tags Status Dropdown -->
                <button id="metaTagsDropdown" data-dropdown-toggle="metaTagsDropdownMenu" class="text-white bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">Meta Status
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <div id="metaTagsDropdownMenu" class="hidden bg-white dark:bg-gray-700 divide-y divide-gray-100 rounded-lg shadow w-44">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="metaTagsDropdown">
                        <li>
                            <a href="{{ route('products.index', ['meta_tags' => 'all']) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{ $metaTagsFilter === 'all' ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : '' }}">All</a>
                        </li>
                        <li>
                            <a href="{{ route('products.index', ['meta_tags' => 'complete']) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{ $metaTagsFilter === 'complete' ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : '' }}">Complete</a>
                        </li>
                        <li>
                            <a href="{{ route('products.index', ['meta_tags' => 'incomplete']) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white {{ $metaTagsFilter === 'incomplete' ? 'bg-gray-100 dark:bg-gray-600 dark:text-white' : '' }}">Incomplete</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="overflow-x-auto mt-8">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Product Name</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Category</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Sub Category</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Image</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-left text-xs sm:text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-300">
                                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                                    {{ $product->product_name }}
                                    @if ($hasMetaTags($product))
                                        <span class="truncate ml-3 bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                            Meta Completed
                                        </span>
                                    @else
                                        <span class="truncate ml-3 bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                            Meta Incomplete
                                        </span>
                                    @endif
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                                    {{ $product->category ? $product->category->name : 'N/A' }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                                    {{ $product->subcategory ? $product->subcategory->name : 'N/A' }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                                    <div class="w-[100px] h-12 overflow-hidden">
                                        @php
                                            $images = json_decode($product->image, true);
                                            $firstImage = $images[0] ?? null;
                                        @endphp
                                        @if($firstImage)
                                            <img src="{{ asset('storage/product_images/' . $firstImage) }}" alt="{{ $product->alt_tag }}" class="object-cover w-full h-full">
                                        @else
                                            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500">No Image</div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-5 py-8 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm flex gap-3">
                                    <a href="{{ route('products.edit', $product->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow-md transition duration-300">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg shadow-md transition duration-300" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                    </form>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" wire:model="product.status" wire:change="updateProductStatus({{ $product->id }})" class="sr-only peer" {{ $product->status ? 'checked' : '' }}>
                                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:bg-blue-600">
                                            <div class="absolute top-0.5 left-[2px] w-5 h-5 bg-white border border-gray-300 rounded-full transition-transform peer-checked:translate-x-full dark:border-gray-600"></div>
                                        </div>
                                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $product->status ? 'Active' : 'Inactive' }}</span>
                                    </label>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center pt-10 text-gray-500 dark:text-gray-400 font-bold">
                                    No product found for "{{ $search }}"!
                                    <img src="{{ asset('storage/DrawKit-onlineshopping-Illustration-10.svg') }}" alt="No product found" class="mx-auto mb-4 h-80 w-80">
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination Links --}}
                @if ($products->count() > 0)
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
