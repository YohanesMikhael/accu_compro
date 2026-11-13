@extends('layouts.admin')

@section('content')

<div class="space-y-6">
    {{-- HEADER --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-800">
            Pengaturan Company Values
        </h1>
        <p class="mt-1 text-sm text-gray-500">
            Kelola icon, title, subtitle, dan description Company Values ACCU.
        </p>
    </div>

    {{-- SUCCESS MESSAGE --}}

    @if(session('success'))
        <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR MESSAGE --}}

    @if($errors->any())
        <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3">
            <p class="font-semibold text-red-700">
                Ada kesalahan pada input:
            </p>
            
            <ul class="mt-2 list-disc pl-5 text-sm text-red-600">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM DAN PREVIEW --}}

    <form
        id="valueForm"
        action="{{ route('admin.our-values.store') }}"
        method="POST"
    >
        @csrf
        <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
            {{-- KOLOM KIRI: FORM --}}
            <div class="space-y-6">
                {{-- DATA COMPANY VALUE --}}
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="border-b border-gray-100 px-6 py-4">
                        <h2 class="font-semibold text-gray-800">
                            Form Company Value
                        </h2>

                        <p class="mt-1 text-xs text-gray-500">
                            Masukkan informasi untuk satu kartu Company Values.
                        </p>
                    </div>

                    <div class="space-y-5 p-6">
                        {{-- ICON --}}
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700">
                                Icon <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="hidden"
                                name="icon"
                                id="icon"
                                value="{{ old('icon') }}"
                                required
                            >

                            <button
                                type="button"
                                id="iconPickerButton"
                                class="flex w-full items-center justify-between rounded-lg border border-gray-300 px-4 py-3 text-left text-sm hover:border-blue-500 focus:border-blue-500 focus:outline-none"
                            >
                                <span class="flex items-center gap-3">
                                    <span id="selectedIcon" class="flex items-center text-gray-400">
                                        <i data-lucide="shapes" class="h-5 w-5"></i>
                                    </span>

                                    <span id="selectedIconName" class="text-gray-500">
                                        Pilih icon
                                    </span>
                                </span>

                                <i data-lucide="chevron-down" class="h-4 w-4 text-gray-400"></i>
                            </button>

                            {{-- ICON DROPDOWN --}}

                            <div
                                id="iconPicker"
                                class="mt-2 hidden overflow-hidden rounded-lg border border-gray-200 bg-white shadow-lg"
                            >

                                <div class="border-b border-gray-100 p-3">
                                    <input
                                        type="text"
                                        id="iconSearch"
                                        placeholder="Cari icon..."
                                        class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none"
                                    >

                                    <p class="mt-2 text-xs text-gray-400">
                                        Cari berdasarkan nama icon Lucide.
                                    </p>
                                </div>

                                <div
                                    id="iconList"
                                    class="grid max-h-60 grid-cols-4 gap-2 overflow-y-auto p-3 sm:grid-cols-5"
                                ></div>

                                <div
                                    id="iconEmpty"
                                    class="hidden p-5 text-center text-sm text-gray-400"
                                >
                                    Icon tidak ditemukan.
                                </div>
                            </div>

                        </div>

                        {{-- TITLE --}}
                        <div>
                            <label for="title" class="mb-2 block text-sm font-medium text-gray-700">
                                Title <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                name="title"
                                id="title"
                                value="{{ old('title') }}"
                                required
                                placeholder="Contoh: INTEGRITY"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>

                        {{-- SUBTITLE --}}
                        <div>
                            <label for="subtitle" class="mb-2 block text-sm font-medium text-gray-700">
                                Subtitle
                            </label>

                            <input
                                type="text"
                                name="subtitle"
                                id="subtitle"
                                value="{{ old('subtitle') }}"
                                placeholder="Contoh: Do The Right Thing"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>

                        {{-- DESCRIPTION --}}
                        <div>
                            <label for="description" class="mb-2 block text-sm font-medium text-gray-700">
                                Description <span class="text-red-500">*</span>
                            </label>

                            <textarea
                                name="description"
                                id="description"
                                rows="4"
                                required
                                placeholder="Masukkan deskripsi Company Value"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500"
                            >{{ old('description') }}</textarea>
                        </div>

                        {{-- SORT ORDER --}}
                        <div>
                            <label for="sort_order" class="mb-2 block text-sm font-medium text-gray-700">
                                Urutan Tampilan
                            </label>

                            <input
                                type="number"
                                name="sort_order"
                                id="sort_order"
                                min="0"
                                value="{{ old('sort_order', ($values->max('sort_order') ?? 0) + 1) }}"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>

                        {{-- STATUS --}}
                        <div class="flex items-center gap-3">
                            <input
                                type="checkbox"
                                name="is_active"
                                id="is_active"
                                value="1"
                                {{ old('is_active', 1) ? 'checked' : '' }}
                                class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                            >

                            <label for="is_active" class="text-sm font-medium text-gray-700">
                                Aktifkan Company Value
                            </label>
                        </div>

                        <div class="rounded-lg bg-blue-50 p-3 text-xs leading-relaxed text-blue-700">
                            <strong>Catatan:</strong>
                            Preview akan berubah otomatis ketika kamu mengubah input.
                            Data baru hanya akan tersimpan setelah tombol Simpan Value ditekan.
                        </div>
                    </div>
                </div>

                {{-- ACTION BUTTON --}}
                <div class="flex flex-wrap justify-end gap-3">
                    <button
                        type="button"
                        id="cancelEdit"
                        class="hidden rounded-lg border border-gray-300 px-5 py-3 text-sm font-semibold text-gray-600 transition hover:bg-gray-50"
                    >
                        Batal Edit
                    </button>

                    <button
                        type="submit"
                        id="submitButton"
                        class="rounded-lg bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700"
                    >
                        Simpan Value
                    </button>
                </div>
            </div>

            {{-- KOLOM KANAN: LIVE PREVIEW --}}
            <div class="h-fit overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
                    {{-- PREVIEW HEADER --}}
                    <div class="flex items-center justify-between border-b border-gray-100 px-5 py-4">
                        <div>
                            <h2 class="font-semibold text-gray-800">
                                Live Preview
                            </h2>

                            <p class="text-xs text-gray-500">
                                Simulasi kartu Company Values ACCU
                            </p>
                        </div>

                        <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-medium text-green-700">
                            Preview
                        </span>
                    </div>

                    {{-- PREVIEW CONTENT --}}
                    <div class="bg-gray-100 p-5">
                        <div class="mx-auto max-w-xs rounded-3xl border border-blue-100 bg-gradient-to-b from-blue-50 to-white px-6 py-8 text-center shadow-sm">
                            {{-- ICON --}}
                            <div class="mx-auto flex h-28 w-28 items-center justify-center rounded-full border-4 border-blue-200 bg-gradient-to-br from-blue-500 to-blue-900 shadow-lg">
                                <span id="previewIcon" class="flex items-center justify-center text-white">
                                    <i data-lucide="shield-check" class="h-11 w-11"></i>
                                </span>
                            </div>

                            {{-- TITLE --}}
                            <h3
                                id="previewTitle"
                                class="mt-5 text-xl font-extrabold leading-tight text-slate-900"
                            >
                                INTEGRITY
                            </h3>

                            {{-- SUBTITLE --}}
                            <p
                                id="previewSubtitle"
                                class="mt-2 text-base italic text-slate-500"
                            >
                                Do The Right Thing
                            </p>

                            {{-- DIVIDER --}}
                            <div class="mx-auto my-6 h-1 w-12 rounded-full bg-blue-600"></div>

                            {{-- DESCRIPTION --}}
                            <p
                                id="previewDescription"
                                class="text-base leading-7 text-slate-600"
                            >
                                Kami menjunjung tinggi kejujuran, transparansi, dan tanggung jawab dalam setiap proses dan keputusan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- DAFTAR COMPANY VALUES --}}

    <div class="block w-full min-w-0 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

        <div class="w-full border-b border-gray-100 px-6 py-4">

            <div class="flex flex-wrap items-center justify-between gap-2">

                <div>

                    <h2 class="font-semibold text-gray-800">

                        Daftar Company Values

                    </h2>

                    <p class="mt-1 text-xs text-gray-500">

                        Kelola seluruh value yang sudah tersimpan.

                    </p>

                </div>

                <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-medium text-blue-700">

                    {{ $values->count() }} Value

                </span>

            </div>

        </div>

        @if($values->isEmpty())

            <div class="px-6 py-12 text-center">

                <i data-lucide="folder-open" class="h-8 w-8 text-gray-300"></i>

                <p class="mt-3 text-sm font-medium text-gray-600">

                    Belum ada Company Value.

                </p>

                <p class="mt-1 text-xs text-gray-400">

                    Tambahkan value pertama melalui form di atas.

                </p>

            </div>

        @else

            <div class="divide-y divide-gray-100">

                @foreach($values as $value)

                    <div class="flex w-full min-w-0 flex-col gap-4 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">

                        {{-- VALUE INFO --}}

                        <div class="flex min-w-0 items-start gap-4">

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-xl text-blue-700">

                                <i data-lucide="{{ $value->icon }}" class="h-6 w-6"></i>

                            </div>

                            <div class="min-w-0">

                                <div class="flex flex-wrap items-center gap-2">

                                    <h3 class="font-bold text-gray-800">

                                        {{ $value->title }}

                                    </h3>

                                    @if($value->is_active)

                                        <span class="rounded-full bg-green-50 px-2 py-0.5 text-xs font-medium text-green-700">

                                            Aktif

                                        </span>

                                    @else

                                        <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-500">

                                            Nonaktif

                                        </span>

                                    @endif

                                </div>

                                <p class="mt-1 text-sm italic text-gray-500">

                                    {{ $value->subtitle ?: '-' }}

                                </p>

                                <p class="mt-2 line-clamp-2 text-sm leading-relaxed text-gray-500">

                                    {{ $value->description }}

                                </p>

                                <p class="mt-2 text-xs text-gray-400">

                                    Urutan: {{ $value->sort_order }}

                                </p>

                            </div>

                        </div>

                        {{-- ACTIONS --}}

                        <div class="flex shrink-0 items-center gap-2">

                            <button

                                type="button"

                                class="editValue rounded-lg border border-blue-200 px-3 py-2 text-sm font-medium text-blue-600 transition hover:bg-blue-50"

                                data-id="{{ $value->id }}"

                                data-title="{{ $value->title }}"

                                data-subtitle="{{ $value->subtitle }}"

                                data-description="{{ $value->description }}"

                                data-icon="{{ $value->icon }}"

                                data-is-active="{{ $value->is_active ? 1 : 0 }}"

                                data-sort-order="{{ $value->sort_order }}"

                            >

                                <i data-lucide="square-pen" class="mr-1 inline-block h-4 w-4"></i>

                                Edit

                            </button>

                            <form

                                action="{{ route('admin.our-values.destroy', $value->id) }}"

                                method="POST"

                                onsubmit="return confirm('Yakin ingin menghapus Company Value ini?')"

                            >

                                @csrf

                                @method('DELETE')

                                <button

                                    type="submit"

                                    class="rounded-lg border border-red-200 px-3 py-2 text-sm font-medium text-red-600 transition hover:bg-red-50"

                                >

                                    <i data-lucide="trash-2" class="mr-1 inline-block h-4 w-4"></i>

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif

    </div>

</div>

<script src="https://unpkg.com/lucide@0.468.0/dist/umd/lucide.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    if (!window.lucide) {
        console.error('Lucide gagal dimuat. Periksa koneksi internet atau URL CDN.');
        return;
    }

    const form = document.getElementById('valueForm');
    const titleInput = document.getElementById('title');
    const subtitleInput = document.getElementById('subtitle');
    const descriptionInput = document.getElementById('description');
    const iconInput = document.getElementById('icon');
    const sortOrderInput = document.getElementById('sort_order');
    const activeInput = document.getElementById('is_active');

    const submitButton = document.getElementById('submitButton');
    const cancelButton = document.getElementById('cancelEdit');

    const previewIcon = document.getElementById('previewIcon');
    const previewTitle = document.getElementById('previewTitle');
    const previewSubtitle = document.getElementById('previewSubtitle');
    const previewDescription = document.getElementById('previewDescription');

    const iconPickerButton = document.getElementById('iconPickerButton');
    const iconPicker = document.getElementById('iconPicker');
    const iconSearch = document.getElementById('iconSearch');
    const iconList = document.getElementById('iconList');
    const iconEmpty = document.getElementById('iconEmpty');
    const selectedIcon = document.getElementById('selectedIcon');
    const selectedIconName = document.getElementById('selectedIconName');

    let editingId = null;

    // Daftar nama icon Lucide yang tersedia pada versi CDN di atas.
    const allIcons = [
        'activity', 'award', 'badge-check', 'book-open', 'briefcase',
        'building', 'calendar-check', 'check', 'check-circle-2',
        'clock', 'compass', 'crown', 'flag', 'folder-open', 'globe',
        'handshake', 'heart', 'info', 'lightbulb', 'medal',
        'message-circle', 'package', 'panorama', 'rocket', 'shield',
        'shield-check', 'settings', 'shapes', 'star', 'target',
        'thumbs-up', 'trending-up', 'users', 'wallet', 'zap', 'x'
    ];

    function renderLucide(root = document) {
        if (window.lucide) {
            window.lucide.createIcons({ attrs: { 'stroke-width': 1.8 } });
        }
    }

    function setIcon(container, name, classes) {
        const safeName = allIcons.includes(name) ? name : 'shapes';
        container.innerHTML = `<i data-lucide="${safeName}" class="${classes}"></i>`;
        renderLucide(container);
    }

    function updatePreview() {
        previewTitle.textContent = titleInput.value.trim() || 'INTEGRITY';
        previewSubtitle.textContent = subtitleInput.value.trim() || 'Do The Right Thing';
        previewDescription.textContent = descriptionInput.value.trim() ||
            'Deskripsi Company Value akan tampil di sini.';

        setIcon(previewIcon, iconInput.value || 'shield-check', 'h-11 w-11');
    }

    function selectIcon(icon) {
        iconInput.value = icon;
        setIcon(selectedIcon, icon, 'h-5 w-5 text-blue-600');
        selectedIconName.textContent = icon;
        selectedIconName.classList.remove('text-gray-500');
        iconPicker.classList.add('hidden');
        updatePreview();
    }

    function renderIcons(keyword = '') {
        const search = keyword.trim().toLowerCase();
        const filteredIcons = allIcons
            .filter(icon => icon.includes(search))
            .slice(0, 100);

        iconList.innerHTML = '';
        iconEmpty.classList.toggle('hidden', filteredIcons.length > 0);

        filteredIcons.forEach(icon => {
            const button = document.createElement('button');
            button.type = 'button';
            button.className =
                'flex flex-col items-center justify-center gap-2 rounded-lg border border-gray-100 p-3 text-gray-600 transition hover:border-blue-400 hover:bg-blue-50';

            button.innerHTML = `
                <i data-lucide="${icon}" class="h-6 w-6"></i>
                <span class="w-full truncate text-[10px]">${icon}</span>
            `;

            button.addEventListener('click', function () {
                selectIcon(icon);
            });

            iconList.appendChild(button);
        });

        renderLucide(iconList);
    }

    titleInput.addEventListener('input', updatePreview);
    subtitleInput.addEventListener('input', updatePreview);
    descriptionInput.addEventListener('input', updatePreview);

    iconPickerButton.addEventListener('click', function () {
        iconPicker.classList.toggle('hidden');

        if (!iconPicker.classList.contains('hidden')) {
            iconSearch.focus();
            renderIcons(iconSearch.value);
        }
    });

    iconSearch.addEventListener('input', function (event) {
        renderIcons(event.target.value);
    });

    // Edit value
    document.querySelectorAll('.editValue').forEach(button => {
        button.addEventListener('click', function () {
            editingId = this.dataset.id;

            titleInput.value = this.dataset.title || '';
            subtitleInput.value = this.dataset.subtitle || '';
            descriptionInput.value = this.dataset.description || '';
            iconInput.value = this.dataset.icon || 'shield-check';
            sortOrderInput.value = this.dataset.sortOrder || 0;
            activeInput.checked = this.dataset.isActive === '1';

            const iconName = iconInput.value;
            setIcon(selectedIcon, iconName, 'h-5 w-5 text-blue-600');
            selectedIconName.textContent = iconName;
            selectedIconName.classList.remove('text-gray-500');

            form.action = `/admin/our-values/${editingId}`;

            let methodInput = form.querySelector('input[name="_method"]');
            if (!methodInput) {
                methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                form.appendChild(methodInput);
            }
            methodInput.value = 'PUT';

            submitButton.textContent = 'Simpan Perubahan';
            cancelButton.classList.remove('hidden');
            updatePreview();

            form.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    function resetForm() {
        editingId = null;
        form.reset();
        form.action = @json(route('admin.our-values.store'));

        const methodInput = form.querySelector('input[name="_method"]');
        if (methodInput) methodInput.remove();

        iconInput.value = '';
        setIcon(selectedIcon, 'shapes', 'h-5 w-5 text-gray-400');
        selectedIconName.textContent = 'Pilih icon';
        selectedIconName.classList.add('text-gray-500');

        submitButton.textContent = 'Simpan Value';
        cancelButton.classList.add('hidden');
        iconPicker.classList.add('hidden');

        updatePreview();
    }

    cancelButton.addEventListener('click', resetForm);

    // Initial render, termasuk old input ketika validasi gagal.
    renderLucide();

    if (iconInput.value) {
        const iconName = iconInput.value;
        setIcon(selectedIcon, iconName, 'h-5 w-5 text-blue-600');
        selectedIconName.textContent = iconName;
        selectedIconName.classList.remove('text-gray-500');
    }

    updatePreview();

    // Pulihkan mode edit jika validasi PUT gagal.
    @if($errors->any() && old('_method') === 'PUT' && old('id'))
        editingId = @json(old('id'));
        form.action = `/admin/our-values/${editingId}`;
        submitButton.textContent = 'Simpan Perubahan';
        cancelButton.classList.remove('hidden');
    @endif
});
</script>

@endsection
