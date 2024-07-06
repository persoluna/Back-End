<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="pl-12 pr-12 pb-12 pt-12">
      <div class="container mx-auto pb-12">
      <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 m-3">
          <div class="div-container bg-gradient-to-b from-white to-gray-100 hover:from-white hover:to-gray-100 hover:via-gray-200 transition duration-800 rounded-lg shadow-md p-6 relative flex items-center justify-between">
              <div>
                  <h5 class="text-xl font-bold mb-2">Categories</h5>
                  <p class="text-gray-600 mb-4">Total Categories: {{ $categoryCount }}</p>
              </div>
              <svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
              </svg>
          </div>
          <div class="div-container bg-gradient-to-b from-white to-gray-100 hover:from-white hover:to-gray-100 hover:via-gray-200 transition duration-800 rounded-lg shadow-md p-6 relative flex items-center justify-between">
              <div>
                  <h5 class="text-xl font-bold mb-2">Subcategories</h5>
                  <p class="text-gray-600 mb-4">Total Subcategories: {{ $subCategoryCount }}</p>
              </div>
              <svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect>
                  <rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect>
                  <line x1="6" y1="6" x2="6.01" y2="6"></line>
                  <line x1="6" y1="18" x2="6.01" y2="18"></line>
              </svg>
          </div>
          <div class="div-container bg-gradient-to-b from-white to-gray-100 hover:from-white hover:to-gray-100 hover:via-gray-200 transition duration-800 rounded-lg shadow-md p-6 relative flex items-center justify-between">
              <div>
                  <h5 class="text-xl font-bold mb-2">Products</h5>
                  <p class="text-gray-600 mb-4">Total Products: {{ $productCount }}</p>
              </div>
              <svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                  <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
              </svg>
          </div>
            <div class="div-container bg-gradient-to-b from-white to-gray-100 hover:from-white hover:to-gray-100 hover:via-gray-200 transition duration-800 rounded-lg shadow-md p-6 relative flex items-center justify-between">
                <div>
                    <h5 class="text-xl font-bold mb-2">Benefits</h5>
                    <p class="text-gray-600 mb-4">Total Benefits: {{ $benefitCount }}</p>
                </div>
                <svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                </svg>
            </div>
            <div class="div-container bg-gradient-to-b from-white to-gray-100 hover:from-white hover:to-gray-100 hover:via-gray-200 transition duration-800 rounded-lg shadow-md p-6 relative flex items-center justify-between">
                <div>
                    <h5 class="text-xl font-bold mb-2">Banners</h5>
                    <p class="text-gray-600 mb-4">Total Banners: {{ $bannerCount }}</p>
                </div>
                <svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                    <line x1="8" y1="21" x2="16" y2="21"></line>
                    <line x1="12" y1="17" x2="12" y2="21"></line>
                </svg>
            </div>
            <div class="div-container bg-gradient-to-b from-white to-gray-100 hover:from-white hover:to-gray-100 hover:via-gray-200 transition duration-800 rounded-lg shadow-md p-6 relative flex items-center justify-between">
                <div>
                    <h5 class="text-xl font-bold mb-2">Services</h5>
                    <p class="text-gray-600 mb-4">Total Services: {{ $serviceCount }}</p>
                </div>
                <svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                </svg>
            </div>
            <div class="div-container bg-gradient-to-b from-white to-gray-100 hover:from-white hover:to-gray-100 hover:via-gray-200 transition duration-800 rounded-lg shadow-md p-6 relative flex items-center justify-between">
                <div>
                    <h5 class="text-xl font-bold mb-2">Counters</h5>
                    <p class="text-gray-600 mb-4">Total Counters: {{ $counterCount }}</p>
                </div>
                <svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="4" y1="4" x2="4" y2="20"></line>
                    <line x1="4" y1="20" x2="20" y2="20"></line>
                    <line x1="8" y1="12" x2="8" y2="16"></line>
                    <line x1="12" y1="8" x2="12" y2="16"></line>
                    <line x1="16" y1="4" x2="16" y2="16"></line>
                </svg>
            </div>
          <div class="div-container bg-gradient-to-b from-white to-gray-100 hover:from-white hover:to-gray-100 hover:via-gray-200 transition duration-800 rounded-lg shadow-md p-6 relative flex items-center justify-between">
              <div>
                  <h5 class="text-xl font-bold mb-2">Blogs</h5>
                  <p class="text-gray-600 mb-4">Total Blogs: {{ $blogCount }}</p>
              </div>
              <svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
              </svg>
          </div>
     </div>
    </div>

        <div class="max-w-7xl w-full bg-white rounded-lg shadow dark:bg-stone-200 p-4 md:p-6">
            <div class="flex justify-between mb-5">
                <div>
                    <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-black pb-2">{{ $yearlyInquiries }}</h5>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-600">Total Inquiries for {{ $selectedYear }}</p>
                </div>
                <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-red-500 dark:text-red-600 text-center">
                    {{ number_format($inquiryPercentage, 2) }}%
                </div>
            </div>
            <div id="tooltip-chart"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5">
                <div class="flex justify-between items-center pt-5">
                    <!-- Year Selection Form -->
                    <form method="GET" action="{{ route('dashboard') }}">
                        <div class="flex items-center">
                            <select name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($years as $year)
                                    <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>{{ $year }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Go</button>
                        </div>
                    </form>
                    <a
                        href="#Inquiries"
                        class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500 hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                        Inquiries Report
                        <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </a>
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
                show: false,
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
                    show: false,
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
</x-app-layout>
