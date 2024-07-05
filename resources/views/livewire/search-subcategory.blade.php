<div>
    <div class="flex items-center justify-between mb-4">
        <div class="w-1/2">
            <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search subcategories"
                class="w-full rounded-md border border-gray-700 dark:border-gray-500 bg-gray-50 dark:bg-gray-200 px-4 py-2 text-gray-900 dark:text-gray-200">
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('subcategories.export') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                <i class="fas fa-download mr-2"></i>
                Export
            </a>
            <form action="{{ route('subcategories.import') }}" method="POST" enctype="multipart/form-data" class="inline-block">
                @csrf
                <label for="import-file" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-flex items-center cursor-pointer">
                    <i class="fas fa-upload mr-2"></i>
                    Import
                </label>
                <input id="import-file" type="file" name="file" class="hidden" accept=".csv,.xls,.xlsx" onchange="this.form.submit()">
            </form>
        </div>
    </div>

    <table class="min-w-full leading-normal mt-8">
        <thead>
            <tr>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider">
                    Name
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider">
                    Category
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider">
                    Image
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider">
                    Actions
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($subcategories as $subcategory)
                <tr class="font-medium">
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $subcategory->name }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $subcategory->category ? $subcategory->category->name : 'N/A' }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="w-[100px] h-12 overflow-hidden">
                            <img src="{{ asset('storage/sub_category_images/' . $subcategory->image) }}"
                                alt="{{ $subcategory->alt_tag }}" class="object-cover w-full h-full">
                        </div>
                    </td>
                    <td class="px-5 py-8 border-b border-gray-200 bg-white flex text-sm gap-3">
                        <a href="{{ route('subcategories.edit', $subcategory->id) }}"
                            class="rounded-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="rounded-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                onclick="return confirm('Are you sure you want to delete this sub category?')">Delete</button>
                        </form>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" wire:model="subcategory.status"
                                wire:change="updateSubcategoryStatus({{ $subcategory->id }})" class="sr-only peer"
                                {{ $subcategory->status ? 'checked' : '' }}>
                            <div
                                class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span
                                class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $subcategory->status ? 'Active' : 'Inactive' }}</span>
                        </label>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center pt-10 text-gray-500 dark:text-gray-400 font-bold">
                        No category found for "{{ $search }}"!
                        <img src="{{ asset('storage/DrawKit-onlineshopping-Illustration-10.svg') }}" alt="No banners found" class="mx-auto mb-4 h-64 w-64">
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- * Pagination Links --}}
    @if ($subcategories->count() > 0)
        <div class="mt-4">
            {{ $subcategories->links() }} </div>
    @endif
</div>
