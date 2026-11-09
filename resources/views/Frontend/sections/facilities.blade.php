
<section id="facilities" class="relative overflow-hidden bg-slate-50 py-24 sm:py-28">

    {{-- Background Decoration --}}
    <div class="pointer-events-none absolute -left-40 top-20 h-96 w-96 rounded-full bg-blue-100/60 blur-3xl"></div>
    <div class="pointer-events-none absolute -right-40 bottom-0 h-96 w-96 rounded-full bg-sky-100/50 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-6 lg:px-8">

        {{-- SECTION HEADER --}}
        <div class="mb-14">

            <div class="text-center">

                <span class="text-xs font-bold uppercase tracking-[0.35em] text-accu-primary">
                    Cleaning Service Solutions
                </span>

                <h2 class="mt-5 text-4xl font-extrabold tracking-tight text-accu-dark sm:text-5xl lg:text-6xl">
                    Sarana Kendaraan
                    <span class="text-accu-primary">Operasional</span>
                </h2>

                <div class="mx-auto mt-6 h-1.5 w-24 rounded-full bg-gradient-to-r from-accu-primary to-sky-400"></div>

                <p class="mx-auto mt-7 max-w-3xl text-base leading-8 text-slate-600 sm:text-lg">
                    Didukung oleh armada kendaraan yang andal dan terawat, kami memastikan kelancaran operasional dan pengiriman ke seluruh wilayah Indonesia.
                </p>

            </div>

        </div>

        {{-- VEHICLE FLEET --}}
        <div class="mb-20">

            <div class="mb-8 flex items-center justify-between gap-4">
                <div>
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-accu-primary">
                        Our Fleet
                    </span>

                    <h3 class="mt-2 text-2xl font-extrabold text-accu-dark sm:text-3xl">
                        Armada Kendaraan Kami
                    </h3>
                </div>

                <div class="hidden rounded-full border border-blue-100 bg-white px-4 py-2 text-sm font-semibold text-accu-primary sm:block">
                    {{ str_pad($facilities->count(), 2, '0', STR_PAD_LEFT) }} Jenis Armada
                </div>
            </div>

            {{-- VEHICLE GRID --}}
            <div class="grid gap-7 lg:grid-cols-2">

                @forelse ($facilities as $index => $facility)

                    <div class="group overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-500 hover:-translate-y-2 hover:shadow-xl">

                        {{-- IMAGE --}}
                        <div class="relative flex min-h-[290px] items-center justify-center overflow-hidden bg-gradient-to-br from-blue-50 via-white to-slate-100 p-5">

                            {{-- NUMBER --}}
                            <span class="absolute left-0 top-0 rounded-br-[32px] bg-gradient-to-r from-blue-700 to-blue-500 px-8 py-4 text-2xl font-extrabold text-white shadow-lg">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>

                            {{-- TYPE LABEL --}}
                            @if ($facility->type)
                                <div class="absolute right-5 top-5 rounded-xl bg-blue-100 px-4 py-2 text-xs font-bold text-blue-900">
                                    {{ $facility->type }}
                                </div>
                            @endif

                            {{-- VEHICLE IMAGE --}}
                            @if ($facility->image)
                                <img
                                    src="{{ asset('storage/' . $facility->image) }}"
                                    alt="{{ $facility->name }}"
                                    loading="lazy"
                                    class="mt-10 h-52 w-full object-contain transition duration-700 group-hover:scale-105"
                                >
                            @else
                                <div class="mt-10 flex h-52 w-full flex-col items-center justify-center text-slate-300">
                                    <svg
                                        class="h-16 w-16"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                    >
                                        <path d="M3 7h11v11H3z"/>
                                        <path d="M14 11h4l3 4v3h-7z"/>
                                        <circle cx="7.5" cy="18.5" r="1.5"/>
                                        <circle cx="17.5" cy="18.5" r="1.5"/>
                                    </svg>
                                    <span class="mt-2 text-xs">No Image Available</span>
                                </div>
                            @endif

                        </div>

                        {{-- VEHICLE CONTENT --}}
                        <div class="p-6">

                            <h4 class="text-2xl font-extrabold text-accu-dark">
                                {{ $facility->name }}
                            </h4>

                            <p class="mt-2 text-sm leading-6 text-slate-500">
                                {{ $facility->description }}
                            </p>

                            <div class="my-6 border-t border-slate-100"></div>

                            {{-- VEHICLE INFORMATION --}}
                            <div class="grid grid-cols-3 gap-3">

                                {{-- QUANTITY --}}
                                <div class="text-center">
                                    <div class="mx-auto flex h-11 w-11 items-center justify-center rounded-full bg-blue-50 text-accu-primary">
                                        <svg
                                            width="22"
                                            height="22"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.8"
                                        >
                                            <path d="M3 7h11v11H3z"/>
                                            <path d="M14 11h4l3 4v3h-7z"/>
                                            <circle cx="7.5" cy="18.5" r="1.5"/>
                                            <circle cx="17.5" cy="18.5" r="1.5"/>
                                        </svg>
                                    </div>

                                    <p class="mt-3 text-xs text-slate-500">
                                        Jumlah
                                    </p>

                                    <p class="text-sm font-bold text-accu-dark">
                                        {{ $facility->quantity }}
                                    </p>
                                </div>

                                {{-- TYPE --}}
                                <div class="border-x border-slate-100 text-center">
                                    <div class="mx-auto flex h-11 w-11 items-center justify-center rounded-full bg-blue-50 text-accu-primary">
                                        <svg
                                            width="22"
                                            height="22"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.8"
                                        >
                                            <rect x="3" y="5" width="18" height="14" rx="2"/>
                                            <circle cx="12" cy="12" r="3"/>
                                            <path d="M7 5V3h10v2"/>
                                        </svg>
                                    </div>

                                    <p class="mt-3 text-xs text-slate-500">
                                        Jenis
                                    </p>

                                    <p class="text-sm font-bold text-accu-dark">
                                        {{ $facility->type ?: '-' }}
                                    </p>
                                </div>

                                {{-- CAPACITY --}}
                                <div class="text-center">
                                    <div class="mx-auto flex h-11 w-11 items-center justify-center rounded-full bg-blue-50 text-accu-primary">
                                        <svg
                                            width="22"
                                            height="22"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.8"
                                        >
                                            <path d="m12 2 9 5-9 5-9-5 9-5Z"/>
                                            <path d="m3 7 9 5 9-5"/>
                                            <path d="M3 7v10l9 5 9-5V7"/>
                                            <path d="M12 12v10"/>
                                        </svg>
                                    </div>

                                    <p class="mt-3 text-xs text-slate-500">
                                        Kapasitas
                                    </p>

                                    <p class="text-sm font-bold text-accu-dark">
                                        {{ $facility->capacity }}
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-span-full rounded-3xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center">
                        <p class="text-lg font-bold text-slate-700">
                            Armada Kendaraan Belum Tersedia
                        </p>

                        <p class="mt-2 text-sm text-slate-500">
                            Informasi kendaraan operasional akan segera diperbarui.
                        </p>
                    </div>

                @endforelse

            </div>

        </div>

        {{-- COVERED AREA --}}
        <div class="mb-20 overflow-hidden rounded-[32px] border border-blue-100 bg-white shadow-sm">

            <div class="grid items-center gap-8 p-7 lg:grid-cols-5 lg:p-10">

                {{-- Area Information --}}
                <div class="lg:col-span-2">

                    <div class="flex items-center gap-4">

                        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-blue-500 to-blue-950 text-white shadow-lg">

                            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/>
                                <circle cx="12" cy="10" r="2.5"/>
                            </svg>

                        </div>

                        <div>
                            <span class="text-xs font-bold uppercase tracking-[0.2em] text-blue-500">
                                Our Coverage
                            </span>

                            <h3 class="text-xl font-extrabold text-accu-dark sm:text-2xl">
                                Covered Area Pengiriman
                            </h3>
                        </div>

                    </div>


                    <ul class="mt-8 space-y-4">

                        @foreach (['Sumatera', 'Jawa', 'Kalimantan', 'Sulawesi', 'Indonesia Timur'] as $area)

                            <li class="flex items-center gap-3">

                                <span class="flex h-7 w-7 items-center justify-center rounded-full bg-accu-primary text-white">

                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                        <path d="m5 12 4 4L19 6"/>
                                    </svg>

                                </span>

                                <span class="font-medium text-slate-700">
                                    {{ $area }}
                                </span>

                            </li>

                        @endforeach

                    </ul>

                </div>


                {{-- Indonesia Map --}}
                <div class="lg:col-span-3">

                    <div class="relative overflow-hidden rounded-2xl bg-blue-50/50 p-4">

                        <img
                            src="{{ asset('images/indonesia-map.png') }}"
                            alt="Peta jangkauan operasional ACCU di Indonesia"
                            class="h-64 w-full object-contain sm:h-80"
                        >

                        <div class="absolute bottom-5 right-5 rounded-full border border-blue-100 bg-white/90 px-4 py-2 text-xs font-bold text-accu-primary shadow-sm">
                            Nationwide Coverage
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- DELIVERY VAN BANNER --}}
        <div class="relative overflow-hidden rounded-[32px] bg-gradient-to-br from-blue-950 via-blue-900 to-blue-700">

            {{-- Image --}}
            <div class="relative h-72 overflow-hidden sm:h-96 lg:h-[480px]">

                <img
                    src="{{ asset('images/delivery-van.jfif') }}"
                    alt="Kendaraan operasional ACCU"
                    class="h-full w-full object-cover object-center"
                >

                <div class="absolute inset-0 bg-gradient-to-t from-blue-950/80 via-blue-950/10 to-transparent lg:bg-gradient-to-r lg:from-blue-950/80 lg:via-blue-950/20 lg:to-transparent"></div>

                <div class="absolute bottom-7 left-7 right-7 sm:bottom-10 sm:left-10 lg:max-w-lg">

                    <span class="text-xs font-bold uppercase tracking-[0.25em] text-sky-300">
                        On Time, Everywhere
                    </span>

                    <h3 class="mt-3 text-3xl font-extrabold leading-tight text-white sm:text-4xl lg:text-5xl">
                        For a Cleaner Tomorrow.
                    </h3>

                    <p class="mt-4 text-sm leading-7 text-blue-100 sm:text-base">
                        Didukung armada yang terawat dan tim profesional untuk menunjang kelancaran setiap kebutuhan operasional.
                    </p>

                </div>

            </div>


            {{-- Advantages --}}
            <div class="grid grid-cols-2 gap-5 px-6 py-9 sm:grid-cols-4 sm:px-10">

                {{-- Advantage 1 --}}
                <div class="flex flex-col items-center text-center">

                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-white text-blue-900 shadow-lg">
                        <svg width="29" height="29" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11Z"/>
                            <path d="m9 12 2 2 4-4"/>
                        </svg>
                    </div>

                    <p class="mt-3 text-sm font-bold text-white">
                        Armada Terawat
                    </p>

                </div>


                {{-- Advantage 2 --}}
                <div class="flex flex-col items-center border-white/20 text-center sm:border-l">

                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-white text-blue-900 shadow-lg">
                        <svg width="29" height="29" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <circle cx="12" cy="12" r="9"/>
                            <path d="M12 7v5l3 2"/>
                        </svg>
                    </div>

                    <p class="mt-3 text-sm font-bold text-white">
                        Pengiriman Tepat Waktu
                    </p>

                </div>


                {{-- Advantage 3 --}}
                <div class="flex flex-col items-center border-white/20 text-center sm:border-l">

                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-white text-blue-900 shadow-lg">
                        <svg width="29" height="29" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/>
                            <circle cx="12" cy="10" r="2.5"/>
                        </svg>
                    </div>

                    <p class="mt-3 text-sm font-bold text-white">
                        Jangkauan Luas Indonesia
                    </p>

                </div>


                {{-- Advantage 4 --}}
                <div class="flex flex-col items-center border-white/20 text-center sm:border-l">

                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-white text-blue-900 shadow-lg">
                        <svg width="29" height="29" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <circle cx="9" cy="8" r="3"/>
                            <circle cx="17" cy="9" r="2"/>
                            <path d="M3 20a6 6 0 0 1 12 0"/>
                            <path d="M15 15a5 5 0 0 1 6 5"/>
                        </svg>
                    </div>

                    <p class="mt-3 text-sm font-bold text-white">
                        Didukung Tim Profesional
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>
