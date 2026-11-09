
@php
    $subtitle = $hero?->subtitle ?? 'Cleaning Service Solutions';

    $headline = $hero?->headline
        ?? 'Solusi Kebersihan Profesional untuk Setiap Kebutuhan Bisnis Anda.';

    $description = $hero?->description
        ?? 'Mitra terpercaya untuk solusi kebersihan profesional yang menciptakan lingkungan kerja lebih bersih, sehat, dan nyaman.';

    $imageUrl = $hero?->image
        ? Storage::url($hero->image)
        : asset('images/hero-cleaning.png');
@endphp

<section id="home"
    class="relative isolate overflow-hidden bg-white pt-36 pb-20 lg:pt-40 lg:pb-28">

    {{-- BACKGROUND DECORATION --}}
    <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute -right-40 -top-32 h-96 w-96 rounded-full bg-blue-100/60 blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 h-96 w-96 rounded-full bg-amber-100/50 blur-3xl"></div>
        <div class="absolute right-0 top-0 h-full w-1/2 bg-gradient-to-l from-blue-50/50 to-transparent"></div>
    </div>

    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        <div class="grid items-center gap-14 lg:grid-cols-2 lg:gap-16">

            {{-- LEFT CONTENT --}}
            <div class="relative z-10">

                {{-- SUBTITLE --}}
                @if ($subtitle)
                    <div class="mb-6 inline-flex items-center gap-3 rounded-full border border-blue-100 bg-blue-50 px-4 py-2">
                        <span class="h-2 w-2 rounded-full bg-blue-600"></span>

                        <span class="text-xs font-bold uppercase tracking-[0.18em] text-blue-700">
                            {{ $subtitle }}
                        </span>
                    </div>
                @endif

                {{-- HEADLINE --}}
                <h1 class="max-w-2xl text-4xl font-extrabold leading-tight tracking-tight text-slate-900 sm:text-5xl lg:text-6xl">
                    {{ $headline }}
                </h1>

                {{-- DESCRIPTION --}}
                @if ($description)
                    <p class="mt-7 max-w-xl text-base leading-8 text-slate-600 sm:text-lg">
                        {{ $description }}
                    </p>
                @endif

                {{-- BUTTONS --}}
                @if ($hero?->button_text || $hero?->secondary_button_text)
                    <div class="mt-9 flex flex-wrap items-center gap-4">

                        @if ($hero?->button_text && $hero?->button_url)
                            <a href="{{ $hero->button_url }}"
                                class="inline-flex items-center gap-3 rounded-full bg-blue-700 px-7 py-4 text-sm font-bold text-white shadow-lg shadow-blue-700/20 transition duration-300 hover:-translate-y-1 hover:bg-blue-800">

                                {{ $hero->button_text }}

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M7 17L17 7M7 7h10v10" />
                                </svg>
                            </a>
                        @endif

                        @if ($hero?->secondary_button_text && $hero?->secondary_button_url)
                            <a href="{{ $hero->secondary_button_url }}"
                                class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-7 py-4 text-sm font-bold text-slate-700 transition duration-300 hover:-translate-y-1 hover:border-blue-600 hover:text-blue-700">

                                {{ $hero->secondary_button_text }}

                            </a>
                        @endif

                    </div>
                @endif

            </div>

            {{-- RIGHT IMAGE --}}
            <div class="relative mx-auto w-full max-w-xl">

                <div class="absolute -right-5 -top-5 h-32 w-32 rounded-full border-[18px] border-blue-100"></div>
                <div class="absolute -bottom-6 -left-6 h-32 w-32 rounded-full bg-amber-100"></div>

                <div class="relative z-10 overflow-hidden rounded-[2rem] bg-slate-100 shadow-2xl shadow-slate-900/15">

                    <img
                        src="{{ $imageUrl }}"
                        alt="PT Abhinaya Citra Cakra Utama"
                        class="h-[420px] w-full object-cover sm:h-[520px]"
                        loading="eager">

                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950/80 via-slate-950/30 to-transparent p-7 sm:p-9">

                        <div class="max-w-sm">

                            <span class="text-xs font-bold uppercase tracking-[0.2em] text-blue-300">
                                ACCU Commitment
                            </span>

                            <h2 class="mt-3 text-2xl font-bold leading-snug text-white sm:text-3xl">
                                Quality Service for a Cleaner Tomorrow
                            </h2>

                            <p class="mt-3 text-sm leading-6 text-slate-200">
                                Creating cleaner and healthier environments.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- FEATURES --}}
        <div class="mt-20 grid grid-cols-1 gap-8 border-t border-slate-200 pt-10 sm:grid-cols-2 lg:grid-cols-4">

            <div>
                <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-blue-700">
                    <span class="text-xl">✓</span>
                </div>
                <h3 class="font-bold text-slate-900">Profesional</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">
                    SDM terlatih dan berpengalaman.
                </p>
            </div>

            <div>
                <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-blue-700">
                    <span class="text-xl">✓</span>
                </div>
                <h3 class="font-bold text-slate-900">Berkualitas</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Layanan sesuai standar kualitas.
                </p>
            </div>

            <div>
                <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-blue-700">
                    <span class="text-xl">✧</span>
                </div>
                <h3 class="font-bold text-slate-900">Ramah Lingkungan</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Metode pembersihan yang aman.
                </p>
            </div>

            <div>
                <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-blue-700">
                    <span class="text-xl">◎</span>
                </div>
                <h3 class="font-bold text-slate-900">Fokus Pelanggan</h3>
                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Solusi sesuai kebutuhan bisnis.
                </p>
            </div>

        </div>

    </div>

</section>
