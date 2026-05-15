<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIMENU')</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f5f5f5;
            color: #16384d;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: linear-gradient(180deg, #003c61, #022844);
            border-radius: 0 24px 24px 0;
            padding: 24px 0;
            overflow-y: auto;
        }

        .logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 18px;
            margin-bottom: 40px;
        }

        .logo img {
            width: 95px;
            margin-bottom: 10px;
        }

        .logo h1 {
            font-size: 30px;
            color: #18b9e5;
            font-weight: 800;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 0 16px;
        }

        .menu a {
            height: 58px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 0 18px;
            text-decoration: none;
            color: white;
            font-size: 14px;
            font-weight: 700;
            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: #7a9caf;
        }

        .main {
            margin-left: 280px;
            padding: 22px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .title h1 {
            font-size: 44px;
            font-weight: 800;
        }

        .title p {
            font-size: 16px;
            color: #4d6b7d;
            margin-top: 6px;
        }

        .profile {
            width: 260px;
            height: 84px;
            border-radius: 20px;
            background: #e7eff3;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            box-shadow: 0 4px 14px rgba(0,0,0,.06);
        }

        .avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            border: 2px solid #7297ab;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
        }

        .card {
            background: white;
            border-radius: 24px;
            padding: 24px;
            box-shadow: 0 4px 14px rgba(0,0,0,.05);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }

        .table th,
        .table td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 12px;
            text-decoration: none;
            background: #18b9e5;
            color: white;
            font-weight: 700;
            border: none;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 12px;
        }
    </style>

    @stack('styles')
</head>
<body>

<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="SIMENU">
        <h1>SIMENU</h1>
    </div>

    <div class="menu">
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">☷ Dashboard</a>
        <a href="{{ route('pasien.index') }}" class="{{ request()->routeIs('pasien.*') ? 'active' : '' }}">🗃 Data Pasien</a>
        <a href="{{ route('input.index') }}" class="{{ request()->routeIs('input.*') ? 'active' : '' }}">⇄ Input</a>
        <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">☑ Tambah User</a>
        <a href="{{ route('menu.index') }}" class="{{ request()->routeIs('menu.index') ? 'active' : '' }}">🍽 Pengelolaan Menu Pasien</a>
        <a href="{{ route('menu.status') }}" class="{{ request()->routeIs('menu.status') ? 'active' : '' }}">◔ Status Menu</a>
        <a href="{{ route('label.index') }}" class="{{ request()->routeIs('label.*') ? 'active' : '' }}">🏷 Cetak Label</a>
        <a href="{{ route('laporan.index') }}" class="{{ request()->routeIs('laporan.*') ? 'active' : '' }}">📄 Laporan</a>
        <a href="{{ route('pengaturan.index') }}" class="{{ request()->routeIs('pengaturan.*') ? 'active' : '' }}">⚙ Pengaturan</a>
        <a href="{{ route('logout') }}">⎋ Logout</a>
    </div>
</div>

<div class="main">
    <div class="topbar">
        <div class="title">
            <h1>@yield('page-title')</h1>
            <p>@yield('page-subtitle', 'Selamat datang di SIMENU')</p>
        </div>

        <div class="profile">
            <div class="avatar">👤</div>
            <div>
                <h3>{{ auth()->user()->name ?? 'Administrator' }}</h3>
                <p>{{ auth()->user()->role ?? 'Admin' }}</p>
            </div>
        </div>
    </div>

    @yield('content')
</div>

@stack('scripts')
</body>
</html>
