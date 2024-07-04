<div>
    <div class="flex space-x-4">
        <div class="flex-1">
            <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search Inquiry..."
                class="w-full rounded-md border border-gray-400 px-4 py-2">
        </div>
        <div class="relative">
            <select wire:model.live="timeFilter" class="rounded-md border border-gray-400 px-4 py-2 pr-10">
                <option value="all">All Time</option>
                <option value="last_day">Last Day</option>
                <option value="last_week">Last Week</option>
                <option value="last_month">Last Month</option>
            </select>
            @if($timeFilter !== 'all' && isset($filterCounts[$timeFilter]))
                <div class="absolute inline-flex items-center justify-center min-w-6 h-6 px-2 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
                    {{ $filterCounts[$timeFilter] }}
                </div>
            @endif
        </div>
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
                        class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600 ml-5"
                        onclick="loadInquiryDetails({{ $inquiry->id }})">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 inline">
                        <path d="M12 4.5c-5 0-9.27 3.11-11 7.5 1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 13a5.5 5.5 0 110-11 5.5 5.5 0 010 11zm0-9a3.5 3.5 0 100 7 3.5 3.5 0 000-7z"/>
                    </svg>
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
