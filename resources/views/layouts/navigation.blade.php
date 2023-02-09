<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.css" rel="stylesheet" />

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    @if(Auth::user()->role_id===1)
    <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8">
    @else
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    @endif
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('all.users') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>
        @admin
        <div class="hidden py-2 space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('all.users')" :active="request()->routeIs('all.users')">
                {{ __('Dashboard') }}
            </x-nav-link>
        </div>
        <div class="hidden py-2 space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('all.roles')" :active="request()->routeIs('all.roles')">
                {{ __('Roles') }}
            </x-nav-link>
        </div>
        <div class="hidden py-2 space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('all.courses')" :active="request()->routeIs('all.courses')">
                {{ __('Courses') }}
            </x-nav-link>
        </div>
        <div class="hidden py-2 space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('all.courses.groups')" :active="request()->routeIs('all.courses.groups')">
                {{ __('Courses Groups') }}
            </x-nav-link>
        </div>
        <div class="hidden py-2 space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('all.curriculums')" :active="request()->routeIs('all.curriculums')">
                {{ __('Curriculums') }}
            </x-nav-link>
        </div>
        <div class="hidden py-2 space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('all.events')" :active="request()->routeIs('all.events')">
                {{ __('Events') }}
            </x-nav-link>
        </div>
        <div class="hidden py-2 space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('all.classes')" :active="request()->routeIs('all.classes')">
                {{ __('Classes') }}
            </x-nav-link>
        </div>
        <div class="hidden py-2 space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('all.class.course.groups')" :active="request()->routeIs('all.class.course.groups')">
                {{ __('Classes Course Groups') }}
            </x-nav-link>
        </div>
        @endadmin

            @teacher
            <div class="py-2 space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('teacher.course.groups')" :active="request()->routeIs('teacher.course.groups')">
                    {{ __('My Courses Groups') }}
                </x-nav-link>
            </div>
            <div class="py-2 space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('teacher.events')" :active="request()->routeIs('teacher.events')">
                    {{ __('School Events') }}
                </x-nav-link>
            </div>
            @endteacher


                @student
                <div class="py-2 space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('student.course.groups')" :active="request()->routeIs('student.course.groups')">
                        {{ __('My Courses Groups') }}
                    </x-nav-link>
                </div>
                <div class="py-2 space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('student.events')" :active="request()->routeIs('student.events')">
                        {{ __('School Events') }}
                    </x-nav-link>
                </div>
                @endstudent
                <div class="py-2 space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="/chatify" :active="request()->routeIs('student.events')">
                        {{ __('Chat') }}
                    </x-nav-link>
                </div>

      

    </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="capitalize">{{ Auth::user()->name." - ". Auth::user()->role->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('all.users')" :active="request()->routeIs('all.users')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 capitalize">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.js"></script>

