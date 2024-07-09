<x-app-layout>
    <x-slot name="header">
    </x-slot>

<div class="container mx-auto p-6">
  <!-- Grid layout for the cards -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Inquiry Card -->
    <div class="bg-white hover:bg-gray-100 rounded-lg shadow-md p-6 flex items-center justify-between transition duration-300">
      <div>
        <h5 class="text-xl font-bold mb-2">Inquiry</h5>
        <p class="text-gray-600">Total Inquiry: {{ $allinquiryCount }}</p>
      </div>
      <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z" />
      </svg>
    </div>

    <!-- Products Card -->
    <div class="bg-white hover:bg-gray-100 rounded-lg shadow-md p-6 flex items-center justify-between transition duration-300">
      <div>
        <h5 class="text-xl font-bold mb-2">Products</h5>
        <p class="text-gray-600">Total Products: {{ $productCount }}</p>
      </div>
      <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
      </svg>
    </div>

    <!-- Services Card -->
    <div class="bg-white hover:bg-gray-100 rounded-lg shadow-md p-6 flex items-center justify-between transition duration-300">
      <div>
        <h5 class="text-xl font-bold mb-2">Services</h5>
        <p class="text-gray-600">Total Services: {{ $serviceCount }}</p>
      </div>
      <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="3"></circle>
        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
      </svg>
    </div>

    <!-- Blogs Card -->
    <div class="bg-white hover:bg-gray-100 rounded-lg shadow-md p-6 flex items-center justify-between transition duration-300">
      <div>
        <h5 class="text-xl font-bold mb-2">Blogs</h5>
        <p class="text-gray-600">Total Blogs: {{ $blogCount }}</p>
      </div>
      <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
      </svg>
    </div>
  </div>

  <!-- Yearly Inquiries Section -->
  <div class="max-w-7xl bg-white rounded-lg shadow p-6 mb-8">
    <div class="flex justify-between items-center mb-6">
      <div>
        <h5 class="text-3xl font-bold text-gray-900">{{ $yearlyInquiries }}</h5>
        <p class="text-gray-500">Total Inquiries for {{ $selectedYear }}</p>
      </div>
      <div class="text-red-500 text-lg font-semibold">
        {{ number_format($inquiryPercentage, 2) }}%
      </div>
    </div>
    <div id="tooltip-chart" class="mb-6"></div>
    <div class="border-t border-gray-200 pt-6 flex justify-between items-center">
      <!-- Year Selection Form -->
      <form method="GET" action="{{ route('dashboard') }}" class="flex items-center">
        <select name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
          @foreach ($years as $year)
            <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>{{ $year }}</option>
          @endforeach
        </select>
        <button type="submit" class="ml-2 bg-blue-700 text-white text-sm font-medium rounded-lg px-5 py-2.5 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
          Go
        </button>
      </form>
      <a href="#Inquiries" class="text-blue-600 hover:text-blue-700 font-semibold uppercase text-sm flex items-center">
        Inquiries Report
        <svg class="w-2.5 h-2.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 6 10">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 9l4-4-4-4"></path>
        </svg>
      </a>
    </div>
  </div>

  <!-- Combined Top Countries and Browser Table Section -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Top Countries Section -->
    <div class="bg-white rounded-lg shadow p-6">
      <div class="flex justify-between items-center mb-3">
        <h5 class="text-xl font-bold text-gray-900">Top Countries</h5>
        <!-- Existing SVG and popover can be added here -->
      </div>
      <div class="bg-gray-50 p-3 rounded-lg mb-3">
        <div id="country-data" class="grid grid-cols-3 gap-3">
          <!-- Country data will be inserted here dynamically -->
        </div>
        <button data-collapse-toggle="more-details" type="button" class="text-xs text-gray-500 hover:underline flex items-center">
          Show more details
          <svg class="w-2 h-2 ml-1" fill="none" stroke="currentColor" viewBox="0 0 10 6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l4 4 4-4"></path>
          </svg>
        </button>
        <div id="more-details" class="border-t border-gray-200 pt-3 mt-3 hidden space-y-2">
          <!-- More details will be inserted here dynamically -->
        </div>
      </div>
      <!-- Radial Chart -->
      <div id="radial-chart" class="py-6"></div>
      <!-- Existing dropdown and link at the bottom can be added here -->
    </div>

    <!-- Browser Table Section -->
    <div class="bg-white rounded-lg shadow p-6">
      <div class="overflow-x-auto">
        <table class="min-w-full">
          <thead class="bg-gray-50">
            <tr>
              <th class="p-3 text-lg font-medium text-gray-700 text-left">Top Browser</th>
              <th class="p-3 text-lg font-medium text-gray-700 text-left">Page Views</th>
            </tr>
          </thead>
          <tbody id="browserTableBody" class="text-gray-600">
            <!-- Browser data will be inserted here dynamically -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



    <!-- Inquiry Modal -->
    <div id="inquiry-modal" tabindex="-1" aria-hidden="true" class="hidden mt-10 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Inquiry Details
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="inquiry-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div id="inquiry-details" class="p-4 md:p-5 space-y-4">
                    <!-- Inquiry details will be loaded here -->
                </div>
            </div>
        </div>
    </div>
    <section id="Inquiries">
        {{-- ! Live wire search --}}
            <div class="py-12 pl-12 pr-12 overflow-scroll">
                @livewire('search-inquiry')
            </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        let chartData = @json($userInquiries->toArray());
        let totalInquiries = @json($yearlyInquiries);
        let inquiryPercentage = @json($inquiryPercentage);

        function getThemeBasedColors() {
            const isDarkMode = document.documentElement.classList.contains('dark');
            return isDarkMode ? '#FFFFFF' : '#000000'; // Adjust colors as needed
        }

        const options = {
            tooltip: {
                enabled: true,
                x: {
                    show: true,
                },
                y: {
                    show: true,
                },
            },
            grid: {
                show: true,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -26
                },
            },
            series: [
                {
                    name: 'GPM Inquiries',
                    data: chartData.map(data => data.gpm_count)
                },
                {
                    name: 'SEO Inquiries',
                    data: chartData.map(data => data.seo_count)
                }
            ],
            chart: {
                height: "100%",
                maxWidth: "100%",
                type: "area",
                fontFamily: "Inter, sans-serif",
                dropShadow: {
                    enabled: false,
                },
                toolbar: {
                    show: true,
                },
            },
            legend: {
                show: true
            },
            fill: {
                type: "gradient",
                gradient: {
                    opacityFrom: 0.55,
                    opacityTo: 0,
                    shade: "#1C64F2",
                    gradientToColors: ["#1C64F2", "#22C55E"],
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                width: 4,
            },
            xaxis: {
                categories: chartData.map(data => data.formatted_month),
                labels: {
                    style: {
                        colors: getThemeBasedColors()
                    }
                }
            },
            yaxis: {
                show: true,
                labels: {
                    formatter: function (value) {
                        return Math.round(value);
                    },
                    style: {
                        colors: getThemeBasedColors()
                    }
                }
            },
            colors: ['#1C64F2', '#22C55E'] // Blue for GPM, Green for SEO
        };

        if (document.getElementById("tooltip-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("tooltip-chart"), options);
            chart.render();

            // Add event listener to update chart colors on theme change
            const observer = new MutationObserver(() => {
                const newColors = getThemeBasedColors();
                chart.updateOptions({
                    xaxis: {
                        labels: {
                            style: {
                                colors: newColors
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: newColors
                            }
                        }
                    }
                });
            });
            observer.observe(document.documentElement, {
                attributes: true,
                attributeFilter: ['class']
            });
        }
    </script>
    <script>
        function loadInquiryDetails(inquiryId) {
            fetch(`/inquiry-details/${inquiryId}`)
                .then(response => response.json())
                .then(data => {
                    const detailsContainer = document.getElementById('inquiry-details');
                    detailsContainer.innerHTML = `
                        <p><strong>User IP:</strong> ${data.user_ip || 'N/A'}</p>
                        <p><strong>Message:</strong> ${data.message}</p>
                        <p><strong>Company Name:</strong> ${data.companyName || 'N/A'}</p>
                        <p><strong>City:</strong> ${data.city || 'N/A'}</p>
                        <p><strong>Pin Code:</strong> ${data.pinCode || 'N/A'}</p>
                        <p><strong>UTM Source:</strong> ${data.utm_source || 'N/A'}</p>
                        <p><strong>UTM Medium:</strong> ${data.utm_medium || 'N/A'}</p>
                        <p><strong>UTM Campaign:</strong> ${data.utm_campaign || 'N/A'}</p>
                        <p><strong>UTM ID:</strong> ${data.utm_id || 'N/A'}</p>
                        <p><strong>GCLID:</strong> ${data.gclid || 'N/A'}</p>
                        <p><strong>GCID Source:</strong> ${data.gcid_source || 'N/A'}</p>
                        <p><strong>Is GPM:</strong> ${data.is_GPM ? 'Yes' : 'No'}</p>
                    `;
                });
        }
    </script>
    <script>
        function fetchTopBrowsers() {
            fetch('/api/top-browsers')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('browserTableBody');
                    tableBody.innerHTML = ''; // Clear existing content

                    // Slice the data array to get only the top 5 browsers
                    data.slice(0, 7).forEach(browser => {
                        const row = `
                            <tr class="bg-white border-b border-dashed dark:bg-gray-800 dark:border-gray-700">
                                <td class="p-3 text-xl font-medium whitespace-nowrap dark:text-white">
                                    <img src="/storage/icons/${browser.browser.toLowerCase()}.svg" alt="${browser.browser}" class="mr-2 h-10 inline-block">
                                    ${browser.browser}
                                </td>
                                <td class="p-4 text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    <span class="counter tabular-nums text-right inline-block w-20" data-target="${browser.screenPageViews}">0</span>
                                </td>
                            </tr>
                        `;
                        tableBody.innerHTML += row;
                    });

                    // Initialize counters after adding rows
                    initializeCounters();
                })
                .catch(error => console.error('Error fetching top browsers:', error));
        }

        // Call the function when the page loads
        document.addEventListener('DOMContentLoaded', fetchTopBrowsers);

        function initializeCounters() {
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const duration = 1000; // Animation duration in milliseconds
                const step = target / (duration / 16); // Assuming 60fps

                let current = 0;
                const updateCounter = () => {
                    current += step;
                    if (current < target) {
                        counter.textContent = Math.floor(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target;
                    }
                };
                updateCounter();
            });
        }
    </script>
    <script>
        function populateCountryData() {
            fetch('/api/top-countries')
                .then(response => response.json())
                .then(data => {
                    const topCountries = data.slice(0, 3); // Get top 3 countries
                    const totalViews = topCountries.reduce((sum, country) => sum + country.screenPageViews, 0);

                    const countryDataHTML = topCountries.map((country, index) => {
                        const percentage = ((country.screenPageViews / totalViews) * 100).toFixed(1);
                        const colors = ['blue', 'teal', 'orange'];
                        return `
                            <dl class="bg-${colors[index]}-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                <dt class="w-8 h-8 rounded-full bg-${colors[index]}-100 dark:bg-gray-500 text-${colors[index]}-600 dark:text-${colors[index]}-300 text-sm font-medium flex items-center justify-center mb-1">${percentage}%</dt>
                                <dd class="text-${colors[index]}-600 dark:text-${colors[index]}-300 text-sm font-medium">${country.country}</dd>
                            </dl>
                        `;
                    }).join('');

                    document.getElementById('country-data').innerHTML = countryDataHTML;

                    // Populate more details
                    const totalPageViews = data.reduce((sum, country) => sum + country.screenPageViews, 0);
                    const averageViewsPerCountry = Math.round(totalPageViews / data.length);
                    const moreDetailsHTML = `
                        <dl class="flex items-center justify-between">
                            <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Total page views:</dt>
                            <dd class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                                ${totalPageViews.toLocaleString()}
                            </dd>
                        </dl>
                        <dl class="flex items-center justify-between">
                            <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Average views per country:</dt>
                            <dd class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-gray-600 dark:text-gray-300">${averageViewsPerCountry.toLocaleString()}</dd>
                        </dl>
                        <dl class="flex items-center justify-between">
                            <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Top country:</dt>
                            <dd class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-gray-600 dark:text-gray-300">${topCountries[0].country}</dd>
                        </dl>
                    `;
                    document.getElementById('more-details').innerHTML = moreDetailsHTML;

                    // Call the function to create the radial chart
                    createCountryRadialChart(topCountries, totalViews);
                })
                .catch(error => console.error('Error fetching top countries:', error));
        }

        function createCountryRadialChart(topCountries, totalViews) {
            const series = topCountries.map(country => Math.round((country.screenPageViews / totalViews) * 100));
            const labels = topCountries.map(country => country.country);

            const chartOptions = getChartOptions(series, labels);

            if (document.getElementById("radial-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("radial-chart"), chartOptions);
                chart.render();
            }
        }

        const getChartOptions = (series, labels) => {
            return {
                series: series,
                colors: ["#1C64F2", "#16BDCA", "#FDBA8C"],
                chart: {
                    height: "380px",
                    width: "100%",
                    type: "radialBar",
                    sparkline: {
                        enabled: true,
                    },
                },
                plotOptions: {
                    radialBar: {
                        track: {
                            background: '#E5E7EB',
                        },
                        dataLabels: {
                            show: true,
                            name: {
                                fontSize: '14px',
                                fontFamily: 'Inter, sans-serif',
                            },
                            value: {
                                fontSize: '16px',
                                fontFamily: 'Inter, sans-serif',
                                formatter: function (val) {
                                    return val + '%';
                                }
                            },
                        },
                        hollow: {
                            margin: 0,
                            size: "32%",
                        }
                    },
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -23,
                        bottom: -20,
                    },
                },
                labels: labels,
                legend: {
                    show: true,
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                tooltip: {
                    enabled: true,
                    y: {
                        formatter: function (value) {
                            return value + '%';
                        }
                    }
                },
                yaxis: {
                    show: false,
                    labels: {
                        formatter: function (value) {
                            return value + '%';
                        }
                    }
                }
            }
        }

        // Call the function when the page loads
        document.addEventListener('DOMContentLoaded', populateCountryData);
    </script>
</x-app-layout>
