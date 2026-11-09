
<section id="services" class="relative overflow-hidden bg-slate-50 py-24 sm:py-28">

    {{-- Background Decoration --}}
    <div class="pointer-events-none absolute -right-40 top-20 h-96 w-96 rounded-full bg-blue-100/60 blur-3xl"></div>
    <div class="pointer-events-none absolute -left-40 bottom-0 h-96 w-96 rounded-full bg-sky-100/50 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-6 lg:px-8">

        {{-- SECTION HEADER --}}
        <div class="mb-14 max-w-4xl">

            <span class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-white px-4 py-2 text-xs font-bold uppercase tracking-[0.2em] text-accu-primary shadow-sm">
                <span class="h-2 w-2 rounded-full bg-green-500"></span>
                What We Offer
            </span>

            <h2 class="mt-6 text-4xl font-extrabold tracking-tight text-accu-dark sm:text-5xl lg:text-6xl">
                Our <span class="text-accu-primary">Services.</span>
            </h2>

            <div class="mt-5 h-1.5 w-24 rounded-full bg-gradient-to-r from-accu-primary to-sky-400"></div>

            <p class="mt-7 max-w-4xl text-base leading-8 text-slate-600 sm:text-lg">
                Kami menyediakan solusi tenaga kerja profesional yang dirancang untuk mendukung operasional bisnis Anda. Dengan tenaga kerja terlatih, sistem kerja yang terstandarisasi, serta komitmen terhadap kualitas layanan, ACCU siap menjadi mitra terbaik untuk berbagai kebutuhan bisnis Anda.
            </p>

        </div>

        {{-- SERVICES GRID --}}
        <div class="grid grid-cols-1 gap-7 sm:grid-cols-2 lg:grid-cols-3">

            @forelse ($services as $index => $service)

                <div class="group overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-sm transition duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-900/10">

                    {{-- Image --}}
                    <div class="relative h-60 overflow-hidden bg-blue-50">

                        @if ($service->image)
                            <img
                                src="{{ asset('storage/' . $service->image) }}"
                                alt="{{ $service->title }}"
                                loading="lazy"
                                class="h-full w-full object-cover transition duration-700 group-hover:scale-110"
                            >
                        @else
                            <div class="flex h-full items-center justify-center bg-slate-100">
                                <span class="text-sm text-slate-400">
                                    No Image Available
                                </span>
                            </div>
                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-accu-dark/40 to-transparent"></div>

                        {{-- Number --}}
                        <span class="absolute left-5 top-5 flex h-12 w-12 items-center justify-center rounded-full bg-accu-primary text-lg font-extrabold text-white shadow-lg ring-4 ring-white/30">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>

                    </div>

                    {{-- Content --}}
                    <div class="p-6">

                        <h3 class="text-xl font-extrabold text-accu-dark">
                            {{ $service->title }}
                        </h3>

                        <div class="mt-3 h-1 w-12 rounded-full bg-accu-primary"></div>

                        @php
                            $descriptionPoints = preg_split(
                                '/\r\n|\r|\n/',
                                $service->description ?? '',
                                -1,
                                PREG_SPLIT_NO_EMPTY
                            );
                        @endphp
                        <ul class="mt-5 space-y-3">
                            @foreach ($descriptionPoints as $point)
                                <li class="flex items-start gap-3 text-sm leading-relaxed text-slate-600">
                                    <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-500"></span>
                                    <span>{{ trim($point) }}</span>
                                </li>
                            @endforeach
                        </ul>

                    </div>

                </div>

            @empty

                <div class="col-span-full rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center">
                    <h3 class="text-lg font-bold text-slate-700">
                        Services Coming Soon
                    </h3>

                    <p class="mt-2 text-sm text-slate-500">
                        Informasi layanan kami akan segera tersedia.
                    </p>
                </div>

            @endforelse

        </div>

        {{-- BOTTOM CTA --}}
        <div class="mt-16 flex flex-col items-center justify-between gap-6 rounded-3xl bg-accu-dark px-8 py-10 text-center sm:flex-row sm:text-left lg:px-12">

            <div>
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-300">
                    Need Professional Support?
                </span>

                <h3 class="mt-3 text-2xl font-extrabold text-white sm:text-3xl">
                    Let's Find The Right Solution.
                </h3>

                <p class="mt-3 max-w-xl text-sm leading-6 text-blue-100">
                    Hubungi tim ACCU untuk mendapatkan solusi tenaga kerja sesuai kebutuhan bisnis Anda.
                </p>
            </div>

            <a
                href="#contact"
                class="inline-flex shrink-0 items-center gap-3 rounded-full bg-white px-7 py-4 text-sm font-bold text-accu-primary transition duration-300 hover:-translate-y-1 hover:bg-blue-50"
            >
                Konsultasi Sekarang

                <svg
                    width="18"
                    height="18"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path d="M7 17 17 7"/>
                    <path d="M7 7h10v10"/>
                </svg>
            </a>

        </div>

    </div>
</section>
