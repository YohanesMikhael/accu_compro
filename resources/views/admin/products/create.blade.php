
@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div>
        <a href="{{ route('admin.products.index') }}"
           class="mb-3 inline-flex items-center gap-2 text-sm text-slate-500 transition hover:text-blue-600">
            <i class="fa fa-arrow-left"></i>
            Kembali ke Products
        </a>

        <h1 class="text-2xl font-bold text-slate-800">Tambah Produk</h1>
        <p class="mt-1 text-sm text-slate-500">
            Tambahkan produk baru ke dalam katalog ACCU.
        </p>
    </div>

    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3">
            <p class="mb-2 text-sm font-semibold text-red-700">
                Terdapat kesalahan pada input:
            </p>

            <ul class="list-inside list-disc text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($categories->isEmpty())
        <div class="rounded-xl border border-amber-200 bg-amber-50 px-4 py-4 text-sm text-amber-800">
            <i class="fa fa-exclamation-triangle mr-2"></i>
            Belum ada kategori aktif. Silakan tambahkan atau aktifkan kategori terlebih dahulu.

            <a href="{{ route('admin.product-categories.create') }}"
               class="ml-1 font-semibold underline">
                Tambah Kategori
            </a>
        </div>
    @else
        @include('admin.products._form', [
            'action' => route('admin.products.store')
        ])
    @endif

</div>
@endsection
