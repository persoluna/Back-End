<x-app-layout>
    <div class="bg-white min-h-[700px] pt-12">
        @if (isset($testimonial))
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Testimonials', 'url' => route('testimonials.index')],
                ['name' => $testimonial->name, 'url' => route('testimonials.show', $testimonial->id)],
            ]" />
        @else
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Home', 'url' => route('dashboard')],
                ['name' => 'Testimonial', 'url' => route('testimonials.index')],
            ]" />
        @endif

        <div class="mb-8 space-y-3">
            <h1 class="text-3xl font-semibold text-center sm:text-left sm:pl-[80px] pt-[90px]">Testimonial Details</h1>
        </div>

        <div class="m-[80px] justify-center items-start">
            <div class="grid md:grid-cols-12 gap-6">
                <div class="md:col-span-6">
                    <img src="{{ asset('storage/testimonials/' . $testimonial->profile_image) }}"
                        alt="{{ $testimonial->alt_tag }}" class="img-fluid w-full">
                </div>
                <div class="md:col-span-6">
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold">{{ $testimonial->name }}</h3>
                        <p class="text-gray-600"><strong>testimonial Description:</strong>
                            {{ $testimonial->description }}</p>
                        <p class="text-gray-600"><strong>testimonial Image:</strong>
                            {{ $testimonial->profile_image }}</p>
                        <p class="text-gray-600"><strong>Alt Tag:</strong> {{ $testimonial->alt_tag }}</p>
                    </div>
                    <div class="mt-8 flex justify-start gap-4">
                        <a href="{{ route('testimonials.index') }}"
                            class="ring-offset-background focus-visible:ring-ring flex h-10 items-center justify-center whitespace-nowrap rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-gray-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                            Back
                        </a>
                        <a href="{{ route('testimonials.edit', $testimonial->id) }}"
                            class="ring-offset-background focus-visible:ring-ring flex h-10 items-center justify-center whitespace-nowrap rounded-md bg-blue-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                            Edit
                        </a>
                        <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="ring-offset-background focus-visible:ring-ring flex h-10 items-center justify-center whitespace-nowrap rounded-md bg-red-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-red-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                                onclick="return confirm('Are you sure you want to delete this testimonial?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
