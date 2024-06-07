<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="{{ route('dashboard') }}" class="flex ms-2 md:me-24">
                    <x-application-logo class="h-8 me-3 block w-auto fill-current text-gray-800" />
                    <span
                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Back-End</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                     <span class="self-center text-lg font-semibold whitespace-nowrap dark:text-white me-2 pr-4 mt-2 truncate">
                            ~ {{ Auth::user()->name }}
                    </span>
                    <div>
                        <button type="button" class="flex text-sm bg-gray-800 rounded-full dark:focus:ring-gray-600"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <i class="fa-solid fa-user fa-2xl"></i>
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                {{ Auth::user()->email }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="{{ route('dashboard') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('profile.edit') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">Profile</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        Log Out
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="{{ Route::currentRouteNamed('dashboard') ? 'active' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                        <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Route::currentRouteNamed('banners.index') || Route::currentRouteNamed('counters.create') || Route::currentRouteNamed('banners.create') || Route::currentRouteNamed('counters.index') || Route::currentRouteNamed('applications.index') || Route::currentRouteNamed('applications.create') || Route::currentRouteNamed('whychooseus.index') || Route::currentRouteNamed('whychooseus.create') || Route::currentRouteNamed('clients.index') || Route::currentRouteNamed('clients.create') || Route::currentRouteNamed('testimonials.index') || Route::currentRouteNamed('testimonials.create') ? 'parent-active' : '' }}"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 9v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9" />
                        <path d="M9 22V12h6v10M2 10.6L12 2l10 8.6" />
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Home</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example"
                    class="space-y-2 {{ Route::currentRouteNamed('banners.index') || Route::currentRouteNamed('counters.index') || Route::currentRouteNamed('counters.create') || Route::currentRouteNamed('banners.create') || Route::currentRouteNamed('applications.index') || Route::currentRouteNamed('applications.create') || Route::currentRouteNamed('whychooseus.index') || Route::currentRouteNamed('whychooseus.create') || Route::currentRouteNamed('clients.index') || Route::currentRouteNamed('clients.create') || Route::currentRouteNamed('testimonials.index') || Route::currentRouteNamed('testimonials.create') ? 'block' : 'hidden' }}">
                    <li>
                        <a href="{{ route('banners.index') }}"
                            class="{{ Route::currentRouteNamed('banners.index') ? 'active' : '' }} flex items-center w-full p-2 mt-3 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Banners</a>
                    </li>
                    <li>
                        <a href="{{ route('counters.index') }}"
                            class="{{ Route::currentRouteNamed('counters.index') ? 'active' : '' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Counters</a>
                    </li>
                    <li>
                        <a href="{{ route('applications.index') }}"
                            class="{{ Route::currentRouteNamed('applications.index') ? 'active' : '' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Application</a>
                    </li>
                    <li>
                        <a href="{{ route('whychooseus.index') }}"
                            class="{{ Route::currentRouteNamed('whychooseus.index') ? 'active' : '' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Why
                            Choose Us</a>
                    </li>
                    <li>
                        <a href="{{ route('clients.index') }}"
                            class="{{ Route::currentRouteNamed('clients.index') ? 'active' : '' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Client</a>
                    </li>
                    <li>
                        <a href="{{ route('testimonials.index') }}"
                            class="{{ Route::currentRouteNamed('testimonials.index') ? 'active' : '' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Testimonials</a>
                    </li>
                </ul>
            </li>


            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Route::currentRouteNamed('abouts.index') || Route::currentRouteNamed('abouts.edit') || Route::currentRouteNamed('missions.index') || Route::currentRouteNamed('missions.show', 1) || Route::currentRouteNamed('abouts.show', 1) || Route::currentRouteNamed('missions.edit', 1) || Route::currentRouteNamed('abouts.edit', 1) ? 'parent-active' : '' }}"
                    aria-controls="dropdown-about" data-collapse-toggle="dropdown-about">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">About</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-about"
                    class="{{ Route::currentRouteNamed('abouts.index') || Route::currentRouteNamed('abouts.edit') || Route::currentRouteNamed('missions.index') || Route::currentRouteNamed('missions.show', 1) || Route::currentRouteNamed('abouts.show', 1) || Route::currentRouteNamed('missions.edit', 1) || Route::currentRouteNamed('abouts.edit', 1) ? 'block' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('abouts.index') }}"
                            class="{{ Route::currentRouteNamed('abouts.index') ? 'active' : '' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">About
                            Us</a>
                    </li>
                    <li>
                        <a href="{{ route('missions.index') }}"
                            class="{{ Route::currentRouteNamed('missions.index') ? 'active' : '' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Mission
                            & Vision</a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Route::currentRouteNamed('categories.index') || Route::currentRouteNamed('categories.create') || Route::currentRouteNamed('subcategories.index') || Route::currentRouteNamed('subcategories.create') || Route::currentRouteNamed('products.index') || Route::currentRouteNamed('products.create') ? 'parent-active' : '' }}"
                    aria-controls="dropdown-product" data-collapse-toggle="dropdown-product">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="10" cy="20.5" r="1" />
                        <circle cx="18" cy="20.5" r="1" />
                        <path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1" />
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Product</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-product"
                    class="{{ Route::currentRouteNamed('categories.index') || Route::currentRouteNamed('categories.create') || Route::currentRouteNamed('subcategories.create') || Route::currentRouteNamed('subcategories.index') || Route::currentRouteNamed('products.index') || Route::currentRouteNamed('products.create') ? 'block' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('categories.index') }}"
                            class="{{ Route::currentRouteNamed('categories.index') ? 'active' : '' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Categories</a>
                    </li>
                    <li>
                        <a href="{{ route('subcategories.index') }}"
                            class="{{ Route::currentRouteNamed('subcategories.index') ? 'active' : '' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Sub-categories</a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}"
                            class="{{ Route::currentRouteNamed('products.index') ? 'active' : '' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Products</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('blogs.index') }}"
                    class="{{ Route::currentRouteNamed('blogs.index') || Route::currentRouteNamed('blogs.create') || Route::currentRouteNamed('headings.edit', 5) ? 'active' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z" />
                        <path d="M14 3v5h5M16 13H8M16 17H8M10 9H8" />
                    </svg>
                    <span class="ms-3">Blogs</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Route::currentRouteNamed('headers.index') || Route::currentRouteNamed('footers.index') || Route::currentRouteNamed('menus.index') || Route::currentRouteNamed('menus.create') || Route::currentRouteNamed('staticseos.index') ? 'parent-active' : '' }}"
                    aria-controls="dropdown-settings" data-collapse-toggle="dropdown-settings">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <line x1="4" y1="21" x2="4" y2="14"></line>
                        <line x1="4" y1="10" x2="4" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12" y2="3"></line>
                        <line x1="20" y1="21" x2="20" y2="16"></line>
                        <line x1="20" y1="12" x2="20" y2="3"></line>
                        <line x1="1" y1="14" x2="7" y2="14"></line>
                        <line x1="9" y1="8" x2="15" y2="8"></line>
                        <line x1="17" y1="16" x2="23" y2="16"></line>
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Settings</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-settings"
                    class="{{ Route::currentRouteNamed('headers.index') || Route::currentRouteNamed('footers.index') || Route::currentRouteNamed('menus.index') || Route::currentRouteNamed('menus.create') || Route::currentRouteNamed('staticseos.index') ? 'block' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('headers.index') }}"
                            class="{{ Route::currentRouteNamed('headers.index') ? 'active' : '' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Update
                            Header</a>
                    </li>
                    <li>
                        <a href="{{ route('footers.index') }}"
                            class="{{ Route::currentRouteNamed('footers.index') ? 'active' : '' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Update
                            Footer</a>
                    </li>
                    <li>
                        <a href="{{ route('menus.index') }}"
                            class="{{ Route::currentRouteNamed('menus.index') || Route::currentRouteNamed('staticseos.index') || Route::currentRouteNamed('menus.create') ? 'active' : '' }} flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Update
                            Menu</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('profile.edit') }}"
                    class="{{ Route::currentRouteNamed('profile.edit') ? 'active' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('backups.index') }}"
                    class="{{ Route::currentRouteNamed('backups.index') ? 'active' : '' }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                        <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                        <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Data Management</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M10 3H6a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h4M16 17l5-5-5-5M19.8 12H9" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Log Out</span>
                    </a>
                </form>
            </li>
        </ul>
    </div>
</aside>
