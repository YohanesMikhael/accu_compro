@php
    $isEdit = isset($position);
@endphp

<div class="grid gap-6 lg:grid-cols-2">

    {{-- INFORMASI LOWONGAN --}}
    <div class="space-y-5 rounded-2xl border border-slate-200 bg-white p-6">

        <h2 class="text-lg font-bold text-slate-800">
            Informasi Lowongan
        </h2>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Nama Posisi *
            </label>
            <input type="text" name="title"
                   value="{{ old('title', $position->title ?? '') }}"
                   required
                   placeholder="Contoh: Cleaning Service"
                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-blue-500 focus:outline-none">
            @error('title')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Lokasi Kerja
            </label>
            <input type="text" name="location"
                   value="{{ old('location', $position->location ?? '') }}"
                   placeholder="Contoh: Tangerang"
                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm">
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Tipe Pekerjaan
            </label>
            <select name="employment_type"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm">
                <option value="">Pilih tipe pekerjaan</option>
                @foreach(['Full Time', 'Part Time', 'Kontrak', 'Harian'] as $type)
                    <option value="{{ $type }}"
                        @selected(old('employment_type', $position->employment_type ?? '') === $type)>
                        {{ $type }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Deskripsi Pekerjaan
            </label>
            <textarea name="description" rows="6"
                      placeholder="Jelaskan tanggung jawab pekerjaan..."
                      class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm">{{ old('description', $position->description ?? '') }}</textarea>
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Kualifikasi
            </label>
            <textarea name="requirements" rows="6"
                      placeholder="Tuliskan persyaratan kandidat..."
                      class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm">{{ old('requirements', $position->requirements ?? '') }}</textarea>
        </div>

    </div>

    {{-- PENGATURAN LOWONGAN --}}
    <div class="space-y-5 rounded-2xl border border-slate-200 bg-white p-6">

        <h2 class="text-lg font-bold text-slate-800">
            Pengaturan Lowongan
        </h2>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Link Lamaran
            </label>
            <input type="url" name="application_url"
                   value="{{ old('application_url', $position->application_url ?? '') }}"
                   placeholder="https://forms.google.com/..."
                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm">
            <p class="mt-2 text-xs text-slate-500">
                Masukkan link formulir pendaftaran kandidat.
            </p>
            @error('application_url')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Batas Lamaran
            </label>
            <input type="date" name="deadline"
                   value="{{ old('deadline', isset($position) && $position->deadline ? $position->deadline->format('Y-m-d') : '') }}"
                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm">
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">
                Urutan Tampilan
            </label>
            <input type="number" name="sort_order" min="0"
                   value="{{ old('sort_order', $position->sort_order ?? 0) }}"
                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm">
        </div>

        <div class="rounded-xl bg-slate-50 p-4">
            <label class="flex cursor-pointer items-center gap-3">
                <input type="checkbox" name="is_active" value="1"
                       @checked(old('is_active', $position->is_active ?? false))
                       class="h-5 w-5 rounded border-slate-300 text-blue-600">
                <span>
                    <span class="block text-sm font-semibold text-slate-800">
                        Aktifkan Lowongan
                    </span>
                    <span class="block text-xs text-slate-500">
                        Lowongan aktif akan ditampilkan di website.
                    </span>
                </span>
            </label>
        </div>

    </div>

</div>

<div class="flex justify-end gap-3">
    <a href="{{ route('admin.career-positions.index') }}"
       class="rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-600 hover:bg-slate-50">
        Batal
    </a>

    <button type="submit"
            class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700">
        {{ $isEdit ? 'Simpan Perubahan' : 'Simpan Lowongan' }}
    </button>
</div>