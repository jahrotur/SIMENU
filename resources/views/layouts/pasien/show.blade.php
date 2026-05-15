@extends('layouts.app')

@section('title', 'Detail Pasien')
@section('page-title', 'Detail Pasien')

@section('content')
<div class="card">
    <p><strong>No RM:</strong> {{ $pasien->no_rm }}</p>
    <p><strong>Nama:</strong> {{ $pasien->nama }}</p>
    <p><strong>Ruangan:</strong> {{ $pasien->ruangan }}</p>
    <p><strong>Diet:</strong> {{ $pasien->diet }}</p>
</div>
@endsection
