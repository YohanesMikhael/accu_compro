@php
    use Illuminate\Support\Facades\Storage;

    $aboutTitle = $profile?->title ?? 'Mengenal Lebih Dekat ACCU';

    $aboutDescription = $profile?->description
        ?? 'PT. ABHINAYA CITRA CAKRA UTAMA (ACCU) merupakan perusahaan yang bergerak di bidang pengadaan barang dan penyedia jasa tenaga kerja yang berdiri sejak tahun 2022.';

    $aboutImage = $profile?->image
        ? Storage::url($profile->image)
        : asset('images/profile-office.png');

    $businessLicenses = $profile?->business_license
        ? preg_split('/\r\n|\r|\n/', $profile->business_license)
        : [
            'Supplier, Distributor, Perdagangan Besar Barang dan Seragam',
            'Penyedia Jasa Tenaga Kerja (CSO / OB / Kurir / Receptionist / dan tenaga kerja pendukung lainnya)',
        ];

    $companyAddress = $profile?->address
        ?? 'Perumahan Pondok Surya, Blok C No.5, Kel/Kec. Karang Tengah, Kota Tangerang – Banten 15157.';

    $coveredArea = $profile?->covered_area ?? 'Nasional';

    $companyPhone = $profile?->phone ?? '0878 6236 6096';

    $companyEmail = $profile?->email ?? 'marketing@abhinaya-accu.com';
@endphp


<section id="profile" class="relative overflow-hidden bg-slate-50 py-24 sm:py-28">

    {{-- Background Decoration --}}
    <div class="pointer-events-none absolute -right-40 top-0 h-96 w-96 rounded-full bg-blue-100/60 blur-3xl"></div>
    <div class="pointer-events-none absolute -left-40 bottom-0 h-96 w-96 rounded-full bg-sky-100/60 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-6 lg:px-8">

        {{-- SECTION HEADING --}}
        <div class="mb-14 text-center">

            <span class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-white px-4 py-2 text-xs font-bold uppercase tracking-[0.2em] text-accu-primary shadow-sm">

                <span class="h-2 w-2 rounded-full bg-green-500"></span>

                About Our Company

            </span>

            <h2 class="mt-6 text-4xl font-extrabold tracking-tight text-accu-dark sm:text-5xl lg:text-6xl">
                {{ $aboutTitle }}
            </h2>

            <div class="mx-auto mt-6 h-1.5 w-24 rounded-full bg-gradient-to-r from-accu-primary to-sky-400"></div>

            <p class="mx-auto mt-8 max-w-4xl whitespace-pre-line text-base leading-8 text-slate-600 sm:text-lg">
                {{ $aboutDescription }}
            </p>

        </div>


        {{-- COMPANY INFORMATION --}}
        <div class="grid items-start gap-8 lg:grid-cols-12">

            {{-- LEFT INFORMATION --}}
            <div class="space-y-4 lg:col-span-7">

                {{-- BUSINESS LICENSE --}}
                <div class="group flex flex-col gap-4 rounded-3xl border border-blue-100/80 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-900/5 sm:flex-row sm:items-center">

                    <div class="flex shrink-0 items-center gap-4 sm:w-52">

                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-accu-primary to-blue-700 text-white shadow-lg shadow-blue-900/20">

                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="7" width="18" height="13" rx="2"/>
                                <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                <path d="M3 12h18"/>
                                <path d="M10 12v2h4v-2"/>
                            </svg>

                        </div>

                        <h3 class="font-bold text-accu-dark">
                            Izin Usaha
                        </h3>

                    </div>

                    <div class="hidden h-12 w-px bg-blue-100 sm:block"></div>

                    <div class="flex-1 space-y-2 text-sm leading-6 text-slate-600">

                        @foreach ($businessLicenses as $license)
                            @if (trim($license) !== '')
                                <p class="flex gap-2">
                                    <span class="font-bold text-accu-primary">•</span>
                                    <span>{{ $license }}</span>
                                </p>
                            @endif
                        @endforeach

                    </div>

                </div>


                {{-- ADDRESS --}}
                <div class="group flex flex-col gap-4 rounded-3xl border border-blue-100/80 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-900/5 sm:flex-row sm:items-center">

                    <div class="flex shrink-0 items-center gap-4 sm:w-52">

                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-accu-primary to-blue-700 text-white shadow-lg shadow-blue-900/20">

                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/>
                                <circle cx="12" cy="10" r="2.5"/>
                            </svg>

                        </div>

                        <h3 class="font-bold text-accu-dark">
                            Alamat
                        </h3>

                    </div>

                    <div class="hidden h-12 w-px bg-blue-100 sm:block"></div>

                    <p class="flex-1 text-sm leading-7 text-slate-600">
                        {{ $companyAddress }}
                    </p>

                </div>


                {{-- COVERED AREA --}}
                <div class="group flex items-center gap-4 rounded-3xl border border-blue-100/80 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-900/5">

                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-accu-primary to-blue-700 text-white shadow-lg shadow-blue-900/20">

                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10Z"/>
                        </svg>

                    </div>

                    <div class="h-12 w-px bg-blue-100"></div>

                    <div>
                        <h3 class="text-sm font-bold text-accu-dark">
                            Covered Area
                        </h3>

                        <p class="mt-1 text-sm text-slate-600">
                            {{ $coveredArea }}
                        </p>
                    </div>

                </div>


                {{-- PHONE --}}
                <div class="group flex items-center gap-4 rounded-3xl border border-blue-100/80 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-900/5">

                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-accu-primary to-blue-700 text-white shadow-lg shadow-blue-900/20">

                        <svg width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 3.08 5.18 2 2 0 0 1 5.06 3h3a2 2 0 0 1 2 1.72c.12.96.35 1.9.69 2.8a2 2 0 0 1-.45 2.11L9 10.93a16 16 0 0 0 4.07 4.07l1.3-1.3a2 2 0 0 1 2.11-.45c.9.34 1.84.57 2.8.69a2 2 0 0 1 1.72 1.98Z"/>
                        </svg>

                    </div>

                    <div class="h-12 w-px bg-blue-100"></div>

                    <div>
                        <h3 class="text-sm font-bold text-accu-dark">
                            Telepon
                        </h3>

                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $companyPhone) }}"
                            class="mt-1 block text-sm text-slate-600 transition hover:text-accu-primary">
                            {{ $companyPhone }}
                        </a>
                    </div>

                </div>


                {{-- EMAIL --}}
                <div class="group flex items-center gap-4 rounded-3xl border border-blue-100/80 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-900/5">

                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-accu-primary to-blue-700 text-white shadow-lg shadow-blue-900/20">

                        <svg width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="5" width="18" height="14" rx="2"/>
                            <path d="m3 7 9 6 9-6"/>
                        </svg>

                    </div>

                    <div class="h-12 w-px bg-blue-100"></div>

                    <div>
                        <h3 class="text-sm font-bold text-accu-dark">
                            Email
                        </h3>

                        <a href="mailto:{{ $companyEmail }}"
                            class="mt-1 block break-all text-sm text-slate-600 transition hover:text-accu-primary">
                            {{ $companyEmail }}
                        </a>
                    </div>

                </div>

            </div>


            {{-- RIGHT SIDE --}}
            <div class="relative lg:col-span-5">

                <div class="sticky top-32">

                    {{-- Profile Image --}}
                    <div class="relative overflow-hidden rounded-[32px] bg-blue-100 shadow-xl shadow-blue-900/10">

                        <img
                            src="{{ $aboutImage }}"
                            alt="Lingkungan kerja profesional ACCU"
                            class="h-[350px] w-full object-cover sm:h-[420px] lg:h-[480px]"
                        >

                        <div class="absolute inset-0 bg-gradient-to-t from-accu-dark/90 via-accu-dark/10 to-transparent"></div>

                        <div class="absolute bottom-0 left-0 p-8">

                            <span class="text-xs font-bold uppercase tracking-[0.2em] text-sky-300">
                                Trusted Partner
                            </span>

                            <h3 class="mt-3 text-3xl font-extrabold leading-tight text-white">
                                For A Better Tomorrow.
                            </h3>

                            <p class="mt-3 max-w-sm text-sm leading-6 text-blue-100">
                                Menjadi mitra terpercaya dalam menyediakan solusi kebutuhan bisnis dan tenaga kerja profesional.
                            </p>

                            <div class="mt-6 h-1 w-16 rounded-full bg-gradient-to-r from-yellow-400 to-sky-400"></div>

                        </div>

                    </div>


                    {{-- Since 2022 Card --}}
                    <div class="absolute -left-5 -top-5 rounded-2xl border border-blue-100 bg-white p-5 shadow-xl sm:-left-8">

                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Established
                        </p>

                        <p class="mt-1 text-3xl font-extrabold text-accu-primary">
                            2022
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
