
@extends('layouts.admin')

@section('content')

    {{-- Welcome Header --}}
    <div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <p class="mb-1 text-sm font-medium text-blue-600">
                ADMINISTRATION PANEL
            </p>

            <h2 class="text-2xl font-bold text-slate-800">
                Selamat Datang, {{ auth()->user()->name }}!
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                Kelola dan pantau konten website PT Abhinaya Citra Cakra Utama.
            </p>
        </div>

        <div class="text-sm text-slate-500">
            {{ now()->translatedFormat('l, d F Y') }}
        </div>
    </div>


    {{-- Statistics --}}
    <div class="mb-8 grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

        {{-- Products --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div class="rounded-lg bg-blue-50 p-3 text-blue-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>

                <span class="text-xs font-medium text-slate-400">PRODUCTS</span>
            </div>

            <h3 class="mt-5 text-3xl font-bold text-slate-800">
                {{ $stats['products'] }}
            </h3>

            <p class="mt-1 text-sm text-slate-500">Total Produk</p>
        </div>


        {{-- Gallery --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div class="rounded-lg bg-purple-50 p-3 text-purple-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 16l4-4 4 4 4-6 4 6M4 4h16v16H4z"/>
                    </svg>
                </div>

                <span class="text-xs font-medium text-slate-400">GALLERY</span>
            </div>

            <h3 class="mt-5 text-3xl font-bold text-slate-800">
                {{ $stats['gallery'] }}
            </h3>

            <p class="mt-1 text-sm text-slate-500">Total Foto Gallery</p>
        </div>


        {{-- Clients --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div class="rounded-lg bg-emerald-50 p-3 text-emerald-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.196-2.05M17 20H7m10 0v-2c0-.732-.196-1.418-.536-2M7 20H2v-2a3 3 0 015.196-2.05M7 20v-2c0-.732.196-1.418.536-2m0 0a5 5 0 019.928 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>

                <span class="text-xs font-medium text-slate-400">CLIENTS</span>
            </div>

            <h3 class="mt-5 text-3xl font-bold text-slate-800">
                {{ $stats['clients'] }}
            </h3>

            <p class="mt-1 text-sm text-slate-500">Total Klien</p>
        </div>


        {{-- Sections --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div class="rounded-lg bg-amber-50 p-3 text-amber-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 5h16M4 12h16M4 19h16"/>
                    </svg>
                </div>

                <span class="text-xs font-medium text-slate-400">SECTIONS</span>
            </div>

            <h3 class="mt-5 text-3xl font-bold text-slate-800">
                {{ $stats['sections']['active'] }}/{{ $stats['sections']['total'] }}
            </h3>

            <p class="mt-1 text-sm text-slate-500">Section Aktif</p>
        </div>

    </div>


    {{-- Website Overview & Quick Actions --}}
    <div class="mb-8 grid grid-cols-1 gap-6 xl:grid-cols-3">

        {{-- Website Overview --}}
        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm xl:col-span-2">

            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h3 class="font-semibold text-slate-800">
                        Website Overview
                    </h3>
                    <p class="mt-1 text-sm text-slate-500">
                        Ringkasan kondisi website perusahaan.
                    </p>
                </div>

                <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-600">
                    {{ $websiteStatus }}
                </span>
            </div>

            <div class="space-y-5">

                {{-- Hero --}}
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <div>
                        <p class="text-sm font-medium text-slate-700">
                            Hero Section
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            Tampilan utama website
                        </p>
                    </div>

                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-600">
                        {{ $hero ? ucfirst($hero->hero_type) : 'Belum diatur' }}
                    </span>
                </div>

                {{-- Sections --}}
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <div>
                        <p class="text-sm font-medium text-slate-700">
                            Website Sections
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            Section yang aktif dan nonaktif
                        </p>
                    </div>

                    <span class="text-sm font-semibold text-slate-700">
                        {{ $stats['sections']['active'] }} Aktif
                        /
                        {{ $stats['sections']['inactive'] }} Nonaktif
                    </span>
                </div>

                {{-- Role --}}
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-700">
                            Login sebagai
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            Hak akses akun saat ini
                        </p>
                    </div>

                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                        {{ auth()->user()->role === 'super_admin' ? 'Super Admin' : 'Admin' }}
                    </span>
                </div>

            </div>
        </div>


        {{-- Quick Actions --}}
        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">

            <h3 class="font-semibold text-slate-800">
                Quick Actions
            </h3>

            <p class="mb-5 mt-1 text-sm text-slate-500">
                Akses cepat pengelolaan website.
            </p>

            <div class="space-y-3">

                <a href="{{ route('admin.hero.edit') }}"
                   class="flex items-center gap-3 rounded-lg border border-slate-200 p-3 transition hover:border-blue-300 hover:bg-blue-50">

                    <span class="rounded-lg bg-blue-100 p-2 text-blue-600">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M4 5h16v14H4zM8 9h8M8 13h5"/>
                        </svg>
                    </span>

                    <span class="text-sm font-medium text-slate-700">
                        Edit Hero Section
                    </span>
                </a>

                <a href="{{ route('home') }}" target="_blank"
                   class="flex items-center gap-3 rounded-lg border border-slate-200 p-3 transition hover:border-blue-300 hover:bg-blue-50">

                    <span class="rounded-lg bg-emerald-100 p-2 text-emerald-600">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M15 3h6v6m-11 5L21 3M19 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6"/>
                        </svg>
                    </span>

                    <span class="text-sm font-medium text-slate-700">
                        Lihat Website
                    </span>
                </a>

            </div>
        </div>

    </div>


    {{-- Admin Overview --}}
    @if (auth()->user()->role === 'super_admin')
        <div class="mb-8 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">
                <div>
                    <h3 class="font-semibold text-slate-800">
                        Manajemen Administrator
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Ringkasan akun administrator website.
                    </p>
                </div>

                <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-600">
                    {{ $totalAdmins }} Admin
                </span>
            </div>

            <p class="mt-4 text-sm text-slate-500">
                Kamu dapat mengelola akun Admin melalui menu Manajemen User.
            </p>

        </div>
    @endif

@endsection
