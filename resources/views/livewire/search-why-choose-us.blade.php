<div>
    <div>
        <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search why choose use..."
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
                    class="px-5 py-3 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider dark:bg-slate-600 dark:text-white">
                    Why Choose us Image
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

        <tbody>
            @forelse ($whychooseuses as $whychooseus)
                <tr class="font-medium">
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm truncate dark:bg-gray-800 dark:text-white">
                        {{ $whychooseus->why_title }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-800 dark:text-white">
                        <div class="w-[100px] h-12 overflow-hidden">
                            <img src="{{ asset('storage/whychooseus/' . $whychooseus->why_image) }}"
                                alt="{{ $whychooseus->alt_tag }}" class="object-cover w-full h-full">
                        </div>
                    </td>


                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-800 dark:text-white">
                        {{ $whychooseus->alt_tag }}
                    </td>
                    <td class="px-5 py-8 border-b border-gray-200 bg-white flex text-sm gap-3 dark:bg-gray-800 dark:text-white">
                        <a href="{{ route('whychooseus.show', $whychooseus->id) }}"
                            class="rounded-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>
                        <a href="{{ route('whychooseus.edit', $whychooseus->id) }}"
                            class="rounded-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('whychooseus.destroy', $whychooseus->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="rounded-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                onclick="return confirm('Are you sure you want to delete this whychooseus?')">Delete</button>
                        </form>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-gray-800 dark:text-white">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" wire:model="whychooseus.status"
                                wire:change="updateWhychooseusStatus({{ $whychooseus->id }})" class="sr-only peer"
                                {{ $whychooseus->status ? 'checked' : '' }}>
                            <div
                                class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span
                                class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $whychooseus->status ? 'Active' : 'Inactive' }}</span>
                        </label>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center text-gray-500 font-bold">No whychooseuses found for
                        "{{ $search }}"!</td>
                </tr>
            @endforelse
        </tbody>



        </tbody>
    </table>

    {{-- * Pagination Links --}}
    @if ($whychooseuses->count() > 0)
        <div class="mt-4">
            {{ $whychooseuses->links() }} </div>
    @endif
</div>
