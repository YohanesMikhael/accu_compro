@php
    $subtitle = $hero?->subtitle ?? 'YOUR FACILITY SERVICE SOLUTION';

    $headline = $hero?->headline
        ?? 'Solusi Kebersihan Profesional untuk Setiap Kebutuhan Bisnis Anda.';

    $description = $hero?->description
        ?? 'Mitra terpercaya untuk solusi kebersihan profesional yang menciptakan lingkungan kerja lebih bersih, sehat, dan nyaman.';

    $videoUrl = $hero?->video
        ? app('filesystem')->url($hero->video)
        : null;

    $posterUrl = $hero?->video_poster
        ? app('filesystem')->url($hero->video)
        : ($hero?->image
            ? app('filesystem')->url($hero->video)
            : asset('images/hero-cleaning.png'));
@endphp

{{-- HERO VIDEO CENTERED --}}
<section id="home"
    class="relative isolate flex min-h-[760px] items-end justify-center overflow-hidden bg-slate-900 pt-32 pb-16 lg:min-h-[850px] lg:pb-20">

    {{-- VIDEO BACKGROUND --}}
    <div class="absolute inset-0 -z-20">

        <video
            class="h-full w-full object-cover"
            autoplay
            muted
            loop
            playsinline
            preload="metadata"
            poster="{{ $posterUrl }}">

            <source src="{{ $videoUrl }}" type="video/mp4">

            Browser Anda tidak mendukung pemutaran video.
        </video>

    </div>

    {{-- LIGHT OVERLAY --}}
    <div class="absolute inset-0 -z-10 bg-slate-950/10"></div>

    {{-- CENTER CONTENT CARD --}}
    <div class="mx-auto w-full max-w-7xl px-5 sm:px-8 lg:px-10">

        <div class="mx-auto max-w-4xl rounded-[1.5rem] border border-blue-300/30 bg-[#061F43]/90 px-5 py-7 text-center shadow-2xl shadow-blue-950/30 backdrop-blur-sm sm:px-9 sm:py-9 lg:px-14 lg:py-10">

            {{-- SUBTITLE --}}
            @if ($subtitle)
                <span class="mb-4 block text-xs font-bold uppercase tracking-[0.2em] text-sky-400 sm:text-sm">
                    {{ $subtitle }}
                </span>
            @endif

            {{-- HEADLINE --}}
            <h1 class="mx-auto max-w-3xl text-2xl font-extrabold leading-tight tracking-tight text-white sm:text-3xl md:text-4xl lg:text-5xl">
                {{ $headline }}
            </h1>

            {{-- DESCRIPTION --}}
            @if ($description)
                <p class="mx-auto mt-4 max-w-3xl text-sm leading-7 text-white/90 sm:text-base lg:text-lg">
                    {{ $description }}
                </p>
            @endif

            {{-- BUTTONS --}}
            @if ($hero?->button_text || $hero?->secondary_button_text)
                <div class="mt-10 flex flex-wrap items-center justify-center gap-4">

                    @if ($hero?->button_text && $hero?->button_url)
                        <a href="{{ $hero->button_url }}"
                            class="inline-flex items-center justify-center gap-2 rounded-full border border-white bg-[#0866B2] px-6 py-3 text-sm font-bold text-white shadow-lg transition duration-300 hover:bg-[#075493]" >

                            {{ $hero->button_text }}

                            <span class="flex h-8 w-8 items-center justify-center text-white-700">
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
                            </span>

                        </a>
                    @endif

                    @if ($hero?->secondary_button_text && $hero?->secondary_button_url)
                        <a href="{{ $hero->secondary_button_url }}"
                            class="inline-flex items-center justify-center rounded-full border border-white/70 bg-white/10 px-7 py-4 text-base font-bold text-white transition duration-300 hover:bg-white hover:text-slate-900">

                            {{ $hero->secondary_button_text }}

                        </a>
                    @endif

                </div>
            @endif

        </div>

    </div>

</section>
