
@extends('layouts.admin')

@section('content')
@php
    $editing = request()->query('edit');
    $editingFacility = $editing
        ? $facilities->firstWhere('id', $editing)
        : null;
@endphp

<div
    x-data="operationalFacilityManager()"
    class="space-y-8"
>
    {{-- PAGE HEADER --}}
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Sarana Kendaraan Operasional
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Kelola informasi dan armada kendaraan operasional ACCU.
            </p>
        </div>

        <div class="rounded-full bg-blue-50 px-4 py-2 text-sm font-semibold text-blue-600">
            {{ $facilities->count() }} Kendaraan
        </div>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))
        <div class="flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-700">
            <i data-lucide="check-circle" class="h-5 w-5"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- VALIDATION ERRORS --}}
    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
            <p class="mb-2 font-semibold">Periksa kembali input berikut:</p>
            <ul class="list-inside list-disc space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM & LIVE PREVIEW --}}
    <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-2">

        {{-- FORM --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-5">
                <div>
                    <h2 class="text-lg font-bold text-slate-800"
                        x-text="editingId ? 'Edit Kendaraan' : 'Tambah Kendaraan'">
                        Tambah Kendaraan
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Lengkapi informasi kendaraan di bawah ini.
                    </p>
                </div>

                <span
                    x-show="editingId"
                    x-cloak
                    class="rounded-full bg-blue-50 px-4 py-2 text-xs font-bold text-blue-600"
                >
                    EDIT MODE
                </span>
            </div>

            <form
                method="POST"
                enctype="multipart/form-data"
                :action="editingId ? updateUrl.replace('__ID__', editingId) : storeUrl"
                class="space-y-6 p-6"
            >
                @csrf

                <template x-if="editingId">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                {{-- NAME --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Nama Kendaraan <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="name"
                        x-model="form.name"
                        value="{{ old('name', $editingFacility?->name) }}"
                        placeholder="Contoh: Dump Truck Colt Diesel"
                        required
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >
                </div>

                {{-- TYPE --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Tipe / Kapasitas
                    </label>

                    <input
                        type="text"
                        name="type"
                        x-model="form.type"
                        value="{{ old('type', $editingFacility?->type) }}"
                        placeholder="Contoh: Kapasitas 16 m³"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >
                </div>

                {{-- DESCRIPTION --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Description
                    </label>

                    <textarea
                        name="description"
                        x-model="form.description"
                        rows="4"
                        placeholder="Masukkan deskripsi kendaraan..."
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >{{ old('description', $editingFacility?->description) }}</textarea>
                </div>

                {{-- Jumlah Unit --}}
                <div>
                    <label class="block text-sm font-medium mb-2">
                        Jumlah Unit
                    </label>
                    <input
                        type="number"
                        name="quantity"
                        x-model="form.quantity"
                        min="0"
                        class="w-full rounded-lg border px-4 py-2"
                        placeholder="Contoh: 10"
                    >
                </div>

                {{-- Kapasitas --}}
                <div>
                    <label class="block text-sm font-medium mb-2">
                        Kapasitas
                    </label>
                    <input
                        type="text"
                        name="capacity"
                        x-model="form.capacity"
                        class="w-full rounded-lg border px-4 py-2"
                        placeholder="Contoh: 16 m³"
                    >
                </div>

                {{-- IMAGE --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Gambar Kendaraan
                    </label>

                    <label class="group flex cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 px-5 py-8 transition hover:border-blue-400 hover:bg-blue-50/50">

                        <template x-if="!imagePreview">
                            <div class="text-center">
                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-xl bg-white text-slate-400 shadow-sm">
                                    <i data-lucide="image-plus" class="h-7 w-7"></i>
                                </div>

                                <p class="mt-3 text-sm font-medium text-slate-700">
                                    Click to upload image
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    JPG, JPEG, PNG, WEBP (Max. 2 MB)
                                </p>
                            </div>
                        </template>

                        <template x-if="imagePreview">
                            <div class="text-center">
                                <img
                                    :src="imagePreview"
                                    class="mx-auto h-40 w-full max-w-xs object-contain"
                                    alt="Preview kendaraan"
                                >

                                <p class="mt-3 text-sm font-medium text-blue-600">
                                    Klik untuk mengganti gambar
                                </p>
                            </div>
                        </template>

                        <input
                            type="file"
                            name="image"
                            accept="image/png,image/jpeg,image/jpg,image/webp"
                            class="hidden"
                            @change="previewImage($event)"
                        >
                    </label>
                </div>

                {{-- SORT ORDER --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Urutan Tampilan
                    </label>

                    <input
                        type="number"
                        name="sort_order"
                        min="0"
                        x-model="form.sort_order"
                        value="{{ old('sort_order', $editingFacility?->sort_order ?? 0) }}"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                    <p class="mt-1 text-xs text-slate-400">
                        Angka lebih kecil akan ditampilkan lebih dahulu.
                    </p>
                </div>

                {{-- ACTIVE STATUS --}}
                <div class="flex items-center justify-between rounded-xl border border-slate-200 p-4">
                    <div>
                        <p class="text-sm font-semibold text-slate-700">
                            Status Kendaraan
                        </p>
                        <p class="mt-1 text-xs text-slate-500">
                            Aktifkan agar kendaraan tampil di website.
                        </p>
                    </div>

                    <label class="relative inline-flex cursor-pointer items-center">
                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            x-model="form.is_active"
                            class="peer sr-only"
                        >

                        <div class="h-6 w-11 rounded-full bg-slate-200 transition peer-checked:bg-blue-600 peer-focus:ring-4 peer-focus:ring-blue-100 after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-slate-300 after:bg-white after:transition-all peer-checked:after:translate-x-5 peer-checked:after:border-white"></div>
                    </label>
                </div>

                {{-- ACTION BUTTONS --}}
                <div class="flex flex-col gap-3 border-t border-slate-100 pt-5 sm:flex-row">

                    <button
                        type="submit"
                        class="flex flex-1 items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700"
                    >
                        <i data-lucide="save" class="h-4 w-4"></i>

                        <span x-text="editingId ? 'Update Kendaraan' : 'Simpan Kendaraan'">
                            Simpan Kendaraan
                        </span>
                    </button>

                    <button
                        type="button"
                        x-show="editingId"
                        x-cloak
                        @click="resetForm()"
                        class="flex items-center justify-center gap-2 rounded-xl border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                    >
                        <i data-lucide="x" class="h-4 w-4"></i>
                        Batal Edit
                    </button>

                </div>
            </form>
        </div>

        {{-- LIVE PREVIEW --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-100 px-6 py-5">
                <h2 class="text-lg font-bold text-slate-800">
                    Live Preview
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Preview tampilan informasi kendaraan.
                </p>
            </div>

            <div class="bg-slate-50 p-6 sm:p-8">

                <div class="mx-auto max-w-md overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                    {{-- IMAGE PREVIEW --}}
                    <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-gradient-to-br from-blue-50 via-white to-slate-100 p-5">

                        <span class="absolute left-0 top-0 rounded-br-[28px] bg-gradient-to-r from-blue-700 to-blue-500 px-7 py-3 text-xl font-extrabold text-white shadow-lg">
                            <span x-text="String(form.sort_order || 0).padStart(2, '0')">01</span>
                        </span>

                        <span
                            x-show="form.type"
                            x-cloak
                            class="absolute right-4 top-4 rounded-xl bg-blue-100 px-3 py-2 text-xs font-bold text-blue-900"
                            x-text="form.type"
                        ></span>

                        <template x-if="imagePreview">
                            <img
                                :src="imagePreview"
                                alt="Preview kendaraan"
                                class="mt-8 h-52 w-full object-contain"
                            >
                        </template>

                        <template x-if="!imagePreview">
                            <div class="flex flex-col items-center text-slate-300">
                                <i data-lucide="truck" class="h-20 w-20"></i>
                                <span class="mt-3 text-xs">Belum ada gambar</span>
                            </div>
                        </template>

                    </div>

                    {{-- CARD CONTENT --}}
                    <div class="p-6">

                        <h3
                            class="text-2xl font-extrabold text-slate-800"
                            x-text="form.name || 'Nama Kendaraan'"
                        ></h3>

                        <p
                            class="mt-2 text-sm text-slate-500"
                            x-text="form.description || 'Deskripsi kendaraan akan tampil di sini.'"
                        ></p>

                        <div class="my-6 border-t border-slate-100"></div>

                        <div class="grid grid-cols-2 gap-3">

                            {{-- JUMLAH UNIT --}}
                            <div class="rounded-xl bg-blue-50/70 p-4 text-center">
                                <div class="mx-auto flex h-10 w-10 items-center justify-center rounded-full bg-white text-blue-600">
                                    <i data-lucide="truck" class="h-5 w-5"></i>
                                </div>

                                <p class="mt-2 text-xs text-slate-500">
                                    Jumlah Unit
                                </p>

                                <p
                                    class="mt-1 text-sm font-bold text-slate-800"
                                    x-text="form.quantity !== '' && form.quantity !== null ? form.quantity + ' Unit' : '-'"
                                ></p>
                            </div>

                            {{-- KAPASITAS --}}
                            <div class="rounded-xl bg-blue-50/70 p-4 text-center">
                                <div class="mx-auto flex h-10 w-10 items-center justify-center rounded-full bg-white text-blue-600">
                                    <i data-lucide="package" class="h-5 w-5"></i>
                                </div>

                                <p class="mt-2 text-xs text-slate-500">
                                    Kapasitas
                                </p>

                                <p
                                    class="mt-1 text-sm font-bold text-slate-800"
                                    x-text="form.capacity || '-'"
                                ></p>
                            </div>

                        </div>

                    </div>
                </div>

                <p class="mt-4 text-center text-xs text-slate-400">
                    Tampilan preview merupakan gambaran kartu kendaraan di website.
                </p>

            </div>
        </div>

    </div>

    {{-- VEHICLE LIST --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="flex flex-col gap-3 border-b border-slate-100 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-lg font-bold text-slate-800">
                    Daftar Armada Kendaraan
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Kelola seluruh kendaraan operasional ACCU.
                </p>
            </div>

            <span class="rounded-full bg-slate-100 px-4 py-2 text-xs font-semibold text-slate-600">
                {{ $facilities->count() }} Data
            </span>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full min-w-[800px] text-left text-sm">

                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="px-6 py-4">Kendaraan</th>
                        <th class="px-6 py-4">Tipe / Kapasitas</th>
                        <th class="px-6 py-4">Urutan</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($facilities as $facility)

                        <tr class="transition hover:bg-slate-50/70">

                            {{-- VEHICLE --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">

                                    <div class="flex h-14 w-20 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-slate-100">

                                        @if ($facility->image)
                                            <img
                                                src="{{ asset('storage/' . $facility->image) }}"
                                                alt="{{ $facility->name }}"
                                                class="h-full w-full object-contain"
                                            >
                                        @else
                                            <i data-lucide="truck" class="h-7 w-7 text-slate-400"></i>
                                        @endif

                                    </div>

                                    <div>
                                        <p class="font-semibold text-slate-800">
                                            {{ $facility->name }}
                                        </p>

                                        <p class="mt-1 max-w-xs truncate text-xs text-slate-400">
                                            {{ $facility->description ?: 'Tidak ada deskripsi' }}
                                        </p>
                                    </div>

                                </div>
                            </td>

                            {{-- TYPE --}}
                            <td class="px-6 py-4 text-slate-600">
                                {{ $facility->type ?: '-' }}
                            </td>

                            {{-- ORDER --}}
                            <td class="px-6 py-4">
                                <span class="rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">
                                    {{ $facility->sort_order }}
                                </span>
                            </td>

                            {{-- STATUS --}}
                            <td class="px-6 py-4">

                                @if ($facility->is_active)
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-3 py-1.5 text-xs font-semibold text-green-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-500">
                                        <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                                        Nonaktif
                                    </span>
                                @endif

                            </td>

                            {{-- ACTIONS --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center justify-end gap-2">

                                    <button
                                        type="button"
                                        @click="editFacility({
                                            id: {{ $facility->id }},
                                            name: {{ Illuminate\Support\Js::from($facility->name) }},
                                            type: {{ Illuminate\Support\Js::from($facility->type ?? '') }},
                                            quantity: {{ Illuminate\Support\Js::from($facility->quantity ?? '') }},
                                            capacity: {{ Illuminate\Support\Js::from($facility->capacity ?? '') }},
                                            description: {{ Illuminate\Support\Js::from($facility->description ?? '') }},
                                            image: {{ Illuminate\Support\Js::from($facility->image ? asset('storage/' . $facility->image) : '') }},
                                            is_active: {{ $facility->is_active ? 'true' : 'false' }},
                                            sort_order: {{ $facility->sort_order }}
                                        })"
                                        class="flex items-center gap-1.5 rounded-lg border border-blue-200 px-3 py-2 text-xs font-semibold text-blue-600 transition hover:bg-blue-50"
                                    >
                                        <i data-lucide="pencil" class="h-3.5 w-3.5"></i>
                                        Edit
                                    </button>

                                    <form
                                        action="{{ route('admin.operational-facilities.destroy', $facility->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kendaraan ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="flex items-center gap-1.5 rounded-lg border border-red-200 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-50"
                                        >
                                            <i data-lucide="trash-2" class="h-3.5 w-3.5"></i>
                                            Hapus
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="px-6 py-14 text-center">
                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-slate-400">
                                    <i data-lucide="truck" class="h-7 w-7"></i>
                                </div>

                                <p class="mt-4 font-semibold text-slate-700">
                                    Belum ada kendaraan
                                </p>

                                <p class="mt-1 text-sm text-slate-400">
                                    Tambahkan kendaraan operasional pertama kamu.
                                </p>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>

<script>
    function operationalFacilityManager() {
        return {
            editingId: null,

            storeUrl: @js(route('admin.operational-facilities.store')),
            updateUrl: @js(route('admin.operational-facilities.update', ['id' => '__ID__'])),

            imagePreview: @js(
                old('image')
                    ? null
                    : ($editingFacility?->image
                        ? asset('storage/' . $editingFacility->image)
                        : null)
            ),

            form: {
                name: @js(old('name', $editingFacility?->name ?? '')),
                type: @js(old('type', $editingFacility?->type ?? '')),
                quantity: @js(old('quantity', $editingFacility?->quantity ?? '')),
                capacity: @js(old('capacity', $editingFacility?->capacity ?? '')),
                description: @js(old('description', $editingFacility?->description ?? '')),
                sort_order: @js(old('sort_order', $editingFacility?->sort_order ?? 0)),
                is_active: @js((bool) old('is_active', $editingFacility?->is_active ?? true)),
            },

            init() {
                @if ($editingFacility)
                    this.editingId = {{ $editingFacility->id }};
                @endif
            },

            previewImage(event) {
                const file = event.target.files[0];

                if (file) {
                    this.imagePreview = URL.createObjectURL(file);
                }
            },

            editFacility(facility) {
                this.editingId = facility.id;

                this.form = {
                    name: facility.name,
                    type: facility.type,
                    quantity: facility.quantity,
                    capacity: facility.capacity,
                    description: facility.description,
                    sort_order: facility.sort_order,
                    is_active: facility.is_active,
                };

                this.imagePreview = facility.image || null;

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            },

            resetForm() {
                this.editingId = null;

                this.form = {
                    name: '',
                    type: '',
                    quantity: '',
                    capacity: '',
                    description: '',
                    sort_order: 0,
                    is_active: true,
                };

                this.imagePreview = null;

                window.location.href = this.storeUrl.replace('/operational-facilities', '/operational-facilities');
            },
        }
    }
</script>

@endsection
