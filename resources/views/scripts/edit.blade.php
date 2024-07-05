<x-app-layout>

    <div class="bg-white pb-12 pt-12">
        <x-breadcrumb :breadcrumbs="[['name' => 'Update Script', 'url' => route('scripts.edit', $script->id)]]" />

        <!-- edit title -->
        <div class="mb-8 space-y-3">
            <h1 class="text-3xl font-semibold text-center sm:text-left sm:pl-[80px] pt-[90px]">Edit Scripts</h1>
        </div>
        <div id="notification" class="fixed top-4 right-4 bg-green-500 text-white p-4 rounded shadow-lg" style="display: none; z-index: 9999;">
            {{ session('success') }}
        </div>

        <!-- edit form -->
        <form action="{{ route('scripts.update', $script->id) }}" method="POST" class="w-full" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">
                {{-- input field --}}
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="script_1">Script 1</label>
                    <textarea
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-20 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="script_1" placeholder="Enter the news letter" type="text" name="script_1">{{ old('script_1', $script->script_1) }}</textarea>
                    @error('script_1')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">
                {{-- input field --}}
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="script_2">Script 2</label>
                    <textarea
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-20 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="script_2" placeholder="Enter the news letter" type="text" name="script_2">{{ old('script_2', $script->script_2) }}</textarea>
                    @error('script_2')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-10 items-center grid lg:grid-cols-2 gap-6 m-[80px] justify-center">
                {{-- input field --}}
                <div class="lg:col-span-1">
                    <label class="text-base font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="script_3">Script 3</label>
                    <textarea
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-20 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="script_3" placeholder="Enter the news letter" type="text" name="script_3">{{ old('script_3', $script->script_3) }}</textarea>
                    @error('script_3')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="flex lg:justify-start lg:ml-20 justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Update Script
                </button>
            </div>
        </form>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const notification = document.getElementById('notification');
        console.log('Notification element:', notification);
        @if(session('success'))
            console.log('Success message:', "{{ session('success') }}");
            notification.classList.remove('hidden');
            notification.style.display = 'block'; // Force display
            setTimeout(() => {
                notification.classList.add('hidden');
                notification.style.display = 'none'; // Force hide
            }, 3000);
        @else
            console.log('No success message in session');
        @endif
    });
</script>
</x-app-layout>