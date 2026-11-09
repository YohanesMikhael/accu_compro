
<section id="clients" class="relative overflow-hidden bg-white py-20 sm:py-24">

    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        {{-- HEADER --}}
        <div class="mb-12 text-center">

            <span class="text-xs font-bold uppercase tracking-[0.3em] text-blue-600">
                Our Trusted Partners
            </span>

            <h2 class="mt-4 text-3xl font-extrabold text-slate-900 sm:text-4xl">
                Trusted By Our
                <span class="text-blue-700">Clients.</span>
            </h2>

            <div class="mx-auto mt-5 h-1.5 w-20 rounded-full bg-gradient-to-r from-blue-700 to-sky-400"></div>

            <p class="mx-auto mt-6 max-w-2xl text-base leading-7 text-slate-500">
                Kami bangga dapat menjadi bagian dari perjalanan dan pertumbuhan berbagai perusahaan serta mitra bisnis.
            </p>

        </div>

    </div>


    {{-- LOGO MARQUEE --}}
    <div class="relative">

        {{-- Left Gradient --}}
        <div class="pointer-events-none absolute inset-y-0 left-0 z-10 w-16 bg-gradient-to-r from-white to-transparent sm:w-32"></div>

        {{-- Right Gradient --}}
        <div class="pointer-events-none absolute inset-y-0 right-0 z-10 w-16 bg-gradient-to-l from-white to-transparent sm:w-32"></div>

        @if($clients->isNotEmpty())

            <div class="client-marquee overflow-hidden">

                <div class="client-track flex w-max items-center gap-8 sm:gap-12">

                    {{-- GROUP 1 --}}
                    <div class="flex shrink-0 items-center gap-8 sm:gap-12">

                        @foreach($clients as $client)
                            <div class="client-logo">
                                @if($client->website)
                                    <a
                                        href="{{ $client->website }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        aria-label="{{ $client->name }}"
                                    >
                                        <img
                                            src="{{ asset('storage/' . $client->logo) }}"
                                            alt="{{ $client->name }}"
                                            loading="lazy"
                                        >
                                    </a>
                                @else
                                    <img
                                        src="{{ asset('storage/' . $client->logo) }}"
                                        alt="{{ $client->name }}"
                                        loading="lazy"
                                    >
                                @endif
                            </div>
                        @endforeach

                    </div>

                    {{-- GROUP 2: DUPLICATE FOR INFINITE LOOP --}}
                    <div
                        class="flex shrink-0 items-center gap-8 sm:gap-12"
                        aria-hidden="true"
                    >

                        @foreach($clients as $client)
                            <div class="client-logo">
                                <img
                                    src="{{ asset('storage/' . $client->logo) }}"
                                    alt=""
                                >
                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        @else

            <div class="py-8 text-center text-sm text-slate-400">
                Belum ada client yang ditampilkan.
            </div>

        @endif

    </div>


    {{-- BOTTOM TEXT --}}
    <div class="mx-auto mt-12 max-w-7xl px-6 text-center lg:px-8">

        <p class="text-sm font-medium text-slate-400">
            Building Trust Through Quality and Professional Service
        </p>

    </div>

</section>
