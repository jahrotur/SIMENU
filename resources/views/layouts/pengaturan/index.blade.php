@extends('layouts.app')

@section('title', 'Pengaturan')
@section('page-title', 'Pengaturan')

@section('content')
<div class="card">
    <div class="form-group">
        <label>Nama Rumah Sakit</label>
        <input type="text" value="RS Contoh">
    </div>

    <button class="btn">Simpan Pengaturan</button>
</div>
@endsection
