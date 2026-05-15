@extends('layouts.app')

@section('title', 'Pengelolaan Menu Pasien')
@section('page-title', 'Pengelolaan Menu Pasien')

@section('content')
<div class="card">
    <form>
        <div class="form-group">
            <label>Pilih Pasien</label>
            <select>
                <option>-- Pilih Pasien --</option>
            </select>
        </div>

        <div class="form-group">
            <label>Jenis Diet</label>
            <input type="text">
        </div>

        <div class="form-group">
            <label>Menu Makanan</label>
            <textarea rows="4"></textarea>
        </div>

        <button class="btn">Simpan</button>
    </form>
</div>
@endsection
