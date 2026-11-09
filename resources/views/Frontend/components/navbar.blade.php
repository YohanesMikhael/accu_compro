
<nav
    x-data="{ open: false, scrolled: false }"
    @scroll.window="scrolled = window.scrollY > 20"
    class="fixed top-0 left-0 z-50 w-full px-4 pt-5 sm:px-6 lg:px-8"
>
    <div
        class="mx-auto max-w-7xl rounded-full border border-slate-200/80
               bg-white/95 shadow-lg shadow-slate-900/5 backdrop-blur-xl
               transition-all duration-300"
        :class="scrolled ? 'shadow-xl' : ''"
    >
        <div class="flex h-[84px] items-center justify-between px-5 sm:px-8">

            {{-- LOGO --}}
            <a href="{{ url('/') }}"
                class="flex shrink-0 items-center">

                    <img
                        src="{{ asset('images/accu-logo.png') }}"
                        alt="PT Abhinaya Citra Cakra Utama"
                        class="h-auto w-[150px] object-contain sm:w-[175px] lg:w-[190px]"
                    >

            </a>

            {{-- DESKTOP MENU --}}
            <div class="hidden items-center gap-7 lg:flex">

                <a href="#home"
                   class="text-sm font-semibold text-accu-primary">
                    Home
                </a>

                <a href="#profile"
                   class="text-sm font-medium text-slate-600 transition
                          hover:text-accu-primary">
                    About Us
                </a>

                <a href="#services"
                   class="text-sm font-medium text-slate-600 transition
                          hover:text-accu-primary">
                    Services
                </a>

                <a href="#facilities"
                   class="text-sm font-medium text-slate-600 transition
                          hover:text-accu-primary">
                    Facilities
                </a>

                <a href="#clients"
                   class="text-sm font-medium text-slate-600 transition
                          hover:text-accu-primary">
                    Our Clients
                </a>

                <a href="#catalog"
                   class="text-sm font-medium text-slate-600 transition
                          hover:text-accu-primary">
                    Catalog
                </a>

            </div>

            {{-- CONTACT BUTTON --}}
            <div class="hidden lg:block">
                <a href="#contact"
                   class="inline-flex items-center gap-2 rounded-full
                          bg-accu-primary px-6 py-3 text-sm font-semibold
                          text-white transition duration-300
                          hover:bg-accu-dark hover:shadow-lg
                          hover:shadow-blue-900/20">

                    Contact Us

                    <svg xmlns="http://www.w3.org/2000/svg"
                         width="16" height="16"
                         viewBox="0 0 24 24"
                         fill="none" stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M7 17 17 7"/>
                        <path d="M7 7h10v10"/>
                    </svg>
                </a>
            </div>

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
            class="border-t border-slate-100 px-6 pb-6 pt-3 lg:hidden"
        >

            <div class="flex flex-col gap-1">

                <a href="#home" @click="open = false"
                   class="rounded-xl bg-blue-50 px-4 py-3
                          text-sm font-semibold text-accu-primary">
                    Home
                </a>

                <a href="#profile" @click="open = false"
                   class="rounded-xl px-4 py-3 text-sm font-medium
                          text-slate-600 hover:bg-slate-50">
                    About Us
                </a>

                <a href="#services" @click="open = false"
                   class="rounded-xl px-4 py-3 text-sm font-medium
                          text-slate-600 hover:bg-slate-50">
                    Services
                </a>

                <a href="#facilities" @click="open = false"
                   class="rounded-xl px-4 py-3 text-sm font-medium
                          text-slate-600 hover:bg-slate-50">
                    Facilities
                </a>

                <a href="#clients" @click="open = false"
                   class="rounded-xl px-4 py-3 text-sm font-medium
                          text-slate-600 hover:bg-slate-50">
                    Our Clients
                </a>

                <a href="#catalog" @click="open = false"
                   class="rounded-xl px-4 py-3 text-sm font-medium
                          text-slate-600 hover:bg-slate-50">
                    Catalog
                </a>

                <a href="#contact" @click="open = false"
                   class="mt-2 rounded-full bg-accu-primary px-4 py-3
                          text-center text-sm font-semibold text-white">
                    Contact Us
                </a>

            </div>
        </div>
    </div>
</nav>
