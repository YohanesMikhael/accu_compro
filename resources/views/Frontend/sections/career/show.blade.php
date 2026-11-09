@extends('layouts.frontend')

@section('title', $position->title . ' - Karir ACCU')

@section('content')

<section class="bg-slate-50 py-28">
    <div class="mx-auto max-w-4xl px-6 lg:px-8">

        <a href="{{ route('career.index') }}"
           class="text-sm font-semibold text-blue-600 hover:underline">
            ← Kembali ke Karir
        </a>

        <div class="mt-8 rounded-3xl border border-slate-200 bg-white p-7 shadow-sm sm:p-10">

            <span class="rounded-full bg-blue-50 px-4 py-2 text-xs font-bold text-blue-600">
                {{ $position->employment_type ?: 'Kesempatan Karir' }}
            </span>

            <h1 class="mt-6 text-3xl font-extrabold text-accu-dark sm:text-4xl">
                {{ $position->title }}
            </h1>

            <div class="mt-4 flex flex-wrap gap-4 text-sm text-slate-500">
                <span>📍 {{ $position->location ?: 'Lokasi tidak ditentukan' }}</span>

                <span>
                    📅 Deadline:
                    {{ $position->deadline?->format('d M Y') ?? 'Tidak ditentukan' }}
                </span>
            </div>

            <hr class="my-8">

            <h2 class="text-xl font-bold text-accu-dark">
                Deskripsi Pekerjaan
            </h2>

            <div class="mt-4 whitespace-pre-line text-sm leading-8 text-slate-600">
                {{ $position->description ?: 'Informasi deskripsi belum tersedia.' }}
            </div>

            <h2 class="mt-10 text-xl font-bold text-accu-dark">
                Kualifikasi
            </h2>

            <div class="mt-4 whitespace-pre-line text-sm leading-8 text-slate-600">
                {{ $position->requirements ?: 'Informasi kualifikasi belum tersedia.' }}
            </div>

            @if($position->application_url)
                <a href="{{ $position->application_url }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="mt-10 inline-flex items-center justify-center rounded-full bg-blue-600 px-8 py-4 text-sm font-bold text-white transition hover:bg-blue-700">
                    Lamar Sekarang →
                </a>
            @endif

        </div>

    </div>
</section>

@endsection