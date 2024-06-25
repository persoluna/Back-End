<x-app-layout>
    <div class="bg-white min-h-screen pt-12">
        @if (isset($careerinquiry))
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Career Inquiries', 'url' => route('careerinquiries.index')],
                ['name' => $careerinquiry->title, 'url' => route('careerinquiries.show', $careerinquiry->id)],
            ]" />
        @else
            <x-breadcrumb :breadcrumbs="[
                ['name' => 'Home', 'url' => route('dashboard')],
            ]" />
        @endif
        <div class="mb-8 space-y-3">
            <h1 class="text-3xl font-semibold text-center sm:text-left sm:pl-[80px] pt-[90px]">Career Inquiry Details
            </h1>
        </div>

        <div class="m-[80px] justify-center items-start">
            <div class="grid md:grid-cols-12 gap-6">
                <div class="md:col-span-6">
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold">{{ $careerinquiry->name }}</h3>
                        <p class="text-gray-600"><strong>Mobile Number:</strong> {{ $careerinquiry->mobile_number }}</p>
                        <p class="text-gray-600"><strong>Email:</strong> {{ $careerinquiry->email }}</p>
                        <p class="text-gray-600"><strong>Message:</strong> {{ $careerinquiry->message }}</p>
                    </div>
                    <div class="mt-8 flex justify-start gap-4">
                        <a href="{{ route('careerinquiries.index') }}"
                            class="ring-offset-background focus-visible:ring-ring flex h-10 items-center justify-center whitespace-nowrap rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-gray-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                            Back
                        </a>
                        <form action="{{ route('careerinquiries.destroy', $careerinquiry->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="ring-offset-background focus-visible:ring-ring flex h-10 items-center justify-center whitespace-nowrap rounded-md bg-red-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-red-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                                onclick="return confirm('Are you sure you want to delete this career inquiry?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
