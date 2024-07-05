<div>
    <div class="flex items-center justify-between mb-4">
        <div class="w-1/2">
            <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search counters"
                class="w-full rounded-md border border-gray-700 dark:border-gray-500 bg-gray-50 dark:bg-gray-200 px-4 py-2 text-gray-900 dark:text-gray-200">
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('counters.export') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                <i class="fas fa-download mr-2"></i>
                Export
            </a>
            <form action="{{ route('counters.import') }}" method="POST" enctype="multipart/form-data" class="inline-block">
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
                    class="px-5 py-3 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider dark:bg-slate-600 dark:text-white">
                    Title
                </th>
                <th
                    class="px-5 py-3 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider dark:bg-slate-600 dark:text-white">
                    Number
                </th>
                <th
                    class="px-5 py-3 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider dark:bg-slate-600 dark:text-white">
                    Icon
                </th>
                <th
                    class="px-5 py-3 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider dark:bg-slate-600 dark:text-white">
                    Alt Tag
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
            @forelse ($counters as $counter)
                <tr class="font-medium">
                    <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white text-sm dark:bg-gray-800 dark:text-white">
                        {{ $counter->title }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-800 dark:text-white dark:border-gray-600">
                        {{ $counter->number }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-800 dark:text-white dark:border-gray-600">
                        <img src="{{ asset('storage/counters/' . $counter->icon) }}" alt="{{ $counter->alt_tag }}"
                            class="w-14 h-14 object-cover">
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-800 dark:text-white dark:border-gray-600">
                        {{ $counter->alt_tag }}
                    </td>
                    <td class="px-5 py-8 border-b border-gray-200 bg-white text-sm flex gap-3 dark:bg-gray-800 dark:text-white dark:border-gray-600">
                        <a href="{{ route('counters.show', $counter->id) }}"
                            class="rounded-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>
                        <a href="{{ route('counters.edit', $counter->id) }}"
                            class="rounded-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('counters.destroy', $counter->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="rounded-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                onclick="return confirm('Are you sure you want to delete this counter?')">Delete</button>
                        </form>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-800 dark:text-white dark:border-gray-600">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" wire:model="$counter.status"
                                wire:change="updateCounterStatus({{ $counter->id }})" class="sr-only peer"
                                {{ $counter->status ? 'checked' : '' }}>
                            <div
                                class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span
                                class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $counter->status ? 'Active' : 'Inactive' }}</span>
                        </label>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center pt-10 text-gray-500 dark:text-gray-400 font-bold">
                        No counter found for "{{ $search }}"!
                        <img src="{{ asset('storage/DrawKit-onlineshopping-Illustration-10.svg') }}" alt="No banners found" class="mx-auto mb-4 h-64 w-64">
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Add Pagination Links --}}
    @if ($counters->count() > 0)
        <div class="mt-4">
            {{ $counters->links() }} </div>
    @endif
</div>
