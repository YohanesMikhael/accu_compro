<div class="mt-14 grid gap-6 md:grid-cols-2 lg:grid-cols-3">

    @forelse($positions as $position)

        <div class="group rounded-3xl border border-slate-200 bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl">

            <div class="flex items-center justify-between gap-3">
                <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-600">
                    {{ $position->employment_type ?: 'Kesempatan Karir' }}
                </span>

                <span class="text-xs text-slate-400">
                    {{ $position->location ?: 'Lokasi tidak ditentukan' }}
                </span>
            </div>

            <h3 class="mt-6 text-xl font-extrabold text-accu-dark">
                {{ $position->title }}
            </h3>

            <p class="mt-3 line-clamp-3 text-sm leading-7 text-slate-500">
                {{ $position->description }}
            </p>

            <div class="mt-6 border-t border-slate-100 pt-5">
                <p class="text-xs text-slate-400">
                    Batas Lamaran
                </p>

                <p class="mt-1 text-sm font-semibold text-slate-700">
                    {{ $position->deadline?->format('d M Y') ?? 'Tidak ditentukan' }}
                </p>
            </div>

            <a href="{{ route('career.show', $position->slug) }}"
               class="mt-6 inline-flex w-full items-center justify-center rounded-full bg-accu-primary px-5 py-3 text-sm font-bold text-white transition hover:bg-accu-dark">
                Lihat Detail Lowongan →
            </a>

        </div>

    @empty

        <div class="rounded-3xl border border-slate-200 bg-white px-6 py-16 text-center md:col-span-2 lg:col-span-3">
            <div class="text-4xl">💼</div>

            <h3 class="mt-5 text-xl font-bold text-accu-dark">
                Belum Ada Lowongan Tersedia
            </h3>

            <p class="mt-3 text-sm text-slate-500">
                Saat ini belum ada posisi yang sedang dibuka.
                Silakan kunjungi kembali halaman ini untuk melihat peluang karir terbaru.
            </p>
        </div>

    @endforelse

</div>