<div>
    <div>
        <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search Inquiry..."
            class="w-full rounded-md border border-gray-200 px-4 py-2">
    </div>

    <table class="min-w-full leading-normal mt-8">
        <thead>
            <tr>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider">
                    Name
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider">
                    Email
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider">
                    Mobile No.
                </th>
            </tr>
        </thead>
        <tbody>
           @forelse ($inquiries as $inquiry)
            <tr class="font-medium">
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    {{ $inquiry->name }}
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    {{ $inquiry->email }}
                </td>
                 <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    {{ $inquiry->mobile_number }}
                </td>
            </tr>
        @empty
                <tr>
                    <td colspan="3" class="text-center text-gray-500 font-bold">No applications found for
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
