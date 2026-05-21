<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>SIMENU - Manajemen Pengguna</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
body { font-family: 'Inter', sans-serif; background: #f4f7fa; color: #24485d; display: flex; height: 100vh; overflow: hidden; }
::-webkit-scrollbar { width: 6px; }
::-webkit-scrollbar-track { background: transparent; }
::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }

aside { width: 220px; background: #2a4f66; color: #fff; display: flex; flex-direction: column; flex-shrink: 0; box-shadow: 2px 0 16px rgba(0,0,0,.12); z-index: 10; }
.logo-area { display: flex; flex-direction: column; align-items: center; padding: 28px 0 20px; }
.logo-area h1 { font-size: 20px; font-weight: 700; color: #1ea4ce; letter-spacing: .06em; margin-top: 6px; }
nav { flex: 1; overflow-y: auto; padding: 4px 0; }
.nav-item { display: flex; align-items: center; gap: 10px; padding: 11px 20px; font-size: 13px; font-weight: 600; color: #e2eaf0; cursor: pointer; text-decoration: none; transition: background .18s; }
.nav-item:hover { background: rgba(255,255,255,.08); }
.nav-item.active { background: #688e9f; border-radius: 0 14px 14px 0; margin-right: 14px; color: #fff; }
.nav-item i { width: 20px; text-align: center; font-size: 14px; }
.nav-sub { display: flex; flex-direction: column; }
.nav-sub-item { display: flex; align-items: center; gap: 8px; padding: 8px 20px 8px 50px; font-size: 12px; font-weight: 500; color: #c8d6df; cursor: pointer; text-decoration: none; transition: background .18s; }
.nav-sub-item:hover { background: rgba(255,255,255,.06); }
.nav-sub-item.active { color: #fff; }
.nav-sub-item i { width: 16px; text-align: center; font-size: 12px; }

main { flex: 1; overflow-y: auto; padding: 28px 28px 40px; display: flex; flex-direction: column; gap: 20px; }
.page-title h2 { font-size: 26px; font-weight: 700; color: #24485d; line-height: 1.2; }
.page-title p  { font-size: 13px; color: #7a8b97; margin-top: 3px; font-weight: 500; }

.stat-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; }
.stat-card { border-radius: 12px; padding: 16px 18px; display: flex; align-items: center; gap: 12px; border: 1.5px solid; }
.stat-card .icon { font-size: 20px; }
.stat-card .label { font-size: 11px; font-weight: 700; }
.stat-card .num   { font-size: 26px; font-weight: 700; color: #000; line-height: 1.1; margin-top: 2px; }
.card-red    { background: #fff0f0; border-color: #f2a0a0; }
.card-red    .icon, .card-red    .label { color: #c0392b; }
.card-blue   { background: #eef5ff; border-color: #b7c8f0; }
.card-blue   .icon, .card-blue   .label { color: #3563c0; }
.card-green  { background: #edf9f1; border-color: #b7e1c2; }
.card-green  .icon, .card-green  .label { color: #1e8449; }
.card-orange { background: #fff7e9; border-color: #e4c38b; }
.card-orange .icon, .card-orange .label { color: #c07c1a; }

.main-card { background: #fff; border-radius: 16px; border: 1px solid #dbe5ec; box-shadow: 0 2px 12px rgba(0,0,0,.05); overflow: hidden; }
.table-toolbar { display: flex; align-items: center; justify-content: space-between; padding: 16px 20px; border-bottom: 1px solid #e8eef4; }
.table-toolbar h3 { font-size: 16px; font-weight: 700; color: #24485d; }
.toolbar-right { display: flex; align-items: center; gap: 10px; }
.search-wrap { position: relative; }
.search-wrap input { border: 1.5px solid #d0dce6; border-radius: 8px; padding: 8px 14px 8px 34px; font-size: 12px; font-family: 'Inter', sans-serif; color: #24485d; background: #f7fafc; outline: none; width: 200px; transition: border-color .2s; }
.search-wrap input:focus { border-color: #1ea4ce; background: #fff; }
.search-wrap i { position: absolute; left: 10px; top: 50%; transform: translateY(-50%); font-size: 12px; color: #9badb8; }
.filter-select { border: 1.5px solid #d0dce6; border-radius: 8px; padding: 8px 28px 8px 12px; font-size: 12px; font-family: 'Inter', sans-serif; color: #24485d; background: #f7fafc url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='11' height='11' viewBox='0 0 12 12'%3E%3Cpath fill='%237a8b97' d='M6 8L1 3h10z'/%3E%3C/svg%3E") no-repeat right 9px center; appearance: none; outline: none; cursor: pointer; transition: border-color .2s; }
.filter-select:focus { border-color: #1ea4ce; }

.table-wrap { overflow-x: auto; }
table { width: 100%; border-collapse: collapse; }
thead tr { background: #f5f7fa; }
thead th { padding: 11px 16px; font-size: 11px; color: #8a98a3; font-weight: 700; text-align: left; border-bottom: 1px solid #e5edf3; white-space: nowrap; }
tbody td { padding: 11px 16px; font-size: 12px; color: #344a5a; border-bottom: 1px solid #edf2f7; font-weight: 500; }
tbody tr:last-child td { border-bottom: none; }
tbody tr:hover { background: #f9fbfd; }

.badge { padding: 3px 10px; border-radius: 6px; font-size: 10px; font-weight: 700; display: inline-block; white-space: nowrap; }
.badge-active   { background: #1dd75b; color: #fff; }
.badge-inactive { background: #ececec; color: #777; }
.badge-doctor   { background: #edf3ff; color: #5a78d6; border: 1px solid #c8d5ff; }
.badge-gizi     { background: #ebfff2; color: #2c9d55; border: 1px solid #bde9ca; }
.badge-produksi { background: #fff3df; color: #c57d1f; border: 1px solid #f1d0a2; }
.badge-admin    { background: #ffeaea; color: #c0392b; border: 1px solid #f5c6c6; }

.btn-icon { width: 30px; height: 30px; border-radius: 7px; border: none; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; font-size: 12px; transition: background .15s; }
.btn-edit   { background: #eef5ff; color: #3563c0; }
.btn-edit:hover   { background: #d8e9ff; }
.btn-delete { background: #fff0f0; color: #c0392b; }
.btn-delete:hover { background: #ffe0e0; }

.pagination { display: flex; align-items: center; justify-content: space-between; padding: 14px 20px; border-top: 1px solid #edf2f7; }
.pag-info { font-size: 12px; color: #7a8b97; font-weight: 500; }
.pag-btns { display: flex; gap: 6px; }
.pag-btn { width: 32px; height: 32px; border-radius: 7px; border: 1.5px solid #d0dce6; background: #fff; cursor: pointer; font-size: 12px; font-weight: 600; color: #344a5a; display: flex; align-items: center; justify-content: center; transition: all .15s; }
.pag-btn:hover   { background: #eef5ff; }
.pag-btn.active  { background: #2a4f66; color: #fff; border-color: #2a4f66; }

.btn-primary { background: #2a4f66; color: #fff; font-size: 12px; font-weight: 600; padding: 9px 16px; border-radius: 8px; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 7px; transition: background .18s; font-family: 'Inter', sans-serif; }
.btn-primary:hover { background: #1e3a4d; }
.btn-secondary { background: #fff; color: #344a5a; font-size: 12px; font-weight: 600; padding: 9px 16px; border-radius: 8px; border: 1.5px solid #d0dce6; cursor: pointer; display: inline-flex; align-items: center; gap: 7px; transition: background .18s; font-family: 'Inter', sans-serif; }
.btn-secondary:hover { background: #f4f7fa; }

.modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.45); z-index: 1000; align-items: center; justify-content: center; }
.modal-overlay.open { display: flex; }
.modal-box { background: #fff; border-radius: 16px; width: 580px; max-width: 96vw; max-height: 92vh; overflow-y: auto; box-shadow: 0 20px 60px rgba(0,0,0,.18); animation: modalIn .2s ease; }
@keyframes modalIn { from { opacity: 0; transform: translateY(18px) scale(.97); } to { opacity: 1; transform: translateY(0) scale(1); } }
.modal-header { padding: 22px 24px 0; }
.modal-header h2 { font-size: 18px; font-weight: 700; color: #24485d; }
.modal-header p  { font-size: 12px; color: #7a8b97; margin-top: 3px; }
.modal-body { padding: 20px 24px 24px; }
.form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
.form-group { display: flex; flex-direction: column; gap: 5px; }
.form-group.full { grid-column: 1 / -1; }
.form-group label { font-size: 12px; font-weight: 600; color: #344a5a; }
.form-input, .form-select { border: 1.5px solid #d0dce6; border-radius: 8px; padding: 9px 13px; font-size: 13px; font-family: 'Inter', sans-serif; color: #24485d; background: #fff; outline: none; transition: border-color .2s, box-shadow .2s; }
.form-input:focus, .form-select:focus { border-color: #1ea4ce; box-shadow: 0 0 0 3px rgba(30,164,206,.1); }
.form-input::placeholder { color: #b0bec8; }
.form-select { appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='11' height='11' viewBox='0 0 12 12'%3E%3Cpath fill='%237a8b97' d='M6 8L1 3h10z'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 12px center; padding-right: 32px; cursor: pointer; }
.form-hint { font-size: 11px; color: #9badb8; margin-top: 2px; }
.pass-wrap { position: relative; }
.pass-wrap .form-input { padding-right: 38px; width: 100%; }
.pass-toggle { position: absolute; right: 11px; top: 50%; transform: translateY(-50%); font-size: 13px; color: #9badb8; cursor: pointer; }
.pass-toggle:hover { color: #24485d; }
.modal-footer { display: flex; justify-content: flex-end; gap: 10px; padding: 0 24px 24px; }

.toast { display: none; position: fixed; bottom: 26px; right: 26px; z-index: 2000; background: #1e3a4d; color: #fff; padding: 13px 20px; border-radius: 12px; font-size: 13px; font-weight: 600; align-items: center; gap: 10px; box-shadow: 0 8px 30px rgba(0,0,0,.2); animation: toastIn .25s ease; }
.toast.show { display: flex; }
@keyframes toastIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
.toast-icon { color: #4ade80; font-size: 16px; }
.empty-cell { text-align: center; padding: 30px !important; color: #9badb8 !important; font-size: 13px !important; }
</style>
</head>
<body>

<aside>
  <div class="logo-area">
    <svg viewBox="0 0 100 100" style="width:56px;height:56px">
      <path d="M35 20L65 20C70 20 70 25 70 25L70 35L80 35C85 35 85 40 85 40L85 60C85 65 80 65 80 65L70 65L70 75C70 80 65 80 65 80L35 80C30 80 30 75 30 75L30 65L20 65C15 65 15 60 15 60L15 40C15 35 20 35 20 35L30 35L30 25C30 20 35 20 35 20Z"
        fill="none" stroke="#1ea4ce" stroke-width="6" stroke-linejoin="round"/>
      <path d="M40 70C40 70 30 50 50 40C70 30 70 30 70 30C70 30 70 50 50 60C40 65 40 70 40 70Z" fill="#4ade80"/>
    </svg>
    <h1>SIMENU</h1>
  </div>
  <nav>
    <a class="nav-item" href="#"><i class="fa-solid fa-border-all"></i>Dashboard</a>
    <a class="nav-item" href="#"><i class="fa-solid fa-database"></i>Data Pasien</a>
    <div class="nav-sub">
      <a class="nav-sub-item" href="#"><i class="fa-solid fa-pen-to-square"></i>Input</a>
      <a class="nav-sub-item active" href="#"><i class="fa-solid fa-user-plus"></i>Tambah User</a>
    </div>
    <a class="nav-item" href="#"><i class="fa-solid fa-book-medical"></i>Pengelolaan Menu Pasien</a>
    <a class="nav-item" href="#"><i class="fa-solid fa-clipboard-check"></i>Status Menu</a>
    <a class="nav-item" href="#"><i class="fa-solid fa-tags"></i>Cetak Label</a>
    <a class="nav-item" href="#"><i class="fa-solid fa-circle-exclamation"></i>Laporan</a>
  </nav>
</aside>

<main>
  <div class="page-title">
    <h2>Manajemen Pengguna</h2>
    <p>Daftar Pengguna dan Hak Akses</p>
  </div>

  <div class="stat-grid">
    <div class="stat-card card-red">
      <div class="icon"><i class="fa-solid fa-shield-halved"></i></div>
      <div><p class="label">Super Admin</p><p class="num" id="cntAdmin">1</p></div>
    </div>
    <div class="stat-card card-blue">
      <div class="icon"><i class="fa-solid fa-user-doctor"></i></div>
      <div><p class="label">Dokter</p><p class="num" id="cntDokter">0</p></div>
    </div>
    <div class="stat-card card-green">
      <div class="icon"><i class="fa-solid fa-users"></i></div>
      <div><p class="label">Ahli Gizi</p><p class="num" id="cntGizi">0</p></div>
    </div>
    <div class="stat-card card-orange">
      <div class="icon"><i class="fa-solid fa-eye"></i></div>
      <div><p class="label">Produksi</p><p class="num" id="cntProduksi">0</p></div>
    </div>
  </div>

  <div class="main-card">
    <div class="table-toolbar">
      <h3>Manajemen Pengguna</h3>
      <div class="toolbar-right">
        <div class="search-wrap">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input id="searchInput" type="text" placeholder="Cari nama / NIP...">
        </div>
        <select id="filterRole" class="filter-select">
          <option value="">Semua Role</option>
          <option value="Dokter">Dokter</option>
          <option value="Ahli Gizi">Ahli Gizi</option>
          <option value="Produksi">Produksi</option>
        </select>
        <select id="filterStatus" class="filter-select">
          <option value="">Semua Status</option>
          <option value="Aktif">Aktif</option>
          <option value="NonAktif">NonAktif</option>
        </select>
        <button class="btn-primary" onclick="openModal()">
          <i class="fa-solid fa-user-plus"></i> Tambah User
        </button>
      </div>
    </div>

    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <th>NAMA LENGKAP</th>
            <th>NIP</th>
            <th>STATUS</th>
            <th>ROLE</th>
            <th>UNIT KERJA</th>
            <th>AKSI</th>
          </tr>
        </thead>
        <tbody id="tblBody"></tbody>
      </table>
    </div>

    <div class="pagination">
      <span class="pag-info" id="pagInfo">–</span>
      <div class="pag-btns" id="pagBtns"></div>
    </div>
  </div>
</main>

<!-- MODAL TAMBAH / EDIT -->
<div class="modal-overlay" id="modalUser">
  <div class="modal-box">
    <div class="modal-header">
      <h2 id="modalTitle">Tambah User</h2>
      <p id="modalSubtitle">Tambah pengguna baru ke sistem</p>
    </div>
    <div class="modal-body">
      <div class="form-grid">
        <div class="form-group">
          <label>Nama Lengkap <span style="color:#c0392b">*</span></label>
          <input id="fNama" class="form-input" type="text" placeholder="Contoh: dr. Budi Santoso">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input id="fEmail" class="form-input" type="email" placeholder="email@example.com">
        </div>
        <div class="form-group">
          <label>NIP <span style="color:#c0392b">*</span></label>
          <input id="fNip" class="form-input" type="text" placeholder="098765432123456">
        </div>
        <div class="form-group">
          <label>Password <span id="passRequired" style="color:#c0392b">*</span></label>
          <div class="pass-wrap">
            <input id="fPass" class="form-input" type="password" placeholder="Min. 8 karakter">
            <span class="pass-toggle" onclick="togglePass()"><i class="fa-solid fa-eye" id="passIcon"></i></span>
          </div>
          <span class="form-hint" id="passHint">*Isi dengan minimal 8 karakter</span>
        </div>
        <div class="form-group">
          <label>Role <span style="color:#c0392b">*</span></label>
          <select id="fRole" class="form-select">
            <option value="">Pilih Role</option>
            <option value="Dokter">Dokter</option>
            <option value="Ahli Gizi">Ahli Gizi</option>
            <option value="Produksi">Produksi</option>
          </select>
        </div>
        <div class="form-group">
          <label>Unit Kerja <span style="color:#c0392b">*</span></label>
          <select id="fUnit" class="form-select">
            <option value="">Pilih Unit Kerja</option>
            <option value="SPESIALIS NEUROLOGI">SPESIALIS NEUROLOGI</option>
            <option value="SPESIALIS ANAK">SPESIALIS ANAK</option>
            <option value="SPESIALIS PENYAKIT DALAM">SPESIALIS PENYAKIT DALAM</option>
            <option value="INSTALASI GIZI">INSTALASI GIZI</option>
            <option value="DAPUR PRODUKSI">DAPUR PRODUKSI</option>
          </select>
        </div>
        <div class="form-group">
          <label>Status</label>
          <select id="fStatus" class="form-select">
            <option value="Aktif">Aktif</option>
            <option value="NonAktif">NonAktif</option>
          </select>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn-secondary" onclick="closeModal()">Batal</button>
      <button class="btn-primary" onclick="saveUser()"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
    </div>
  </div>
</div>

<!-- MODAL HAPUS -->
<div class="modal-overlay" id="modalHapus">
  <div class="modal-box" style="width:420px">
    <div class="modal-header" style="padding:22px 24px 16px">
      <h2 style="font-size:16px;color:#c0392b;display:flex;align-items:center;gap:8px">
        <i class="fa-solid fa-triangle-exclamation"></i> Hapus Pengguna
      </h2>
      <p style="font-size:12px;color:#7a8b97;margin-top:4px">Tindakan ini tidak dapat dibatalkan.</p>
    </div>
    <div class="modal-body" style="padding:0 24px 8px">
      <div style="background:#fff5f5;border:1.5px solid #fca5a5;border-radius:10px;padding:14px 16px;display:flex;align-items:center;gap:12px">
        <i class="fa-solid fa-user" style="color:#c0392b;font-size:20px"></i>
        <div>
          <div id="hapusNama" style="font-weight:700;font-size:13px;color:#24485d"></div>
          <div id="hapusInfo" style="font-size:11px;color:#7a8b97;margin-top:2px"></div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn-secondary" onclick="closeHapus()">Batal</button>
      <button id="btnHapusOk" style="background:#c0392b;color:#fff;font-size:12px;font-weight:600;padding:9px 16px;border-radius:8px;border:none;cursor:pointer;display:inline-flex;align-items:center;gap:7px;font-family:'Inter',sans-serif">
        <i class="fa-solid fa-trash"></i> Ya, Hapus
      </button>
    </div>
  </div>
</div>

<!-- TOAST -->
<div class="toast" id="toast">
  <span class="toast-icon"><i class="fa-solid fa-circle-check" id="toastIcon"></i></span>
  <span id="toastMsg">Berhasil!</span>
</div>

<script>
let users = [
  { id:1,  nama:"dr. Luna Lestari",           nip:"09876543212345678", status:"Aktif",    role:"Dokter",    unit:"SPESIALIS NEUROLOGI" },
  { id:2,  nama:"dr. Budi Santoso",            nip:"09876543212345678", status:"Aktif",    role:"Dokter",    unit:"SPESIALIS ANAK" },
  { id:3,  nama:"dr. Citra Dewi Lestari",      nip:"09876543212345678", status:"Aktif",    role:"Dokter",    unit:"SPESIALIS ANAK" },
  { id:4,  nama:"dr. Dian Permata Sari",       nip:"09876543212345678", status:"NonAktif", role:"Dokter",    unit:"SPESIALIS PENYAKIT DALAM" },
  { id:5,  nama:"dr. Eko Wahyu",               nip:"09876543212345678", status:"Aktif",    role:"Dokter",    unit:"SPESIALIS PENYAKIT DALAM" },
  { id:6,  nama:"dr. Fatimah Nur Azizah",      nip:"09876543212345678", status:"NonAktif", role:"Dokter",    unit:"SPESIALIS ANAK" },
  { id:7,  nama:"dr. Gilang Ramadhan",         nip:"09876543212345678", status:"Aktif",    role:"Dokter",    unit:"SPESIALIS PENYAKIT DALAM" },
  { id:8,  nama:"dr. Hana Safitri Rahayu",     nip:"09876543212345678", status:"Aktif",    role:"Dokter",    unit:"SPESIALIS NEUROLOGI" },
  { id:9,  nama:"Nurul Aini Rahmawati, S.Gz",  nip:"09876543212345678", status:"Aktif",    role:"Ahli Gizi", unit:"INSTALASI GIZI" },
  { id:10, nama:"Rizka Amelia Putri, S.Gz",    nip:"09876543212345678", status:"NonAktif", role:"Ahli Gizi", unit:"INSTALASI GIZI" },
  { id:11, nama:"Yusuf Hidayat, AMG",          nip:"09876543212345678", status:"Aktif",    role:"Ahli Gizi", unit:"INSTALASI GIZI" },
  { id:12, nama:"Kartika Wulandari",           nip:"09876543212345678", status:"Aktif",    role:"Produksi",  unit:"DAPUR PRODUKSI" },
  { id:13, nama:"Joko Susilo Prabowo",         nip:"09876543212345678", status:"Aktif",    role:"Produksi",  unit:"DAPUR PRODUKSI" },
];
let nextId = 14;
let editId = null;
let deleteId = null;
let currentPage = 1;
const PER_PAGE = 8;

function roleBadge(r) {
  const map = {
    'Dokter':    '<span class="badge badge-doctor">Dokter</span>',
    'Ahli Gizi': '<span class="badge badge-gizi">Ahli Gizi</span>',
    'Produksi':  '<span class="badge badge-produksi">Produksi</span>',
  };
  return map[r] || `<span class="badge badge-admin">${r}</span>`;
}

function getFiltered() {
  const q   = (document.getElementById('searchInput').value || '').toLowerCase().trim();
  const rol = document.getElementById('filterRole').value;
  const sta = document.getElementById('filterStatus').value;
  return users.filter(u => {
    const mq = !q   || u.nama.toLowerCase().includes(q) || u.nip.includes(q);
    const mr = !rol || u.role   === rol;
    const ms = !sta || u.status === sta;
    return mq && mr && ms;
  });
}

function renderTable() {
  const rows  = getFiltered();
  const total = rows.length;
  const pages = Math.max(1, Math.ceil(total / PER_PAGE));
  if (currentPage > pages) currentPage = pages;

  const start = (currentPage - 1) * PER_PAGE;
  const slice = rows.slice(start, start + PER_PAGE);
  const tb = document.getElementById('tblBody');

  if (slice.length === 0) {
    tb.innerHTML = `<tr><td colspan="6" class="empty-cell">
      <i class="fa-solid fa-inbox" style="font-size:22px;color:#d0dce6;display:block;margin-bottom:6px"></i>
      Tidak ada data ditemukan
    </td></tr>`;
  } else {
    tb.innerHTML = slice.map(u => `
      <tr>
        <td style="font-weight:600">${u.nama}</td>
        <td style="font-family:monospace;font-size:11px">${u.nip}</td>
        <td><span class="badge ${u.status === 'Aktif' ? 'badge-active' : 'badge-inactive'}">${u.status}</span></td>
        <td>${roleBadge(u.role)}</td>
        <td>${u.unit}</td>
        <td>
          <button class="btn-icon btn-edit"   data-action="edit"   data-id="${u.id}" title="Edit"><i class="fa-solid fa-pen"></i></button>
          <button class="btn-icon btn-delete" data-action="delete" data-id="${u.id}" title="Hapus" style="margin-left:5px"><i class="fa-solid fa-trash"></i></button>
        </td>
      </tr>`).join('');
  }

  const end = Math.min(start + PER_PAGE, total);
  document.getElementById('pagInfo').textContent =
    total === 0 ? 'Tidak ada data' : `Menampilkan ${start+1}–${end} dari ${total} pengguna`;

  const pb = document.getElementById('pagBtns');
  let html = `<button class="pag-btn" data-page="${currentPage-1}" ${currentPage===1?'disabled style="opacity:.35;cursor:default"':''}><i class="fa-solid fa-chevron-left" style="font-size:10px"></i></button>`;
  for (let p = 1; p <= pages; p++) {
    html += `<button class="pag-btn${p===currentPage?' active':''}" data-page="${p}">${p}</button>`;
  }
  html += `<button class="pag-btn" data-page="${currentPage+1}" ${currentPage===pages?'disabled style="opacity:.35;cursor:default"':''}><i class="fa-solid fa-chevron-right" style="font-size:10px"></i></button>`;
  pb.innerHTML = html;

  updateStats();
}

function updateStats() {
  document.getElementById('cntDokter').textContent   = users.filter(u => u.role === 'Dokter').length;
  document.getElementById('cntGizi').textContent     = users.filter(u => u.role === 'Ahli Gizi').length;
  document.getElementById('cntProduksi').textContent = users.filter(u => u.role === 'Produksi').length;
}

document.getElementById('tblBody').addEventListener('click', function(e) {
  const btn = e.target.closest('button[data-action]');
  if (!btn) return;
  const id     = parseInt(btn.dataset.id);
  const action = btn.dataset.action;
  if (action === 'edit')   openModal(id);
  if (action === 'delete') openHapus(id);
});

document.getElementById('pagBtns').addEventListener('click', function(e) {
  const btn = e.target.closest('button[data-page]');
  if (!btn || btn.disabled) return;
  const p     = parseInt(btn.dataset.page);
  const rows  = getFiltered();
  const pages = Math.max(1, Math.ceil(rows.length / PER_PAGE));
  if (p < 1 || p > pages) return;
  currentPage = p;
  renderTable();
});

/* ══ BUG FIX: saveUser ══
   Bug asli: saat tambah, getFiltered() dipanggil SEBELUM user di-push ke array
   → hitungan halaman salah, user baru tidak muncul.
   Fix: push dulu ke array, reset filter, baru hitung halaman terakhir.
*/
function openModal(id = null) {
  editId = id;
  if (id !== null) {
    const u = users.find(x => x.id === id);
    if (!u) return;
    document.getElementById('modalTitle').textContent    = 'Edit User';
    document.getElementById('modalSubtitle').textContent = 'Ubah data pengguna';
    document.getElementById('fNama').value   = u.nama;
    document.getElementById('fEmail').value  = u.email || '';
    document.getElementById('fNip').value    = u.nip;
    document.getElementById('fPass').value   = '';
    document.getElementById('fRole').value   = u.role;
    document.getElementById('fUnit').value   = u.unit;
    document.getElementById('fStatus').value = u.status;
    document.getElementById('passHint').textContent = '*Kosongkan jika tidak ingin mengubah password';
    document.getElementById('passRequired').style.display = 'none';
  } else {
    document.getElementById('modalTitle').textContent    = 'Tambah User';
    document.getElementById('modalSubtitle').textContent = 'Tambah pengguna baru ke sistem';
    ['fNama','fEmail','fNip','fPass'].forEach(fid => document.getElementById(fid).value = '');
    document.getElementById('fRole').value   = '';
    document.getElementById('fUnit').value   = '';
    document.getElementById('fStatus').value = 'Aktif';
    document.getElementById('passHint').textContent = '*Isi dengan minimal 8 karakter';
    document.getElementById('passRequired').style.display = 'inline';
  }
  document.getElementById('modalUser').classList.add('open');
}

function closeModal() {
  document.getElementById('modalUser').classList.remove('open');
  editId = null;
}

function saveUser() {
  const nama   = document.getElementById('fNama').value.trim();
  const email  = document.getElementById('fEmail').value.trim();
  const nip    = document.getElementById('fNip').value.trim();
  const pass   = document.getElementById('fPass').value;
  const role   = document.getElementById('fRole').value;
  const unit   = document.getElementById('fUnit').value;
  const status = document.getElementById('fStatus').value;

  if (!nama || !nip || !role || !unit) {
    showToast('Harap lengkapi semua kolom wajib!', 'warn');
    return;
  }
  if (editId === null && pass.length < 8) {
    showToast('Password minimal 8 karakter!', 'warn');
    return;
  }

  if (editId !== null) {
    // EDIT — update data yang ada
    const idx = users.findIndex(u => u.id === editId);
    if (idx !== -1) {
      users[idx] = { ...users[idx], nama, email, nip, role, unit, status };
    }
    closeModal();
    renderTable();
    showToast('Data pengguna berhasil diperbarui!');
  } else {
    // TAMBAH — push ke array dulu, lalu reset filter agar user baru pasti terlihat
    users.push({ id: nextId++, nama, email, nip, status, role, unit });

    // Reset filter & search supaya user baru tidak tersembunyi oleh filter aktif
    document.getElementById('searchInput').value = '';
    document.getElementById('filterRole').value  = '';
    document.getElementById('filterStatus').value = '';

    // Sekarang baru hitung halaman (filter sudah kosong, jadi semua user termasuk baru)
    const totalAfter = users.length;
    currentPage = Math.ceil(totalAfter / PER_PAGE);

    closeModal();
    renderTable();
    showToast(`Pengguna "${nama}" berhasil ditambahkan!`);
  }
}

function openHapus(id) {
  const u = users.find(x => x.id === id);
  if (!u) return;
  deleteId = id;
  document.getElementById('hapusNama').textContent = u.nama;
  document.getElementById('hapusInfo').textContent = `${u.role} · ${u.unit}`;
  document.getElementById('modalHapus').classList.add('open');
}

function closeHapus() {
  document.getElementById('modalHapus').classList.remove('open');
  deleteId = null;
}

document.getElementById('btnHapusOk').addEventListener('click', function() {
  if (deleteId === null) return;
  const u = users.find(x => x.id === deleteId);
  users = users.filter(x => x.id !== deleteId);
  closeHapus();
  const pages = Math.max(1, Math.ceil(getFiltered().length / PER_PAGE));
  if (currentPage > pages) currentPage = pages;
  renderTable();
  showToast(`Pengguna "${u ? u.nama : ''}" berhasil dihapus!`);
});

function togglePass() {
  const inp  = document.getElementById('fPass');
  const icon = document.getElementById('passIcon');
  inp.type       = inp.type === 'password' ? 'text' : 'password';
  icon.className = inp.type === 'password' ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash';
}

document.getElementById('searchInput').addEventListener('input',   () => { currentPage = 1; renderTable(); });
document.getElementById('filterRole').addEventListener('change',   () => { currentPage = 1; renderTable(); });
document.getElementById('filterStatus').addEventListener('change', () => { currentPage = 1; renderTable(); });

document.getElementById('modalUser').addEventListener('click',  function(e){ if(e.target===this) closeModal();  });
document.getElementById('modalHapus').addEventListener('click', function(e){ if(e.target===this) closeHapus(); });
document.addEventListener('keydown', e => {
  if (e.key === 'Escape') { closeModal(); closeHapus(); }
});

let toastTimer;
function showToast(msg, type = 'ok') {
  const t    = document.getElementById('toast');
  const icon = document.getElementById('toastIcon');
  document.getElementById('toastMsg').textContent = msg;
  icon.className = type === 'warn' ? 'fa-solid fa-triangle-exclamation' : 'fa-solid fa-circle-check';
  t.querySelector('.toast-icon').style.color = type === 'warn' ? '#facc15' : '#4ade80';
  t.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => t.classList.remove('show'), 3500);
}

renderTable();
</script>
</body>
</html>