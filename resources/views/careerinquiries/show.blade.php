<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <header class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg shadow-lg p-6 mb-8">
            <h1 class="text-4xl font-bold text-white mb-4">Career Inquiry Details</h1>
            @if (isset($careerinquiry))
                <nav class="flex items-center space-x-4">
                    <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-200">Home</a>
                    <span class="text-white">/</span>
                    <a href="{{ route('careerinquiries.index') }}" class="text-white hover:text-gray-200">Career Inquiries</a>
                    <span class="text-white">/</span>
                    <a href="{{ route('careerinquiries.show', $careerinquiry->id) }}" class="text-white hover:text-gray-200">{{ $careerinquiry->name }}</a>
                </nav>
            @else
                <nav class="flex items-center space-x-4">
                    <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-200">Home</a>
                </nav>
            @endif
        </header>

    <div class="bg-white min-h-screen pt-4">
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
