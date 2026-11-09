
<section id="contact" class="relative overflow-hidden bg-slate-50 py-24 sm:py-28">

    {{-- Background Decoration --}}
    <div class="pointer-events-none absolute -right-40 top-0 h-96 w-96 rounded-full bg-blue-100/60 blur-3xl"></div>
    <div class="pointer-events-none absolute -left-40 bottom-0 h-96 w-96 rounded-full bg-sky-100/50 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-6 lg:px-8">

        {{-- HEADER --}}
        <div class="relative mb-14 overflow-hidden rounded-[32px] bg-white p-8 shadow-sm ring-1 ring-slate-100 sm:p-12 lg:p-16">

            {{-- Decorative --}}
            <div class="pointer-events-none absolute -right-16 -top-20 h-64 w-64 rounded-full bg-blue-50"></div>

            <div class="relative grid items-center gap-10 lg:grid-cols-5">

                {{-- Text --}}
                <div class="lg:col-span-3">

                    <span class="text-xs font-bold uppercase tracking-[0.35em] text-blue-600">
                        Thank You For Your Trust
                    </span>

                    <h2 class="mt-5 text-5xl font-extrabold tracking-tight text-accu-dark sm:text-6xl lg:text-7xl">
                        Thank <span class="text-accu-primary">You!</span>
                    </h2>

                    <h3 class="mt-5 text-xl font-medium tracking-[0.2em] text-slate-700 sm:text-2xl">
                        LET'S GROW TOGETHER
                    </h3>

                    <div class="mt-5 h-1.5 w-32 rounded-full bg-gradient-to-r from-accu-primary via-sky-400 to-amber-400"></div>

                    <p class="mt-7 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg">
                        Terima kasih atas waktu dan kepercayaan Anda.
                        Kami siap menjadi mitra terbaik untuk mendukung
                        kebutuhan tenaga kerja dan layanan kebersihan
                        di perusahaan Anda.
                    </p>

                    @if($contact?->whatsapp)
                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $contact->whatsapp) }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="mt-8 inline-flex items-center gap-3 rounded-full bg-accu-primary px-7 py-4 text-sm font-bold text-white shadow-lg shadow-blue-900/20 transition duration-300 hover:-translate-y-1 hover:bg-blue-800">

                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20.5 3.5A11.8 11.8 0 0 0 12.1 0C5.5 0 .2 5.3.2 11.9c0 2.1.6 4.2 1.6 6L0 24l6.3-1.7a12 12 0 0 0 5.8 1.5h.1c6.5 0 11.8-5.3 11.8-11.9 0-3.2-1.2-6.2-3.5-8.4ZM12.1 21.8c-1.8 0-3.6-.5-5.1-1.4l-.4-.2-3.8 1 1-3.7-.3-.4a9.8 9.8 0 0 1-1.5-5.2C2 6.5 6.5 2 12.1 2c2.6 0 5.1 1 7 2.9a9.8 9.8 0 0 1 2.9 7c0 5.5-4.4 9.9-9.9 9.9Zm5.5-7.4c-.3-.2-1.7-.8-2-1-.3-.1-.5-.2-.7.2-.2.3-.8 1-.9 1.2-.2.2-.3.2-.6.1-.3-.2-1.2-.4-2.3-1.4-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.4.1-.6.2-.1.3-.3.5-.5.1-.2.2-.3.3-.5.1-.2 0-.4 0-.5-.1-.2-.7-1.6-1-2.2-.2-.6-.5-.5-.7-.5H8c-.2 0-.5.1-.8.4-.3.3-1.1 1-1.1 2.4s1.1 2.8 1.3 3c.1.2 2.2 3.4 5.4 4.7.8.4 1.4.6 1.9.7.8.3 1.5.2 2 .1.6-.1 1.7-.7 1.9-1.4.2-.7.2-1.3.1-1.4-.1-.2-.3-.3-.6-.4Z"/>
                            </svg>

                            Hubungi Kami Sekarang

                        </a>
                    @endif

                </div>


                {{-- Right Decoration --}}
                <div class="relative hidden lg:col-span-2 lg:block">

                    <div class="relative rounded-[32px] bg-gradient-to-br from-blue-950 via-blue-800 to-blue-600 p-8 text-white">

                        <span class="text-xs font-bold uppercase tracking-[0.25em] text-sky-300">
                            Our Commitment
                        </span>

                        <h3 class="mt-6 text-4xl font-extrabold leading-tight">
                            People Support Business
                        </h3>

                        <p class="mt-4 text-2xl font-semibold italic text-green-300">
                            For a Brighter Tomorrow.
                        </p>

                        <div class="mt-8 flex items-center gap-3">
                            <span class="h-1 w-12 rounded-full bg-amber-400"></span>
                            <span class="h-1 w-12 rounded-full bg-sky-400"></span>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- CONTACT INFORMATION --}}
        <div class="mb-12 grid gap-5 md:grid-cols-3">


            {{-- PHONE --}}
            @if($contact?->phone)
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $contact->phone) }}"
                    class="group flex items-center gap-5 rounded-3xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-blue-500 to-blue-950 text-white shadow-lg">

                        <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6.6 10.8a15.5 15.5 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.2c1.1.4 2.3.6 3.6.6a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.3.2 2.5.6 3.6a1 1 0 0 1-.2 1l-2.3 2.2Z"/>
                        </svg>

                    </div>

                    <div class="min-w-0">
                        <h4 class="font-extrabold text-accu-dark">Phone</h4>
                        <p class="mt-1 text-sm text-slate-600">
                            {{ preg_replace('/[^0-9+]/', '', $contact->phone) }}
                        </p>
                        <span class="mt-2 inline-block text-xs font-bold text-blue-600 group-hover:underline">
                            Call Us →
                        </span>
                    </div>

                </a>
            @endif


            {{-- EMAIL --}}
            @if($contact?->email)
                <a href="mailto:{{ $contact->email }}"
                    class="group flex items-center gap-5 rounded-3xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-blue-500 to-blue-950 text-white shadow-lg">

                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <rect x="2" y="4" width="20" height="16" rx="2"/>
                            <path d="m22 7-10 7L2 7"/>
                        </svg>

                    </div>

                    <div class="min-w-0">
                        <h4 class="font-extrabold text-accu-dark">Email</h4>
                        <p class="mt-1 break-all text-sm text-slate-600">
                            {{ $contact->email }}
                        </p>
                        <span class="mt-2 inline-block text-xs font-bold text-blue-600 group-hover:underline">
                            Send Email →
                        </span>
                    </div>

                </a>
            @endif


            {{-- ADDRESS --}}
            @if($contact?->address)
                <a href="{{ $contact->maps_url ?: '#' }}"
                    @if($contact->maps_url)
                        target="_blank"
                        rel="noopener noreferrer"
                    @endif
                    class="group flex items-center gap-5 rounded-3xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-blue-500 to-blue-950 text-white shadow-lg">

                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/>
                            <circle cx="12" cy="10" r="2.5"/>
                        </svg>

                    </div>

                    <div class="min-w-0">
                        <h4 class="font-extrabold text-accu-dark">Address</h4>
                        <p class="mt-1 text-sm leading-5 text-slate-600">
                            {{ $contact->address }}
                        </p>
                        <span class="mt-2 inline-block text-xs font-bold text-blue-600 group-hover:underline">
                            Get Directions →
                        </span>
                    </div>

                </a>
            @endif

        </div>


        {{-- GOOGLE MAPS --}}
        <div class="overflow-hidden rounded-[32px] border border-slate-200 bg-white shadow-sm">

            <div class="flex flex-col justify-between gap-4 p-7 sm:flex-row sm:items-center sm:px-9">

                <div>

                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-blue-600">
                        Find Our Location
                    </span>

                    <h3 class="mt-2 text-2xl font-extrabold text-accu-dark sm:text-3xl">
                        Visit Our Office.
                    </h3>

                    @if($contact?->address)
                        <p class="mt-2 text-sm text-slate-500">
                            {{ $contact->address }}
                        </p>
                    @endif

                </div>

                @if($contact?->maps_url)
                    <a href="{{ $contact->maps_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex shrink-0 items-center justify-center gap-2 rounded-full bg-accu-primary px-6 py-3 text-sm font-bold text-white transition hover:bg-blue-800">

                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/>
                            <circle cx="12" cy="10" r="2.5"/>
                        </svg>

                        Open Google Maps

                    </a>
                @endif

            </div>


            {{-- MAP EMBED --}}
            @if($contact?->maps_embed_url)
                <div class="relative h-[350px] w-full bg-slate-100 sm:h-[450px]">

                    <iframe
                        src="{{ $contact->maps_embed_url }}"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Lokasi Kantor PT Abhinaya Citra Cakra Utama">
                    </iframe>

                </div>
            @else
                <div class="flex h-[350px] items-center justify-center bg-slate-100 text-sm text-slate-500 sm:h-[450px]">
                    Google Maps belum tersedia.
                </div>
            @endif

        </div>


        {{-- BOTTOM MESSAGE --}}
        <div class="mt-14 text-center">

            <h3 class="text-2xl font-extrabold text-accu-dark sm:text-3xl">
                Let's Build a Better Tomorrow Together.
            </h3>

            <p class="mt-3 text-sm text-slate-500">
                PT. Abhinaya Citra Cakra Utama
            </p>

            <div class="mx-auto mt-5 h-1 w-20 rounded-full bg-gradient-to-r from-blue-700 to-sky-400"></div>

        </div>

    </div>

</section>
