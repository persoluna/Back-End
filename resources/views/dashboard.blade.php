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
          <div class="div-container bg-gradient-to-b from-white to-blue-100 hover:from-blue-100 hover:to-blue-100 hover:via-blue-200 transition duration-700 rounded-lg shadow-md p-6 relative flex items-center justify-between">
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
          <div class="div-container bg-gradient-to-b from-white to-green-100 hover:from-green-100 hover:to-green-100 hover:via-green-200 transition duration-700 rounded-lg shadow-md p-6 relative flex items-center justify-between">
              <div>
                  <h5 class="text-xl font-bold mb-2">Products</h5>
                  <p class="text-gray-600 mb-4">Total Products: {{ $productCount }}</p>
              </div>
              <svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                  <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
              </svg>
          </div>
          <div class="div-container bg-gradient-to-b from-white to-orange-100 hover:from-orange-100 hover:to-orange-100 hover:via-orange-200 transition duration-700 rounded-lg shadow-md p-6 relative flex items-center justify-between">
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
                <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-slate-600 text-center">
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
        series: [{
            name: 'Inquiries',
            data: chartData.map(data => data.inquiry_count)
        }],
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
                gradientToColors: ["#1C64F2"],
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
                    return value;
                },
                style: {
                    colors: getThemeBasedColors()
                }
            }
        },
    };

    if (document.getElementById("tooltip-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("tooltip-chart"), options);
        chart.render();
    }

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
</script>
</x-app-layout>
