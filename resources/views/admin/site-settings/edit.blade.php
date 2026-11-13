
@extends('layouts.admin')

@section('content')
<div class="mx-auto max-w-5xl space-y-6">

    <div>
        <h1 class="text-2xl font-bold text-accu-dark">
            Pengaturan Identitas Perusahaan
        </h1>
        <p class="mt-1 text-sm text-gray-500">
            Kelola logo, tagline, dan profil singkat perusahaan.
        </p>
    </div>

    @if (session('success'))
        <div class="rounded-lg bg-green-100 p-4 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="rounded-lg bg-red-100 p-4 text-sm text-red-700">
            <ul class="list-inside list-disc">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

        <form action="{{ route('admin.site-settings.update') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf
            @method('PUT')

            {{-- Logo --}}
            <div>
                <label class="mb-2 block text-sm font-semibold text-gray-700">
                    Logo Perusahaan
                </label>

                @if ($setting->logo)
                    <div class="mb-3">
                        <img
                            src="{{ asset('storage/' . $setting->logo) }}"
                            alt="Logo ACCU"
                            class="h-24 w-auto object-contain"
                        >
                    </div>
                @endif

                <input
                    type="file"
                    name="logo"
                    accept=".png,.jpg,.jpeg,.webp"
                    class="block w-full rounded-lg border border-gray-300 p-2 text-sm"
                >

                <p class="mt-1 text-xs text-gray-500">
                    Format PNG, JPG, JPEG, WEBP. Maksimal 2 MB.
                </p>
            </div>

            {{-- Nama Perusahaan --}}
            <div>
                <label class="mb-2 block text-sm font-semibold text-gray-700">
                    Nama Perusahaan
                </label>

                <input
                    type="text"
                    name="company_name"
                    value="{{ old('company_name', $setting->company_name) }}"
                    placeholder="PT. Abhinaya Citra Cakra Utama"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-accu-primary focus:outline-none"
                >
            </div>

            {{-- Tagline --}}
            <div>
                <label class="mb-2 block text-sm font-semibold text-gray-700">
                    Tagline
                </label>

                <input
                    type="text"
                    name="tagline"
                    value="{{ old('tagline', $setting->tagline) }}"
                    placeholder="Your Facility Service Solution."
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-accu-primary focus:outline-none"
                >
            </div>

            {{-- Profil Singkat --}}
            <div>
                <label class="mb-2 block text-sm font-semibold text-gray-700">
                    Profil Singkat Perusahaan
                </label>

                <textarea
                    name="company_description"
                    rows="5"
                    placeholder="Tuliskan profil singkat perusahaan..."
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-accu-primary focus:outline-none"
                >{{ old('company_description', $setting->company_description) }}</textarea>

                <p class="mt-1 text-xs text-gray-500">
                    Deskripsi ini akan ditampilkan pada bagian footer website.
                </p>
            </div>

            {{-- Button --}}
            <div class="flex justify-end border-t border-gray-100 pt-5">
                <button
                    type="submit"
                    class="rounded-lg bg-accu-primary px-6 py-3 text-sm font-semibold text-white transition hover:bg-accu-dark"
                >
                    <i class="fa fa-save mr-2"></i>
                    Simpan Pengaturan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
