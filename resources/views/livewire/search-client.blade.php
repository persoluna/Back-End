<div>
    <div>
        <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search Client..."
            class="w-full rounded-md border border-gray-200 px-4 py-2">
    </div>

    <table class="min-w-full leading-normal mt-8">
        <thead>
            <tr>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider">
                    client Image
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider">
                    Alt Tag
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clients as $client)
                <tr class="font-medium">

                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="w-[100px] h-12 overflow-hidden">
                            <img src="{{ asset('storage/clients/' . $client->client_image) }}"
                                alt="{{ $client->alt_tag }}" class="object-cover w-full h-full">
                        </div>
                    </td>

                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $client->alt_tag }}
                    </td>
                    <td class="px-5 py-8 border-b border-gray-200 bg-white flex text-sm gap-3">
                        <a href="{{ route('clients.show', $client->id) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>
                        <a href="{{ route('clients.edit', $client->id) }}"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                onclick="return confirm('Are you sure you want to delete this client?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center text-gray-500 font-bold">No clients found for
                        "{{ $search }}"!</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- * Pagination Links --}}
    @if ($clients->count() > 0)
        <div class="mt-4">
            {{ $clients->links() }} </div>
    @endif
</div>
