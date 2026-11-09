@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    <div>
        <h1 class="text-2xl font-bold text-slate-800">Tambah Lowongan</h1>
        <p class="mt-1 text-sm text-slate-500">Tambahkan posisi pekerjaan baru.</p>
    </div>

    <form action="{{ route('admin.career-positions.store') }}" method="POST" class="space-y-6">
        @csrf
        @include('admin.career-positions._form')
    </form>

</div>
@endsection