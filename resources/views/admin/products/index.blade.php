
@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Products</h1>
            <p class="mt-1 text-sm text-slate-500">
                Kelola produk yang ditampilkan pada katalog website ACCU.
            </p>
        </div>

        <a href="{{ route('admin.products.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">
            <i class="fa fa-plus"></i>
            Tambah Produk
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
            <h2 class="font-semibold text-slate-800">Daftar Produk</h2>
            <p class="mt-1 text-sm text-slate-500">
                Total {{ $products->count() }} produk.
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[1000px] text-left text-sm">

                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Produk</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Katalog</th>
                        <th class="px-6 py-4 text-center">Urutan</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($products as $product)
                        <tr class="transition hover:bg-slate-50">

                            <td class="px-6 py-4 text-slate-500">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                             alt="{{ $product->name }}"
                                             class="h-14 w-14 rounded-lg border border-slate-200 object-cover">
                                    @else
                                        <div class="flex h-14 w-14 items-center justify-center rounded-lg bg-slate-100 text-slate-400">
                                            <i class="fa fa-image text-xl"></i>
                                        </div>
                                    @endif

                                    <div>
                                        <p class="font-semibold text-slate-800">
                                            {{ $product->name }}
                                        </p>
                                        @if ($product->subtitle)
                                            <p class="mt-1 text-xs text-slate-500">
                                                {{ $product->subtitle }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                @if ($product->category)
                                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-medium text-blue-700">
                                        {{ $product->category->name }}
                                    </span>
                                @else
                                    <span class="text-xs text-red-500">
                                        Kategori tidak ditemukan
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                @if ($product->catalog_file)
                                    <a href="{{ asset('storage/' . $product->catalog_file) }}"
                                       target="_blank"
                                       class="inline-flex items-center gap-2 text-xs font-medium text-blue-600 hover:text-blue-800">
                                        <i class="fa fa-file-pdf-o text-base"></i>
                                        Lihat PDF
                                    </a>
                                @else
                                    <span class="text-xs text-slate-400">Belum tersedia</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-center text-slate-600">
                                {{ $product->sort_order }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                @if ($product->is_active)
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

                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                       class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-blue-50 text-blue-600 transition hover:bg-blue-100"
                                       title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <form action="{{ route('admin.products.destroy', $product->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
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
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <i class="fa fa-cube mb-3 text-4xl text-slate-300"></i>
                                    <p class="font-medium text-slate-600">
                                        Belum ada produk
                                    </p>
                                    <p class="mt-1 text-sm text-slate-400">
                                        Silakan tambahkan produk terlebih dahulu.
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
