@extends('layouts.app')

@section('title', 'Tambah Pasien')
@section('page-title', 'Tambah Pasien')

@section('content')
<div class="card">
    <form method="POST" action="{{ route('pasien.store') }}">
        @csrf

        <div class="form-group">
            <label>No Rekam Medis</label>
            <input type="text" name="no_rm">
        </div>

        <div class="form-group">
            <label>Nama Pasien</label>
            <input type="text" name="nama">
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin">
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
        </div>

        <button type="submit" class="btn">Simpan</button>
    </form>
</div>
@endsection
