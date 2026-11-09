
<section id="catalog" class="relative overflow-hidden bg-white py-24 sm:py-28">

    {{-- Background Decoration --}}
    <div class="pointer-events-none absolute -right-40 top-20 h-96 w-96 rounded-full bg-blue-100/50 blur-3xl"></div>
    <div class="pointer-events-none absolute -left-40 bottom-0 h-96 w-96 rounded-full bg-sky-100/50 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-6 lg:px-8">

        {{-- SECTION HEADER --}}
        <div class="mb-14 max-w-4xl">

            <span class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-4 py-2 text-xs font-bold uppercase tracking-[0.2em] text-accu-primary">

                <span class="h-2 w-2 rounded-full bg-green-500"></span>

                Our Products

            </span>

            <h2 class="mt-6 text-4xl font-extrabold tracking-tight text-accu-dark sm:text-5xl lg:text-6xl">

                Our <span class="text-accu-primary">Product.</span>

            </h2>

            <div class="mt-5 h-1.5 w-24 rounded-full bg-gradient-to-r from-accu-primary to-sky-400"></div>

            <p class="mt-7 max-w-4xl text-base leading-8 text-slate-600 sm:text-lg">

                ACCU menyediakan berbagai kebutuhan operasional pendukung yang berkualitas untuk memastikan layanan tenaga kerja dan cleaning service kami berjalan optimal, efisien, dan profesional.

            </p>

        </div>


        {{-- PRODUCT CATEGORY GRID --}}
        <div class="grid grid-cols-1 gap-7 sm:grid-cols-2 xl:grid-cols-4">


            {{-- 01 UNIFORMS --}}
            <div class="group flex flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-900/10">

                {{-- Card Header --}}
                <div class="relative flex min-h-[150px] flex-col items-center justify-center bg-gradient-to-br from-blue-50 to-white px-4 py-6 text-center">

                    <span class="absolute left-4 top-4 flex h-11 w-11 items-center justify-center rounded-full bg-accu-primary text-lg font-extrabold text-white shadow-lg">
                        01
                    </span>

                    <svg class="mb-3 text-accu-primary" width="54" height="54" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m16 3 5 3-3 5-2-1v11H8V10l-2 1-3-5 5-3c1 2 7 2 8 0Z"/>
                        <path d="M9 4c0 2 6 2 6 0"/>
                    </svg>

                    <h3 class="text-lg font-extrabold leading-tight text-accu-dark">
                        Pengadaan<br>Seragam Karyawan
                    </h3>

                </div>


                {{-- Product Image --}}
                <div class="relative h-56 overflow-hidden bg-slate-100">

                    <img
                        src="{{ asset('images/uniforms.png') }}"
                        alt="Pengadaan Seragam Karyawan ACCU"
                        class="h-full w-full object-cover transition duration-700 group-hover:scale-110"
                    >

                    <div class="absolute inset-0 bg-gradient-to-t from-accu-dark/20 to-transparent"></div>

                </div>


                {{-- Content --}}
                <div class="flex flex-1 flex-col p-6">

                    <ul class="space-y-3 text-sm leading-6 text-slate-600">

                        <li class="flex gap-2">
                            <span class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-blue-100 text-accu-primary">
                                ✓
                            </span>
                            Desain sesuai identitas perusahaan
                        </li>

                        <li class="flex gap-2">
                            <span class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-blue-100 text-accu-primary">
                                ✓
                            </span>
                            Bahan berkualitas dan nyaman digunakan
                        </li>

                        <li class="flex gap-2">
                            <span class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-blue-100 text-accu-primary">
                                ✓
                            </span>
                            Tersedia untuk berbagai posisi pekerjaan
                        </li>

                        <li class="flex gap-2">
                            <span class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-blue-100 text-accu-primary">
                                ✓
                            </span>
                            Pengadaan tepat waktu dan berkelanjutan
                        </li>

                    </ul>

                    <div class="my-5 border-t border-slate-200"></div>

                    <p class="text-sm font-medium leading-6 text-accu-dark">
                        Seragam yang profesional mencerminkan identitas dan membangun kepercayaan.
                    </p>

                    <a href="{{ url('/seragam-karyawan') }}"
                       class="mt-6 inline-flex items-center justify-center gap-2 rounded-xl bg-accu-primary px-5 py-3 text-sm font-bold text-white transition hover:bg-blue-800">

                        Lihat Produk

                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M7 17 17 7"/>
                            <path d="M7 7h10v10"/>
                        </svg>

                    </a>

                </div>

            </div>


            {{-- 02 CLEANING EQUIPMENT --}}
            <div class="group flex flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-900/10">

                <div class="relative flex min-h-[150px] flex-col items-center justify-center bg-gradient-to-br from-blue-50 to-white px-4 py-6 text-center">

                    <span class="absolute left-4 top-4 flex h-11 w-11 items-center justify-center rounded-full bg-accu-primary text-lg font-extrabold text-white shadow-lg">
                        02
                    </span>

                    <svg class="mb-3 text-accu-primary" width="54" height="54" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 3v12"/>
                        <path d="M3 15h4"/>
                        <path d="M5 15v5"/>
                        <path d="M14 3v17"/>
                        <path d="M11 20h6"/>
                        <path d="M18 7h3v13h-3z"/>
                        <path d="M17 7V4h5"/>
                    </svg>

                    <h3 class="text-lg font-extrabold leading-tight text-accu-dark">
                        Pengadaan<br>Peralatan Kebersihan
                    </h3>

                </div>

                <div class="relative h-56 overflow-hidden bg-slate-100">

                    <img
                        src="{{ asset('images/cleaning-equipment.png') }}"
                        alt="Peralatan Kebersihan ACCU"
                        class="h-full w-full object-cover transition duration-700 group-hover:scale-110"
                    >

                    <div class="absolute inset-0 bg-gradient-to-t from-accu-dark/20 to-transparent"></div>

                </div>

                <div class="flex flex-1 flex-col p-6">

                    <ul class="space-y-3 text-sm leading-6 text-slate-600">

                        <li class="flex gap-2">
                            <span class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-blue-100 text-accu-primary">✓</span>
                            Peralatan standar kualitas industri
                        </li>

                        <li class="flex gap-2">
                            <span class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-blue-100 text-accu-primary">✓</span>
                            Tersedia berbagai jenis peralatan
                        </li>

                        <li class="flex gap-2">
                            <span class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-blue-100 text-accu-primary">✓</span>
                            Pengadaan sesuai kebutuhan lokasi dan skala area
                        </li>

                        <li class="flex gap-2">
                            <span class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-blue-100 text-accu-primary">✓</span>
                            Perawatan dan penggantian berkala
                        </li>

                    </ul>

                    <div class="my-5 border-t border-slate-200"></div>

                    <p class="text-sm font-medium leading-6 text-accu-dark">
                        Peralatan yang tepat untuk hasil kerja yang maksimal.
                    </p>

                    <a href="{{ url('/peralatan-kebersihan') }}"
                       class="mt-6 inline-flex items-center justify-center gap-2 rounded-xl bg-accu-primary px-5 py-3 text-sm font-bold text-white transition hover:bg-blue-800">

                        Lihat Produk

                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M7 17 17 7"/>
                            <path d="M7 7h10v10"/>
                        </svg>

                    </a>

                </div>

            </div>


            {{-- 03 CLEANING CHEMICAL --}}
            <div class="group flex flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-900/10">

                <div class="relative flex min-h-[150px] flex-col items-center justify-center bg-gradient-to-br from-blue-50 to-white px-4 py-6 text-center">

                    <span class="absolute left-4 top-4 flex h-11 w-11 items-center justify-center rounded-full bg-accu-primary text-lg font-extrabold text-white shadow-lg">
                        03
                    </span>

                    <svg class="mb-3 text-accu-primary" width="54" height="54" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 3h6"/>
                        <path d="M10 3v5l-5.5 10a2 2 0 0 0 1.8 3h11.4a2 2 0 0 0 1.8-3L14 8V3"/>
                        <path d="M8 15h8"/>
                        <path d="m10 12 1 1 2-2"/>
                    </svg>

                    <h3 class="text-lg font-extrabold leading-tight text-accu-dark">
                        Pengadaan<br>Chemical Kebersihan
                    </h3>

                </div>

                <div class="relative h-56 overflow-hidden bg-slate-100">

                    <img
                        src="{{ asset('images/cleaning-chemical.png') }}"
                        alt="Chemical Kebersihan ACCU"
                        class="h-full w-full object-cover transition duration-700 group-hover:scale-110"
                    >

                    <div class="absolute inset-0 bg-gradient-to-t from-accu-dark/20 to-transparent"></div>

                </div>

                <div class="flex flex-1 flex-col p-6">

                    <ul class="space-y-3 text-sm leading-6 text-slate-600">

                        <li class="flex gap-2">
                            <span class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-blue-100 text-accu-primary">✓</span>
                            Produk chemical berkualitas dan aman digunakan
                        </li>

                        <li class="flex gap-2">
                            <span class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-blue-100 text-accu-primary">✓</span>
                            Tersedia untuk berbagai jenis permukaan
                        </li>

                        <li class="flex gap-2">
                            <span class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-blue-100 text-accu-primary">✓</span>
                            Ramah lingkungan (eco-friendly)
                        </li>

                        <li class="flex gap-2">
                            <span class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-blue-100 text-accu-primary">✓</span>
                            Mendukung standar kebersihan profesional
                        </li>

                    </ul>

                    <div class="my-5 border-t border-slate-200"></div>

                    <p class="text-sm font-medium leading-6 text-accu-dark">
                        Chemical yang tepat untuk lingkungan yang lebih bersih, sehat, dan aman.
                    </p>

                    <a href="{{ url('/chemical-kebersihan') }}"
                       class="mt-6 inline-flex items-center justify-center gap-2 rounded-xl bg-accu-primary px-5 py-3 text-sm font-bold text-white transition hover:bg-blue-800">

                        Lihat Produk

                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M7 17 17 7"/>
                            <path d="M7 7h10v10"/>
                        </svg>

                    </a>

                </div>

            </div>


            {{-- 04 CLEANING MACHINES --}}
            <div class="group flex flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-900/10">

                <div class="relative flex min-h-[150px] flex-col items-center justify-center bg-gradient-to-br from-blue-50 to-white px-4 py-6 text-center">

                    <span class="absolute left-4 top-4 flex h-11 w-11 items-center justify-center rounded-full bg-accu-primary text-lg font-extrabold text-white shadow-lg">
                        04
                    </span>

                    <svg class="mb-3 text-accu-primary" width="54" height="54" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 18V7a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v11"/>
                        <path d="M6 11h12"/>
                        <path d="M4 18h16"/>
                        <circle cx="8" cy="20" r="1"/>
                        <circle cx="16" cy="20" r="1"/>
                        <path d="M9 7h6"/>
                    </svg>

                    <h3 class="text-lg font-extrabold leading-tight text-accu-dark">
                        Pengadaan<br>Mesin Kebersihan
                    </h3>

                </div>

                <div class="relative h-56 overflow-hidden bg-slate-100">

                    <img
                        src="{{ asset('images/cleaning-machines.png') }}"
                        alt="Mesin Kebersihan ACCU"
                        class="h-full w-full object-cover transition duration-700 group-hover:scale-110"
                    >

                    <div class="absolute inset-0 bg-gradient-to-t from-accu-dark/20 to-transparent"></div>

                </div>

                <div class="flex flex-1 flex-col p-6">

                    <ul class="space-y-3 text-sm leading-6 text-slate-600">

                        <li class="flex gap-2">
                            <span class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-blue-100 text-accu-primary">✓</span>
                            Mesin kebersihan standar industri
                        </li>

                        <li class="flex gap-2">
                            <span class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-blue-100 text-accu-primary">✓</span>
                            Tersedia untuk kebutuhan indoor dan outdoor
                        </li>

                        <li class="flex gap-2">
                            <span class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-blue-100 text-accu-primary">✓</span>
                            Pengadaan unit baru maupun penggantian unit
                        </li>

                        <li class="flex gap-2">
                            <span class="mt-1 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-blue-100 text-accu-primary">✓</span>
                            Dukungan sparepart dan maintenance
                        </li>

                    </ul>

                    <div class="my-5 border-t border-slate-200"></div>

                    <p class="text-sm font-medium leading-6 text-accu-dark">
                        Mesin yang andal untuk kebersihan yang lebih optimal dan efisien.
                    </p>

                    <a href="{{ url('/mesin-kebersihan') }}"
                       class="mt-6 inline-flex items-center justify-center gap-2 rounded-xl bg-accu-primary px-5 py-3 text-sm font-bold text-white transition hover:bg-blue-800">

                        Lihat Produk

                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M7 17 17 7"/>
                            <path d="M7 7h10v10"/>
                        </svg>

                    </a>

                </div>

            </div>


        </div>


        {{-- BOTTOM CTA --}}
        <div class="mt-16 rounded-3xl bg-gradient-to-r from-blue-950 via-blue-900 to-blue-700 px-8 py-10 text-center sm:px-12 lg:flex lg:items-center lg:justify-between lg:text-left">

            <div>

                <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-300">
                    Quality Products, Trusted Solutions
                </span>

                <h3 class="mt-3 text-2xl font-extrabold text-white sm:text-3xl">
                    Temukan Produk yang Anda Butuhkan.
                </h3>

                <p class="mt-3 max-w-xl text-sm leading-6 text-blue-100">
                    Konsultasikan kebutuhan pengadaan produk kebersihan dan perlengkapan operasional bersama tim ACCU.
                </p>

            </div>

            <a href="#contact"
               class="mt-7 inline-flex shrink-0 items-center justify-center gap-3 rounded-full bg-white px-7 py-4 text-sm font-bold text-accu-primary transition hover:-translate-y-1 hover:bg-blue-50 lg:mt-0">

                Hubungi Kami

                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M7 17 17 7"/>
                    <path d="M7 7h10v10"/>
                </svg>

            </a>

        </div>

    </div>

</section>
