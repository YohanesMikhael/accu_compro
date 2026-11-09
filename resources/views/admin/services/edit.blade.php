
@extends('layouts.admin')

@section('content')
@php
    $editing = request()->query('edit');
    $editingService = $editing ? $services->firstWhere('id', $editing) : null;
@endphp

<div
    x-data="serviceManager()"
    x-init="init()"
    class="space-y-6"
>
    {{-- PAGE HEADER --}}
    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Our Services</h1>
            <p class="mt-1 text-sm text-slate-500">
                Kelola layanan yang ditampilkan pada website ACCU.
            </p>
        </div>

        <div class="flex items-center gap-2 text-sm text-slate-500">
            <i data-lucide="layers" class="h-4 w-4"></i>
            <span>{{ $services->count() }} Services</span>
        </div>
    </div>

    {{-- FORM + LIVE PREVIEW --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

        {{-- FORM --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-100 px-6 py-5">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="font-semibold text-slate-800"
                            x-text="isEdit ? 'Edit Service' : 'Add New Service'">
                            Add New Service
                        </h2>
                        <p class="mt-1 text-xs text-slate-500">
                            Lengkapi informasi layanan di bawah ini.
                        </p>
                    </div>

                    <span
                        class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-600"
                        x-text="isEdit ? 'EDIT MODE' : 'CREATE MODE'"
                    ></span>
                </div>
            </div>

            <form
                :action="formAction"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-5 p-6"
            >
                @csrf
                <input type="hidden" name="_method" :value="isEdit ? 'PUT' : 'POST'">

                {{-- TITLE --}}
                <div>
                    <label for="title" class="mb-2 block text-sm font-medium text-slate-700">
                        Service Title <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        x-model="form.title"
                        @input="updatePreview()"
                        value="{{ old('title', $editingService?->title) }}"
                        placeholder="Contoh: Cleaning Service"
                        required
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-50"
                    >

                    @error('title')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- DESCRIPTION --}}
                <div>
                    <label for="description" class="mb-2 block text-sm font-medium text-slate-700">
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        x-model="form.description"
                        @input="updatePreview()"
                        rows="5"
                        placeholder="Masukkan deskripsi layanan..."
                        class="w-full resize-y rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-50"
                    >{{ old('description', $editingService?->description) }}</textarea>

                    @error('description')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- IMAGE --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Service Image
                    </label>

                    <label
                        for="image"
                        class="group flex cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 px-4 py-6 text-center transition hover:border-blue-400 hover:bg-blue-50/40"
                    >
                        <div class="mb-2 flex h-11 w-11 items-center justify-center rounded-xl bg-white text-slate-400 shadow-sm group-hover:text-blue-500">
                            <i data-lucide="image-plus" class="h-5 w-5"></i>
                        </div>

                        <span class="text-sm font-medium text-slate-700">
                            Click to upload image
                        </span>
                        <span class="mt-1 text-xs text-slate-400">
                            JPG, JPEG, PNG, WEBP · Maksimal 2 MB
                        </span>

                        <input
                            type="file"
                            id="image"
                            name="image"
                            accept=".jpg,.jpeg,.png,.webp"
                            class="hidden"
                            @change="previewImage($event)"
                        >
                    </label>

                    @error('image')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror

                    <p class="mt-2 text-xs text-slate-400" x-show="imageName" x-text="imageName"></p>
                    <p class="mt-2 text-xs text-slate-400" x-show="isEdit && !imageName">
                        Kosongkan jika tidak ingin mengganti gambar.
                    </p>
                </div>

                {{-- SORT ORDER --}}
                <div>
                    <label for="sort_order" class="mb-2 block text-sm font-medium text-slate-700">
                        Sort Order
                    </label>

                    <input
                        type="number"
                        id="sort_order"
                        name="sort_order"
                        min="0"
                        x-model="form.sort_order"
                        value="{{ old('sort_order', $editingService?->sort_order ?? 0) }}"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-400 focus:ring-4 focus:ring-blue-50"
                    >

                    <p class="mt-1 text-xs text-slate-400">
                        Angka lebih kecil akan ditampilkan lebih dahulu.
                    </p>

                    @error('sort_order')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- ACTIVE STATUS --}}
                <div class="flex items-center justify-between rounded-xl border border-slate-200 p-4">
                    <div>
                        <p class="text-sm font-medium text-slate-700">Active Service</p>
                        <p class="mt-1 text-xs text-slate-400">
                            Tampilkan layanan pada website.
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
                        <div class="h-6 w-11 rounded-full bg-slate-200 transition peer-checked:bg-blue-600 after:absolute after:left-[3px] after:top-[3px] after:h-[18px] after:w-[18px] after:rounded-full after:bg-white after:transition peer-checked:after:translate-x-5"></div>
                    </label>
                </div>

                {{-- BUTTONS --}}
                <div class="flex flex-col gap-3 border-t border-slate-100 pt-5 sm:flex-row">
                    <button
                        type="submit"
                        class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700"
                    >
                        <i data-lucide="save" class="h-4 w-4"></i>
                        <span x-text="isEdit ? 'Update Service' : 'Save Service'"></span>
                    </button>

                    <button
                        type="button"
                        x-show="isEdit"
                        @click="resetForm()"
                        class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                    >
                        <i data-lucide="x" class="h-4 w-4"></i>
                        Cancel
                    </button>
                </div>
            </form>
        </div>

        {{-- LIVE PREVIEW --}}
        <div class="h-fit overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-100 px-6 py-5">
                <h2 class="font-semibold text-slate-800">Live Preview</h2>
                <p class="mt-1 text-xs text-slate-500">
                    Preview tampilan informasi layanan.
                </p>
            </div>

            <div class="p-6">
                <div class="mx-auto max-w-sm overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                    <div class="relative h-56 overflow-hidden bg-slate-100">
                        <template x-if="previewImageUrl">
                            <img
                                :src="previewImageUrl"
                                alt="Service preview"
                                class="h-full w-full object-cover"
                            >
                        </template>

                        <template x-if="!previewImageUrl">
                            <div class="flex h-full flex-col items-center justify-center text-slate-300">
                                <i data-lucide="image" class="h-12 w-12"></i>
                                <span class="mt-2 text-xs">Service image preview</span>
                            </div>
                        </template>

                        <div class="absolute left-4 top-4 rounded-lg bg-white/90 px-3 py-1 text-xs font-semibold text-slate-700 shadow-sm">
                            ACCU SERVICES
                        </div>
                    </div>

                    <div class="p-6">
                        <h3
                            class="text-xl font-bold text-slate-800"
                            x-text="form.title || 'Service Title'"
                        ></h3>

                        <div class="mt-3 h-1 w-12 rounded-full bg-blue-500"></div>

                        <p
                            class="mt-4 whitespace-pre-line text-sm leading-7 text-slate-500"
                            x-text="form.description || 'Deskripsi layanan akan ditampilkan di sini.'"
                        ></p>

                        <div class="mt-5 flex items-center justify-between border-t border-slate-100 pt-4">
                            <span
                                class="rounded-full px-3 py-1 text-xs font-semibold"
                                :class="form.is_active ? 'bg-emerald-50 text-emerald-600' : 'bg-slate-100 text-slate-500'"
                                x-text="form.is_active ? 'Active' : 'Inactive'"
                            ></span>

                            <span class="text-xs text-slate-400">
                                Order: <span x-text="form.sort_order || 0"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SERVICES LIST FULL WIDTH --}}
    <div class="w-full min-w-0 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="flex flex-col justify-between gap-3 border-b border-slate-100 px-6 py-5 sm:flex-row sm:items-center">
            <div>
                <h2 class="font-semibold text-slate-800">Services List</h2>
                <p class="mt-1 text-xs text-slate-500">
                    Semua layanan yang tersimpan di database.
                </p>
            </div>

            <span class="w-fit rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                {{ $services->count() }} Total Services
            </span>
        </div>

        @if ($services->isEmpty())
            <div class="px-6 py-16 text-center">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                    <i data-lucide="layers" class="h-7 w-7"></i>
                </div>
                <h3 class="mt-4 font-semibold text-slate-700">Belum ada service</h3>
                <p class="mt-1 text-sm text-slate-400">
                    Tambahkan layanan pertama melalui form di atas.
                </p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full min-w-[760px] text-left">
                    <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Service</th>
                            <th class="px-6 py-4 font-semibold">Slug</th>
                            <th class="px-6 py-4 text-center font-semibold">Order</th>
                            <th class="px-6 py-4 text-center font-semibold">Status</th>
                            <th class="px-6 py-4 text-right font-semibold">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @foreach ($services as $service)
                            <tr class="transition hover:bg-slate-50/70">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <div class="h-14 w-16 shrink-0 overflow-hidden rounded-lg bg-slate-100">
                                            @if ($service->image)
                                                <img
                                                    src="{{ asset('storage/' . $service->image) }}"
                                                    alt="{{ $service->title }}"
                                                    class="h-full w-full object-cover"
                                                >
                                            @else
                                                <div class="flex h-full items-center justify-center text-slate-300">
                                                    <i data-lucide="image" class="h-6 w-6"></i>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="min-w-0">
                                            <p class="font-semibold text-slate-800">
                                                {{ $service->title }}
                                            </p>
                                            <p class="mt-1 max-w-sm truncate text-xs text-slate-400">
                                                {{ $service->description ?: 'Tidak ada deskripsi' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-sm text-slate-500">
                                    {{ $service->slug }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex h-8 min-w-8 items-center justify-center rounded-lg bg-slate-100 px-2 text-sm font-semibold text-slate-600">
                                        {{ $service->sort_order }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-center">
                                    @if ($service->is_active)
                                        <span class="inline-flex rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-600">
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-500">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-2">
                                        <button
                                            type="button"
                                            @click="editService({{ Illuminate\Support\Js::from([
                                                'id' => $service->id,
                                                'title' => $service->title,
                                                'description' => $service->description,
                                                'image' => $service->image ? asset('storage/' . $service->image) : null,
                                                'sort_order' => $service->sort_order,
                                                'is_active' => (bool) $service->is_active,
                                            ]) }})"
                                            class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-500 transition hover:border-blue-200 hover:bg-blue-50 hover:text-blue-600"
                                            title="Edit Service"
                                        >
                                            <i data-lucide="pencil" class="h-4 w-4"></i>
                                        </button>

                                        <form
                                            action="{{ route('admin.services.destroy', $service->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus service ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 text-slate-500 transition hover:border-red-200 hover:bg-red-50 hover:text-red-600"
                                                title="Delete Service"
                                            >
                                                <i data-lucide="trash-2" class="h-4 w-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

<script>
    function serviceManager() {
        return {
            isEdit: false,
            editingId: null,
            imageName: '',
            previewImageUrl: null,

            form: {
                title: @js(old('title', $editingService?->title ?? '')),
                description: @js(old('description', $editingService?->description ?? '')),
                sort_order: @js(old('sort_order', $editingService?->sort_order ?? 0)),
                is_active: @js((bool) old('is_active', $editingService?->is_active ?? true)),
            },

            get formAction() {
                return this.isEdit
                    ? `/admin/services/${this.editingId}`
                    : @js(route('admin.services.store'));
            },

            init() {
                @if ($editingService)
                    this.editService({
                        id: @js($editingService->id),
                        title: @js($editingService->title),
                        description: @js($editingService->description),
                        image: @js($editingService->image ? asset('storage/' . $editingService->image) : null),
                        sort_order: @js($editingService->sort_order),
                        is_active: @js((bool) $editingService->is_active),
                    });
                @endif

                this.updatePreview();
            },

            updatePreview() {
                // Preview judul dan deskripsi mengikuti input secara otomatis.
            },

            previewImage(event) {
                const file = event.target.files[0];

                if (!file) return;

                this.imageName = file.name;

                const reader = new FileReader();

                reader.onload = (e) => {
                    this.previewImageUrl = e.target.result;
                };

                reader.readAsDataURL(file);
            },

            editService(service) {
                this.isEdit = true;
                this.editingId = service.id;

                this.form = {
                    title: service.title || '',
                    description: service.description || '',
                    sort_order: service.sort_order ?? 0,
                    is_active: Boolean(service.is_active),
                };

                this.previewImageUrl = service.image || null;
                this.imageName = '';

                const fileInput = document.getElementById('image');
                if (fileInput) fileInput.value = '';

                window.scrollTo({ top: 0, behavior: 'smooth' });
            },

            resetForm() {
                this.isEdit = false;
                this.editingId = null;
                this.imageName = '';
                this.previewImageUrl = null;

                this.form = {
                    title: '',
                    description: '',
                    sort_order: 0,
                    is_active: true,
                };

                const fileInput = document.getElementById('image');
                if (fileInput) fileInput.value = '';
            },
        };
    }
</script>
@endsection
