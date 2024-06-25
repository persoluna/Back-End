<div>
    <div>
        <input wire:model.live="search" type="text" placeholder="Search FAQs..."
            class="w-full rounded-md border border-gray-200 px-4 py-2">
    </div>
    <table class="min-w-full leading-normal mt-8">
        <thead>
            <tr>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider">
                    Question
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider">
                    Answer
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider">
                    Actions
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($faqs as $faq)
                <tr class="font-medium bg-white hover:bg-gray-100">
                    <td class="px-5 py-5 border-b border-gray-200 text-sm truncate">
                        {{ Str::limit($faq->question, 25) }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm truncate">
                        {{ Str::limit($faq->answer, 25) }}
                    </td>
                    <td class="px-5 py-8 border-b border-gray-200 text-sm flex gap-3">
                        <a href="{{ route('faqs.edit', $faq->id) }}"
                            class="rounded-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="rounded-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                onclick="return confirm('Are you sure you want to delete this FAQ?')">Delete</button>
                        </form>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" wire:model="$faq.status"
                                wire:change="updateFAQStatus({{ $faq->id }})" class="sr-only peer"
                                {{ $faq->status ? 'checked' : '' }}>
                            <div
                                class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span
                                class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $faq->status ? 'Active' : 'Inactive' }}</span>
                        </label>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-gray-500 font-bold">No FAQ found for
                        "{{ $search }}"!</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Add Pagination Links --}}
    @if ($faqs->count() > 0)
        <div class="mt-4">
            {{ $faqs->links() }} </div>
    @endif

    @push('scripts')
        <script>
            window.addEventListener('counter-status-updated', event => {
                alert(event.detail.message);
            });
        </script>
    @endpush
</div>
