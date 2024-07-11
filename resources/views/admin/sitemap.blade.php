<x-app-layout>
    <div class="m-12 min-h-screen">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold text-gray-800">Unsettled URLs for Sitemap</h1>
            <div class="flex justify-end gap-4 items-center mb-6">
                <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" onclick="document.getElementById('manual-url-modal').classList.remove('hidden')">
                    Insert URL Manually
                </button>
                <button type="submit" form="sitemap-form" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Approve and Add URLs
                </button>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                    <p class="font-bold">Success</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <form id="sitemap-form" action="{{ route('admin.sitemap.store') }}" method="POST">
                @csrf
                <div class="bg-white shadow-md rounded-lg overflow-hidden overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">URL</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Priority</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Frequency</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($newUrls as $url)
                                <tr>
                                    <td class="px-6 py-4">
                                        <input type="hidden" name="original_urls[]" value="{{ $url }}">
                                        <input type="url" name="editable_urls[]" value="{{ $url }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    </td>
                                    <td class="px-6 py-4">
                                        <input type="number" name="priorities[]" value="0.5" min="0" max="1" step="0.1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    </td>
                                    <td class="px-6 py-4">
                                        <select name="frequencies[]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                            <option value="always">Always</option>
                                            <option value="hourly">Hourly</option>
                                            <option value="daily">Daily</option>
                                            <option value="weekly" selected>Weekly</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="yearly">Yearly</option>
                                            <option value="never">Never</option>
                                        </select>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center font-medium text-xl pt-10 text-gray-500 dark:text-gray-400 font-bold">
                                        Looks like there are no new urls :)
                                        <img src="{{ asset('storage/DrawKit-onlineshopping-Illustration-15.svg') }}" alt="No banners found" class="mx-auto mb-4 h-80 w-80">
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>

    <!-- Manual URL Modal -->
    <div id="manual-url-modal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Insert URL Manually</h3>
                    <div class="mt-2">
                        <form id="manual-url-form" action="{{ route('admin.sitemap.manualInsert') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="manual_url" class="block text-sm font-medium text-gray-700">URL</label>
                                <input type="url" name="manual_url" id="manual_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            <div class="mb-4">
                                <label for="manual_priority" class="block text-sm font-medium text-gray-700">Priority</label>
                                <input type="number" name="manual_priority" id="manual_priority" value="0.5" min="0" max="1" step="0.1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>
                            <div class="mb-4">
                                <label for="manual_frequency" class="block text-sm font-medium text-gray-700">Frequency</label>
                                <select name="manual_frequency" id="manual_frequency" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="always">Always</option>
                                    <option value="hourly">Hourly</option>
                                    <option value="daily">Daily</option>
                                    <option value="weekly" selected>Weekly</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="yearly">Yearly</option>
                                    <option value="never">Never</option>
                                </select>
                            </div>
                            <div class="flex justify-end">
                                <button type="button" class="mr-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" onclick="document.getElementById('manual-url-modal').classList.add('hidden')">Cancel</button>
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add URL</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
