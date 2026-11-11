
<div class="mt-14 grid gap-7 md:grid-cols-2 lg:grid-cols-3">

    @forelse($positions as $position)

        <div class="group relative flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-2 hover:border-accu-primary/30 hover:shadow-xl">

            {{-- TOP ACCENT --}}
            <div class="h-1.5 w-full bg-accu-primary"></div>

            <div class="flex flex-1 flex-col p-7">

                {{-- BADGE --}}
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <span class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1.5 text-xs font-bold text-accu-primary">
                        {{ $position->employment_type ?: 'Kesempatan Karir' }}
                    </span>

                    @if($position->deadline && $position->deadline->isFuture())
                        <span class="text-xs font-medium text-emerald-600">
                            <i class="fa fa-circle text-[7px]"></i>
                            Sedang Dibuka
                        </span>
                    @endif
                </div>

                {{-- TITLE --}}
                <h3 class="mt-6 text-2xl font-extrabold leading-snug text-accu-dark transition group-hover:text-accu-primary">
                    {{ $position->title }}
                </h3>

                {{-- LOCATION --}}
                <div class="mt-4 flex items-center gap-2 text-sm text-slate-500">
                    <i class="fa fa-map-marker text-accu-primary"></i>
                    <span>{{ $position->location ?: 'Lokasi tidak ditentukan' }}</span>
                </div>

                {{-- DESCRIPTION --}}
                <p class="mt-5 line-clamp-3 text-sm leading-7 text-slate-500">
                    {{ $position->description ?: 'Informasi deskripsi pekerjaan belum tersedia.' }}
                </p>

                {{-- FOOTER INFO --}}
                <div class="mt-auto pt-7">

                    <div class="mb-5 border-t border-slate-100 pt-5">
                        <div class="flex items-center justify-between gap-3">
                            <div>
                                <p class="text-xs text-slate-400">
                                    Batas Lamaran
                                </p>

                                <p class="mt-1 text-sm font-bold text-slate-700">
                                    {{ $position->deadline?->format('d M Y') ?? 'Tidak ditentukan' }}
                                </p>
                            </div>

                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-50 text-xl text-accu-primary transition group-hover:bg-blue-50">
                                <i class="fa fa-briefcase"></i>
                            </div>
                        </div>
                    </div>

                    {{-- BUTTON --}}
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
