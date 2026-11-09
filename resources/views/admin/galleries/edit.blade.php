
@extends('layouts.admin')

@section('content')
<div x-data="galleryManager()" class="space-y-6">

    {{-- HEADER --}}
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Gallery</h1>
        <p class="mt-1 text-sm text-slate-500">
            Kelola foto dokumentasi kegiatan dan aktivitas perusahaan.
        </p>
    </div>

    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERRORS --}}
    @if($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            <p class="font-semibold">Terdapat kesalahan:</p>
            <ul class="mt-2 list-inside list-disc">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM & PREVIEW --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

        {{-- FORM --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-100 px-6 py-5">
                <h2
                    class="text-lg font-bold text-slate-800"
                    x-text="editingId ? 'Edit Foto Gallery' : 'Tambah Foto Gallery'"
                ></h2>
                <p class="mt-1 text-sm text-slate-500">
                    Masukkan foto dan informasi dokumentasi kegiatan.
                </p>
            </div>

            <form
                x-ref="galleryForm"
                :action="editingId ? updateUrl.replace('__ID__', editingId) : storeUrl"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-5 p-6"
            >
                @csrf

                <template x-if="editingId">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                {{-- TITLE --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Judul Foto
                    </label>
                    <input
                        type="text"
                        name="title"
                        x-model="form.title"
                        maxlength="255"
                        placeholder="Contoh: Daily Office Activities"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >
                </div>

                {{-- DESCRIPTION --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Deskripsi
                    </label>
                    <textarea
                        name="description"
                        x-model="form.description"
                        rows="4"
                        placeholder="Tuliskan deskripsi singkat kegiatan..."
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    ></textarea>
                </div>

                {{-- IMAGE --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Foto Gallery
                        <span class="text-red-500" x-show="!editingId">*</span>
                    </label>
                    <input
                        type="file"
                        name="image"
                        accept=".jpg,.jpeg,.png,.webp"
                        @change="previewImage($event)"
                        :required="!editingId"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm file:mr-4 file:rounded-lg file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-xs file:font-semibold file:text-blue-700"
                    >
                    <p class="mt-1 text-xs text-slate-400">
                        Format JPG, JPEG, PNG, WEBP. Maksimal 5 MB.
                    </p>
                </div>

                {{-- SORT ORDER --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Urutan Tampilan
                    </label>
                    <input
                        type="number"
                        name="sort_order"
                        x-model="form.sort_order"
                        min="0"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >
                    <p class="mt-1 text-xs text-slate-400">
                        Angka lebih kecil akan ditampilkan lebih dahulu.
                    </p>
                </div>

                {{-- STATUS --}}
                <div class="flex items-center justify-between rounded-xl bg-slate-50 p-4">
                    <div>
                        <p class="text-sm font-semibold text-slate-700">
                            Status Foto
                        </p>
                        <p class="mt-1 text-xs text-slate-500">
                            Aktifkan agar foto muncul di website.
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
                        <div class="relative h-6 w-11 rounded-full bg-slate-300 transition peer-checked:bg-blue-600 after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:transition peer-checked:after:translate-x-5"></div>
                    </label>
                </div>

                {{-- ACTIONS --}}
                <div class="flex flex-wrap gap-3 border-t border-slate-100 pt-5">
                    <button
                        type="submit"
                        class="flex-1 rounded-xl bg-blue-700 px-5 py-3 text-sm font-bold text-white transition hover:bg-blue-800"
                        x-text="editingId ? 'Simpan Perubahan' : 'Tambah Foto'"
                    ></button>

                    <button
                        type="button"
                        x-show="editingId"
                        @click="resetForm()"
                        class="rounded-xl border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                    >
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
                    Gambaran foto yang akan ditampilkan di website.
                </p>
            </div>

            <div class="flex min-h-[400px] items-center justify-center bg-slate-50 p-6 sm:p-8">

                <div class="group relative w-full max-w-md overflow-hidden rounded-3xl bg-slate-200 shadow-sm">

                    <div class="relative h-72 w-full sm:h-80">

                        <template x-if="imagePreview">
                            <img
                                :src="imagePreview"
                                alt="Preview gallery"
                                class="h-full w-full object-cover"
                            >
                        </template>

                        <template x-if="!imagePreview">
                            <div class="flex h-full flex-col items-center justify-center text-slate-400">
                                <i data-lucide="image" class="h-16 w-16"></i>
                                <span class="mt-3 text-xs">Belum ada foto</span>
                            </div>
                        </template>

                        <div class="absolute inset-0 bg-gradient-to-t from-blue-950/90 via-blue-950/10 to-transparent"></div>

                        <div class="absolute bottom-0 left-0 p-6">
                            <h3
                                class="text-xl font-extrabold text-white"
                                x-text="form.title || 'Judul Foto Gallery'"
                            ></h3>

                            <p
                                class="mt-2 line-clamp-3 text-sm text-blue-100"
                                x-text="form.description || 'Deskripsi kegiatan akan tampil di sini.'"
                            ></p>
                        </div>

                        <div class="absolute right-4 top-4 flex h-10 w-10 items-center justify-center rounded-full bg-white/90 text-blue-800 shadow">
                            <i data-lucide="zoom-in" class="h-5 w-5"></i>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    {{-- GALLERY LIST --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 px-6 py-5">
            <div>
                <h2 class="text-lg font-bold text-slate-800">
                    Daftar Gallery
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Semua foto dokumentasi yang tersimpan.
                </p>
            </div>

            <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">
                {{ $galleries->count() }} Foto
            </span>
        </div>

        @if($galleries->isNotEmpty())

            <div class="grid grid-cols-1 gap-5 p-6 sm:grid-cols-2 xl:grid-cols-3">

                @foreach($galleries as $gallery)
                    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white">

                        <div class="relative h-52 bg-slate-100">
                            <img
                                src="{{ asset('storage/' . $gallery->image) }}"
                                alt="{{ $gallery->title ?? 'Gallery' }}"
                                class="h-full w-full object-cover"
                            >

                            <span class="absolute right-3 top-3 rounded-full px-3 py-1 text-xs font-bold {{ $gallery->is_active ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-500' }}">
                                {{ $gallery->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </div>

                        <div class="p-4">

                            <h3 class="font-bold text-slate-800">
                                {{ $gallery->title ?: 'Tanpa Judul' }}
                            </h3>

                            <p class="mt-2 line-clamp-2 min-h-10 text-sm text-slate-500">
                                {{ $gallery->description ?: 'Tidak ada deskripsi.' }}
                            </p>

                            <div class="mt-4 flex items-center justify-between border-t border-slate-100 pt-4">
                                <span class="text-xs text-slate-400">
                                    Urutan: {{ $gallery->sort_order }}
                                </span>

                                <div class="flex gap-2">

                                    <button
                                        type="button"
                                        @click="editGallery({{ Js::from([
                                            'id' => $gallery->id,
                                            'title' => $gallery->title,
                                            'description' => $gallery->description,
                                            'image' => asset('storage/' . $gallery->image),
                                            'is_active' => $gallery->is_active,
                                            'sort_order' => $gallery->sort_order,
                                        ]) }})"
                                        class="rounded-lg bg-blue-50 p-2 text-blue-700 transition hover:bg-blue-100"
                                        title="Edit foto"
                                    >
                                        <i data-lucide="pencil" class="h-4 w-4"></i>
                                    </button>

                                    <form
                                        action="{{ route('admin.galleries.destroy', $gallery->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus foto ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100"
                                            title="Hapus foto"
                                        >
                                            <i data-lucide="trash-2" class="h-4 w-4"></i>
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        @else

            <div class="px-6 py-16 text-center">
                <i data-lucide="images" class="mx-auto h-12 w-12 text-slate-300"></i>
                <h3 class="mt-4 font-bold text-slate-700">
                    Belum Ada Foto Gallery
                </h3>
                <p class="mt-1 text-sm text-slate-400">
                    Tambahkan foto dokumentasi pertama melalui form di atas.
                </p>
            </div>

        @endif
    </div>

</div>

<script>
    function galleryManager() {
        return {
            editingId: null,

            storeUrl: @js(route('admin.galleries.store')),
            updateUrl: @js(route('admin.galleries.update', ['id' => '__ID__'])),

            imagePreview: null,
            previewObjectUrl: null,

            form: {
                title: '',
                description: '',
                sort_order: 0,
                is_active: true,
            },

            previewImage(event) {
                const file = event.target.files[0];

                if (!file) return;

                if (this.previewObjectUrl) {
                    URL.revokeObjectURL(this.previewObjectUrl);
                }

                this.previewObjectUrl = URL.createObjectURL(file);
                this.imagePreview = this.previewObjectUrl;
            },

            editGallery(gallery) {
                this.editingId = gallery.id;

                this.form = {
                    title: gallery.title ?? '',
                    description: gallery.description ?? '',
                    sort_order: gallery.sort_order ?? 0,
                    is_active: Boolean(gallery.is_active),
                };

                if (this.previewObjectUrl) {
                    URL.revokeObjectURL(this.previewObjectUrl);
                    this.previewObjectUrl = null;
                }

                this.imagePreview = gallery.image;

                this.scrollToForm();
            },

            resetForm() {
                this.editingId = null;

                if (this.previewObjectUrl) {
                    URL.revokeObjectURL(this.previewObjectUrl);
                    this.previewObjectUrl = null;
                }

                this.imagePreview = null;

                this.form = {
                    title: '',
                    description: '',
                    sort_order: 0,
                    is_active: true,
                };

                this.$refs.galleryForm.reset();
            },

            scrollToForm() {
                this.$nextTick(() => {
                    this.$refs.galleryForm.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                });
            }
        };
    }
</script>
@endsection
