<x-app-layout>
    <div class="bg-white min-h-[700px] pt-12">
        @if (isset($about))
            <x-breadcrumb :breadcrumbs="[['name' => 'About Us', 'url' => route('abouts.show', $about->id)]]" />
        @else
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Home', 'url' => route('dashboard')],
                ['name' => 'About Us', 'url' => route('abouts.show', $about->id)],
            ]" />
        @endif

        <div class="mb-8 space-y-3">
            <h1 class="text-3xl font-semibold text-center sm:text-left sm:pl-[80px] pt-[90px]">About Us Details</h1><br>

        </div>


        <div class="m-[80px] justify-center items-start">
            <div class="grid md:grid-cols-12 gap-6">
                <div class="md:col-span-6">
                    <img src="{{ asset('storage/abouts/' . $about->image1) }}" alt="{{ $about->alt_tag1 }}"
                        class="img-fluid w-full">
                </div>
                <div class="md:col-span-6">
                    <img src="{{ asset('storage/abouts/' . $about->image2) }}" alt="{{ $about->alt_tag2 }}"
                        class="img-fluid w-full">
                </div>
                <div class="md:col-span-6">
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold">{{ $about->title }}</h3>
                        <h4 class="text-xl font-semibold">{{ $about->sub_title }}</h4>
                        <p class="text-gray-600">
                            {{ $about->description }}</p>
                        <p class="text-xl font-semibold">{{ $about->owner_name }}</p>
                        <p class="text-xl font-semibold">{{ $about->owner_designation }}</p>
                        <div class="md:col-span-6">
                            <img src="{{ asset('storage/abouts/' . $about->owner_signature) }}"
                                alt="{{ $about->alt_tag3 }}" class="img-fluid w-full">
                        </div>
                    </div>
                    <div class="mt-8 flex justify-start gap-4">
                        <a href="{{ route('abouts.edit', $about->id) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit
                            About
                            Us
                            🖱️</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
