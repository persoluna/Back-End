<div>
    <div>
        <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search galleery..."
            class="w-full rounded-md border border-gray-200 px-4 py-2">
    </div>

<table class="min-w-full leading-normal mt-8">
    <thead>
        <tr>
            <th class="px-5 py-3 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider dark:bg-slate-600 dark:text-white">
                Alt tag
            </th>
            <th class="px-5 py-3 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider dark:bg-slate-600 dark:text-white">
                First Image
            </th>
            <th class="px-5 py-3 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider dark:bg-slate-600 dark:text-white">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($galleries as $gallery)
            <tr class="font-medium">
                <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white text-sm dark:bg-gray-800 dark:text-white">
                    {{ $gallery->alt_tag }}
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-800 dark:text-white dark:border-gray-600">
                    @if ($gallery->image)
                        <img src="{{ asset('storage/galleries/' . $gallery->image) }}" alt="{{ $gallery->alt_tag }}" class="w-24 h-14 object-cover">
                    @else
                        No Image
                    @endif
                </td>
                <td class="px-5 py-8 border-b border-gray-200 bg-white text-sm flex gap-3 dark:bg-gray-800 dark:text-white dark:border-gray-600">
                    <a href="{{ route('galleries.edit', $gallery->id) }}" class="rounded-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                    <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this gallery?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center pt-10 text-gray-500 dark:text-gray-400 font-bold">
                    No gallery found for "{{ $search }}"!
                    <img src="{{ asset('storage/DrawKit-onlineshopping-Illustration-10.svg') }}" alt="No banners found" class="mx-auto mb-4 h-80 w-80">
                </td>
            </tr>
        @endforelse
    </tbody>
</table>


    {{-- * Pagination Links --}}
    @if ($galleries->count() > 0)
        <div class="mt-4">
            {{ $galleries->links() }} </div>
    @endif
</div>
