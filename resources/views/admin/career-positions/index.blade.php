@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Career Positions</h1>
            <p class="mt-1 text-sm text-slate-500">
                Kelola informasi lowongan pekerjaan ACCU.
            </p>
        </div>

        <a href="{{ route('admin.career-positions.create') }}"
           class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-700">
            + Tambah Lowongan
        </a>
    </div>

    @if(session('success'))
        <div class="rounded-xl bg-green-50 p-4 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 text-slate-600">
                    <tr>
                        <th class="px-6 py-4">Posisi</th>
                        <th class="px-6 py-4">Lokasi</th>
                        <th class="px-6 py-4">Tipe</th>
                        <th class="px-6 py-4">Deadline</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse($positions as $position)
                        <tr>
                            <td class="px-6 py-4 font-semibold text-slate-800">
                                {{ $position->title }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $position->location ?: '-' }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $position->employment_type ?: '-' }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $position->deadline?->format('d M Y') ?? 'Tidak ditentukan' }}
                            </td>

                            <td class="px-6 py-4">
                                @if($position->is_active)
                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Aktif
                                    </span>
                                @else
                                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.career-positions.edit', $position->id) }}"
                                       class="rounded-lg bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-600 hover:bg-blue-100">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.career-positions.destroy', $position->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus lowongan ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-100">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                                Belum ada lowongan pekerjaan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection