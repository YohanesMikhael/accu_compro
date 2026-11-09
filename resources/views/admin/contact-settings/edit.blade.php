
@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- HEADER --}}
    <div>
        <h1 class="text-2xl font-bold text-slate-800">
            Contact Us Settings
        </h1>
        <p class="mt-1 text-sm text-slate-500">
            Kelola informasi kontak dan lokasi perusahaan yang tampil di website.
        </p>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    {{-- VALIDATION ERRORS --}}
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

    <form action="{{ route('admin.contact-settings.update') }}"
          method="POST"
          class="space-y-6">

        @csrf
        @method('PUT')

        {{-- CONTACT INFORMATION --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="mb-6">
                <h2 class="text-lg font-bold text-slate-800">
                    Contact Information
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Informasi telepon, WhatsApp, email, dan alamat perusahaan.
                </p>
            </div>

            <div class="grid gap-5 md:grid-cols-2">

                {{-- PHONE --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Phone Number
                    </label>
                    <input type="text"
                           name="phone"
                           value="{{ old('phone', $contact?->phone) }}"
                           placeholder="Contoh: 0878 6236 6096"
                           class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                </div>

                {{-- WHATSAPP --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        WhatsApp Number
                    </label>
                    <input type="text"
                           name="whatsapp"
                           value="{{ old('whatsapp', $contact?->whatsapp) }}"
                           placeholder="Contoh: 6287862366096"
                           class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    <p class="mt-1 text-xs text-slate-400">
                        Gunakan format kode negara tanpa tanda +.
                    </p>
                </div>

                {{-- EMAIL --}}
                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Email Address
                    </label>
                    <input type="email"
                           name="email"
                           value="{{ old('email', $contact?->email) }}"
                           placeholder="Contoh: accu.abhinaya@gmail.com"
                           class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                </div>

                {{-- ADDRESS --}}
                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Office Address
                    </label>
                    <textarea name="address"
                              rows="3"
                              placeholder="Masukkan alamat lengkap perusahaan"
                              class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('address', $contact?->address) }}</textarea>
                </div>

            </div>
        </div>

        {{-- GOOGLE MAPS --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="mb-6">
                <h2 class="text-lg font-bold text-slate-800">
                    Google Maps
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Atur link lokasi dan URL embed Google Maps.
                </p>
            </div>

            <div class="space-y-5">

                {{-- MAP URL --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Google Maps Link
                    </label>
                    <input type="url"
                           name="maps_url"
                           value="{{ old('maps_url', $contact?->maps_url) }}"
                           placeholder="https://www.google.com/maps/..."
                           class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    <p class="mt-1 text-xs text-slate-400">
                        Digunakan untuk tombol Open Google Maps dan Get Directions.
                    </p>
                </div>

                {{-- MAP EMBED --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Google Maps Embed URL
                    </label>
                    <textarea name="maps_embed_url"
                              rows="3"
                              placeholder="https://www.google.com/maps/embed?..."
                              class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('maps_embed_url', $contact?->maps_embed_url) }}</textarea>
                    <p class="mt-1 text-xs text-slate-400">
                        Masukkan URL dari atribut src iframe Google Maps, bukan seluruh kode iframe.
                    </p>
                </div>

            </div>
        </div>

        {{-- ACTION --}}
        <div class="flex justify-end">
            <button type="submit"
                    class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700">
                <i data-lucide="save" class="h-4 w-4"></i>
                Save Changes
            </button>
        </div>

    </form>
</div>
@endsection
