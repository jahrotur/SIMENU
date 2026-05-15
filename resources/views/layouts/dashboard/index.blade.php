@extends('layouts.app')

@section('content')

<div class="dashboard-header">

    <div>
        <h1 class="page-title">
            Dashboard
        </h1>

        <p class="page-subtitle">
            Selamat datang di SIMENU
        </p>
    </div>

</div>

<div class="row mt-4">

    <div class="col-md-4">

        <div class="stats-card green">

            <div>
                <h5>Total Pasien Hari Ini</h5>
                <h2>128</h2>
                <p>Pasien</p>
            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="stats-card yellow">

            <div>
                <h5>Total Menu Aktif</h5>
                <h2>128</h2>
                <p>Menu</p>
            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="stats-card blue">

            <div>
                <h5>Distribusi Hari Ini</h5>
                <h2>128</h2>
                <p>Distribusi</p>
            </div>

        </div>

    </div>

</div>

<div class="main-card mt-4">

    <h2 class="section-title">
        Grafik Distribusi
    </h2>

    <img src="https://via.placeholder.com/900x400"
         class="img-fluid rounded-5">

</div>

@endsection