
@extends('layouts.frontend')

@section('title', 'Karir - ACCU')

@section('content')

<section class="bg-slate-50 py-28">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        {{-- HEADER --}}
        <div class="mx-auto max-w-3xl text-center">
            <span class="inline-flex items-center rounded-full bg-blue-50 px-4 py-2 text-xs font-bold uppercase tracking-wider text-accu-primary">
                Career Opportunities
            </span>

            <h1 class="mt-6 text-4xl font-extrabold leading-tight text-accu-dark sm:text-5xl">
                Bangun Karir dan
                <span class="text-accu-primary">Masa Depan Bersama Kami</span>
            </h1>

            <p class="mt-5 text-base leading-8 text-slate-500">
                Temukan kesempatan untuk berkembang, berkontribusi, dan menjadi bagian dari perjalanan PT Abhinaya Citra Cakra Utama.
            </p>
        </div>

        {{-- JOB LIST --}}
        <div class="mt-14 space-y-6">

            @forelse($positions as $position)

                <div class="group relative flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:border-accu-primary/30 hover:shadow-xl md:flex-row">

                    <div class="h-1.5 w-full bg-accu-primary md:h-auto md:w-2"></div>

                    <div class="flex flex-1 flex-col p-7 md:flex-row md:items-center md:justify-between md:gap-8">

                        {{-- INFORMASI LOWONGAN --}}
                        <div class="min-w-0 flex-1">

                            <div class="flex flex-wrap items-center gap-3">
                                <span class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1.5 text-xs font-bold text-accu-primary">
                                    {{ $position->employment_type ?: 'Kesempatan Karir' }}
                                </span>

                                <span class="text-xs font-medium text-emerald-600">
                                    <i class="fa fa-circle text-[7px]"></i>
                                    Sedang Dibuka
                                </span>
                            </div>

                            <h3 class="mt-4 text-2xl font-extrabold leading-snug text-accu-dark transition group-hover:text-accu-primary">
                                {{ $position->title }}
                            </h3>

                            <div class="mt-3 flex flex-wrap items-center gap-4 text-sm text-slate-500">
                                <span>
                                    <i class="fa fa-map-marker mr-1 text-accu-primary"></i>
                                    {{ $position->location ?: 'Lokasi tidak ditentukan' }}
                                </span>

                                <span>
                                    <i class="fa fa-calendar mr-1 text-accu-primary"></i>
                                    Batas:
                                    {{ $position->deadline?->format('d M Y') ?? 'Tidak ditentukan' }}
                                </span>
                            </div>

                            <p class="mt-4 line-clamp-2 text-sm leading-7 text-slate-500">
                                {{ $position->description ?: 'Informasi deskripsi pekerjaan belum tersedia.' }}
                            </p>

                        </div>

                        {{-- BUTTON --}}
                        <div class="mt-6 shrink-0 md:mt-0 md:w-56">
                            <a href="{{ route('career.show', $position->slug) }}"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-accu-primary px-5 py-3.5 text-sm font-bold text-white transition duration-300 hover:bg-accu-dark">
                                Lihat Detail Lowongan
                                <i class="fa fa-arrow-right transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>

                    </div>
                </div>

            @empty

                <div class="rounded-2xl border border-slate-200 bg-white px-6 py-20 text-center md:col-span-2 lg:col-span-3">

                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-blue-50 text-3xl text-accu-primary">
                        <i class="fa fa-briefcase"></i>
                    </div>

                    <h3 class="mt-6 text-xl font-extrabold text-accu-dark">
                        Belum Ada Lowongan Tersedia
                    </h3>

                    <p class="mx-auto mt-3 max-w-md text-sm leading-7 text-slate-500">
                        Saat ini belum ada posisi yang sedang dibuka.
                        Silakan kunjungi kembali halaman ini untuk melihat peluang karir terbaru.
                    </p>

                </div>

            @endforelse

        </div>

    </div>
</section>

@endsection
