<div>
    <div>
        <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search point..."
            class="w-full rounded-md border border-gray-200 px-4 py-2">
    </div>

    <table class="min-w-full leading-normal mt-8">
        <thead>
            <tr>
                <th
                    class="px-5 py-3 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider dark:bg-slate-600 dark:text-white">
                    Point
                </th>
                <th
                    class="px-5 py-3 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider dark:bg-slate-600 dark:text-white">
                    Created At
                </th>
                <th
                    class="px-5 py-3 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider dark:bg-slate-600 dark:text-white">
                    Updated At
                </th>
                <th
                    class="px-5 py-3 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider dark:bg-slate-600 dark:text-white">
                    Actions
                </th>
                <th
                    class="px-5 py-3 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider dark:bg-slate-600 dark:text-white">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($aboutpoints as $aboutpoint)
                <tr class="font-medium">
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white text-sm dark:bg-gray-800 dark:text-white">
                        {{ $aboutpoint->point }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white text-sm dark:bg-gray-800 dark:text-white">
                        {{ $aboutpoint->created_at }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white text-sm dark:bg-gray-800 dark:text-white">
                        {{ $aboutpoint->updated_at }}
                    </td>
                    <td class="px-5 py-8 border-b border-gray-200 dark:border-gray-600 bg-white flex text-sm gap-3 dark:bg-gray-800 dark:text-white">
                        <a href="{{ route('aboutpoints.edit', $aboutpoint->id) }}"
                            class="rounded-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('aboutpoints.destroy', $aboutpoint->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="rounded-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                onclick="return confirm('Are you sure you want to delete this point?')">Delete</button>
                        </form>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white text-sm dark:bg-gray-800 dark:text-white">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" wire:model="aboutpoint.status"
                                wire:change="updateAboutPointStatus({{ $aboutpoint->id }})" class="sr-only peer"
                                {{ $aboutpoint->status ? 'checked' : '' }}>
                            <div
                                class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span
                                class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $aboutpoint->status ? 'Active' : 'Inactive' }}</span>
                        </label>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center pt-10 text-gray-500 dark:text-gray-400 font-bold">
                        No point found for "{{ $search }}"!
                        <img src="{{ asset('storage/DrawKit-onlineshopping-Illustration-10.svg') }}" alt="No banners found" class="mx-auto mb-4 h-64 w-64">
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- * Pagination Links --}}
    @if ($aboutpoints->count() > 0)
        <div class="mt-4">
            {{ $aboutpoints->links() }} </div>
    @endif
</div>
