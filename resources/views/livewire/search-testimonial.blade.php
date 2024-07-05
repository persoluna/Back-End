<div>
    <div class="flex items-center justify-between mb-4">
        <div class="w-1/2">
            <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search testimonials"
                class="w-full rounded-md border border-gray-700 dark:border-gray-500 bg-gray-50 dark:bg-gray-200 px-4 py-2 text-gray-900 dark:text-gray-200">
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('testimonials.export') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                <i class="fas fa-download mr-2"></i>
                Export
            </a>
            <form action="{{ route('testimonials.import') }}" method="POST" enctype="multipart/form-data" class="inline-block">
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
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 uppercase tracking-wider">
                    Name
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider">
                    Testimonial Image
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider">
                    Alt Tag
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
            @forelse ($testimonials as $testimonial)
                <tr class="font-medium">
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $testimonial->name }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="w-[100px] h-12 overflow-hidden">
                            <img src="{{ asset('storage/testimonials/' . $testimonial->profile_image) }}"
                                alt="{{ $testimonial->alt_tag }}" class="object-cover w-full h-full">
                        </div>
                    </td>

                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $testimonial->alt_tag }}
                    </td>
                    <td class="px-5 py-8 border-b border-gray-200 bg-white flex text-sm gap-3">
                        <a href="{{ route('testimonials.show', $testimonial->id) }}"
                            class="rounded-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>
                        <a href="{{ route('testimonials.edit', $testimonial->id) }}"
                            class="rounded-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="rounded-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                onclick="return confirm('Are you sure you want to delete this testimonial?')">Delete</button>
                        </form>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" wire:model="testimonial.status"
                                wire:change="updateTestimonialStatus({{ $testimonial->id }})" class="sr-only peer"
                                {{ $testimonial->status ? 'checked' : '' }}>
                            <div
                                class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span
                                class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $testimonial->status ? 'Active' : 'Inactive' }}</span>
                        </label>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center pt-10 text-gray-500 dark:text-gray-400 font-bold">
                        No testimonial found for "{{ $search }}"!
                        <img src="{{ asset('storage/DrawKit-onlineshopping-Illustration-10.svg') }}" alt="No banners found" class="mx-auto mb-4 h-64 w-64">
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- * Pagination Links --}}
    @if ($testimonials->count() > 0)
        <div class="mt-4">
            {{ $testimonials->links() }} </div>
    @endif
</div>
