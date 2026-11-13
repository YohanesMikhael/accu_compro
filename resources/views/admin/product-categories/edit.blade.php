
@extends('layouts.admin')

@section('title', 'Edit Product Category')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div>
        <a href="{{ route('admin.product-categories.index') }}"
           class="mb-3 inline-flex items-center gap-2 text-sm text-slate-500 transition hover:text-blue-600">
            <i class="fa fa-arrow-left"></i>
            Kembali ke Product Categories
        </a>

        <h1 class="text-2xl font-bold text-slate-800">Edit Kategori Produk</h1>
        <p class="mt-1 text-sm text-slate-500">
            Perbarui informasi kategori {{ $category->name }}.
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

    @include('admin.product-categories._form', [
        'action' => route('admin.product-categories.update', $category->id),
        'category' => $category
    ])

</div>
@endsection