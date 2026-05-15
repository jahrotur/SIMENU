@extends('layouts.app')

@section('title', 'Kelola User')
@section('page-title', 'Kelola User')

@section('content')
<div class="card">
    <a href="{{ route('users.create') }}" class="btn">+ Tambah User</a>
</div>
@endsection
