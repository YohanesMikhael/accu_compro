
<nav
    x-data="{
        open: false,
        scrolled: false,
        aboutOpen: false,
        servicesOpen: false,
        mobileAboutOpen: false,
        mobileServicesOpen: false
    }"
    @scroll.window="scrolled = window.scrollY > 20"
    class="fixed top-0 left-0 z-50 w-full px-4 pt-5 sm:px-6 lg:px-8"
>
    <div
        class="mx-auto max-w-7xl rounded-[24px] border border-slate-200/80
            bg-white/95 shadow-lg shadow-slate-900/5 backdrop-blur-xl
            transition-all duration-300 lg:rounded-full"
        :class="scrolled ? 'shadow-xl' : ''"
    >
        <div class="flex h-[72px] items-center justify-between px-5 sm:h-[84px] sm:px-8">
            {{-- LOGO --}}
            <a href="{{ url('/') }}"
                class="flex shrink-0 items-center">

                    <img
                        src="{{ asset('images/accu-logo.png') }}"
                        alt="PT Abhinaya Citra Cakra Utama"
                        class="h-auto w-[150px] object-contain sm:w-[150px] lg:w-[190px]"
                    >

            </a>

            {{-- DESKTOP MENU --}}
            <div class="hidden items-center gap-7 lg:flex">
                {{-- HOME --}}
                @foreach ($menus->where('anchor', 'home') as $menu)
                    <a href="#{{ ltrim($menu->anchor, '#') }}"
                    class="text-sm font-semibold text-slate-600 transition hover:text-accu-primary">
                        {{ $menu->label }}
                    </a>
                @endforeach

                {{-- ABOUT US DROPDOWN --}}
                <div class="relative"
                    @click.outside="aboutOpen = false">

                    <button
                        type="button"
                        @click="aboutOpen = !aboutOpen; servicesOpen = false"
                        class="inline-flex items-center gap-1 text-sm font-semibold text-slate-600 transition hover:text-accu-primary"
                    >
                        About Us

                        <svg class="h-4 w-4 transition-transform"
                            :class="aboutOpen ? 'rotate-180' : ''"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </button>

                    <div
                        x-show="aboutOpen"
                        x-cloak
                        x-transition
                        class="absolute left-0 top-full z-50 mt-4 w-56 overflow-hidden rounded-2xl border border-slate-100 bg-white py-2 shadow-xl"
                    >
                        @foreach ($menus->whereIn('anchor', ['profile', 'vision-mission', 'values']) as $menu)
                            <a href="#{{ ltrim($menu->anchor, '#') }}"
                            @click="aboutOpen = false"
                            class="block px-5 py-3 text-sm text-slate-600 transition hover:bg-blue-50 hover:text-accu-primary">
                                {{ $menu->label }}
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- SERVICES DROPDOWN --}}
                <div class="relative"
                    @click.outside="servicesOpen = false">

                    <button
                        type="button"
                        @click="servicesOpen = !servicesOpen; aboutOpen = false"
                        class="inline-flex items-center gap-1 text-sm font-semibold text-slate-600 transition hover:text-accu-primary"
                    >
                        Services

                        <svg class="h-4 w-4 transition-transform"
                            :class="servicesOpen ? 'rotate-180' : ''"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </button>

                    <div
                        x-show="servicesOpen"
                        x-cloak
                        x-transition
                        class="absolute left-0 top-full z-50 mt-4 w-60 overflow-hidden rounded-2xl border border-slate-100 bg-white py-2 shadow-xl"
                    >
                        @foreach ($menus->whereIn('anchor', ['services', 'facilities', 'catalog']) as $menu)
                            <a href="#{{ ltrim($menu->anchor, '#') }}"
                            @click="servicesOpen = false"
                            class="block px-5 py-3 text-sm text-slate-600 transition hover:bg-blue-50 hover:text-accu-primary">
                                {{ $menu->label }}
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- OTHER MENUS --}}
                @foreach ($menus->whereIn('anchor', ['clients', 'gallery']) as $menu)
                    <a href="#{{ ltrim($menu->anchor, '#') }}"
                    class="text-sm font-semibold text-slate-600 transition hover:text-accu-primary">
                        {{ $menu->label }}
                    </a>
                @endforeach

                {{-- CAREER --}}
                @if ($menus->contains('anchor', '/karir'))
                    <a href="{{ route('career.index') }}"
                        class="text-sm font-semibold text-slate-600 transition hover:text-accu-primary">
                        Career
                    </a>
                @endif
            </div>

            {{-- CONTACT BUTTON --}}
            @if ($menus->contains('anchor', 'contact'))
                <div class="hidden lg:block">
                    <a href="{{ url('/') }}#contact"
                    class="inline-flex items-center gap-2 rounded-full
                            bg-accu-primary px-6 py-3 text-sm font-semibold
                            text-white transition duration-300
                            hover:bg-accu-dark hover:shadow-lg
                            hover:shadow-blue-900/20">

                        Contact Us

                        <svg width="16" height="16"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M7 17 17 7"/>
                            <path d="M7 7h10v10"/>
                        </svg>
                    </a>
                </div>
            @endif

            {{-- MOBILE BUTTON --}}
            <button
                @click="open = !open"
                type="button"
                class="flex h-10 w-10 items-center justify-center
                    rounded-full bg-slate-100 text-accu-dark
                    transition hover:bg-slate-200 lg:hidden"
                aria-label="Toggle navigation"
                :aria-expanded="open"
            >
                <svg x-show="!open"
                    xmlns="http://www.w3.org/2000/svg"
                    width="22" height="22"
                    viewBox="0 0 24 24"
                    fill="none" stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round">
                    <path d="M4 7h16M4 12h16M4 17h16"/>
                </svg>

                <svg x-show="open"
                    x-cloak
                    xmlns="http://www.w3.org/2000/svg"
                    width="22" height="22"
                    viewBox="0 0 24 24"
                    fill="none" stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round">
                    <path d="m18 6-12 12M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- MOBILE MENU --}}
        <div
            x-show="open"
            x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click.outside="open = false"
            class="max-h-[calc(100dvh-115px)] overflow-y-auto border-t border-slate-100 px-4 pb-5 pt-3 lg:hidden"
        >
            <div class="flex flex-col gap-1">

                {{-- HOME --}}
                @foreach ($menus->where('anchor', 'home') as $menu)
                    <a href="#{{ ltrim($menu->anchor, '#') }}"
                        @click="open = false"
                        class="rounded-xl px-4 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                        {{ $menu->label }}
                    </a>
                @endforeach

                {{-- ABOUT US --}}
                <div>
                    <button
                        type="button"
                        @click="mobileAboutOpen = !mobileAboutOpen; mobileServicesOpen = false"
                        class="flex w-full items-center justify-between rounded-xl px-4 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                    >
                        About Us

                        <svg class="h-4 w-4 transition-transform"
                            :class="mobileAboutOpen ? 'rotate-180' : ''"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </button>

                    <div
                        x-show="mobileAboutOpen"
                        x-cloak
                        x-transition
                        class="ml-4 border-l-2 border-blue-100 pl-3"
                    >
                        @foreach ($menus->whereIn('anchor', ['profile', 'vision-mission', 'values']) as $menu)
                            <a href="#{{ ltrim($menu->anchor, '#') }}"
                                @click="open = false; mobileAboutOpen = false"
                                class="block rounded-lg px-4 py-3 text-sm text-slate-500 transition hover:bg-blue-50 hover:text-accu-primary">
                                {{ $menu->label }}
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- SERVICES --}}
                <div>
                    <button
                        type="button"
                        @click="mobileServicesOpen = !mobileServicesOpen; mobileAboutOpen = false"
                        class="flex w-full items-center justify-between rounded-xl px-4 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                    >
                        Services

                        <svg class="h-4 w-4 transition-transform"
                            :class="mobileServicesOpen ? 'rotate-180' : ''"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </button>

                    <div
                        x-show="mobileServicesOpen"
                        x-cloak
                        x-transition
                        class="ml-4 border-l-2 border-blue-100 pl-3"
                    >
                        @foreach ($menus->whereIn('anchor', ['services', 'facilities', 'catalog']) as $menu)
                            <a href="#{{ ltrim($menu->anchor, '#') }}"
                                @click="open = false; mobileServicesOpen = false"
                                class="block rounded-lg px-4 py-3 text-sm text-slate-500 transition hover:bg-blue-50 hover:text-accu-primary">
                                {{ $menu->label }}
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- CLIENTS & GALLERY --}}
                @foreach ($menus->whereIn('anchor', ['clients', 'gallery']) as $menu)
                    <a href="#{{ ltrim($menu->anchor, '#') }}"
                        @click="open = false"
                        class="rounded-xl px-4 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                        {{ $menu->label }}
                    </a>
                @endforeach

                {{-- CAREER --}}
                @if ($menus->contains('anchor', '/karir'))
                    <a href="{{ route('career.index') }}"
                        @click="open = false"
                        class="rounded-xl px-4 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                        Career
                    </a>
                @endif

                {{-- CONTACT --}}
                @if ($menus->contains('anchor', 'contact'))
                    <a href="{{ url('/') }}#contact"
                        @click="open = false"
                        class="mt-3 flex w-full items-center justify-center rounded-full bg-accu-primary px-5 py-3.5 text-sm font-bold text-white transition hover:bg-accu-dark">
                        Contact Us
                    </a>
                @endif

            </div>
        </div>
    </div>
</nav>
