<div>
    <div>
        <input wire:model.live="search" type="text" placeholder="Search Team..."
            class="w-full rounded-md border border-gray-200 px-4 py-2">
    </div>
    <table class="min-w-full leading-normal mt-8">
        <thead>
            <tr>
                <th
                    class="px-5 py-3 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider dark:bg-slate-600 dark:text-white">
                    Name
                </th>
                <th
                    class="px-5 py-3 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider dark:bg-slate-600 dark:text-white">
                    Id
                </th>
                <th
                    class="px-5 py-3 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider dark:bg-slate-600 dark:text-white">
                    Created At
                </th>
                <th
                    class="px-5 py-3 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider dark:bg-slate-600 dark:text-white">
                    Photo
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
            @forelse ($staffs as $staff)
                <tr class="font-medium">
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white text-sm dark:bg-gray-800 dark:text-white">
                        {{ $staff->name }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-800 dark:text-white dark:border-gray-600">
                        {{ $staff->staff_id }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-800 dark:text-white dark:border-gray-600">
                        {{ $staff->created_at }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-800 dark:text-white dark:border-gray-600">
                        <img src="{{ asset('storage/staffs/' . $staff->photo) }}" class="w-14 h-14 object-cover">
                    </td>
                    <td class="px-5 py-8 border-b border-gray-200 bg-white text-sm flex gap-3 dark:bg-gray-800 dark:text-white dark:border-gray-600">
                        <a href="{{ route('staffs.edit', $staff->id) }}"
                            class="rounded-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('staffs.destroy', $staff->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="rounded-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                onclick="return confirm('Are you sure you want to delete this slave?')">Delete</button>
                        </form>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-800 dark:text-white dark:border-gray-600">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" wire:model="$staff.status"
                                wire:change="updateStaffStatus({{ $staff->id }})" class="sr-only peer"
                                {{ $staff->status ? 'checked' : '' }}>
                            <div
                                class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span
                                class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $staff->status ? 'Active' : 'Inactive' }}</span>
                        </label>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center pt-10 text-gray-500 dark:text-gray-400 font-bold">
                        No team found for "{{ $search }}"!
                        <img src="{{ asset('storage/DrawKit-onlineshopping-Illustration-10.svg') }}" alt="No banners found" class="mx-auto mb-4 h-64 w-64">
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Add Pagination Links --}}
    @if ($staffs->count() > 0)
        <div class="mt-4">
            {{ $staffs->links() }} </div>
    @endif
</div>
