<x-app-layout>
    <div class="bg-white min-h-[800px] pt-12">
        @if (isset($staff))
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Team', 'url' => route('staffs.index')],
                ['name' => $staff->name, 'url' => route('staffs.edit', $staff->id)],
            ]" />
        @else
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Home', 'url' => route('dashboard')],
            ]" />
        @endif

        <!-- edit title -->
        <div class="mb-8 space-y-3">
            <h1 class="text-3xl font-semibold text-center sm:text-left sm:pl-[80px] pt-[90px]">Edit Details</h1>
        </div>

        <!-- Staff form -->
        <form action="{{ route('staffs.update', $staff->id) }}" method="POST" class="w-full"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">

                <!-- staff name input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="name">Name</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="name" placeholder="Enter the name" type="text" name="name"
                        value="{{ old('name', $staff->name) }}">
                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- staff id input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="staff_id">Number</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="staff_id" placeholder="Enter Unique Id" type="staff_id" name="staff_id"
                        value="{{ old('staff_id', $staff->staff_id) }}">
                    @error('staff_id')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- staff job title input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="job_title">Job Title</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="job_title" placeholder="Enter the Job title" type="text"
                        name="job_title" value="{{ old('job_title', $staff->job_title) }}">
                    @error('job_title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <br>

                <!-- image input field -->
                <div class="lg:col-span-1">
                    <label
                        class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="photo">Photo</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="photo" type="file" name="photo" onchange="previewImage(event)">

                    <div id="photo-container">
                        @if ($staff->photo)
                            <img src="{{ asset('storage/staffs/' . $staff->photo) }}"
                                class="min-h-[100px] w-auto p-2">
                        @endif
                    </div>

                    <img id="photo-preview" src="" alt="Preview" class="min-h-[100px] w-auto pa-2"
                        style="display: none;">

                    @error('photo')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <!-- Update staff button -->
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
    <script>
        function previewImage(event) {
            var previewImage = document.getElementById('photo-preview');
            var imageContainer = document.getElementById('photo-container');

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
