<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="lg:flex items-center">
                <div class="container mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 m-3">
                        <div>
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <h5 class="text-xl font-bold mb-2">Delete All Data</h5>
                                <p class="text-gray-600 mb-4">Permanently delete all data from the database.</p>
                                <form action="{{ route('truncate-tables') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-xl"
                                        onclick="return confirm('Are you really really positive you want to delete all data?')">
                                        Delete All Data
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div>
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <h5 class="text-xl font-bold mb-2">Download Database</h5>
                                <p class="text-gray-600 mb-4">Download the current database schema.</p>
                                <button id="schemaDumpButton"
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-xl"
                                    onclick="confirmDownload()">
                                    Download Database
                                </button>
                                <script>
                                    function confirmDownload() {
                                        if (confirm('Are you sure you want to download the current database schema?')) {
                                            window.location.href = "{{ route('schema.dump') }}";
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pl-5 m-6">
                @foreach ($backups as $index => $backup)
                    <div>
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h5 class="text-xl font-bold mb-2">{{ $backup['month'] }} Backup</h5>
                            <p class="text-gray-600 mb-4">Download the database backup for {{ $backup['month'] }}.</p>
                            <button
                                class="bg-{{ $index === 0 ? 'blue' : ($index === 1 ? 'green' : 'purple') }}-600 hover:bg-{{ $index === 0 ? 'blue' : ($index === 1 ? 'green' : 'purple') }}-700 text-white font-bold py-2 px-4 rounded-xl"
                                onclick="confirmDownload({{ $index }})">
                                Download
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <script>
            function confirmDownload(index) {
                if (confirm('Are you sure you want to download this backup file?')) {
                    window.location.href = "{{ route('backups.download', ['index' => ':index']) }}".replace(':index', index);
                }
            }
        </script>
    </div>

</x-app-layout>
