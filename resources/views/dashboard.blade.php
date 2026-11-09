@extends('layouts.admin')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-slate-800">
            Selamat Datang, {{ auth()->user()->name }}!
        </h2>
        <p class="mt-1 text-sm text-slate-500">
            Kelola konten website PT Abhinaya Citra Cakra Utama dari sini.
        </p>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
        @foreach ([
            ['title' => 'Hero Section', 'description' => 'Kelola tampilan utama website', 'icon' => '🖼️'],
            ['title' => 'Products', 'description' => 'Kelola produk perusahaan', 'icon' => '📦'],
            ['title' => 'Gallery', 'description' => 'Kelola foto kegiatan perusahaan', 'icon' => '📸'],
            ['title' => 'Clients', 'description' => 'Kelola daftar klien perusahaan', 'icon' => '🤝'],
        ] as $item)
            <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="mb-4 text-3xl">{{ $item['icon'] }}</div>
                <h3 class="font-semibold text-slate-800">{{ $item['title'] }}</h3>
                <p class="mt-1 text-sm text-slate-500">{{ $item['description'] }}</p>
            </div>
        @endforeach
    </div>
@endsection