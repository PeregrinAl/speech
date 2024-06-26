@php
   $cur_user = Auth::user();
   // dd($cur_user);
@endphp
<nav x-data="{ open: false }" class="bg-blue-100 border-b border-gray-100 font-mono">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">


                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex ">

                   

                <x-nav-link href="{{ route('mainpage') }}" :active="request()->routeIs('mainpage')">
                        {{ __('Кабинет') }}
                    </x-nav-link>

                @if($cur_user?->role!='patient')     
                    <x-nav-link href="{{ route('patients') }}" :active="request()->routeIs('patients')">
                            {{ __('Пациенты') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('scenarios') }}" :active="request()->routeIs('scenarios')">
                            {{ __('Сценарии') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('exercises') }}" :active="request()->routeIs('exercises')">
                            {{ __('Упражнения') }}
                    </x-nav-link>

                
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                    @if($cur_user?->role=='superadmin') 
                    <x-dropdown width="48">
                        <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-yellow-100 hover:text-gray-700 focus:outline-none focus:bg-yellow-100 active:bg-yellow-100 transition ease-in-out duration-150">
                                        Добавить упражнения

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Виды упражнений для конфигурации -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Тип упражнения') }}
                            </div>

                            <x-dropdown-link href="{{ route('sound-config') }}">
                                {{ __('Звуки') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('text-config') }}">
                                {{ __('Текст') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('breath-config') }}">
                                {{ __('Дыхание') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('answer-config') }}">
                                {{ __('Тестирование') }}
                            </x-dropdown-link>

                        </x-slot>
                    </x-dropdown>
                
                    </div>
                    @else
                    @endif
                @endif
                


                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-yellow-100 hover:text-gray-700 focus:outline-none focus:bg-yellow-100 active:bg-yellow-100 transition ease-in-out duration-150">
                                        {{ Auth::user()?->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Настройки аккаунта') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Профиль') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Выход') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('mainpage') }}" :active="request()->routeIs('mainpage')">
                {{ __('mainpage') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 me-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()?->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()?->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()?->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                 
                <x-responsive-nav-link 
                href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
