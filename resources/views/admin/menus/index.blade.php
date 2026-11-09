@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- HEADER --}}
    <div>
        <h1 class="text-2xl font-bold text-slate-800">
            Pengaturan Menu
        </h1>
        <p class="mt-1 text-sm text-slate-500">
            Atur menu yang ingin ditampilkan pada navbar website.
        </p>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))
        <div class="rounded-xl border border-green-200 bg-green-50 px-5 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    {{-- MENU LIST --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-100 px-6 py-5">
            <h2 class="font-bold text-slate-800">
                Daftar Menu Navbar
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Aktifkan atau nonaktifkan menu menggunakan tombol di sebelah kanan.
            </p>
        </div>

        <div class="divide-y divide-slate-100">

            @forelse ($menus as $menu)
                <div class="flex flex-col gap-4 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

                    {{-- MENU INFORMATION --}}
                    <div class="min-w-0">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="font-semibold text-slate-800">
                                {{ $menu->label }}
                            </h3>

                            @if ($menu->is_active)
                                <span class="rounded-full bg-green-100 px-2.5 py-1 text-xs font-semibold text-green-700">
                                    Aktif
                                </span>
                            @else
                                <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-500">
                                    Nonaktif
                                </span>
                            @endif
                        </div>

                        <div class="mt-1 space-y-1 text-xs text-slate-500">
                            <p>
                                Section:
                                {{ $menu->section?->title ?? 'Tidak terhubung' }}
                            </p>
                            <p>
                                Anchor: #{{ $menu->anchor }}
                                <span class="mx-1">•</span>
                                Urutan: {{ $menu->sort_order }}
                            </p>
                        </div>
                    </div>

                    {{-- TOGGLE FORM --}}
                    <form
                        action="{{ route('admin.menus.toggle', $menu->id) }}"
                        method="POST"
                        class="shrink-0"
                    >
                        @csrf
                        @method('PATCH')

                        <input
                            type="hidden"
                            name="is_active"
                            value="{{ $menu->is_active ? 0 : 1 }}"
                        >

                        <button
                            type="submit"
                            class="inline-flex items-center gap-3 rounded-full px-4 py-2 text-sm font-semibold transition
                            {{ $menu->is_active
                                ? 'bg-green-50 text-green-700 hover:bg-green-100'
                                : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}"
                        >
                            <span>
                                {{ $menu->is_active ? 'ON' : 'OFF' }}
                            </span>

                            <span class="relative h-6 w-11 rounded-full transition
                                {{ $menu->is_active ? 'bg-green-500' : 'bg-slate-300' }}">

                                <span class="absolute top-1 h-4 w-4 rounded-full bg-white shadow transition-all
                                    {{ $menu->is_active ? 'left-6' : 'left-1' }}">
                                </span>

                            </span>
                        </button>
                    </form>

                </div>
            @empty
                <div class="px-6 py-12 text-center text-sm text-slate-500">
                    Belum ada menu yang tersedia.
                </div>
            @endforelse

        </div>
    </div>

    {{-- INFORMATION --}}
    <div class="rounded-xl border border-blue-100 bg-blue-50 p-4">
        <div class="flex gap-3">
            <i data-lucide="info" class="h-5 w-5 shrink-0 text-blue-600"></i>
            <div class="text-sm text-blue-800">
                <p class="font-semibold">Informasi</p>
                <p class="mt-1 leading-6">
                    Menonaktifkan menu hanya menyembunyikannya dari navbar.
                    Konten section tidak dihapus. Jika section induknya
                    dinonaktifkan, menu juga tidak akan ditampilkan.
                </p>
            </div>
        </div>
    </div>

</div>
@endsection