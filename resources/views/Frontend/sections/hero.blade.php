
@php
    $heroSubtitle = $hero?->subtitle ?? 'YOUR FACILITY SERVICE SOLUTION';

    $heroHeadline = $hero?->headline
        ?? 'Solusi Kebersihan Profesional untuk Setiap Kebutuhan Bisnis Anda.';

    $heroDescription = $hero?->description
        ?? 'Mitra terpercaya untuk solusi kebersihan profesional yang menciptakan lingkungan kerja lebih bersih, sehat, dan nyaman.';

    $heroImage = $hero?->image
        ? Storage::url($hero->image)
        : asset('images/hero-cleaning.png');

    $heroVideo = $hero?->video
        ? Storage::url($hero->video)
        : null;

    $heroPoster = $hero?->video_poster
        ? Storage::url($hero->video_poster)
        : $heroImage;

    $isVideo = $hero?->hero_type === 'video' && $heroVideo;
@endphp

{{-- HERO FULL WIDTH VIDEO BANNER --}}
<section id="home"
    class="relative isolate flex min-h-[620px] items-center overflow-hidden bg-slate-950 lg:min-h-[720px]">

    {{-- BACKGROUND MEDIA --}}
    <div class="absolute inset-0 -z-20">

        @if ($isVideo)

            <video
                class="h-full w-full object-cover"
                autoplay
                muted
                loop
                playsinline
                preload="metadata"
                poster="{{ $heroPoster }}">

                <source src="{{ $heroVideo }}" type="video/mp4">

                Browser Anda tidak mendukung pemutaran video.
            </video>

        @else

            <img
                src="{{ $heroImage }}"
                alt="PT Abhinaya Citra Cakra Utama"
                class="h-full w-full object-cover"
                fetchpriority="high">

        @endif

    </div>

    {{-- DARK OVERLAY --}}
    <div class="absolute inset-0 -z-10 bg-slate-950/55"></div>

    {{-- GRADIENT OVERLAY --}}
    <div class="absolute inset-0 -z-10 bg-gradient-to-r from-slate-950/90 via-slate-950/55 to-slate-950/10"></div>

    <div class="mx-auto w-full max-w-7xl px-6 py-32 lg:px-8 lg:py-40">

        <div class="max-w-3xl">

            {{-- SUBTITLE --}}
            @if ($heroSubtitle)
                <div class="mb-7 inline-flex items-center gap-3">

                    <span class="h-[2px] w-10 bg-sky-400"></span>

                    <span class="text-xs font-bold uppercase tracking-[0.25em] text-sky-300 sm:text-sm">
                        {{ $heroSubtitle }}
                    </span>

                </div>
            @endif

            {{-- HEADLINE --}}
            <h1 class="max-w-3xl text-4xl font-extrabold leading-[1.15] tracking-tight text-white sm:text-5xl lg:text-7xl">
                {{ $heroHeadline }}
            </h1>

            {{-- DESCRIPTION --}}
            @if ($heroDescription)
                <p class="mt-7 max-w-2xl text-base leading-8 text-slate-200 sm:text-lg lg:text-xl">
                    {{ $heroDescription }}
                </p>
            @endif

            {{-- BUTTONS --}}
            @if ($hero?->button_text || $hero?->secondary_button_text)

                <div class="mt-10 flex flex-wrap items-center gap-4">

                    @if ($hero?->button_text && $hero?->button_url)

                        <a href="{{ $hero->button_url }}"
                            class="inline-flex items-center justify-center gap-3 rounded-full bg-blue-700 px-8 py-4 text-sm font-bold text-white shadow-xl shadow-blue-950/30 transition duration-300 hover:-translate-y-1 hover:bg-blue-600">

                            {{ $hero->button_text }}

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
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
                            class="inline-flex items-center justify-center rounded-full border border-white/50 bg-white/10 px-8 py-4 text-sm font-bold text-white backdrop-blur-sm transition duration-300 hover:-translate-y-1 hover:bg-white hover:text-slate-900">

                            {{ $hero->secondary_button_text }}

                        </a>

                    @endif

                </div>

            @endif

        </div>

    </div>

    {{-- BOTTOM INDICATOR --}}
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-white/10">
        <div class="h-full w-1/3 bg-sky-400"></div>
    </div>

    {{-- SCROLL INDICATOR --}}
    <a href="#about"
        class="absolute bottom-10 right-8 hidden items-center gap-3 text-xs font-semibold uppercase tracking-widest text-white/80 transition hover:text-white lg:flex">

        Scroll to Explore

        <span class="flex h-9 w-9 items-center justify-center rounded-full border border-white/40">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M19 9l-7 7-7-7" />
            </svg>
        </span>

    </a>

</section>


{{-- ACCU FEATURES --}}
<section class="relative bg-white py-12 lg:py-16">

    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">

            {{-- FEATURE 1 --}}
            <div class="flex gap-4">

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-700">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 12l2 2 4-4m5-1a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                </div>

                <div>
                    <h3 class="font-bold text-slate-900">Profesional</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        SDM terlatih dan berpengalaman.
                    </p>
                </div>

            </div>

            {{-- FEATURE 2 --}}
            <div class="flex gap-4">

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-700">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 13l4 4L19 7" />
                    </svg>

                </div>

                <div>
                    <h3 class="font-bold text-slate-900">Berkualitas</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Layanan sesuai standar kualitas.
                    </p>
                </div>

            </div>

            {{-- FEATURE 3 --}}
            <div class="flex gap-4">

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-700">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364l-1.414 1.414M7.05 16.95l-1.414 1.414m12.728 0l-1.414-1.414M7.05 7.05L5.636 5.636M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>

                </div>

                <div>
                    <h3 class="font-bold text-slate-900">Ramah Lingkungan</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Metode pembersihan yang aman.
                    </p>
                </div>

            </div>

            {{-- FEATURE 4 --}}
            <div class="flex gap-4">

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-700">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17 20h5v-2a3 3 0 00-5.196-2.04M17 20H7m10 0v-2c0-.728-.195-1.41-.536-2M7 20H2v-2a3 3 0 015.196-2.04M7 20v-2c0-.728.195-1.41.536-2m0 0a5.002 5.002 0 019.928 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>

                </div>

                <div>
                    <h3 class="font-bold text-slate-900">Fokus Pelanggan</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Solusi sesuai kebutuhan bisnis.
                    </p>
                </div>

            </div>

        </div>

    </div>

</section>
