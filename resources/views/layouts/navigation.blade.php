<nav class="fixed top-0 z-50 w-full bg-gradient-to-r from-white via-white to-indigo-200 dark:from-gray-700 dark:via-gray-800 dark:to-black border-solid border-b-2 border-indigo-500">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="{{ route('dashboard') }}" class="flex ms-2 md:me-24">
                    <x-application-logo class="h-8 me-3 block w-auto fill-current text-gray-800 hidden lg:block" />
                    <span
                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white hidden lg:block">Back-End</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <button id="themeToggleBtn" class="h-12 w-12 rounded-lg p-2 hover:bg-gray-100 dark:hover:bg-gray-700 mr-4" onclick="toggleDarkMode()">
                        <svg class="fill-violet-700 block dark:hidden" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg class="fill-yellow-500 hidden dark:block" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div>
                        <button type="button" class="flex text-sm hover:bg-gray-200 dark:hover:bg-gray-700 rounded-3xl"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dark:stroke-white"><path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3"/><circle cx="12" cy="10" r="3"/><circle cx="12" cy="12" r="10"/></svg>
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
    <div class="h-full px-3 pb-4 pt-4 overflow-y-auto bg-white dark:bg-gray-900">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}"
                        class="{{ Route::currentRouteNamed('dashboard') ? 'active' : '' }} sidebar-item flex items-center w-full p-2 mt-3 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="dark:stroke-white">
                        <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                        <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Route::currentRouteNamed('banners.index') || Route::currentRouteNamed('counters.create') || Route::currentRouteNamed('banners.create') || Route::currentRouteNamed('counters.index') || Route::currentRouteNamed('applications.index') || Route::currentRouteNamed('applications.create') || Route::currentRouteNamed('whychooseus.index') || Route::currentRouteNamed('whychooseus.create') || Route::currentRouteNamed('clients.index') || Route::currentRouteNamed('clients.create') || Route::currentRouteNamed('testimonials.index') || Route::currentRouteNamed('testimonials.create') || Route::currentRouteNamed('headings.edit', 6) || Route::currentRouteNamed('achievements.index') || Route::currentRouteNamed('achievements.create') || Route::currentRouteNamed('galleries.index') || Route::currentRouteNamed('galleries.create')  ? 'parent-active' : '' }}"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="dark:stroke-white">
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
                    class="space-y-2 {{ Route::currentRouteNamed('banners.index') || Route::currentRouteNamed('counters.index') || Route::currentRouteNamed('counters.create') || Route::currentRouteNamed('banners.create') || Route::currentRouteNamed('applications.index') || Route::currentRouteNamed('applications.create') || Route::currentRouteNamed('whychooseus.index') || Route::currentRouteNamed('whychooseus.create') || Route::currentRouteNamed('clients.index') || Route::currentRouteNamed('clients.create') || Route::currentRouteNamed('testimonials.index') || Route::currentRouteNamed('testimonials.create') || Route::currentRouteNamed('achievements.index') || Route::currentRouteNamed('achievements.create') || Route::currentRouteNamed('headings.edit', 6) || Route::currentRouteNamed('galleries.index') || Route::currentRouteNamed('galleries.create') ? 'block' : 'hidden' }}">
                    <li>
                        <a href="{{ route('banners.index') }}"
                            class="{{ Route::currentRouteNamed('banners.index') ? 'active' : '' }} sidebar-item flex items-center w-full p-2 mt-3 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Banners</a>
                    </li>
                    <li>
                        <a href="{{ route('counters.index') }}"
                            class="{{ Route::currentRouteNamed('counters.index') ? 'active' : '' }} sidebar-item flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Counters</a>
                    </li>
                    <li>
                        <a href="{{ route('applications.index') }}"
                            class="{{ Route::currentRouteNamed('applications.index') ? 'active' : '' }} sidebar-item flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Application</a>
                    </li>
                    <li>
                        <a href="{{ route('whychooseus.index') }}"
                            class="{{ Route::currentRouteNamed('whychooseus.index') ? 'active' : '' }} sidebar-item flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Why
                            Choose Us</a>
                    </li>
                    <li>
                        <a href="{{ route('clients.index') }}"
                            class="{{ Route::currentRouteNamed('clients.index') ? 'active' : '' }} sidebar-item flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Client</a>
                    </li>
                    <li>
                        <a href="{{ route('testimonials.index') }}"
                            class="{{ Route::currentRouteNamed('testimonials.index') ? 'active' : '' }} sidebar-item flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Testimonials</a>
                    </li>
                    <li>
                        <a href="{{ route('achievements.index') }}"
                            class="{{ Route::currentRouteNamed('achievements.index') || Route::currentRouteNamed('achievements.create') || Route::currentRouteNamed('headings.edit', 6) ? 'active' : '' }} sidebar-item flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Achievements</a>
                    </li>
                    <li>
                        <a href="{{ route('galleries.index') }}"
                            class="{{ Route::currentRouteNamed('galleries.index') || Route::currentRouteNamed('galleries.create') ? 'active' : '' }} sidebar-item flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Galleries</a>
                    </li>
                </ul>
            </li>


            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Route::currentRouteNamed('abouts.index') || Route::currentRouteNamed('abouts.edit') || Route::currentRouteNamed('missions.index') || Route::currentRouteNamed('missions.show', 1) || Route::currentRouteNamed('abouts.show', 1) || Route::currentRouteNamed('missions.edit', 1) || Route::currentRouteNamed('abouts.edit', 1) ? 'parent-active' : '' }}"
                    aria-controls="dropdown-about" data-collapse-toggle="dropdown-about">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="dark:stroke-white">
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
                            class="{{ Route::currentRouteNamed('abouts.index') ? 'active' : '' }} sidebar-item flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">About
                            Us</a>
                    </li>
                    <li>
                        <a href="{{ route('missions.index') }}"
                            class="{{ Route::currentRouteNamed('missions.index') ? 'active' : '' }} sidebar-item flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Mission
                            & Vision</a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Route::currentRouteNamed('categories.index') || Route::currentRouteNamed('categories.create') || Route::currentRouteNamed('subcategories.index') || Route::currentRouteNamed('subcategories.create') || Route::currentRouteNamed('products.index') || Route::currentRouteNamed('products.create') ? 'parent-active' : '' }}"
                    aria-controls="dropdown-product" data-collapse-toggle="dropdown-product">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="dark:stroke-white">
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
                            class="{{ Route::currentRouteNamed('categories.index') ? 'active' : '' }} sidebar-item flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Categories</a>
                    </li>
                    <li>
                        <a href="{{ route('subcategories.index') }}"
                            class="{{ Route::currentRouteNamed('subcategories.index') ? 'active' : '' }} sidebar-item flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Sub-categories</a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}"
                            class="{{ Route::currentRouteNamed('products.index') ? 'active' : '' }} sidebar-item flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Products</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('blogs.index') }}"
                    class="{{ Route::currentRouteNamed('blogs.index') || Route::currentRouteNamed('blogs.create') ? 'active' : '' }} sidebar-item flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="dark:stroke-white">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z" />
                        <path d="M14 3v5h5M16 13H8M16 17H8M10 9H8" />
                    </svg>
                    <span class="ms-3">Blogs</span>
                </a>
            </li>
            <li>
                <a href="{{ route('faqs.index') }}"
                    class="{{ Route::currentRouteNamed('faqs.index') || Route::currentRouteNamed('faqs.create') ? 'active' : '' }} sidebar-item flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                   <svg class="dark:stroke-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                    <span class="ms-3">FAQs</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Route::currentRouteNamed('headers.index') || Route::currentRouteNamed('footers.index') || Route::currentRouteNamed('menus.index') || Route::currentRouteNamed('menus.create') || Route::currentRouteNamed('staticseos.index') ? 'parent-active' : '' }}"
                    aria-controls="dropdown-settings" data-collapse-toggle="dropdown-settings">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="dark:stroke-white">
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
                            class="{{ Route::currentRouteNamed('headers.index') ? 'active' : '' }} sidebar-item flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Update
                            Header</a>
                    </li>
                    <li>
                        <a href="{{ route('footers.index') }}"
                            class="{{ Route::currentRouteNamed('footers.index') ? 'active' : '' }} sidebar-item flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Update
                            Footer</a>
                    </li>
                    <li>
                        <a href="{{ route('menus.index') }}"
                            class="{{ Route::currentRouteNamed('menus.index') || Route::currentRouteNamed('staticseos.index') || Route::currentRouteNamed('menus.create') ? 'active' : '' }} sidebar-item flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Update
                            Menu</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('backups.index') }}"
                    class="{{ Route::currentRouteNamed('backups.index') ? 'active' : '' }} sidebar-item flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="dark:stroke-white">
                        <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                        <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                        <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Data Management</span>
                </a>
            </li>
             <li>
                <a href="{{ route('SEO.index') }}"
                    class="{{ Route::currentRouteNamed('SEO.index') ? 'active' : '' }} sidebar-item flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dark:stroke-white"><path d="M12 22s-8-4.5-8-11.8A8 8 0 0 1 12 2a8 8 0 0 1 8 8.2c0 7.3-8 11.8-8 11.8z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">SEO</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<script>
    function toggleDarkMode() {
        const html = document.documentElement;
        html.classList.toggle('dark');
        const isDarkMode = html.classList.contains('dark');
        localStorage.setItem('darkMode', isDarkMode);
    }

    window.onload = function() {
        const isDarkMode = JSON.parse(localStorage.getItem('darkMode'));
        if (isDarkMode) {
            document.documentElement.classList.add('dark');
        }
    };
</script>
