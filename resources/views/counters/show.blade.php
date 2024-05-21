<x-app-layout>
    <div class="bg-white min-h-[700px] pt-12">
        @if (isset($counter))
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Counters', 'url' => route('counters.index')],
                ['name' => $counter->title, 'url' => route('counters.show', $counter->id)],
            ]" />
        @else
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Home', 'url' => route('dashboard')],
                ['name' => 'Counters', 'url' => route('counters.index')],
            ]" />
        @endif

        <div class="mb-8 space-y-3">
            <h1 class="text-3xl font-semibold text-center sm:text-left sm:pl-[80px] pt-[90px]">Counter Details</h1>
        </div>

        <div class="m-[80px] justify-center items-start">
            <div class="grid md:grid-cols-12 gap-6">
                <div class="md:col-span-6">
                    <img src="{{ asset('storage/counters/' . $counter->icon) }}" alt="{{ $counter->alt_tag }}"
                        class="img-fluid w-full">
                </div>
                <div class="md:col-span-6">
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold">{{ $counter->title }}</h3>
                        <p class="text-gray-600"><strong>Number:</strong> {{ $counter->number }}</p>
                        <p class="text-gray-600"><strong>Icon:</strong> {{ $counter->icon }}</p>
                        <p class="text-gray-600"><strong>Alt Tag:</strong> {{ $counter->alt_tag }}</p>
                    </div>
                    <div class="mt-8 flex justify-start gap-4">
                        <a href="{{ route('counters.index') }}"
                            class="ring-offset-background focus-visible:ring-ring flex h-10 items-center justify-center whitespace-nowrap rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-gray-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                            Back
                        </a>
                        <a href="{{ route('counters.edit', $counter->id) }}"
                            class="ring-offset-background focus-visible:ring-ring flex h-10 items-center justify-center whitespace-nowrap rounded-md bg-blue-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                            Edit
                        </a>
                        <form action="{{ route('counters.destroy', $counter->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="ring-offset-background focus-visible:ring-ring flex h-10 items-center justify-center whitespace-nowrap rounded-md bg-red-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-red-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                                onclick="return confirm('Are you sure you want to delete this counter?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
