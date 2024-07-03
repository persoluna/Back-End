<div>
    <div>
        <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search Inquiry..."
            class="w-full rounded-md border border-gray-400 px-4 py-2">
    </div>

    <table class="min-w-full leading-normal mt-8 dark:bg-gray-800">
    <thead>
        <tr>
            <th
                wire:click="sortBy('id')"
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200">
                <button>
                Id
                    @if ($sortColumn === 'id')
                        @if ($sortDirection === 'asc')
                            <span>&uarr;</span>
                        @else
                            <span>&darr;</span>
                        @endif
                    @endif
                </button>
            </th>
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
            <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200">
                Details
            </th>
        </tr>
    </thead>
    <tbody>
       @forelse ($inquiries as $inquiry)
        <tr class="font-medium dark:bg-gray-700 dark:text-gray-200">
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-2sm dark:border-gray-300 dark:bg-gray-600">
                {{ $inquiry->id }} .
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-2sm dark:border-gray-300 dark:bg-gray-600">
                {{ $inquiry->name }}
                @if($inquiry->is_GPM)
                    <span class="ml-3 bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">GPM</span>
                @else
                    <span class="ml-3 bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">SEO</span>
                @endif
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-2sm dark:border-gray-300 dark:bg-gray-600">
                {{ $inquiry->email }}
            </td>
             <td class="px-5 py-5 border-b border-gray-200 bg-white text-2sm dark:border-gray-300 dark:bg-gray-600">
                {{ $inquiry->mobile_number }}
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-2sm dark:border-gray-300 dark:bg-gray-600">
                <button data-modal-target="inquiry-modal" data-modal-toggle="inquiry-modal"
                        class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600"
                        onclick="loadInquiryDetails({{ $inquiry->id }})">
                    View Details
                </button>
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
