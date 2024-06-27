<x-app-layout>
    <div class="note-container py-12">
        <x-breadcrumb :breadcrumbs="[['name' => 'Presences', 'url' => route('globalpresences.index')]]" />
        <div class="m-4 py-8 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden flex-col">
                <div class="sm:flex justify-start sm:justify-between items-center mb-4">
                    <h1 class="sm:text-4xl text-3xl font-semibold sm:pb-4 pb-8 dark:text-white">Global Presences</h1>
                    <a href="{{ route('globalpresences.create') }}"
                        class="rounded-tr-2xl rounded-bl-2xl text-white bg-gradient-to-tl from-indigo-400 from-30% to-indigo-600 to-100% hover:bg-gradient-to-br hover:from-indigo-600 hover:from-30% hover:to-indigo-400 hover:to-100% font-bold py-2 px-4 rounded">Create
                        Presence ⭐</a>
                </div>

                @if (session('success'))
                    <div id="success-message"
                        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative opacity-0 transition-opacity duration-500"
                        role="alert" style="display: none;">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('message') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg id="success-close-button" class="fill-current h-6 w-6 text-green-500" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>

                    <script>
                        // Fade in the alert
                        var successMessage = document.getElementById('success-message');
                        successMessage.style.display = 'block';
                        setTimeout(function() {
                            successMessage.style.opacity = '1';
                        }, 100);

                        // Fade out the alert after 2 seconds
                        setTimeout(function() {
                            successMessage.style.opacity = '0';
                        }, 2000);

                        // Hide the alert after it has faded out
                        setTimeout(function() {
                            successMessage.style.display = 'none';
                        }, 2500);

                        // Fade out the alert when the close button is clicked
                        document.getElementById('success-close-button').addEventListener('click', function() {
                            successMessage.style.opacity = '0';
                            setTimeout(function() {
                                successMessage.style.display = 'none';
                            }, 500);
                        });
                    </script>
                @endif


            <table class="min-w-full leading-normal mt-8">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider dark:bg-slate-600">
                            Country
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider dark:bg-slate-600">
                            Latitude
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-nowrap text-left text-[13px] sm:text-[15px] font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider dark:bg-slate-600">
                            longitude
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-nowrap text-left text-[13px] sm:text-[15px] font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider dark:bg-slate-600">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($globalpresences as $globalpresence)
                        <tr class="font-medium">
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-4sm text-gray-900 dark:text-gray-300">
                                {{ $globalpresence->countryName }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-4sm text-gray-900 dark:text-gray-300">
                                {{ $globalpresence->latitude }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-4sm text-gray-900 dark:text-gray-300">
                                {{ $globalpresence->longitude }}
                            </td>
                            <td class="px-5 py-8 border-b border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm flex gap-3">
                                <a href="{{ route('globalpresences.edit', $globalpresence->id) }}"
                                    class="rounded-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                <form action="{{ route('globalpresences.destroy', $globalpresence->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="rounded-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                        onclick="return confirm('Are you sure you want to delete this globalpresence?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-gray-500 dark:text-gray-400 font-bold">No Global Presence found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            </div>

            </div>
        </div>
    </div>
</x-app-layout>
