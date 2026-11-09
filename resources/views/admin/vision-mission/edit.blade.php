
@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-slate-800">
            Visi & Misi
        </h1>
        <p class="mt-1 text-sm text-slate-500">
            Kelola visi dan misi perusahaan ACCU.
        </p>
    </div>

    @if (session('success'))
        <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            <p class="font-semibold">Periksa kembali input kamu:</p>
            <ul class="mt-2 list-inside list-disc">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.vision-mission.update') }}"
          method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">

            {{-- FORM --}}
            <div class="space-y-6">

                {{-- Visi --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="mb-5">
                        <h2 class="text-lg font-semibold text-slate-800">
                            Visi Perusahaan
                        </h2>
                        <p class="mt-1 text-sm text-slate-500">
                            Tuliskan visi utama perusahaan.
                        </p>
                    </div>

                    <textarea
                        id="vision"
                        name="vision"
                        rows="5"
                        required
                        placeholder="Masukkan visi perusahaan..."
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >{{ old('vision', $vision->content) }}</textarea>
                </div>

                {{-- Misi --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                    <div class="mb-5 flex items-center justify-between gap-3">
                        <div>
                            <h2 class="text-lg font-semibold text-slate-800">
                                Misi Perusahaan
                            </h2>
                            <p class="mt-1 text-sm text-slate-500">
                                Tambahkan poin-poin misi perusahaan.
                            </p>
                        </div>

                        <button
                            type="button"
                            id="addMission"
                            class="shrink-0 rounded-lg bg-blue-50 px-4 py-2 text-sm font-semibold text-blue-600 transition hover:bg-blue-100">
                            + Tambah Misi
                        </button>
                    </div>

                    <div id="missionContainer" class="space-y-3">

                        @php
                            $missionValues = old(
                                'missions',
                                $missions->pluck('content')->toArray()
                            );
                        @endphp

                        @foreach ($missionValues as $index => $mission)
                            <div class="mission-item flex items-start gap-3">

                                <span class="mission-number flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-sm font-bold text-blue-600">
                                    {{ $index + 1 }}
                                </span>

                                <textarea
                                    name="missions[]"
                                    rows="2"
                                    required
                                    placeholder="Tuliskan misi perusahaan..."
                                    class="mission-input min-w-0 flex-1 rounded-xl border border-slate-300 px-4 py-2.5 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                                >{{ $mission }}</textarea>

                                <button
                                    type="button"
                                    class="remove-mission rounded-lg p-2.5 text-red-500 transition hover:bg-red-50"
                                    title="Hapus misi">
                                    ✕
                                </button>

                            </div>
                        @endforeach

                    </div>

                    <p class="mt-4 text-xs text-slate-400">
                        Minimal harus ada satu misi perusahaan.
                    </p>
                </div>

                {{-- Tombol Simpan --}}
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                        Simpan Perubahan
                    </button>
                </div>

            </div>

            {{-- LIVE PREVIEW --}}
            <div class="h-fit overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
                    <div>
                        <h2 class="font-semibold text-slate-800">
                            Live Preview
                        </h2>
                        <p class="text-xs text-slate-500">
                            Tampilan sementara website.
                        </p>
                    </div>

                    <span class="flex items-center gap-2 rounded-full bg-green-50 px-3 py-1.5 text-xs font-medium text-green-600">
                        <span class="h-2 w-2 rounded-full bg-green-500"></span>
                        Live
                    </span>
                </div>

                <div class="bg-slate-950 p-6 text-white sm:p-8">

                    <div class="mb-8 text-center">
                        <span class="text-xs font-semibold uppercase tracking-[0.25em] text-blue-400">
                            ACCU
                        </span>

                        <h2 class="mt-3 text-2xl font-bold">
                            Visi & Misi Kami
                        </h2>

                        <div class="mx-auto mt-3 h-1 w-16 rounded-full bg-blue-500"></div>
                    </div>

                    {{-- Preview Visi --}}
                    <div class="mb-6 rounded-2xl border border-blue-400/20 bg-slate-900 p-6">

                        <div class="mb-4 flex items-center gap-3">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-500/15 text-xl text-blue-400">
                                ◎
                            </div>

                            <h3 class="text-lg font-bold">
                                Visi
                            </h3>
                        </div>

                        <p id="previewVision"
                           class="whitespace-pre-line text-sm leading-7 text-slate-300">{{ old('vision', $vision->content) }}</p>

                    </div>

                    {{-- Preview Misi --}}
                    <div class="rounded-2xl border border-blue-400/20 bg-slate-900 p-6">

                        <div class="mb-5 flex items-center gap-3">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-500/15 text-xl text-blue-400">
                                ◈
                            </div>

                            <h3 class="text-lg font-bold">
                                Misi
                            </h3>
                        </div>

                        <div id="previewMissions" class="space-y-4">

                            @foreach ($missionValues as $index => $mission)
                                <div class="flex items-start gap-3">
                                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-blue-500/15 text-xs font-bold text-blue-400">
                                        {{ $index + 1 }}
                                    </span>

                                    <p class="whitespace-pre-line pt-1 text-sm leading-6 text-slate-300">{{ $mission }}</p>
                                </div>
                            @endforeach

                        </div>

                    </div>

                    <p class="mt-6 text-center text-xs text-slate-500">
                        PT. Abhinaya Citra Cakra Utama
                    </p>

                </div>
            </div>

        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const visionInput = document.getElementById('vision');
    const previewVision = document.getElementById('previewVision');

    const missionContainer = document.getElementById('missionContainer');
    const previewMissions = document.getElementById('previewMissions');
    const addMissionButton = document.getElementById('addMission');

    // Preview visi
    visionInput.addEventListener('input', function () {
        previewVision.textContent = this.value;
    });

    // Update nomor misi
    function updateMissions() {

        const items = missionContainer.querySelectorAll('.mission-item');

        items.forEach((item, index) => {
            item.querySelector('.mission-number').textContent = index + 1;
        });

        updatePreview();
    }

    // Update live preview misi
    function updatePreview() {

        const inputs = missionContainer.querySelectorAll('.mission-input');

        previewMissions.innerHTML = '';

        inputs.forEach((input, index) => {

            const wrapper = document.createElement('div');
            wrapper.className = 'flex items-start gap-3';

            const number = document.createElement('span');
            number.className = 'flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-blue-500/15 text-xs font-bold text-blue-400';
            number.textContent = index + 1;

            const content = document.createElement('p');
            content.className = 'whitespace-pre-line pt-1 text-sm leading-6 text-slate-300';
            content.textContent = input.value;

            wrapper.appendChild(number);
            wrapper.appendChild(content);

            previewMissions.appendChild(wrapper);
        });
    }

    // Tambah misi
    addMissionButton.addEventListener('click', function () {

        const item = document.createElement('div');
        item.className = 'mission-item flex items-start gap-3';

        const number = document.createElement('span');
        number.className = 'mission-number flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-sm font-bold text-blue-600';

        const textarea = document.createElement('textarea');
        textarea.name = 'missions[]';
        textarea.rows = 2;
        textarea.required = true;
        textarea.placeholder = 'Tuliskan misi perusahaan...';
        textarea.className = 'mission-input min-w-0 flex-1 rounded-xl border border-slate-300 px-4 py-2.5 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100';

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'remove-mission rounded-lg p-2.5 text-red-500 transition hover:bg-red-50';
        removeButton.title = 'Hapus misi';
        removeButton.textContent = '✕';

        item.appendChild(number);
        item.appendChild(textarea);
        item.appendChild(removeButton);

        missionContainer.appendChild(item);

        updateMissions();
        textarea.focus();
    });

    // Hapus misi
    missionContainer.addEventListener('click', function (event) {

        const button = event.target.closest('.remove-mission');

        if (!button) return;

        const items = missionContainer.querySelectorAll('.mission-item');

        if (items.length <= 1) {
            alert('Minimal harus ada satu misi.');
            return;
        }

        button.closest('.mission-item').remove();

        updateMissions();
    });

    // Ketika isi misi berubah
    missionContainer.addEventListener('input', function (event) {

        if (event.target.classList.contains('mission-input')) {
            updatePreview();
        }

    });

    updateMissions();
});
</script>
@endsection
