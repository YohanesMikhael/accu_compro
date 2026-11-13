
@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div>
        <a href="{{ route('admin.products.index') }}"
           class="mb-3 inline-flex items-center gap-2 text-sm text-slate-500 transition hover:text-blue-600">
            <i class="fa fa-arrow-left"></i>
            Kembali ke Products
        </a>

        <h1 class="text-2xl font-bold text-slate-800">Edit Produk</h1>
        <p class="mt-1 text-sm text-slate-500">
            Perbarui informasi produk {{ $product->name }}.
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

    @include('admin.products._form', [
        'action' => route('admin.products.update', $product->id),
        'product' => $product
    ])

</div>
@endsection
