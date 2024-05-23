<x-app-layout>
    <div class="bg-white min-h-[800px] pt-12">
        @if (isset($client))
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Clients', 'url' => route('clients.index')],
                ['name' => $client->alt_tag, 'url' => route('clients.edit', $client->id)],
            ]" />
        @else
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Home', 'url' => route('dashboard')],
                ['name' => 'Clients', 'url' => route('clients.index')],
            ]" />
        @endif

        <!-- Client edit title -->
        <div class="mb-8 space-y-3">
            <h1 class="text-3xl font-semibold text-center sm:text-left sm:pl-[80px] pt-[90px]">Edit Client</h1>
        </div>

        <!-- Client form -->
        <form action="{{ route('clients.update', $client->id) }}" method="POST" class="w-full"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">

                <!-- client Alt Tag input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="alt_tag">Alt Tag</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="alt_tag" placeholder="Enter the new alt tag for the Client Image" type="text"
                        name="alt_tag" value="{{ old('alt_tag', $client->alt_tag) }}">
                    @error('alt_tag')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <br>

                <!-- Client Image input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="client_image">Client Image</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="client_image" type="file" name="client_image" onchange="previewImage(event)">

                    <div id="image-container">
                        @if ($client->client_image)
                            <img src="{{ asset('storage/clients/' . $client->client_image) }}"
                                alt="{{ $client->alt_tag }}" class="min-h-[100px] w-auto p-2">
                        @endif
                    </div>

                    <img id="image-preview" src="" alt="Preview Image" class="min-h-[100px] w-auto pa-2"
                        style="display: none;">

                    @error('client_image')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <!-- Update client button -->
                <div class="pt-8 flex justify-center sm:w-fit lg:col-span-2">
                    <button
                        class="ring-offset-background focus-visible:ring-ring flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-black px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-black/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                        type="submit">
                        Confirm
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script>
        function previewImage(event) {
            var previewImage = document.getElementById('image-preview');
            var imageContainer = document.getElementById('image-container');

            if (event.target.files.length > 0) {
                var reader = new FileReader();
                reader.onload = function() {
                    if (previewImage) {
                        previewImage.src = reader.result;
                        previewImage.style.display = 'block';
                        if (imageContainer) {
                            imageContainer.style.display = 'none';
                        }
                    }
                }
                reader.readAsDataURL(event.target.files[0]);
            } else {
                previewImage.src = '';
                previewImage.style.display = 'none';
                if (imageContainer) {
                    imageContainer.style.display = 'block';
                }
            }
        }
    </script>
</x-app-layout>
