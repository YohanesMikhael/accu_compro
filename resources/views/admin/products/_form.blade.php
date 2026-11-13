
@php
    $isEdit = isset($product);
@endphp

<form action="{{ $action }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-6">

    @csrf

    @if ($isEdit)
        @method('PUT')
    @endif

    {{-- Informasi Produk --}}
    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-200 px-6 py-4">
            <h2 class="font-semibold text-slate-800">Informasi Produk</h2>
            <p class="mt-1 text-sm text-slate-500">
                Masukkan informasi dasar produk.
            </p>
        </div>

        <div class="grid gap-5 p-6 md:grid-cols-2">

            {{-- Kategori --}}
            <div class="md:col-span-2">
                <label for="category_id" class="mb-2 block text-sm font-medium text-slate-700">
                    Kategori Produk <span class="text-red-500">*</span>
                </label>

                <select id="category_id"
                        name="category_id"
                        required
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
                    <option value="">Pilih Kategori</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ (string) old('category_id', $product->category_id ?? '') === (string) $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Nama --}}
            <div>
                <label for="name" class="mb-2 block text-sm font-medium text-slate-700">
                    Nama Produk <span class="text-red-500">*</span>
                </label>

                <input type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $product->name ?? '') }}"
                        placeholder="Masukkan nama produk"
                        required
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">

                @error('name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Subtitle --}}
            <div class="md:col-span-2">
                <label for="subtitle" class="mb-2 block text-sm font-medium text-slate-700">
                    Jenis / Tipe Produk
                </label>

                <input type="text"
                        id="subtitle"
                        name="subtitle"
                        value="{{ old('subtitle', $product->subtitle ?? '') }}"
                        placeholder="Masukkan subtitle produk"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">

                @error('subtitle')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="md:col-span-2">
                <label for="description" class="mb-2 block text-sm font-medium text-slate-700">
                    Deskripsi Produk
                </label>

                <textarea id="description"
                            name="description"
                            rows="5"
                            placeholder="Masukkan deskripsi produk..."
                            class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">{{ old('description', $product->description ?? '') }}</textarea>

                @error('description')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

        </div>
    </div>

    {{-- Media Produk --}}
    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-200 px-6 py-4">
            <h2 class="font-semibold text-slate-800">Gambar Produk</h2>
            <p class="mt-1 text-sm text-slate-500">
                Upload gambar untuk ditampilkan pada katalog produk.
            </p>
        </div>

        <div class="p-6">
            @if ($isEdit && $product->image)
                <div class="mb-4">
                    <p class="mb-2 text-sm font-medium text-slate-700">
                        Gambar Saat Ini
                    </p>

                    <img src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="h-44 w-56 rounded-xl border border-slate-200 object-cover">
                </div>
            @endif

            <label for="image" class="mb-2 block text-sm font-medium text-slate-700">
                {{ $isEdit ? 'Ganti Gambar Produk' : 'Gambar Produk' }}
            </label>

            <input type="file"
                id="image"
                name="image"
                accept=".jpg,.jpeg,.png,.webp"
                class="block w-full rounded-lg border border-slate-300 text-sm text-slate-600 file:mr-4 file:border-0 file:bg-slate-100 file:px-4 file:py-3 file:font-medium file:text-slate-700 hover:file:bg-slate-200">

            <p class="mt-2 text-xs text-slate-400">
                Format JPG, JPEG, PNG, WEBP. Maksimal 5 MB.
                {{ $isEdit ? 'Kosongkan jika tidak ingin mengganti gambar.' : '' }}
            </p>

            @error('image')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>


    {{-- Pengaturan --}}
    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-200 px-6 py-4">
            <h2 class="font-semibold text-slate-800">Pengaturan</h2>
            <p class="mt-1 text-sm text-slate-500">
                Atur status dan urutan tampilan produk.
            </p>
        </div>

        <div class="grid gap-5 p-6 md:grid-cols-2">

            {{-- Urutan --}}
            <div>
                <label for="sort_order" class="mb-2 block text-sm font-medium text-slate-700">
                    Urutan Tampilan
                </label>

                <input type="number"
                    id="sort_order"
                    name="sort_order"
                    min="0"
                    value="{{ old('sort_order', $product->sort_order ?? $nextSortOrder ?? 1) }}"
                    {{ !$isEdit ? 'readonly' : '' }}
                    class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100 {{ !$isEdit ? 'bg-slate-100 cursor-not-allowed' : '' }}">

                <p class="mt-2 text-xs text-slate-400">
                    {{ $isEdit ? 'Urutan tampilan produk dapat diubah.' : 'Nomor urut dibuat otomatis berdasarkan data produk.' }}
                </p>

                @error('sort_order')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status --}}
            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Status Produk
                </label>

                <label class="flex cursor-pointer items-center gap-3 rounded-lg border border-slate-200 px-4 py-3">
                    <input type="checkbox"
                            name="is_active"
                            value="1"
                            {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">

                    <span class="text-sm text-slate-700">
                        Aktif dan tampil di website
                    </span>
                </label>

                @error('is_active')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

        </div>
    </div>

    {{-- Tombol --}}
    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
        <a href="{{ route('admin.products.index') }}"
           class="inline-flex items-center justify-center rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
            Batal
        </a>

        <button type="submit"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">
            <i class="fa fa-save"></i>
            {{ $isEdit ? 'Simpan Perubahan' : 'Simpan Produk' }}
        </button>
    </div>

</form>
