<div>
    <div>
        <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search Core Value..."
            class="w-full rounded-md border border-gray-200 px-4 py-2">
    </div>

    <table class="min-w-full leading-normal mt-8">
        <thead>
            <tr>
                <th
                    class="px-5 py-3 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider dark:bg-slate-600 dark:text-white">
                    Title
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
            </tr>
        </thead>
        <tbody>
            @forelse ($corevalues as $corevalue)
                <tr class="font-medium">
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white text-sm dark:bg-gray-800 dark:text-white">
                        {{ $corevalue->Core_title }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white text-sm dark:bg-gray-800 dark:text-white">
                        {{ $corevalue->created_at }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white text-sm dark:bg-gray-800 dark:text-white">
                        {{ $corevalue->updated_at }}
                    </td>
                    <td class="px-5 py-8 border-b border-gray-200 dark:border-gray-600 bg-white flex text-sm gap-3 dark:bg-gray-800 dark:text-white">
                        <a href="{{ route('corevalues.edit', $corevalue->id) }}"
                            class="rounded-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('corevalues.destroy', $corevalue->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="rounded-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                onclick="return confirm('Are you sure you want to delete this point?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center pt-10 text-gray-500 dark:text-gray-400 font-bold">
                        No point found for "{{ $search }}"!
                        <img src="{{ asset('storage/DrawKit-onlineshopping-Illustration-10.svg') }}" alt="No core found" class="mx-auto mb-4 h-80 w-80">
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- * Pagination Links --}}
    @if ($corevalues->count() > 0)
        <div class="mt-4">
            {{ $corevalues->links() }} </div>
    @endif
</div>
