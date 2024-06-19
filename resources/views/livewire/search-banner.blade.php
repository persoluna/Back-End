<div>
    <div>
    <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search banners "
        class="w-full rounded-md border border-gray-700 dark:border-gray-500 bg-gray-50 dark:bg-gray-200 px-4 py-2 text-gray-900 dark:text-gray-200">
</div>

<table class="min-w-full leading-normal mt-8">
    <thead>
        <tr>
            <th
                class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider dark:bg-slate-600">
                Title
            </th>
            <th
                class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider dark:bg-slate-600">
                Description
            </th>
            <th
                class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider dark:bg-slate-600">
                Banner Image
            </th>
            <th
                class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider dark:bg-slate-600">
                Alt Tag
            </th>
            <th
                class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider dark:bg-slate-600">
                Actions
            </th>
            <th
                class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider dark:bg-slate-600">
                Status
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($banners as $banner)
            <tr class="font-medium">
                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm text-gray-900 dark:text-gray-300">
                    {{ $banner->title }}
                </td>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm text-gray-900 dark:text-gray-300">
                    {{ $banner->description }}
                </td>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                    <img src="{{ asset('storage/banners/' . $banner->banner_image) }}" alt="{{ $banner->alt_tag }}"
                        class="pt-4 w-[100px] h-12 dark:text-gray-300">
                </td>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm text-gray-900 dark:text-gray-300">
                    {{ $banner->alt_tag }}
                </td>
                <td class="px-5 py-8 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm flex gap-3">
                    <a href="{{ route('banners.show', $banner->id) }}"
                        class="rounded-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>
                    <a href="{{ route('banners.edit', $banner->id) }}"
                        class="rounded-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                    <form action="{{ route('banners.destroy', $banner->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="rounded-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                            onclick="return confirm('Are you sure you want to delete this banner?')">Delete</button>
                    </form>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" wire:model="banner.status"
                            wire:change="updateBannerStatus({{ $banner->id }})" class="sr-only peer"
                            {{ $banner->status ? 'checked' : '' }}>
                        <div
                            class="relative w-11 h-6 bg-gray-200 dark:bg-gray-700 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 dark:after:border-gray-600 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                        </div>
                        <span
                            class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $banner->status ? 'Active' : 'Inactive' }}</span>
                    </label>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center text-gray-500 dark:text-gray-400 font-bold">No banners found for
                    "{{ $search }}"!</td>
            </tr>
        @endforelse
    </tbody>
</table>
    {{-- Add Pagination Links --}}
    @if ($banners->count() > 0)
        <div class="mt-4">
            {{ $banners->links() }} </div>
    @endif
</div>
