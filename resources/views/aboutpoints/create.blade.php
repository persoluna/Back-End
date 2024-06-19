<x-app-layout>
    <div class="bg-white min-h-[800px] pt-12">
        <x-breadcrumb :breadcrumbs="[
            ['name' => 'About Us', 'url' => route('abouts.index')],
            ['name' => 'Create Point', 'url' => route('aboutpoints.create')],
        ]" />

        <!-- About Point creation title and description -->
        <div class="mb-8 space-y-3">
            <h1 class="text-3xl sm:text-4xl font-semibold text-start pt-[90px] ml-12">Enter Your About Point</h1>
        </div>

        <!-- About us Point form -->
        <form action="{{ route('aboutpoints.store') }}" method="POST" class="w-full" enctype="multipart/form-data">
            @csrf
            <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">

                <!-- About us Point input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="point">Point</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="point" placeholder="Enter the Point" type="text"
                        name="point" value="{{ old('point') }}">
                    @error('point')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <!-- Confirm button -->
                <div class="pt-8 flex justify-center sm:w-fit lg:col-span-2">
                    <button
                        class="rounded-tr-2xl rounded-bl-2xl ring-offset-background focus-visible:ring-ring flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-black px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-black/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                        type="submit">
                        Confirm
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
