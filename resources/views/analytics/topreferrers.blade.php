<x-app-layout>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Top Referrers Analytics</h1>

    <div class="gap-6 mb-6">
        <!-- Bar Chart -->
        <div class="bg-white rounded-lg shadow-md p-4">
            <canvas id="Topreferrers" style="height: 300px;"></canvas>
        </div>
    </div>

    <!-- Data Table -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Referrers
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Views
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($topReferrer as $page)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $page['pageReferrer'] }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ number_format($page['screenPageViews']) }}
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
        var ctx = document.getElementById('Topreferrers').getContext('2d');
        var topReferrer = @json($topReferrer);

        console.log('Top referrers data:', topReferrer);

        // Check if data exists
        if (!topReferrer || !Array.isArray(topReferrer) || topReferrer.length === 0) {
            console.error('No top referrer data available');
            return;
        }

        // Sort data by screenPageViews in descending order
        topReferrer.sort((a, b) => b.screenPageViews - a.screenPageViews);

        // Get top 5 referrers
        var topreferrers = topReferrer.slice(0, 5);

        // Function to truncate long page names
        function truncateString(str, num) {
            return str.length > num ? str.slice(0, num) + '...' : str;
        }

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: topreferrers.map(item => truncateString(item.pageReferrer, 15)), // Truncate for x-axis
                datasets: [{
                    label: 'Page Views',
                    data: topreferrers.map(item => item.screenPageViews),
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
                    },
                    x: {
                        ticks: {
                            callback: function(value, index, values) {
                                // Truncate long labels for x-axis
                                return truncateString(value, 10); // Truncate to 10 characters
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Top 5 Page Referrers'
                    },
                    tooltip: {
                        callbacks: {
                            title: function(tooltipItem) {
                                // Use the full referrer title in tooltips
                                return topreferrers[tooltipItem[0].dataIndex].pageReferrer;
                            }
                        }
                    }
                }
            }
        });
    });
</script>
</x-app-layout>
