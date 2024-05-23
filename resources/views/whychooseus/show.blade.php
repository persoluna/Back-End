<x-app-layout>
    <div class="bg-white min-h-[700px] pt-12">
        @if (isset($whyChooseUsItem))
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Why us', 'url' => route('whychooseus.index')],
                ['name' => $whyChooseUsItem->why_title, 'url' => route('whychooseus.show', $whyChooseUsItem->id)],
            ]" />
        @else
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Home', 'url' => route('dashboard')],
                ['name' => 'why us', 'url' => route('whychooseus.index')],
            ]" />
        @endif

        <div class="mb-8 space-y-3">
            <h1 class="text-3xl font-semibold text-center sm:text-left sm:pl-[80px] pt-[90px]">Why choose us Details</h1>
        </div>

        <div class="m-[80px] justify-center items-start">
            <div class="grid md:grid-cols-12 gap-6">
                <div class="md:col-span-6">
                    <img src="{{ asset('storage/whychooseus/' . $whyChooseUsItem->why_image) }}"
                        alt="{{ $whyChooseUsItem->alt_tag }}" class="img-fluid w-full">
                </div>
                <div class="md:col-span-6">
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold">{{ $whyChooseUsItem->why_title }}</h3>
                        <p class="text-gray-600"><strong>Why us Description:</strong>
                            {{ $whyChooseUsItem->why_description }}</p>
                        <p class="text-gray-600"><strong>why us Image:</strong>
                            {{ $whyChooseUsItem->why_image }}</p>
                        <p class="text-gray-600"><strong>Alt Tag:</strong> {{ $whyChooseUsItem->alt_tag }}</p>
                    </div>
                    <div class="mt-8 flex justify-start gap-4">
                        <a href="{{ route('whychooseus.index') }}"
                            class="ring-offset-background focus-visible:ring-ring flex h-10 items-center justify-center whitespace-nowrap rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-gray-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                            Back
                        </a>
                        <a href="{{ route('whychooseus.edit', $whyChooseUsItem->id) }}"
                            class="ring-offset-background focus-visible:ring-ring flex h-10 items-center justify-center whitespace-nowrap rounded-md bg-blue-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                            Edit
                        </a>
                        <form action="{{ route('whychooseus.destroy', $whyChooseUsItem->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="ring-offset-background focus-visible:ring-ring flex h-10 items-center justify-center whitespace-nowrap rounded-md bg-red-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-red-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                                onclick="return confirm('Are you sure you want to delete this whychooseus?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
