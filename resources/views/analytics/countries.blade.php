<x-app-layout>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Country Analytics</h1>

    <div class="gap-6 mb-6">
        <!-- Bar Chart -->
        <div class="bg-white rounded-lg shadow-md p-4">
            <canvas id="countryChart" style="height: 300px;"></canvas>
        </div>
    </div>

        <!-- Data Table -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Country
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Page Views
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($countryData as $country)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $country['country'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ number_format($country['screenPageViews']) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('countryChart').getContext('2d');
            var countryData = @json($countryData);

            // Get top 5 countries
            var topCountries = countryData.slice(0, 5);

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: topCountries.map(item => item.country),
                    datasets: [{
                        label: 'Page Views',
                        data: topCountries.map(item => item.screenPageViews),
                        backgroundColor: 'rgba(59, 130, 246, 0.5)',
                        borderColor: 'rgb(59, 130, 246)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Top 5 Countries by Page Views'
                        }
                    }
                }
            });
        });
    </script>

</x-app-layout>
