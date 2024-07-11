<x-app-layout>
<div class="container mx-auto px-4 py-8 m-2 mt-12">
    <h1 class="text-2xl font-bold mb-6">Approved URLs</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Search and Dropdown Container -->
    <div class="flex items-center mb-6 space-x-4">
        <!-- Search Box -->
        <input type="text" id="search" placeholder="Search URLs" class="w-full px-3 py-2 border rounded-md">

        <!-- Dropdown Button and Menu -->
        <div class="relative inline-block text-left">
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="truncate text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Download Sitemap
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="{{ route('admin.download-sitemap', 'product.xml') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Download Product Sitemap</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.download-sitemap', 'service.xml') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Download Service Sitemap</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.download-sitemap', 'blog.xml') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Download Blog Sitemap</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.download-sitemap', 'main.xml') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Download Main Sitemap</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.download-sitemap', 'sitemap.xml') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Download Sitemap Index</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
            <label for="priority-range" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Priority Filter</label>
            <input id="priority-range" type="range" min="0" max="1" value="0" step="0.1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
            <div class="text-sm text-gray-600 mt-1">Priority: <span id="priority-value">0</span></div>
        </div>
        <div>
            <label for="frequency-filter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Frequency Filter</label>
            <select id="frequency-filter" class="w-full px-3 py-2 border rounded-md">
                <option value="">All Frequencies</option>
                <option value="always">Always</option>
                <option value="hourly">Hourly</option>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
                <option value="monthly">Monthly</option>
                <option value="yearly">Yearly</option>
                <option value="never">Never</option>
            </select>
        </div>
    </div>

    <form id="update-form" action="{{ route('admin.update-approved-urls') }}" method="POST">
        @csrf
        @method('PUT')

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6">
            Update Changes
        </button>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">URL</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Priority</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Frequency</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Updated At</th>
                    </tr>
                </thead>
                <tbody id="urls-table-body">
                    @foreach ($approvedUrls as $url)
                        <tr data-url="{{ $url->editable_url }}" data-priority="{{ $url->priority }}" data-frequency="{{ $url->frequency }}">
                            <td class="px-6 py-4">
                                <input type="hidden" name="urls[{{ $url->id }}][id]" value="{{ $url->id }}">
                                <input type="text" name="urls[{{ $url->id }}][editable_url]" value="{{ $url->editable_url }}"
                                       class="w-[500px] px-2 py-1 border rounded">
                            </td>
                            <td class="px-6 py-4">
                                <input type="number" name="urls[{{ $url->id }}][priority]" value="{{ $url->priority }}"
                                       step="0.1" min="0" max="1" class="w-[200px] px-2 py-1 border rounded">
                            </td>
                            <td class="px-6 py-4">
                                <select name="urls[{{ $url->id }}][frequency]" class="w-[130px] px-2 py-1 border rounded">
                                    @foreach (['always', 'hourly', 'daily', 'weekly', 'monthly', 'yearly', 'never'] as $frequency)
                                        <option value="{{ $frequency }}" {{ $url->frequency == $frequency ? 'selected' : '' }}>
                                            {{ ucfirst($frequency) }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 truncate">
                                {{ $url->updated_at }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>

    <div class="mt-6">
        {{ $approvedUrls->links() }}
    </div>
</div>

<div id="generate-sitemap-button" class="fixed bottom-4 right-4 z-50">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full shadow-lg flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
        </svg>
        Generate Sitemap
    </button>
</div>

<script>
function generateSitemap() {
    fetch('{{ route('admin.generate-sitemap') }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.message) {
            alert(data.message);
        } else if (data.error) {
            throw new Error(data.error);
        } else {
            throw new Error('Unexpected response format');
        }
    })
    .catch((error) => {
        console.error('Error:', error);
        alert('An error occurred while generating the sitemap: ' + error.message);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Dropdown toggle functionality
    document.getElementById('dropdownDefaultButton').addEventListener('click', function () {
        const dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    });

    const searchInput = document.getElementById('search');
    const priorityRange = document.getElementById('priority-range');
    const priorityValue = document.getElementById('priority-value');
    const frequencyFilter = document.getElementById('frequency-filter');
    const tableBody = document.getElementById('urls-table-body');
    const rows = tableBody.querySelectorAll('tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const priorityFilter = parseFloat(priorityRange.value);
        const frequencyFilterValue = frequencyFilter.value.toLowerCase();

        rows.forEach(row => {
            const url = row.getAttribute('data-url').toLowerCase();
            const priority = parseFloat(row.getAttribute('data-priority'));
            const frequency = row.getAttribute('data-frequency').toLowerCase();

            const matchesSearch = url.includes(searchTerm);
            const matchesPriority = priority >= priorityFilter;
            const matchesFrequency = frequencyFilterValue === '' || frequency === frequencyFilterValue;

            row.style.display = matchesSearch && matchesPriority && matchesFrequency ? '' : 'none';
        });
    }

    searchInput.addEventListener('input', filterTable);

    priorityRange.addEventListener('input', function() {
        priorityValue.textContent = this.value;
        filterTable();
    });

    frequencyFilter.addEventListener('change', filterTable);

    // Initial filter
    filterTable();

    // Form submission using Fetch API
    const form = document.getElementById('update-form');
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Changes saved successfully!');
            } else {
                alert('Error saving changes. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    });

    // Add event listener to the generate sitemap button
    document.getElementById('generate-sitemap-button').addEventListener('click', generateSitemap);
});
</script>
</x-app-layout>