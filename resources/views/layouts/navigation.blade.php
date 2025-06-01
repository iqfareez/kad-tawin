<nav x-data="{
    open: false,
    scrolled: false,
    init() {
        window.addEventListener('scroll', () => {
            this.scrolled = window.scrollY > 10;
        });
    }
}" :class="scrolled ? 'h-12' : 'h-16'"
    class="fixed top-0 left-0 right-0 z-50 backdrop-blur-md bg-white/80 dark:bg-gray-900/80 border-b border-gray-200/20 dark:border-gray-700/20 shadow-sm transition-all duration-300 ease-in-out">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
        <div class="flex justify-between h-full items-center">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('filament.admin.pages.dashboard') }}">
                        <x-application-logo :class="scrolled ? 'h-6 w-auto' : 'h-9 w-auto'"
                            class="block fill-current text-gray-800 dark:text-white transition-all duration-300 ease-in-out" />
                    </a>
                </div>
            </div>

            @if (Auth::check())
                <!-- Settings Dropdown Authenticated -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <div :class="scrolled ? 'text-sm' : 'text-base'"
                        class="text-gray-700 dark:text-gray-200 font-medium transition-all duration-300 ease-in-out">
                        {{ Auth::user()->name }}</div>
                </div>
            @else
                <!-- Settings Dropdown NOT Authenticated -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <a :class="scrolled ? 'text-sm px-3 py-1.5' : 'text-base px-4 py-2'"
                        class="text-gray-700 dark:text-gray-200 font-medium transition-all duration-300 ease-in-out rounded-md hover:bg-gray-100/70 dark:hover:bg-gray-800/70 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        style="transition-property: background-color, color, transform;" href="{{ route('register') }}">
                        Get Started
                    </a>
                </div>
            @endif

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" :class="scrolled ? 'p-1.5' : 'p-2'"
                    class="inline-flex items-center justify-center rounded-md text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-100 hover:bg-gray-100/50 dark:hover:bg-gray-800/50 focus:outline-none focus:bg-gray-100/50 dark:focus:bg-gray-800/50 transition-all duration-300 ease-in-out backdrop-blur-sm">
                    <svg :class="scrolled ? 'h-5 w-5' : 'h-6 w-6'"
                        class="stroke-current fill-none transition-all duration-300 ease-in-out" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }"
        class="hidden sm:hidden backdrop-blur-md bg-white/90 dark:bg-gray-900/90 border-t border-gray-200/20 dark:border-gray-700/20">
        @if (Auth::check())
            <!-- Responsive Settings Options Authenticated -->
            <div class="pt-4 pb-1">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')"
                        class="hover:bg-gray-100/50 dark:hover:bg-gray-800/50 transition-colors duration-200">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="hover:bg-gray-100/50 dark:hover:bg-gray-800/50 transition-colors duration-200">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <!-- Responsive Settings Options NOT Authenticated -->
            <div class="pt-4 pb-1">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">Welcome</div>
                    <div class="font-medium text-sm text-gray-500 dark:text-gray-400">Join our community</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('register')"
                        class="hover:bg-gray-100/50 dark:hover:bg-gray-800/50 transition-colors duration-200">
                        {{ __('Register') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('login')"
                        class="hover:bg-gray-100/50 dark:hover:bg-gray-800/50 transition-colors duration-200">
                        {{ __('Log In') }}
                    </x-responsive-nav-link>
                </div>
            </div>
        @endif

    </div>
</nav>
