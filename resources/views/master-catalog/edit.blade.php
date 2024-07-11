<x-app-layout>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Master Catalog</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('master-catalog.update') }}" method="POST" enctype="multipart/form-data" class="mb-8">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="catalog_pdf" class="block text-sm font-medium text-gray-700">Master Catalog PDF</label>
                @if($masterCatalog && $masterCatalog->catalog_pdf)
                    <div class="mb-2">
                        <span class="text-sm">Current PDF: {{ $masterCatalog->catalog_pdf }}</span>
                        <a href="{{ asset('storage/master_catalog/' . $masterCatalog->catalog_pdf) }}"
                           target="_blank"
                           class="ml-2 text-blue-600 hover:text-blue-800">View</a>
                    </div>
                @endif
                <input type="file" name="catalog_pdf" id="catalog_pdf" accept=".pdf"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('catalog_pdf')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Update Master Catalog
            </button>
        </form>

        @if($masterCatalog && $masterCatalog->catalog_pdf)
            <form action="{{ route('master-catalog.destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the master catalog?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Delete Master Catalog
                </button>
            </form>
        @endif
    </div>
</x-app-layout>