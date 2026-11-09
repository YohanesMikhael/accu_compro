
<section
    id="gallery"
    x-data="{
        selectedImage: null,
        selectedTitle: '',
        selectedDescription: ''
    }"
    x-on:keydown.escape.window="selectedImage = null"
    class="relative overflow-hidden bg-white py-24 sm:py-28"
>

    {{-- BACKGROUND DECORATION --}}
    <div class="pointer-events-none absolute -right-40 top-20 h-96 w-96 rounded-full bg-blue-100/50 blur-3xl"></div>

    <div class="pointer-events-none absolute -left-40 bottom-0 h-96 w-96 rounded-full bg-sky-100/50 blur-3xl"></div>


    <div class="relative mx-auto max-w-7xl px-6 lg:px-8">


        {{-- ==========================================
            SECTION HEADER
        =========================================== --}}
        <div class="mb-14 text-center">

            <span class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-4 py-2 text-xs font-bold uppercase tracking-[0.25em] text-blue-700">

                <span class="h-2 w-2 rounded-full bg-green-500"></span>

                Our Moments & Activities

            </span>


            <h2 class="mt-6 text-4xl font-extrabold tracking-tight text-accu-dark sm:text-5xl lg:text-6xl">

                Our <span class="text-accu-primary">Gallery.</span>

            </h2>


            <div class="mx-auto mt-6 h-1.5 w-24 rounded-full bg-gradient-to-r from-blue-700 to-sky-400"></div>


            <p class="mx-auto mt-7 max-w-3xl text-base leading-8 text-slate-600 sm:text-lg">

                Dokumentasi berbagai kegiatan, kebersamaan, dan aktivitas internal PT. Abhinaya Citra Cakra Utama sebagai bagian dari perjalanan dan perkembangan perusahaan.

            </p>

        </div>



        {{-- ==========================================
            GALLERY GRID
        =========================================== --}}
        @if($galleries->isNotEmpty())

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 lg:gap-6">

                @foreach($galleries as $index => $gallery)

                    <div
                        class="group relative overflow-hidden rounded-3xl bg-slate-100
                        {{ $index === 0 ? 'sm:col-span-2' : '' }}"
                    >

                        <button
                            type="button"
                            @click="
                                selectedImage = {{ Js::from(asset('storage/' . $gallery->image)) }};
                                selectedTitle = {{ Js::from($gallery->title ?? '') }};
                                selectedDescription = {{ Js::from($gallery->description ?? '') }};
                            "
                            class="relative block h-72 w-full text-left sm:h-80
                            {{ $index === 0 ? 'lg:h-[420px]' : 'lg:h-72' }}"
                        >

                            {{-- IMAGE --}}
                            <img
                                src="{{ asset('storage/' . $gallery->image) }}"
                                alt="{{ $gallery->title ?? 'Dokumentasi kegiatan ACCU' }}"
                                loading="lazy"
                                class="h-full w-full object-cover transition duration-700 group-hover:scale-110"
                            >

                            {{-- OVERLAY --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-950/85 via-blue-950/10 to-transparent"></div>

                            {{-- CONTENT --}}
                            <div class="absolute bottom-0 left-0 p-6 sm:p-8">

                                @if($gallery->title)
                                    <h3 class="text-xl font-extrabold text-white sm:text-2xl">
                                        {{ $gallery->title }}
                                    </h3>
                                @endif

                                @if($gallery->description)
                                    <p class="mt-2 line-clamp-2 text-sm text-blue-100">
                                        {{ $gallery->description }}
                                    </p>
                                @endif

                            </div>

                            {{-- ZOOM ICON --}}
                            <div class="absolute right-5 top-5 flex h-11 w-11 items-center justify-center rounded-full bg-white/90 text-blue-800 opacity-0 shadow-lg transition duration-300 group-hover:opacity-100">

                                <svg
                                    width="22"
                                    height="22"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <circle cx="11" cy="11" r="7"/>
                                    <path d="m20 20-4-4M11 8v6M8 11h6"/>
                                </svg>

                            </div>

                        </button>

                    </div>

                @endforeach

            </div>

        @else

            <div class="rounded-3xl border border-slate-200 bg-slate-50 px-6 py-16 text-center">

                <svg
                    class="mx-auto h-12 w-12 text-slate-300"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.5"
                >
                    <rect x="3" y="3" width="18" height="18" rx="2"/>
                    <circle cx="8.5" cy="8.5" r="1.5"/>
                    <path d="m21 15-5-5L5 21"/>
                </svg>

                <h3 class="mt-4 font-bold text-slate-700">
                    Belum Ada Dokumentasi
                </h3>

                <p class="mt-2 text-sm text-slate-500">
                    Dokumentasi kegiatan perusahaan akan ditampilkan di sini.
                </p>

            </div>

        @endif


        {{-- ==========================================
            EMPTY STATE
        =========================================== --}}
        <div
            x-show="!$el.previousElementSibling.querySelector('[style*=display]:not([style*=none])')"
            class="hidden"
        ></div>
    </div>



    {{-- ==========================================
        LIGHTBOX MODAL
    =========================================== --}}
    <div
        x-show="selectedImage"
        x-cloak
        x-transition.opacity
        @click.self="selectedImage = null"
        class="fixed inset-0 z-[100] flex items-center justify-center bg-slate-950/95 p-5 backdrop-blur-md"
    >
        <div class="relative w-full max-w-5xl">

            {{-- CLOSE BUTTON --}}
            <button
                type="button"
                @click="selectedImage = null"
                class="absolute -right-2 -top-14 flex h-11 w-11 items-center justify-center rounded-full bg-white text-slate-900 shadow-lg transition hover:bg-blue-100 sm:-right-12 sm:top-0"
                aria-label="Close gallery"
            >
                <svg
                    width="22"
                    height="22"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path d="m18 6-12 12M6 6l12 12"/>
                </svg>
            </button>

            {{-- PREVIEW IMAGE --}}
            <img
                :src="selectedImage"
                :alt="selectedTitle"
                class="mx-auto max-h-[78vh] w-full rounded-2xl object-contain"
            >

            {{-- IMAGE INFORMATION --}}
            <div class="mt-5 text-center">

                <h3
                    x-show="selectedTitle"
                    x-text="selectedTitle"
                    class="text-xl font-bold text-white"
                ></h3>

                <p
                    x-show="selectedDescription"
                    x-text="selectedDescription"
                    class="mx-auto mt-2 max-w-2xl text-sm leading-6 text-slate-300"
                ></p>

            </div>

        </div>
    </div>


</section>
