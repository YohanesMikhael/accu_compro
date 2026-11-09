
@extends('layouts.admin')

@section('content')
<div
    x-data="clientManager()"
    class="space-y-6"
>
    {{-- PAGE HEADER --}}
    <div>
        <h1 class="text-2xl font-bold text-slate-800">
            Clients
        </h1>
        <p class="mt-1 text-sm text-slate-500">
            Kelola logo perusahaan dan client yang ditampilkan di website.
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

    {{-- FORM & LIVE PREVIEW --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

        {{-- FORM --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-100 px-6 py-5">
                <h2
                    class="text-lg font-bold text-slate-800"
                    x-text="editingId ? 'Edit Client' : 'Tambah Client'"
                ></h2>

                <p class="mt-1 text-sm text-slate-500">
                    Masukkan informasi perusahaan dan logo client.
                </p>
            </div>

            <form
                x-ref="clientForm"
                :action="editingId ? updateUrl.replace('__ID__', editingId) : storeUrl"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-5 p-6"
            >
                @csrf

                <template x-if="editingId">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                {{-- NAME --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Nama Client <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="name"
                        x-model="form.name"
                        required
                        maxlength="255"
                        placeholder="Contoh: PT Tunas Fast"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >
                </div>

                {{-- WEBSITE --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Website
                    </label>

                    <input
                        type="text"
                        name="website"
                        x-model="form.website"
                        placeholder="https://example.com"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                    <p class="mt-1 text-xs text-slate-400">
                        Opsional. Logo akan menjadi link jika website diisi.
                    </p>
                </div>

                {{-- LOGO --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">
                        Logo Client
                    </label>

                    <input
                        type="file"
                        name="logo"
                        accept=".jpg,.jpeg,.png,.webp"
                        @change="previewLogo($event)"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm file:mr-4 file:rounded-lg file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-xs file:font-semibold file:text-blue-700"
                    >

                    <p class="mt-1 text-xs text-slate-400">
                        Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
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

                {{-- ACTIVE STATUS --}}
                <div class="flex items-center justify-between rounded-xl bg-slate-50 p-4">
                    <div>
                        <p class="text-sm font-semibold text-slate-700">
                            Status Client
                        </p>
                        <p class="mt-1 text-xs text-slate-500">
                            Aktifkan agar logo muncul di website.
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

                        <div class="h-6 w-11 rounded-full bg-slate-300 transition peer-checked:bg-blue-600 after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:transition peer-checked:after:translate-x-5"></div>
                    </label>
                </div>

                {{-- BUTTONS --}}
                <div class="flex flex-wrap gap-3 border-t border-slate-100 pt-5">
                    <button
                        type="submit"
                        class="flex-1 rounded-xl bg-blue-700 px-5 py-3 text-sm font-bold text-white transition hover:bg-blue-800"
                        x-text="editingId ? 'Simpan Perubahan' : 'Tambah Client'"
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
                    Preview logo client sebelum ditampilkan di website.
                </p>
            </div>

            <div class="flex min-h-[400px] items-center justify-center bg-slate-50 p-6 sm:p-8">

                <div class="w-full max-w-sm rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">

                    <div class="flex min-h-[180px] items-center justify-center rounded-xl bg-slate-50 p-5">

                        <template x-if="imagePreview">
                            <img
                                :src="imagePreview"
                                alt="Preview logo client"
                                class="max-h-32 max-w-full object-contain"
                            >
                        </template>

                        <template x-if="!imagePreview">
                            <div class="flex flex-col items-center text-slate-300">
                                <i data-lucide="image" class="h-16 w-16"></i>
                                <span class="mt-3 text-xs">
                                    Belum ada logo
                                </span>
                            </div>
                        </template>

                    </div>

                    <div class="mt-6 text-center">
                        <h3
                            class="text-lg font-bold text-slate-800"
                            x-text="form.name || 'Nama Client'"
                        ></h3>

                        <p
                            class="mt-2 break-all text-sm text-blue-600"
                            x-text="form.website || 'Website belum diisi'"
                        ></p>
                    </div>

                    <div class="mt-6 flex justify-center">
                        <span
                            class="rounded-full px-4 py-2 text-xs font-bold"
                            :class="form.is_active
                                ? 'bg-green-100 text-green-700'
                                : 'bg-slate-100 text-slate-500'"
                            x-text="form.is_active ? 'Aktif' : 'Nonaktif'"
                        ></span>
                    </div>

                    <p class="mt-4 text-center text-xs text-slate-400">
                        Urutan tampilan:
                        <span x-text="form.sort_order || 0"></span>
                    </p>

                </div>
            </div>
        </div>

    </div>

    {{-- CLIENT LIST --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 px-6 py-5">
            <div>
                <h2 class="text-lg font-bold text-slate-800">
                    Daftar Clients
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Semua client yang tersimpan di database.
                </p>
            </div>

            <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">
                {{ $clients->count() }} Client
            </span>
        </div>

        @if($clients->isNotEmpty())

            <div class="overflow-x-auto">
                <table class="w-full min-w-[700px] text-left text-sm">

                    <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                        <tr>
                            <th class="px-6 py-4">Logo</th>
                            <th class="px-6 py-4">Nama Client</th>
                            <th class="px-6 py-4">Website</th>
                            <th class="px-6 py-4 text-center">Urutan</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @foreach($clients as $client)
                            <tr class="transition hover:bg-slate-50">

                                <td class="px-6 py-4">
                                    <div class="flex h-14 w-24 items-center justify-center rounded-lg border border-slate-100 bg-white p-2">
                                        @if($client->logo)
                                            <img
                                                src="{{ asset('storage/' . $client->logo) }}"
                                                alt="{{ $client->name }}"
                                                class="max-h-full max-w-full object-contain"
                                            >
                                        @else
                                            <i data-lucide="image" class="h-6 w-6 text-slate-300"></i>
                                        @endif
                                    </div>
                                </td>

                                <td class="px-6 py-4 font-semibold text-slate-800">
                                    {{ $client->name }}
                                </td>

                                <td class="px-6 py-4 text-slate-500">
                                    @if($client->website)
                                        <a
                                            href="{{ $client->website }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="text-blue-600 hover:underline"
                                        >
                                            {{ $client->website }}
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-center text-slate-600">
                                    {{ $client->sort_order }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    @if($client->is_active)
                                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-500">
                                            Nonaktif
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-2">

                                        <button
                                            type="button"
                                            @click="editClient({{ Js::from([
                                                'id' => $client->id,
                                                'name' => $client->name,
                                                'website' => $client->website,
                                                'logo' => $client->logo ? asset('storage/' . $client->logo) : null,
                                                'is_active' => $client->is_active,
                                                'sort_order' => $client->sort_order,
                                            ]) }})"
                                            class="rounded-lg bg-blue-50 p-2 text-blue-700 transition hover:bg-blue-100"
                                            title="Edit client"
                                        >
                                            <i data-lucide="pencil" class="h-4 w-4"></i>
                                        </button>

                                        <form
                                            action="{{ route('admin.clients.destroy', $client->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus client ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-100"
                                                title="Hapus client"
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

        @else

            <div class="px-6 py-16 text-center">
                <i data-lucide="users" class="mx-auto h-12 w-12 text-slate-300"></i>

                <h3 class="mt-4 font-bold text-slate-700">
                    Belum Ada Client
                </h3>

                <p class="mt-1 text-sm text-slate-400">
                    Tambahkan client pertama melalui form di atas.
                </p>
            </div>

        @endif

    </div>

</div>

<script>
    function clientManager() {
        return {
            editingId: null,

            storeUrl: @js(route('admin.clients.store')),
            updateUrl: @js(route('admin.clients.update', ['id' => '__ID__'])),

            imagePreview: null,
            previewObjectUrl: null,

            form: {
                name: '',
                website: '',
                sort_order: 0,
                is_active: true,
            },

            previewLogo(event) {
                const file = event.target.files[0];

                if (!file) return;

                if (this.previewObjectUrl) {
                    URL.revokeObjectURL(this.previewObjectUrl);
                }

                this.previewObjectUrl = URL.createObjectURL(file);
                this.imagePreview = this.previewObjectUrl;
            },

            editClient(client) {
                this.editingId = client.id;

                this.form = {
                    name: client.name ?? '',
                    website: client.website ?? '',
                    sort_order: client.sort_order ?? 0,
                    is_active: Boolean(client.is_active),
                };

                this.imagePreview = client.logo;
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
                    name: '',
                    website: '',
                    sort_order: 0,
                    is_active: true,
                };

                this.$refs.clientForm.reset();
            },

            scrollToForm() {
                this.$nextTick(() => {
                    this.$refs.clientForm.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                });
            }
        };
    }
</script>
@endsection
