
@extends('layouts.admin')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-slate-800">
        Manajemen User
    </h1>
    <p class="mt-1 text-sm text-slate-500">
        Kelola akun administrator ACCU CMS.
    </p>
</div>

{{-- ALERT --}}
@if (session('success'))
    <div class="mb-5 rounded-lg bg-green-50 border border-green-200 p-4 text-sm text-green-700">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-5 rounded-lg bg-red-50 border border-red-200 p-4 text-sm text-red-700">
        {{ session('error') }}
    </div>
@endif

{{-- FORM TAMBAH USER --}}
<div class="mb-6 rounded-xl border border-slate-200 bg-white shadow-sm">

    <div class="border-b border-slate-200 px-6 py-4">
        <h2 class="font-semibold text-slate-800">
            Tambah User
        </h2>
        <p class="mt-1 text-xs text-slate-500">
            User baru akan otomatis mendapatkan role Admin.
        </p>
    </div>

    <form action="{{ route('admin.users.store') }}" method="POST"
        class="p-6">
        @csrf

        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Nama Lengkap
                </label>
                <input type="text" name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama lengkap"
                    class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:outline-none"
                    required>

                @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Email
                </label>
                <input type="email" name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:outline-none"
                    required>

                @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Password
                </label>
                <input type="password" name="password"
                    placeholder="Minimal 8 karakter"
                    class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:outline-none"
                    required>

                @error('password')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Konfirmasi Password
                </label>
                <input type="password" name="password_confirmation"
                    placeholder="Ulangi password"
                    class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:outline-none"
                    required>
            </div>

        </div>

        <div class="mt-6 flex justify-end border-t border-slate-100 pt-5">
            <button type="submit"
                class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-700">
                <i class="fa-solid fa-plus mr-2"></i>
                Simpan User
            </button>
        </div>
    </form>
</div>

{{-- DATA USER --}}
<div class="rounded-xl border border-slate-200 bg-white shadow-sm">

    <div class="flex flex-col justify-between gap-4 border-b border-slate-200 px-6 py-4 md:flex-row md:items-center">
        <div>
            <h2 class="font-semibold text-slate-800">
                Data User
            </h2>
            <p class="mt-1 text-xs text-slate-500">
                Daftar seluruh pengguna CMS.
            </p>
        </div>

        <form method="GET" action="{{ route('admin.users.index') }}"
            class="flex gap-2">
            <input type="text" name="search"
                value="{{ request('search') }}"
                placeholder="Cari nama atau email..."
                class="rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none">

            <button type="submit"
                class="rounded-lg bg-slate-800 px-4 py-2 text-sm text-white hover:bg-slate-700">
                Cari
            </button>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">Nama</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Role</th>
                    <th class="px-6 py-4 text-center">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @forelse ($users as $user)
                    <tr class="hover:bg-slate-50">

                        <td class="px-6 py-4 text-slate-500">
                            {{ $users->firstItem() + $loop->index }}
                        </td>

                        <td class="px-6 py-4 font-medium text-slate-800">
                            {{ $user->name }}
                        </td>

                        <td class="px-6 py-4 text-slate-600">
                            {{ $user->email }}
                        </td>

                        <td class="px-6 py-4">
                            @if ($user->role === 'super_admin')
                                <span class="rounded-full bg-purple-100 px-3 py-1 text-xs font-medium text-purple-700">
                                    Super Admin
                                </span>
                            @else
                                <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700">
                                    Admin
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">

                                <button type="button"
                                    onclick="openEditModal({{ $user->id }})"
                                    class="rounded-lg bg-amber-100 px-3 py-2 text-xs font-medium text-amber-700 hover:bg-amber-200">
                                    Edit
                                </button>

                                <form action="{{ route('admin.users.destroy', $user->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="rounded-lg bg-red-100 px-3 py-2 text-xs font-medium text-red-700 hover:bg-red-200">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-slate-400">
                            Belum ada data user.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="border-t border-slate-100 px-6 py-4">
        {{ $users->links() }}
    </div>

</div>

@endsection
