
@extends('layouts.admin')

@section('content')

<div class="space-y-6">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- HEADER --}}
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-slate-800">
                About Section
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Kelola informasi dan tampilan profil perusahaan.
            </p>
        </div>

        {{-- SUCCESS MESSAGE --}}
        @if (session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        {{-- ERROR MESSAGE --}}
        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                <ul class="list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('admin.about.update') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 items-start gap-8 lg:grid-cols-12">

                {{-- ==========================================
                    LEFT: FORM
                =========================================== --}}
                <div class="space-y-6 lg:col-span-5">

                    {{-- KONTEN ABOUT --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                        <h2 class="text-lg font-bold text-slate-800">
                            Konten About
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Edit konten yang ditampilkan pada website.
                        </p>

                        {{-- TITLE --}}
                        <div class="mt-6">
                            <label for="title"
                                class="mb-2 block text-sm font-semibold text-slate-700">
                                Judul About
                            </label>

                            <input
                                type="text"
                                id="title"
                                name="title"
                                value="{{ old('title', $profile->title) }}"
                                maxlength="255"
                                required
                                class="w-full rounded-xl border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Mengenal Lebih Dekat ACCU"
                            >
                        </div>

                        {{-- DESCRIPTION --}}
                        <div class="mt-5">
                            <label for="description"
                                class="mb-2 block text-sm font-semibold text-slate-700">
                                Deskripsi Perusahaan
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="7"
                                class="w-full rounded-xl border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Masukkan deskripsi perusahaan..."
                            >{{ old('description', $profile->description) }}</textarea>
                        </div>

                        <div class="mt-6 border-t border-slate-100 pt-6">

                            <h3 class="mb-5 text-sm font-bold text-slate-800">
                                Informasi Perusahaan
                            </h3>

                            <div class="space-y-5">

                                {{-- IZIN USAHA --}}
                                <div>
                                    <label for="business_license"
                                        class="mb-2 block text-sm font-semibold text-slate-700">
                                        Izin Usaha
                                    </label>

                                    <textarea
                                        id="business_license"
                                        name="business_license"
                                        rows="4"
                                        class="w-full rounded-xl border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Masukkan setiap informasi izin usaha pada baris baru"
                                    >{{ old('business_license', $profile->business_license) }}</textarea>

                                    <p class="mt-1 text-xs text-slate-400">
                                        Pisahkan setiap poin izin usaha dengan baris baru.
                                    </p>
                                </div>

                                {{-- ALAMAT --}}
                                <div>
                                    <label for="address"
                                        class="mb-2 block text-sm font-semibold text-slate-700">
                                        Alamat Perusahaan
                                    </label>

                                    <textarea
                                        id="address"
                                        name="address"
                                        rows="3"
                                        class="w-full rounded-xl border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Masukkan alamat perusahaan"
                                    >{{ old('address', $profile->address) }}</textarea>
                                </div>

                                {{-- COVERED AREA --}}
                                <div>
                                    <label for="covered_area"
                                        class="mb-2 block text-sm font-semibold text-slate-700">
                                        Covered Area
                                    </label>

                                    <input
                                        type="text"
                                        id="covered_area"
                                        name="covered_area"
                                        value="{{ old('covered_area', $profile->covered_area) }}"
                                        class="w-full rounded-xl border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Contoh: Nasional"
                                    >
                                </div>

                                {{-- TELEPON --}}
                                <div>
                                    <label for="phone"
                                        class="mb-2 block text-sm font-semibold text-slate-700">
                                        Nomor Telepon
                                    </label>

                                    <input
                                        type="text"
                                        id="phone"
                                        name="phone"
                                        value="{{ old('phone', $profile->phone) }}"
                                        class="w-full rounded-xl border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Contoh: 0878 6236 6096"
                                    >
                                </div>

                                {{-- EMAIL --}}
                                <div>
                                    <label for="email"
                                        class="mb-2 block text-sm font-semibold text-slate-700">
                                        Email Perusahaan
                                    </label>

                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        value="{{ old('email', $profile->email) }}"
                                        class="w-full rounded-xl border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="marketing@abhinaya-accu.com"
                                    >
                                </div>

                            </div>
                        </div>

                    </div>

                    {{-- ==========================================
                        GAMBAR PERUSAHAAN
                    =========================================== --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                        <h2 class="text-lg font-bold text-slate-800">
                            Gambar Perusahaan
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Upload gambar untuk bagian kanan About.
                        </p>

                        <div class="mt-5">
                            <label for="image"
                                class="mb-2 block text-sm font-semibold text-slate-700">
                                Pilih Gambar
                            </label>

                            <input
                                type="file"
                                id="image"
                                name="image"
                                accept="image/jpeg,image/png,image/webp"
                                class="block w-full cursor-pointer rounded-xl border border-slate-300 text-sm file:mr-4 file:border-0 file:bg-blue-50 file:px-4 file:py-3 file:font-semibold file:text-blue-700 hover:file:bg-blue-100"
                            >

                            <p class="mt-2 text-xs text-slate-400">
                                JPG, PNG, WEBP. Maksimal 5 MB.
                            </p>
                        </div>

                        @if ($profile->image)
                            <div class="mt-5">
                                <p class="mb-2 text-sm font-medium text-slate-600">
                                    Gambar saat ini
                                </p>

                                <img
                                    src="{{ asset('storage/' . $profile->image) }}"
                                    alt="Gambar About saat ini"
                                    class="h-40 w-full rounded-xl object-cover"
                                >
                            </div>
                        @endif

                    </div>

                    {{-- SAVE BUTTON --}}
                    <button
                        type="submit"
                        class="w-full rounded-xl bg-[#0866B2] px-6 py-3 font-semibold text-white shadow-lg shadow-blue-900/10 transition hover:bg-blue-800"
                    >
                        Simpan Perubahan
                    </button>

                </div>


                {{-- ==========================================
                    RIGHT: LIVE PREVIEW
                =========================================== --}}
                <div class="lg:col-span-7">

                    <div class="sticky top-6 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                        {{-- PREVIEW HEADER --}}
                        <div class="mb-5 flex items-center justify-between">

                            <div>
                                <h2 class="font-bold text-slate-800">
                                    Live Preview
                                </h2>

                                <p class="text-xs text-slate-500">
                                    Tampilan About Section
                                </p>
                            </div>

                            <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-600">
                                Live
                            </span>

                        </div>

                        {{-- PREVIEW AREA --}}
                        <div class="overflow-hidden rounded-xl border border-slate-200 bg-slate-50">

                            <section class="relative overflow-hidden px-5 py-10 sm:px-8">

                                {{-- BACKGROUND DECORATION --}}
                                <div class="pointer-events-none absolute -right-20 top-0 h-48 w-48 rounded-full bg-blue-100/60 blur-3xl"></div>

                                <div class="pointer-events-none absolute -bottom-20 -left-20 h-48 w-48 rounded-full bg-sky-100/60 blur-3xl"></div>

                                <div class="relative">

                                    {{-- HEADING --}}
                                    <div class="text-center">

                                        <span class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-white px-4 py-2 text-[9px] font-bold uppercase tracking-[0.2em] text-blue-800 shadow-sm">
                                            <span class="h-2 w-2 rounded-full bg-green-500"></span>
                                            About Our Company
                                        </span>

                                        <h2
                                            id="previewTitle"
                                            class="mt-5 text-2xl font-extrabold leading-tight tracking-tight text-slate-900 sm:text-3xl"
                                        >
                                            {{ $profile->title }}
                                        </h2>

                                        <div class="mx-auto mt-4 h-1.5 w-20 rounded-full bg-gradient-to-r from-blue-800 to-sky-400"></div>

                                        <p
                                            id="previewDescription"
                                            class="mx-auto mt-6 max-w-2xl whitespace-pre-line text-sm leading-7 text-slate-600"
                                        >{{ $profile->description }}</p>

                                    </div>


                                    {{-- COMPANY INFORMATION --}}
                                    <div class="mt-8 grid gap-5 sm:grid-cols-2">

                                        {{-- INFORMATION CARDS --}}
                                        <div class="space-y-3">

                                            {{-- IZIN USAHA --}}
                                            <div class="rounded-2xl border border-blue-100 bg-white p-4 shadow-sm">

                                                <p class="text-xs font-bold text-slate-800">
                                                    Izin Usaha
                                                </p>

                                                <p
                                                    id="previewBusinessLicense"
                                                    class="mt-2 whitespace-pre-line text-[10px] leading-5 text-slate-500"
                                                >{{ $profile->business_license }}</p>

                                            </div>


                                            {{-- ALAMAT --}}
                                            <div class="rounded-2xl border border-blue-100 bg-white p-4 shadow-sm">

                                                <p class="text-xs font-bold text-slate-800">
                                                    Alamat
                                                </p>

                                                <p
                                                    id="previewAddress"
                                                    class="mt-2 text-[10px] leading-5 text-slate-500"
                                                >{{ $profile->address }}</p>

                                            </div>


                                            {{-- COVERED AREA --}}
                                            <div class="rounded-2xl border border-blue-100 bg-white p-4 shadow-sm">

                                                <p class="text-xs font-bold text-slate-800">
                                                    Covered Area
                                                </p>

                                                <p
                                                    id="previewCoveredArea"
                                                    class="mt-1 text-[10px] text-slate-500"
                                                >{{ $profile->covered_area }}</p>

                                            </div>


                                            {{-- TELEPON & EMAIL --}}
                                            <div class="rounded-2xl border border-blue-100 bg-white p-4 shadow-sm">

                                                <p class="text-xs font-bold text-slate-800">
                                                    Telepon & Email
                                                </p>

                                                <p
                                                    id="previewPhone"
                                                    class="mt-1 text-[10px] text-slate-500"
                                                >{{ $profile->phone }}</p>

                                                <p
                                                    id="previewEmail"
                                                    class="break-all text-[10px] text-slate-500"
                                                >{{ $profile->email }}</p>

                                            </div>

                                        </div>


                                        {{-- IMAGE PREVIEW --}}
                                        <div class="relative min-h-[280px] overflow-hidden rounded-2xl bg-blue-100 shadow-lg">

                                            <img
                                                id="previewImage"
                                                src="{{ $profile->image ? asset('storage/' . $profile->image) : asset('images/profile-office.png') }}"
                                                alt="Preview About"
                                                class="absolute inset-0 h-full w-full object-cover"
                                            >

                                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/10 to-transparent"></div>

                                            <div class="absolute bottom-0 left-0 p-5">

                                                <span class="text-[9px] font-bold uppercase tracking-[0.2em] text-sky-300">
                                                    Trusted Partner
                                                </span>

                                                <h3 class="mt-2 text-xl font-extrabold leading-tight text-white">
                                                    For A Better Tomorrow.
                                                </h3>

                                                <p class="mt-2 text-xs leading-5 text-blue-100">
                                                    Menjadi mitra terpercaya dalam menyediakan solusi kebutuhan bisnis dan tenaga kerja profesional.
                                                </p>

                                                <div class="mt-4 h-1 w-12 rounded-full bg-gradient-to-r from-yellow-400 to-sky-400"></div>

                                            </div>

                                            <div class="absolute left-3 top-3 rounded-xl border border-blue-100 bg-white p-3 shadow-lg">

                                                <p class="text-[9px] font-semibold uppercase tracking-wider text-slate-500">
                                                    Established
                                                </p>

                                                <p class="mt-1 text-xl font-extrabold text-blue-800">
                                                    2022
                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </section>

                        </div>

                        <p class="mt-4 text-xs leading-5 text-slate-400">
                            Preview akan berubah secara langsung saat kamu mengedit judul, deskripsi, informasi perusahaan, atau memilih gambar baru.
                        </p>

                    </div>

                </div>

            </div>

        </form>

    </div>
</div>


{{-- ==========================================
    LIVE PREVIEW SCRIPT
=========================================== --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    // =====================================
    // INPUT ELEMENTS
    // =====================================

    const titleInput = document.getElementById('title');
    const descriptionInput = document.getElementById('description');
    const imageInput = document.getElementById('image');

    const licenseInput = document.getElementById('business_license');
    const addressInput = document.getElementById('address');
    const areaInput = document.getElementById('covered_area');
    const phoneInput = document.getElementById('phone');
    const emailInput = document.getElementById('email');


    // =====================================
    // PREVIEW ELEMENTS
    // =====================================

    const previewTitle = document.getElementById('previewTitle');
    const previewDescription = document.getElementById('previewDescription');
    const previewImage = document.getElementById('previewImage');

    const previewLicense = document.getElementById('previewBusinessLicense');
    const previewAddress = document.getElementById('previewAddress');
    const previewArea = document.getElementById('previewCoveredArea');
    const previewPhone = document.getElementById('previewPhone');
    const previewEmail = document.getElementById('previewEmail');


    // =====================================
    // CONNECT TEXT INPUT WITH LIVE PREVIEW
    // =====================================

    function connectPreview(input, preview, fallback = '') {

        if (!input || !preview) {
            return;
        }

        // Update ketika halaman pertama kali dimuat
        preview.textContent = input.value || fallback;

        // Update setiap kali input berubah
        input.addEventListener('input', function () {

            preview.textContent = this.value || fallback;

        });

    }


    // =====================================
    // TITLE
    // =====================================

    connectPreview(
        titleInput,
        previewTitle,
        'Mengenal Lebih Dekat ACCU'
    );


    // =====================================
    // DESCRIPTION
    // =====================================

    connectPreview(
        descriptionInput,
        previewDescription,
        ''
    );


    // =====================================
    // COMPANY INFORMATION
    // =====================================

    connectPreview(
        licenseInput,
        previewLicense,
        'Informasi izin usaha belum diisi.'
    );

    connectPreview(
        addressInput,
        previewAddress,
        'Alamat perusahaan belum diisi.'
    );

    connectPreview(
        areaInput,
        previewArea,
        'Belum diisi'
    );

    connectPreview(
        phoneInput,
        previewPhone,
        'Belum diisi'
    );

    connectPreview(
        emailInput,
        previewEmail,
        'Belum diisi'
    );


    // =====================================
    // IMAGE PREVIEW
    // =====================================

    let currentImageUrl = null;

    if (imageInput && previewImage) {

        imageInput.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) {
                return;
            }

            // Validasi tipe file
            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];

            if (!allowedTypes.includes(file.type)) {
                alert('Format gambar harus JPG, PNG, atau WEBP.');
                this.value = '';
                return;
            }

            // Validasi ukuran maksimal 5 MB
            if (file.size > 5 * 1024 * 1024) {
                alert('Ukuran gambar maksimal 5 MB.');
                this.value = '';
                return;
            }

            // Hapus URL gambar preview sebelumnya
            if (currentImageUrl) {
                URL.revokeObjectURL(currentImageUrl);
            }

            // Buat preview gambar baru
            currentImageUrl = URL.createObjectURL(file);

            previewImage.src = currentImageUrl;

        });

    }

});
</script>

@endsection
