
@extends('layouts.admin')

@section('title', 'Product Categories')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Product Categories</h1>
            <p class="mt-1 text-sm text-slate-500">
                Kelola kategori produk yang ditampilkan pada halaman katalog website.
            </p>
        </div>

        <a href="{{ route('admin.product-categories.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">
            <i class="fa fa-plus"></i>
            Tambah Kategori
        </a>
    </div>

    {{-- Alert --}}
    @if (session('success'))
        <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            <i class="fa fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            <i class="fa fa-exclamation-circle mr-2"></i>
            {{ session('error') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-200 px-6 py-4">
            <h2 class="font-semibold text-slate-800">Daftar Kategori</h2>
            <p class="mt-1 text-sm text-slate-500">
                Total {{ $categories->count() }} kategori produk.
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px] text-left text-sm">
                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Slug</th>
                        <th class="px-6 py-4 text-center">Urutan</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($categories as $category)
                        <tr class="transition hover:bg-slate-50">
                            <td class="px-6 py-4 text-slate-500">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if ($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}"
                                             alt="{{ $category->name }}"
                                             class="h-12 w-12 rounded-lg border border-slate-200 object-cover">
                                    @else
                                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-slate-100 text-slate-400">
                                            <i class="fa fa-image text-lg"></i>
                                        </div>
                                    @endif

                                    <div>
                                        <p class="font-semibold text-slate-800">
                                            {{ $category->name }}
                                        </p>
                                        <p class="mt-1 text-xs text-slate-500">
                                            {{ $category->products()->count() }} produk
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $category->slug }}
                            </td>

                            <td class="px-6 py-4 text-center text-slate-600">
                                {{ $category->sort_order }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                @if ($category->is_active)
                                    <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                                        Tidak Aktif
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.product-categories.edit', $category->id) }}"
                                       class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-blue-50 text-blue-600 transition hover:bg-blue-100"
                                       title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <form action="{{ route('admin.product-categories.destroy', $category->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-red-50 text-red-600 transition hover:bg-red-100"
                                                title="Hapus">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <i class="fa fa-tags mb-3 text-4xl text-slate-300"></i>
                                    <p class="font-medium text-slate-600">
                                        Belum ada kategori produk
                                    </p>
                                    <p class="mt-1 text-sm text-slate-400">
                                        Silakan tambahkan kategori produk terlebih dahulu.
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
