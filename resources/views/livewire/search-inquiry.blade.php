<div>
    <div>
        <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search Inquiry..."
            class="w-full rounded-md border border-gray-400 px-4 py-2">
    </div>

    <table class="min-w-full leading-normal mt-8 dark:bg-gray-800">
    <thead>
        <tr>
            <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200">
                Name
            </th>
            <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200">
                Email
            </th>
            <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200">
                Mobile No.
            </th>
        </tr>
    </thead>
    <tbody>
       @forelse ($inquiries as $inquiry)
        <tr class="font-medium dark:bg-gray-700 dark:text-gray-200">
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-2sm dark:border-gray-300 dark:bg-gray-600">
                {{ $inquiry->name }}
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-2sm dark:border-gray-300 dark:bg-gray-600">
                {{ $inquiry->email }}
            </td>
             <td class="px-5 py-5 border-b border-gray-200 bg-white text-2sm dark:border-gray-300 dark:bg-gray-600">
                {{ $inquiry->mobile_number }}
            </td>
        </tr>
        @empty
                <tr class="dark:bg-gray-700 dark:text-gray-200">
                    <td colspan="3" class="text-center text-gray-500 font-bold dark:text-gray-400">No applications found for
                        "{{ $search }}"!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <br>


    {{-- * Pagination Links --}}
    @if ($inquiries->count() > 0)
        <br>
            <div class="mt-4">
                {{ $inquiries->onEachSide(0)->links() }}
            </div>
    @endif
</div>
