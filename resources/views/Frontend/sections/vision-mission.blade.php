
@php
    use App\Models\Vision;
    use App\Models\Mission;

    $vision = $vision ?? Vision::first();

    $missions = $missions ?? Mission::where('is_active', true)
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get();
@endphp

<section id="vision-mission" class="relative overflow-hidden bg-white py-24 sm:py-28">

    {{-- Background Decoration --}}
    <div class="pointer-events-none absolute -left-40 top-20 h-96 w-96 rounded-full bg-blue-50 blur-3xl"></div>
    <div class="pointer-events-none absolute -right-40 bottom-0 h-96 w-96 rounded-full bg-green-50/60 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-6 lg:px-8">

        {{-- Section Heading --}}
        <div class="mx-auto mb-16 max-w-3xl text-center">

            <span class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-4 py-2 text-xs font-bold uppercase tracking-[0.2em] text-accu-primary">
                <span class="h-2 w-2 rounded-full bg-green-500"></span>
                Our Direction
            </span>

            <h2 class="mt-6 text-4xl font-extrabold tracking-tight text-accu-dark sm:text-5xl lg:text-6xl">
                Vision
                <span class="text-green-600">&</span>
                Mission
            </h2>

            <div class="mx-auto mt-6 h-1.5 w-24 rounded-full bg-gradient-to-r from-accu-primary to-sky-400"></div>

            <p class="mt-7 text-base leading-8 text-slate-600 sm:text-lg">
                Komitmen dan arah perusahaan dalam memberikan layanan terbaik serta membangun masa depan yang lebih baik.
            </p>

        </div>

        {{-- Vision & Mission --}}
        <div class="grid gap-8 lg:grid-cols-2">

            {{-- VISION --}}
            <div class="group relative overflow-hidden rounded-[32px] border border-blue-100 bg-gradient-to-br from-blue-50 via-white to-white p-8 shadow-sm transition duration-500 hover:-translate-y-2 hover:shadow-xl hover:shadow-blue-900/10 sm:p-10">

                {{-- Decorative Circle --}}
                <div class="absolute -right-16 -top-16 h-48 w-48 rounded-full bg-blue-100/60 transition duration-500 group-hover:scale-125"></div>

                <div class="relative">

                    {{-- Icon & Title --}}
                    <div class="flex items-center gap-5">

                        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-blue-900 text-white shadow-lg shadow-blue-900/20">

                            <svg width="32" height="32"
                                 viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor"
                                 stroke-width="1.7"
                                 stroke-linecap="round"
                                 stroke-linejoin="round">

                                <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12Z"/>
                                <circle cx="12" cy="12" r="3"/>

                            </svg>

                        </div>

                        <div>
                            <span class="text-xs font-bold uppercase tracking-[0.25em] text-blue-600">
                                Our Vision
                            </span>

                            <h3 class="mt-1 text-3xl font-extrabold text-accu-dark">
                                VISI
                            </h3>
                        </div>

                    </div>

                    {{-- Divider --}}
                    <div class="my-8 h-px bg-gradient-to-r from-blue-200 via-blue-100 to-transparent"></div>

                    {{-- Vision Description --}}
                    <div class="relative">

                        <span class="absolute -left-1 -top-8 font-serif text-6xl leading-none text-blue-200">
                            “
                        </span>

                        <p class="relative whitespace-pre-line pl-5 text-xl font-medium leading-9 text-slate-700 sm:text-2xl">
                            {{ $vision?->content ?? 'Visi perusahaan belum tersedia.' }}
                        </p>

                    </div>

                    {{-- Bottom Label --}}
                    <div class="mt-10 flex items-center gap-3">

                        <div class="h-1 w-10 rounded-full bg-accu-primary"></div>

                        <span class="text-xs font-bold uppercase tracking-[0.18em] text-slate-400">
                            Our Future Direction
                        </span>

                    </div>

                </div>

            </div>

            {{-- MISSION --}}
            <div class="group relative overflow-hidden rounded-[32px] border border-green-100 bg-gradient-to-br from-green-50 via-white to-white p-8 shadow-sm transition duration-500 hover:-translate-y-2 hover:shadow-xl hover:shadow-green-900/10 sm:p-10">

                {{-- Decorative Circle --}}
                <div class="absolute -right-16 -top-16 h-48 w-48 rounded-full bg-green-100/60 transition duration-500 group-hover:scale-125"></div>

                <div class="relative">

                    {{-- Icon & Title --}}
                    <div class="flex items-center gap-5">

                        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-green-500 to-green-700 text-white shadow-lg shadow-green-900/20">

                            <svg width="32" height="32"
                                 viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor"
                                 stroke-width="1.7"
                                 stroke-linecap="round"
                                 stroke-linejoin="round">

                                <circle cx="12" cy="12" r="10"/>
                                <circle cx="12" cy="12" r="6"/>
                                <circle cx="12" cy="12" r="2"/>
                                <path d="m16.2 7.8 5-5"/>
                                <path d="M17 3h4v4"/>

                            </svg>

                        </div>

                        <div>
                            <span class="text-xs font-bold uppercase tracking-[0.25em] text-green-600">
                                Our Mission
                            </span>

                            <h3 class="mt-1 text-3xl font-extrabold text-accu-dark">
                                MISI
                            </h3>
                        </div>

                    </div>

                    {{-- Divider --}}
                    <div class="my-8 h-px bg-gradient-to-r from-green-200 via-green-100 to-transparent"></div>

                    {{-- Mission List --}}
                    <div class="relative">

                        <span class="absolute -left-1 -top-8 font-serif text-6xl leading-none text-green-200">
                            “
                        </span>

                        <div class="space-y-5 pl-5">

                            @forelse ($missions as $index => $mission)

                                <div class="flex items-start gap-4">

                                    <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-green-100 text-sm font-bold text-green-700">
                                        {{ $index + 1 }}
                                    </span>

                                    <p class="whitespace-pre-line pt-0.5 text-base font-medium leading-7 text-slate-700 sm:text-lg">
                                        {{ $mission->content }}
                                    </p>

                                </div>

                            @empty

                                <p class="text-base leading-7 text-slate-500">
                                    Misi perusahaan belum tersedia.
                                </p>

                            @endforelse

                        </div>

                    </div>

                    {{-- Bottom Label --}}
                    <div class="mt-10 flex items-center gap-3">

                        <div class="h-1 w-10 rounded-full bg-green-600"></div>

                        <span class="text-xs font-bold uppercase tracking-[0.18em] text-slate-400">
                            Our Commitment
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
