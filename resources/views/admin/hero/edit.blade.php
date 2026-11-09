
@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Pengaturan Hero</h1>
        <p class="mt-1 text-sm text-gray-500">
            Kelola tampilan utama website ACCU dan lihat hasilnya sebelum disimpan.
        </p>
    </div>

    @if(session('success'))
        <div class="rounded-lg bg-green-50 border border-green-200 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="rounded-lg bg-red-50 border border-red-200 px-4 py-3">
            <p class="font-semibold text-red-700">Ada kesalahan pada input:</p>
            <ul class="mt-2 list-disc pl-5 text-sm text-red-600">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.hero.update') }}"
          method="POST"
          enctype="multipart/form-data"
          class="grid grid-cols-1 xl:grid-cols-2 gap-6"
          id="heroForm">

        @csrf
        @method('PUT')

        {{-- KOLOM KIRI: FORM --}}
        <div class="space-y-6">

            {{-- Konten Hero --}}
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                <div class="border-b border-gray-100 px-6 py-4">
                    <h2 class="font-semibold text-gray-800">Konten Hero</h2>
                    <p class="mt-1 text-xs text-gray-500">
                        Atur tulisan yang muncul pada bagian utama website.
                    </p>
                </div>

                <div class="space-y-5 p-6">

                    <div>
                        <label for="subtitle" class="mb-2 block text-sm font-medium text-gray-700">
                            Subtitle
                        </label>
                        <input
                            type="text"
                            name="subtitle"
                            id="subtitle"
                            value="{{ old('subtitle', $hero->subtitle) }}"
                            placeholder="Contoh: Cleaning Service Solutions"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                    </div>

                    <div>
                        <label for="headline" class="mb-2 block text-sm font-medium text-gray-700">
                            Headline <span class="text-red-500">*</span>
                        </label>
                        <textarea
                            name="headline"
                            id="headline"
                            rows="3"
                            required
                            placeholder="Masukkan headline utama website"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500"
                        >{{ old('headline', $hero->headline) }}</textarea>
                        <p class="mt-1 text-xs text-gray-400">
                            Gunakan Enter jika ingin membuat baris baru pada preview.
                        </p>
                    </div>

                    <div>
                        <label for="description" class="mb-2 block text-sm font-medium text-gray-700">
                            Deskripsi
                        </label>
                        <textarea
                            name="description"
                            id="description"
                            rows="4"
                            placeholder="Masukkan deskripsi singkat perusahaan"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500"
                        >{{ old('description', $hero->description) }}</textarea>
                    </div>

                </div>
            </div>

            {{-- Media Hero --}}
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                <div class="border-b border-gray-100 px-6 py-4">
                    <h2 class="font-semibold text-gray-800">Media Hero</h2>
                    <p class="mt-1 text-xs text-gray-500">
                        Pilih gambar atau video sebagai tampilan utama.
                    </p>
                </div>

                <div class="space-y-5 p-6">

                    <div>
                        <label for="hero_type" class="mb-2 block text-sm font-medium text-gray-700">
                            Jenis Media
                        </label>
                        <select
                            name="hero_type"
                            id="hero_type"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                            <option value="image" {{ old('hero_type', $hero->hero_type) === 'image' ? 'selected' : '' }}>
                                Gambar
                            </option>
                            <option value="video" {{ old('hero_type', $hero->hero_type) === 'video' ? 'selected' : '' }}>
                                Video
                            </option>
                        </select>
                    </div>

                    {{-- Image --}}
                    <div id="imageFields">
                        <label for="image" class="mb-2 block text-sm font-medium text-gray-700">
                            Upload Gambar
                        </label>
                        <input
                            type="file"
                            name="image"
                            id="image"
                            accept="image/jpeg,image/png,image/webp"
                            class="block w-full rounded-lg border border-gray-300 text-sm file:mr-4 file:border-0 file:bg-gray-100 file:px-4 file:py-2.5 file:text-sm file:font-medium hover:file:bg-gray-200"
                        >
                        <p class="mt-1 text-xs text-gray-400">JPG, PNG, WEBP. Maksimal 5 MB.</p>
                    </div>

                    {{-- Video --}}
                    <div id="videoFields" class="space-y-5">
                        <div>
                            <label for="video" class="mb-2 block text-sm font-medium text-gray-700">
                                Upload Video
                            </label>
                            <input
                                type="file"
                                name="video"
                                id="video"
                                accept="video/mp4,video/webm"
                                class="block w-full rounded-lg border border-gray-300 text-sm file:mr-4 file:border-0 file:bg-gray-100 file:px-4 file:py-2.5 file:text-sm file:font-medium hover:file:bg-gray-200"
                            >
                            <p class="mt-1 text-xs text-gray-400">MP4 atau WEBM. Maksimal 50 MB.</p>
                        </div>

                        <div>
                            <label for="video_poster" class="mb-2 block text-sm font-medium text-gray-700">
                                Poster Video
                            </label>
                            <input
                                type="file"
                                name="video_poster"
                                id="video_poster"
                                accept="image/jpeg,image/png,image/webp"
                                class="block w-full rounded-lg border border-gray-300 text-sm file:mr-4 file:border-0 file:bg-gray-100 file:px-4 file:py-2.5 file:text-sm file:font-medium hover:file:bg-gray-200"
                            >
                            <p class="mt-1 text-xs text-gray-400">Gambar yang ditampilkan sebelum video diputar.</p>
                        </div>
                    </div>

                    <div class="rounded-lg bg-blue-50 p-3 text-xs text-blue-700">
                        <strong>Catatan:</strong> Preview di sebelah kanan akan berubah saat kamu memilih file.
                        File baru baru akan tersimpan setelah tombol Simpan Perubahan ditekan.
                    </div>

                </div>
            </div>

            {{-- Tombol Hero --}}
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                <div class="border-b border-gray-100 px-6 py-4">
                    <h2 class="font-semibold text-gray-800">Tombol Hero</h2>
                    <p class="mt-1 text-xs text-gray-500">
                        Atur tombol yang ditampilkan pada bagian Hero.
                    </p>
                </div>

                <div class="space-y-5 p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="button_text" class="mb-2 block text-sm font-medium text-gray-700">
                                Teks Tombol Utama
                            </label>
                            <input
                                type="text"
                                name="button_text"
                                id="button_text"
                                value="{{ old('button_text', $hero->button_text) }}"
                                placeholder="Contoh: Lihat Layanan"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>

                        <div>
                            <label for="button_url" class="mb-2 block text-sm font-medium text-gray-700">
                                Link Tombol Utama
                            </label>
                            <input
                                type="text"
                                name="button_url"
                                id="button_url"
                                value="{{ old('button_url', $hero->button_url) }}"
                                placeholder="#services"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="secondary_button_text" class="mb-2 block text-sm font-medium text-gray-700">
                                Teks Tombol Kedua
                            </label>
                            <input
                                type="text"
                                name="secondary_button_text"
                                id="secondary_button_text"
                                value="{{ old('secondary_button_text', $hero->secondary_button_text) }}"
                                placeholder="Contoh: Hubungi Kami"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>

                        <div>
                            <label for="secondary_button_url" class="mb-2 block text-sm font-medium text-gray-700">
                                Link Tombol Kedua
                            </label>
                            <input
                                type="text"
                                name="secondary_button_url"
                                id="secondary_button_url"
                                value="{{ old('secondary_button_url', $hero->secondary_button_url) }}"
                                placeholder="#contact"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>
                    </div>

                </div>
            </div>

            <div class="flex justify-end">
                <button
                    type="submit"
                    class="rounded-lg bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700"
                >
                    Simpan Perubahan
                </button>
            </div>

        </div>

        {{-- KOLOM KANAN: LIVE PREVIEW --}}
        <div class="xl:sticky xl:top-6 xl:self-start space-y-4">

            <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

                {{-- PREVIEW HEADER --}}
                <div class="flex items-center justify-between border-b border-gray-100 px-5 py-4">
                    <div>
                        <h2 class="font-semibold text-gray-800">Live Preview</h2>
                        <p class="text-xs text-gray-500">Simulasi tampilan Hero website ACCU</p>
                    </div>

                    <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-medium text-green-700">
                        Preview
                    </span>
                </div>

                <div class="bg-gray-100 p-3 sm:p-5">

                    {{-- IMAGE PREVIEW --}}
                    <div id="imagePreview"
                        class="{{ $hero->hero_type === 'video' ? 'hidden' : '' }} overflow-hidden rounded-xl bg-white shadow-sm">

                        <div class="grid grid-cols-1 gap-5 p-5 md:grid-cols-2 md:items-center">

                            <div>
                                <p id="imagePreviewSubtitle"
                                    class="mb-3 text-xs font-bold uppercase tracking-widest text-blue-700">
                                    {{ $hero->subtitle ?: 'Cleaning Service Solutions' }}
                                </p>

                                <h2 id="imagePreviewHeadline"
                                    class="whitespace-pre-line text-xl font-extrabold leading-tight text-slate-900 sm:text-2xl">
                                    {{ $hero->headline }}
                                </h2>

                                <p id="imagePreviewDescription"
                                    class="mt-3 text-xs leading-6 text-slate-500 sm:text-sm">
                                    {{ $hero->description }}
                                </p>

                                <div class="mt-5 flex flex-wrap gap-2">

                                    <a id="imagePreviewPrimaryButton"
                                        href="{{ $hero->button_url ?: '#services' }}"
                                        class="rounded-full bg-blue-700 px-4 py-2.5 text-xs font-semibold text-white {{ $hero->button_text ? '' : 'hidden' }}">
                                        {{ $hero->button_text }}
                                    </a>

                                    <a id="imagePreviewSecondaryButton"
                                        href="{{ $hero->secondary_button_url ?: '#contact' }}"
                                        class="rounded-full border border-slate-300 px-4 py-2.5 text-xs font-semibold text-slate-700 {{ $hero->secondary_button_text ? '' : 'hidden' }}">
                                        {{ $hero->secondary_button_text }}
                                    </a>

                                </div>
                            </div>

                            <div class="relative">
                                <img id="imagePreviewMedia"
                                    src="{{ $hero->image ? Storage::url($hero->image) : asset('images/hero-cleaning.png') }}"
                                    class="h-64 w-full rounded-xl object-cover"
                                    alt="Hero Image Preview">

                                <div class="absolute inset-x-0 bottom-0 rounded-b-xl bg-gradient-to-t from-slate-950/80 to-transparent p-4">
                                    <p class="text-[10px] font-bold uppercase tracking-widest text-blue-300">
                                        ACCU Commitment
                                    </p>
                                    <p class="mt-1 text-sm font-bold text-white">
                                        Quality Service for a Cleaner Tomorrow
                                    </p>
                                </div>
                            </div>

                        </div>

                        {{-- IMAGE FEATURES --}}
                        <div class="grid grid-cols-2 gap-3 border-t border-slate-100 p-5 sm:grid-cols-4">
                            @foreach(['Profesional', 'Berkualitas', 'Ramah Lingkungan', 'Fokus Pelanggan'] as $feature)
                                <div class="flex items-center gap-2 text-[10px] font-medium text-slate-600">
                                    <span class="h-2 w-2 shrink-0 rounded-full bg-blue-600"></span>
                                    {{ $feature }}
                                </div>
                            @endforeach
                        </div>

                    </div>

                    {{-- VIDEO PREVIEW --}}
                    <div id="videoPreview"
                        class="{{ $hero->hero_type === 'video' ? '' : 'hidden' }} relative isolate flex min-h-[420px] items-end justify-center overflow-hidden rounded-xl bg-slate-900 sm:min-h-[500px]">

                        {{-- VIDEO BACKGROUND --}}
                        <div class="absolute inset-0 -z-20">

                            <video id="previewVideo"
                                class="h-full w-full object-cover"
                                autoplay
                                muted
                                loop
                                playsinline
                                preload="metadata"
                                poster="{{ $hero->video_poster ? Storage::url($hero->video_poster) : ($hero->image ? Storage::url($hero->image) : asset('images/hero-cleaning.png')) }}">

                                @if($hero->video)
                                    <source src="{{ Storage::url($hero->video) }}" type="video/mp4">
                                @endif

                            </video>

                        </div>

                        {{-- LIGHT OVERLAY --}}
                        <div class="absolute inset-0 -z-10 bg-slate-950/10"></div>

                        {{-- VIDEO PLACEHOLDER --}}
                        <div id="videoPlaceholder"
                            class="absolute inset-0 -z-10 flex items-center justify-center bg-slate-200 text-sm text-slate-500 {{ $hero->video ? 'hidden' : '' }}">
                            Pilih video untuk melihat preview
                        </div>

                        {{-- VIDEO CONTENT --}}
                        <div class="w-full px-4 pb-6 sm:px-7 sm:pb-8">

                            <div class="mx-auto max-w-md rounded-2xl border border-blue-300/30 bg-[#061F43]/90 px-5 py-6 text-center shadow-xl backdrop-blur-sm sm:px-7 sm:py-8">

                                <p id="videoPreviewSubtitle"
                                    class="mb-3 text-[10px] font-bold uppercase tracking-[0.18em] text-sky-400 sm:text-xs">
                                    {{ $hero->subtitle ?: 'YOUR FACILITY SERVICE SOLUTION' }}
                                </p>

                                <h2 id="videoPreviewHeadline"
                                    class="whitespace-pre-line text-lg font-extrabold leading-tight text-white sm:text-2xl">
                                    {{ $hero->headline }}
                                </h2>

                                <p id="videoPreviewDescription"
                                    class="mt-3 text-xs leading-6 text-white/90 sm:text-sm">
                                    {{ $hero->description }}
                                </p>

                                <div class="mt-5 flex flex-wrap justify-center gap-2">

                                    <a id="videoPreviewPrimaryButton"
                                        href="{{ $hero->button_url ?: '#services' }}"
                                        class="inline-flex items-center rounded-full bg-[#0866B2] px-4 py-2.5 text-xs font-bold text-white {{ $hero->button_text ? '' : 'hidden' }}">
                                        {{ $hero->button_text }}
                                        <span class="ml-2">↗</span>
                                    </a>

                                    <a id="videoPreviewSecondaryButton"
                                        href="{{ $hero->secondary_button_url ?: '#contact' }}"
                                        class="inline-flex items-center rounded-full border border-white/70 bg-white/10 px-4 py-2.5 text-xs font-bold text-white {{ $hero->secondary_button_text ? '' : 'hidden' }}">
                                        {{ $hero->secondary_button_text }}
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <p class="text-xs leading-relaxed text-gray-400">
                Preview merupakan simulasi tampilan Hero. Ukuran dan posisi dapat sedikit berbeda mengikuti ukuran layar website.
            </p>

        </div>
</form>


    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        // FORM INPUT
        const subtitle = document.getElementById('subtitle');
        const headline = document.getElementById('headline');
        const description = document.getElementById('description');

        const buttonText = document.getElementById('button_text');
        const buttonUrl = document.getElementById('button_url');

        const secondaryText = document.getElementById('secondary_button_text');
        const secondaryUrl = document.getElementById('secondary_button_url');

        const heroType = document.getElementById('hero_type');

        const imageInput = document.getElementById('image');
        const videoInput = document.getElementById('video');
        const posterInput = document.getElementById('video_poster');

        // FIELD MEDIA
        const imageFields = document.getElementById('imageFields');
        const videoFields = document.getElementById('videoFields');

        // PREVIEW CONTAINER
        const imagePreview = document.getElementById('imagePreview');
        const videoPreview = document.getElementById('videoPreview');

        // IMAGE ELEMENT
        const imageMedia = document.getElementById('imagePreviewMedia');

        // VIDEO ELEMENT
        const previewVideo = document.getElementById('previewVideo');
        const videoPlaceholder = document.getElementById('videoPlaceholder');

        // TEXT ELEMENTS
        const imageSubtitle = document.getElementById('imagePreviewSubtitle');
        const imageHeadline = document.getElementById('imagePreviewHeadline');
        const imageDescription = document.getElementById('imagePreviewDescription');

        const videoSubtitle = document.getElementById('videoPreviewSubtitle');
        const videoHeadline = document.getElementById('videoPreviewHeadline');
        const videoDescription = document.getElementById('videoPreviewDescription');

        // BUTTON ELEMENTS
        const imagePrimary = document.getElementById('imagePreviewPrimaryButton');
        const imageSecondary = document.getElementById('imagePreviewSecondaryButton');

        const videoPrimary = document.getElementById('videoPreviewPrimaryButton');
        const videoSecondary = document.getElementById('videoPreviewSecondaryButton');

        // DEFAULT TEXT
        const defaultSubtitle = 'YOUR FACILITY SERVICE SOLUTION';
        const defaultHeadline = 'Solusi Kebersihan Profesional untuk Setiap Kebutuhan Bisnis Anda.';
        const defaultDescription = 'Deskripsi perusahaan akan ditampilkan di sini.';

        // UPDATE TEXT
        function updateTextPreview() {

            const subtitleValue = subtitle.value.trim() || defaultSubtitle;
            const headlineValue = headline.value.trim() || defaultHeadline;
            const descriptionValue = description.value.trim() || defaultDescription;

            imageSubtitle.textContent = subtitleValue;
            videoSubtitle.textContent = subtitleValue;

            imageHeadline.textContent = headlineValue;
            videoHeadline.textContent = headlineValue;

            imageDescription.textContent = descriptionValue;
            videoDescription.textContent = descriptionValue;

            // PRIMARY BUTTON
            const primaryText = buttonText.value.trim();

            imagePrimary.textContent = primaryText || 'Lihat Layanan';
            videoPrimary.innerHTML = primaryText
                ? primaryText + ' <span class="ml-2">↗</span>'
                : 'Lihat Layanan';

            imagePrimary.href = buttonUrl.value.trim() || '#services';
            videoPrimary.href = buttonUrl.value.trim() || '#services';

            imagePrimary.classList.toggle('hidden', !primaryText);
            videoPrimary.classList.toggle('hidden', !primaryText);

            // SECONDARY BUTTON
            const secondText = secondaryText.value.trim();

            imageSecondary.textContent = secondText || 'Hubungi Kami';
            videoSecondary.textContent = secondText || 'Hubungi Kami';

            imageSecondary.href = secondaryUrl.value.trim() || '#contact';
            videoSecondary.href = secondaryUrl.value.trim() || '#contact';

            imageSecondary.classList.toggle('hidden', !secondText);
            videoSecondary.classList.toggle('hidden', !secondText);
        }

        // UPDATE MEDIA TYPE
        function updateMediaFields() {

            const isImage = heroType.value === 'image';

            imageFields.classList.toggle('hidden', !isImage);
            videoFields.classList.toggle('hidden', isImage);

            imagePreview.classList.toggle('hidden', !isImage);
            videoPreview.classList.toggle('hidden', isImage);

            if (isImage) {
                previewVideo.pause();
            } else if (previewVideo.querySelector('source')) {
                previewVideo.play().catch(() => {});
            }
        }

        // IMAGE UPLOAD PREVIEW
        imageInput.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) return;

            const objectUrl = URL.createObjectURL(file);

            imageMedia.src = objectUrl;
        });

        // VIDEO UPLOAD PREVIEW
        videoInput.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) return;

            const objectUrl = URL.createObjectURL(file);

            previewVideo.pause();

            previewVideo.innerHTML = '';

            const source = document.createElement('source');

            source.src = objectUrl;
            source.type = file.type;

            previewVideo.appendChild(source);

            previewVideo.load();

            videoPlaceholder.classList.add('hidden');

            previewVideo.play().catch(() => {});
        });

        // VIDEO POSTER PREVIEW
        posterInput.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) return;

            previewVideo.poster = URL.createObjectURL(file);
        });

        // LISTENERS
        [
            subtitle,
            headline,
            description,
            buttonText,
            buttonUrl,
            secondaryText,
            secondaryUrl
        ].forEach(function (input) {
            input.addEventListener('input', updateTextPreview);
        });

        heroType.addEventListener('change', updateMediaFields);

        // INITIALIZE
        updateTextPreview();
        updateMediaFields();

    });
</script>
@endsection
