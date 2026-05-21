<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIMENU - Cetak Label</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ["Inter","sans-serif"], mono: ["DM Mono","monospace"] },
                    colors: {
                        sidebar: "#2B5A73", sidebarActive: "#6F9CB2",
                        mainBg: "#F5F7F8", titleColor: "#2C5871",
                        textMuted: "#7B8A94", borderSoft: "#D7E3E8",
                    },
                },
            },
        };
    </script>
    <style>
        body { font-family: "Inter", sans-serif; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 999px; }

        aside { background-color: #2B5A73; }
        .logo-text { letter-spacing: 0.08em; }
        .menu-active { background:#6F9CB2; border-radius:0 12px 12px 0; margin-right:14px; }
        .submenu-line { position:absolute; left:0; top:0; bottom:0; width:2px; background:rgba(255,255,255,0.2); border-radius:999px; }
        .submenu-item::before { content:''; position:absolute; left:-1rem; top:50%; width:12px; height:2px; background:rgba(255,255,255,0.25); }

        .card { background:#eaf3f6; border:1px solid #d7e3e8; border-radius:14px; box-shadow:0 2px 8px rgba(0,0,0,0.06); }
        .form-label { display:block; font-size:11px; font-weight:700; color:#374151; margin-bottom:5px; }
        .form-input { width:100%; height:36px; border:1px solid #cbd5e1; border-radius:6px; padding:0 10px; font-size:12px; color:#374151; background:#ffffff; outline:none; }
        .form-input:focus { border-color:#4b93b0; box-shadow:0 0 0 2px rgba(75,147,176,0.12); }
        .btn { height:34px; padding:0 14px; border-radius:6px; font-size:11px; font-weight:700; display:inline-flex; align-items:center; gap:6px; cursor:pointer; transition:all 0.15s; }
        .btn:hover { opacity:0.88; }
        .btn-lg { height:40px; padding:0 20px; font-size:12px; }

        .pasien-row { display:flex; align-items:center; gap:10px; padding:8px 10px; border-radius:8px; cursor:pointer; transition:background 0.12s; border:1.5px solid transparent; }
        .pasien-row:hover { background:#f0f8fc; }
        .pasien-row.selected { background:#e0f2fe; border-color:#4b93b0; }
        .pasien-row input[type="checkbox"] { accent-color:#2B5A73; width:15px; height:15px; cursor:pointer; }

        .preview-grid { display:grid; grid-template-columns:repeat(auto-fill, minmax(220px, 1fr)); gap:14px; }

        /* Label card */
        .label-card {
            background:#fff;
            border:2px solid #2B5A73;
            border-radius:10px;
            padding:12px 14px;
            position:relative;
            overflow:hidden;
            box-shadow:0 2px 10px rgba(43,90,115,0.12);
            transition:transform 0.15s, box-shadow 0.15s;
        }
        .label-card:hover { transform:translateY(-2px); box-shadow:0 6px 20px rgba(43,90,115,0.18); }
        .label-card::before { content:''; position:absolute; top:0; left:0; right:0; height:5px; }
        .label-card.pagi::before   { background:linear-gradient(90deg,#f59e0b,#fcd34d); }
        .label-card.siang::before  { background:linear-gradient(90deg,#22c55e,#86efac); }
        .label-card.malam::before  { background:linear-gradient(90deg,#8b5cf6,#c4b5fd); }

        .label-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:8px; padding-bottom:6px; border-bottom:1px dashed #d7e3e8; }
        .label-nama   { font-size:12px; font-weight:800; color:#1e3a4a; line-height:1.2; }
        .label-norm   { font-family:"DM Mono",monospace; font-size:9px; color:#7B8A94; }
        .label-badge  { font-size:9px; font-weight:700; padding:2px 8px; border-radius:999px; }
        .badge-pagi   { background:#fef3c7; color:#92400e; }
        .badge-siang  { background:#dcfce7; color:#166534; }
        .badge-malam  { background:#ede9fe; color:#5b21b6; }

        .label-row    { display:flex; justify-content:space-between; font-size:10px; padding:2px 0; }
        .label-key    { color:#7B8A94; font-weight:600; }
        .label-val    { color:#1e3a4a; font-weight:700; text-align:right; max-width:55%; }

        .label-menu-box   { background:#f0f8fc; border-radius:6px; padding:6px 8px; margin-top:7px; }
        .label-menu-title { font-size:9px; font-weight:700; color:#4b93b0; margin-bottom:2px; text-transform:uppercase; letter-spacing:0.04em; }
        .label-menu-name  { font-size:12px; font-weight:800; color:#1e3a4a; }
        .label-kalori     { font-size:9px; color:#7B8A94; }

        .label-footer  { margin-top:7px; font-size:9px; color:#7B8A94; display:flex; justify-content:space-between; align-items:center; padding-top:5px; border-top:1px dashed #d7e3e8; }
        .label-simenu  { font-weight:800; color:#2B5A73; font-size:10px; }
        .label-catatan { font-size:9px; color:#92400e; background:#fef9c3; border-radius:4px; padding:3px 6px; margin-top:5px; }

        .select-bar  { background:#2B5A73; color:white; border-radius:8px; padding:8px 14px; display:flex; align-items:center; justify-content:space-between; margin-bottom:10px; font-size:12px; }
        .count-badge { background:#4b93b0; color:white; font-size:10px; font-weight:700; padding:1px 8px; border-radius:999px; }

        .pill { padding:5px 14px; border-radius:999px; font-size:11px; font-weight:700; cursor:pointer; border:1.5px solid transparent; transition:all 0.15s; }
        .pill.active { background:#2B5A73; color:white; border-color:#2B5A73; }
        .pill:not(.active) { background:#fff; color:#374151; border-color:#d7e3e8; }
        .pill:not(.active):hover { border-color:#4b93b0; color:#2B5A73; }

        .modal-overlay { position:fixed; inset:0; background:rgba(0,0,0,0.5); display:flex; align-items:center; justify-content:center; z-index:100; backdrop-filter:blur(3px); }
        .modal-box { background:#fff; border-radius:16px; padding:28px; box-shadow:0 20px 60px rgba(0,0,0,0.25); width:480px; max-width:95vw; animation:fadeIn 0.2s ease; }
        @keyframes fadeIn { from{opacity:0;transform:scale(0.95)} to{opacity:1;transform:scale(1)} }

        .toast { position:fixed; bottom:24px; right:24px; color:white; padding:12px 20px; border-radius:10px; font-size:12px; font-weight:600; box-shadow:0 8px 24px rgba(0,0,0,0.2); z-index:200; display:flex; align-items:center; gap:8px; animation:slideUp 0.3s ease; }
        @keyframes slideUp { from{opacity:0;transform:translateY(16px)} to{opacity:1;transform:translateY(0)} }

        .empty-state { text-align:center; padding:40px 20px; color:#7B8A94; }

        /* ===================== PRINT STYLES =====================
           Gunakan iframe terpisah agar semua label tercetak dengan benar.
           JANGAN gunakan position:fixed di @media print karena
           hanya akan menampilkan 1 halaman saja (viewport pertama).
        */
        #printFrame {
            position: fixed;
            top: -9999px;
            left: -9999px;
            width: 0;
            height: 0;
            border: none;
        }
    </style>
</head>
<body class="bg-mainBg h-screen overflow-hidden">
<div class="flex h-screen">

    <!-- SIDEBAR -->
    <aside class="w-[240px] flex-shrink-0 flex flex-col h-full text-white overflow-y-auto rounded-tr-[2rem] rounded-br-[2rem] z-10 shadow-2xl">
        <div class="flex flex-col items-center justify-center pt-8 pb-6">
            <div class="w-14 h-14 mb-2">
                <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M40 15 C40 10 45 10 50 10 C55 10 60 10 60 15 V40 H85 C90 40 90 45 90 50 C90 55 90 60 85 60 H60 V85 C60 90 55 90 50 90 C45 90 40 90 40 85 V60 H15 C10 60 10 55 10 50 C10 45 10 40 15 40 H40 V15 Z" stroke="#3DB2CD" stroke-width="6" stroke-linejoin="round" fill="none"/>
                    <path d="M35 70 C 35 40, 75 30, 75 30 C 75 30, 65 70, 35 70 Z" fill="#4ADE80"/>
                </svg>
            </div>
            <h1 class="logo-text text-2xl font-black tracking-wide">SIMENU</h1>
        </div>
        <nav class="flex-1 px-0 py-2 space-y-1">
            <a href="#" class="flex items-center px-5 py-3 text-[13px] font-medium hover:bg-white/5 text-gray-200 hover:text-white transition-colors">
                <i class="fa-solid fa-border-all w-5 text-center mr-3"></i>Dashboard
            </a>
            <div class="relative">
                <a href="#" class="flex items-center px-5 py-3 text-[13px] font-medium hover:bg-white/5 text-gray-200 hover:text-white transition-colors">
                    <i class="fa-solid fa-database w-5 text-center mr-3"></i>Data Pasien
                </a>
                <div class="relative ml-10 mt-1 space-y-1 mb-3">
                    <div class="submenu-line"></div>
                    <a href="#" class="submenu-item relative flex items-center pl-5 py-2 text-[13px] font-medium text-gray-300 hover:text-white">
                        <i class="fa-solid fa-arrow-right-to-bracket w-4 text-center mr-2"></i>Input
                    </a>
                    <a href="#" class="submenu-item relative flex items-center pl-5 py-2 text-[13px] font-medium text-gray-300 hover:text-white">
                        <i class="fa-solid fa-user-plus w-4 text-center mr-2"></i>Tambah User
                    </a>
                </div>
            </div>
            <a href="#" class="flex items-center px-5 py-3 text-[13px] font-medium hover:bg-white/5 text-gray-200 hover:text-white transition-colors">
                <i class="fa-solid fa-book-medical w-5 text-center mr-3"></i>Pengelolaan Menu Pasien
            </a>
            <a href="#" class="flex items-center px-5 py-3 text-[13px] font-medium hover:bg-white/5 text-gray-200 hover:text-white transition-colors">
                <i class="fa-solid fa-clipboard-check w-5 text-center mr-3"></i>Status Menu
            </a>
            <a href="#" class="menu-active flex items-center px-5 py-3 text-[13px] font-medium text-white">
                <i class="fa-solid fa-tags w-5 text-center mr-3"></i>Cetak Label
            </a>
            <a href="#" class="flex items-center px-5 py-3 text-[13px] font-medium hover:bg-white/5 text-gray-200 hover:text-white transition-colors">
                <i class="fa-solid fa-circle-exclamation w-5 text-center mr-3"></i>Laporan
            </a>
        </nav>
    </aside>

    <!-- MAIN -->
    <main class="flex-1 overflow-y-auto p-4">

        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h1 class="text-[20px] font-extrabold text-titleColor">Cetak Label Menu Pasien</h1>
                <p class="text-[11px] text-textMuted mt-0.5">Pilih pasien dan jadwal, lalu cetak label makanan</p>
            </div>
            <div class="flex items-center gap-2">
                <button onclick="previewSebelumCetak()" id="btnPreview" class="btn btn-lg bg-indigo-600 text-white" style="display:none;">
                    <i class="fa-solid fa-eye"></i> Preview Cetak
                </button>
                <button onclick="cetakLabel()" id="btnCetak" class="btn btn-lg bg-sidebar text-white" style="display:none;">
                    <i class="fa-solid fa-print"></i> Cetak Label
                </button>
            </div>
        </div>

        <div class="grid grid-cols-[280px_1fr] gap-4">

            <!-- LEFT -->
            <div class="space-y-3">

                <!-- Filter Jadwal -->
                <div class="card p-4">
                    <h2 class="text-[12px] font-bold text-titleColor mb-3 flex items-center gap-2">
                        <i class="fa-solid fa-clock text-sidebar"></i> Filter Jadwal
                    </h2>
                    <div class="flex flex-wrap gap-2">
                        <button class="pill active" onclick="setJadwal('Semua',this)">Semua</button>
                        <button class="pill" onclick="setJadwal('Pagi',this)">
                            <i class="fa-solid fa-sun text-amber-500 mr-1"></i>Pagi
                        </button>
                        <button class="pill" onclick="setJadwal('Siang',this)">
                            <i class="fa-solid fa-cloud-sun text-green-500 mr-1"></i>Siang
                        </button>
                        <button class="pill" onclick="setJadwal('Malam',this)">
                            <i class="fa-solid fa-moon text-indigo-500 mr-1"></i>Malam
                        </button>
                    </div>
                </div>

                <!-- Pilih Pasien -->
                <div class="card p-4">
                    <div class="select-bar mb-3">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-users"></i>Daftar Pasien</span>
                        <span id="selectedCount" class="count-badge">0 dipilih</span>
                    </div>
                    <div class="relative mb-3">
                        <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                        <input type="text" id="searchPasien" class="form-input" style="padding-left:28px;" placeholder="Cari pasien..." oninput="filterPasienList()" />
                    </div>
                    <label class="flex items-center gap-2 px-2 py-2 mb-1 cursor-pointer text-[11px] font-bold text-titleColor">
                        <input type="checkbox" id="checkAll" onchange="toggleSelectAll()" style="accent-color:#2B5A73;width:15px;height:15px;" />
                        Pilih Semua Pasien
                    </label>
                    <hr class="border-borderSoft mb-2" />
                    <div id="pasienList" class="space-y-1 max-h-[340px] overflow-y-auto pr-1"></div>
                </div>

                <!-- Stat -->
                <div class="card p-3">
                    <div class="grid grid-cols-3 gap-2 text-center">
                        <div>
                            <div class="text-[18px] font-extrabold text-amber-500" id="cntPagi">0</div>
                            <div class="text-[10px] text-textMuted font-semibold">Pagi</div>
                        </div>
                        <div>
                            <div class="text-[18px] font-extrabold text-green-500" id="cntSiang">0</div>
                            <div class="text-[10px] text-textMuted font-semibold">Siang</div>
                        </div>
                        <div>
                            <div class="text-[18px] font-extrabold text-indigo-500" id="cntMalam">0</div>
                            <div class="text-[10px] text-textMuted font-semibold">Malam</div>
                        </div>
                    </div>
                    <div class="text-center mt-2 text-[11px] text-textMuted">
                        Label yang akan dicetak: <strong id="cntTotal" class="text-titleColor">0</strong>
                    </div>
                </div>
            </div>

            <!-- RIGHT: Preview -->
            <div>
                <div class="card p-4">
                    <div class="flex items-center justify-between mb-3">
                        <h2 class="text-[13px] font-bold text-titleColor flex items-center gap-2">
                            <i class="fa-solid fa-tag text-sidebar"></i> Preview Label
                            <span id="previewCount" class="count-badge" style="background:#2B5A73;">0 label</span>
                        </h2>
                        <div class="flex items-center gap-2 text-[11px] text-textMuted">
                            <i class="fa-solid fa-circle-info text-xs"></i>
                            Tampilan label sebelum dicetak
                        </div>
                    </div>
                    <div id="previewArea" class="preview-grid min-h-[300px]">
                        <div class="empty-state col-span-full">
                            <i class="fa-solid fa-tag text-4xl mb-3 text-gray-300"></i>
                            <p class="font-semibold text-[13px] text-gray-400">Belum ada label yang dipilih</p>
                            <p class="text-[11px] mt-1">Pilih pasien di sebelah kiri untuk melihat preview label</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- iframe cetak — SOLUSI UTAMA: cetak via iframe terpisah agar semua label muncul -->
<iframe id="printFrame"></iframe>

<!-- Modal Preview Cetak -->
<div id="modalPreview" class="modal-overlay" style="display:none;" onclick="if(event.target===this)closeModal()">
    <div class="modal-box" style="width:720px;max-height:85vh;overflow-y:auto;">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-[15px] font-bold text-titleColor flex items-center gap-2">
                <i class="fa-solid fa-print text-sidebar"></i> Preview Sebelum Cetak
            </h3>
            <button onclick="closeModal()" class="w-7 h-7 rounded-full bg-gray-100 text-gray-500 flex items-center justify-center hover:bg-gray-200">
                <i class="fa-solid fa-xmark text-xs"></i>
            </button>
        </div>
        <div class="bg-blue-50 rounded-xl p-3 mb-4 text-[11px] text-blue-700 flex items-center gap-2">
            <i class="fa-solid fa-circle-info"></i>
            Label dicetak dalam grid 3 kolom pada kertas A4. Semua pasien yang dipilih akan tercetak.
        </div>
        <div id="modalPreviewGrid" class="grid grid-cols-3 gap-3 mb-5"></div>
        <div class="flex justify-end gap-2">
            <button onclick="closeModal()" class="btn bg-gray-100 text-gray-600 border border-gray-200">Tutup</button>
            <button onclick="closeModal();cetakLabel();" class="btn btn-lg bg-sidebar text-white">
                <i class="fa-solid fa-print"></i> Cetak Sekarang
            </button>
        </div>
    </div>
</div>

<!-- Toast -->
<div id="toast" style="display:none;" class="toast"></div>

<script>
// ===================== DATA =====================
const daftarPasien = [
    { id:1, nama:"BUDI SANTOSO",       norm:"0987654322", bangsal:"Tulip",      kamar:"E-05", penyakit:"Hipertensi",  diet:"Rendah Garam",   alergi:"-" },
    { id:2, nama:"FAJAR SETIAWAN",     norm:"0987001211", bangsal:"Mawar",      kamar:"B-02", penyakit:"Diabetes",    diet:"Diet DM",        alergi:"Kacang" },
    { id:3, nama:"CITRA MULANDANI",    norm:"0987003312", bangsal:"Anggrek",    kamar:"C-07", penyakit:"Tifoid",      diet:"Lunak",          alergi:"-" },
    { id:4, nama:"DEWI RAHAYU",        norm:"0987010091", bangsal:"Flamboyan",  kamar:"D-01", penyakit:"Anemia",      diet:"Tinggi Protein", alergi:"Seafood" },
    { id:5, nama:"HENDRA KUSUMA",      norm:"0987021234", bangsal:"Dahlia",     kamar:"F-03", penyakit:"Stroke",      diet:"Cair",           alergi:"-" },
    { id:6, nama:"LINDA PERMATASARI",  norm:"0987031123", bangsal:"Tulip",      kamar:"E-08", penyakit:"Maag",        diet:"Rendah Lemak",   alergi:"Susu" },
    { id:7, nama:"RUDI HARTONO",       norm:"0987041567", bangsal:"Mawar",      kamar:"B-05", penyakit:"Kolesterol",  diet:"Rendah Lemak",   alergi:"-" },
];

const daftarMenu = [
    { pasienId:1, menu:"Nasi Tim Ayam",     kalori:650,  bentuk:"Lunak",  jadwal:"Pagi",  catatan:"Kurangi garam" },
    { pasienId:1, menu:"Sup Sayur",          kalori:400,  bentuk:"Lunak",  jadwal:"Siang", catatan:"-" },
    { pasienId:1, menu:"Bubur Kacang Hijau", kalori:350,  bentuk:"Lunak",  jadwal:"Malam", catatan:"Rendah sodium" },
    { pasienId:2, menu:"Bubur Ayam",         kalori:500,  bentuk:"Saring", jadwal:"Pagi",  catatan:"-" },
    { pasienId:2, menu:"Nasi Merah",         kalori:800,  bentuk:"Biasa",  jadwal:"Siang", catatan:"Kontrol gula" },
    { pasienId:3, menu:"Nasi Tim",           kalori:1000, bentuk:"Lunak",  jadwal:"Pagi",  catatan:"Minum setelah makan" },
    { pasienId:4, menu:"Daging Sapi Rebus",  kalori:700,  bentuk:"Biasa",  jadwal:"Siang", catatan:"Tambah zat besi" },
    { pasienId:5, menu:"Susu Cair",          kalori:300,  bentuk:"Cair",   jadwal:"Pagi",  catatan:"Minum perlahan" },
    { pasienId:5, menu:"Jus Buah Saring",    kalori:250,  bentuk:"Cair",   jadwal:"Siang", catatan:"-" },
    { pasienId:6, menu:"Bubur Oat",          kalori:420,  bentuk:"Lunak",  jadwal:"Pagi",  catatan:"-" },
    { pasienId:7, menu:"Nasi + Ikan Kukus",  kalori:750,  bentuk:"Biasa",  jadwal:"Siang", catatan:"Tanpa gorengan" },
];

let selectedIds  = new Set();
let filterJadwal = "Semua";
const today      = new Date();
const todayStr   = `${today.getDate()}/${today.getMonth()+1}/${today.getFullYear()}`;

// ===================== INIT =====================
window.onload = function() {
    renderPasienList();
    renderPreview();
};

// ===================== PASIEN LIST =====================
function renderPasienList() {
    const q      = (document.getElementById('searchPasien').value || '').toLowerCase();
    const list   = document.getElementById('pasienList');
    const filtered = daftarPasien.filter(p => p.nama.toLowerCase().includes(q));

    if (!filtered.length) {
        list.innerHTML = '<p class="text-[11px] text-textMuted text-center py-4">Tidak ditemukan.</p>';
        return;
    }

    list.innerHTML = filtered.map(p => {
        const count = getMenuPasien(p.id).length;
        const sel   = selectedIds.has(p.id);
        return `
        <label class="pasien-row ${sel?'selected':''}" for="chk_${p.id}">
            <input type="checkbox" id="chk_${p.id}" value="${p.id}" ${sel?'checked':''} onchange="togglePasien(${p.id},this)" />
            <div class="flex-1 min-w-0">
                <div class="text-[12px] font-bold text-titleColor truncate">${p.nama}</div>
                <div class="text-[10px] text-textMuted">${p.bangsal} · Kamar ${p.kamar}</div>
            </div>
            <span class="text-[10px] font-semibold text-sidebar bg-sidebar/10 px-2 py-0.5 rounded-full flex-shrink-0">${count} menu</span>
        </label>`;
    }).join('');
}

function filterPasienList() { renderPasienList(); }

function togglePasien(id, el) {
    el.checked ? selectedIds.add(id) : selectedIds.delete(id);
    updateCheckAll();
    renderPreview();
    updateCount();
    // Update row highlight tanpa re-render penuh
    const row = el.closest('.pasien-row');
    if (row) row.classList.toggle('selected', el.checked);
}

function toggleSelectAll() {
    const all = document.getElementById('checkAll').checked;
    daftarPasien.forEach(p => all ? selectedIds.add(p.id) : selectedIds.delete(p.id));
    renderPasienList();
    renderPreview();
    updateCount();
}

function updateCheckAll() {
    document.getElementById('checkAll').checked = selectedIds.size === daftarPasien.length;
}

function updateCount() {
    document.getElementById('selectedCount').textContent = `${selectedIds.size} dipilih`;
}

// ===================== JADWAL FILTER =====================
function setJadwal(val, btn) {
    filterJadwal = val;
    document.querySelectorAll('.pill').forEach(p => p.classList.remove('active'));
    btn.classList.add('active');
    renderPreview();
    renderPasienList(); // update jumlah menu di list
}

// ===================== GET MENU =====================
function getMenuPasien(pasienId) {
    return daftarMenu.filter(m =>
        m.pasienId === pasienId &&
        (filterJadwal === 'Semua' || m.jadwal === filterJadwal)
    );
}

// ===================== BUILD LABEL HTML =====================
function buildLabel(m, p) {
    const jClass  = m.jadwal==='Pagi' ? 'pagi' : m.jadwal==='Siang' ? 'siang' : 'malam';
    const bClass  = m.jadwal==='Pagi' ? 'badge-pagi' : m.jadwal==='Siang' ? 'badge-siang' : 'badge-malam';
    const catHtml = (m.catatan && m.catatan !== '-')
        ? `<div class="label-catatan"><i class="fa-solid fa-triangle-exclamation" style="margin-right:3px;"></i>${m.catatan}</div>` : '';

    return `
    <div class="label-card ${jClass}">
        <div class="label-header">
            <div>
                <div class="label-nama">${p.nama}</div>
                <div class="label-norm">${p.norm}</div>
            </div>
            <span class="label-badge ${bClass}">${m.jadwal}</span>
        </div>
        <div class="label-row"><span class="label-key">Bangsal</span><span class="label-val">${p.bangsal}</span></div>
        <div class="label-row"><span class="label-key">Kamar</span><span class="label-val">${p.kamar}</span></div>
        <div class="label-row"><span class="label-key">Diet</span><span class="label-val">${p.diet}</span></div>
        <div class="label-row"><span class="label-key">Alergi</span><span class="label-val">${p.alergi}</span></div>
        <div class="label-menu-box">
            <div class="label-menu-title">&#x1F374; Menu Makanan</div>
            <div class="label-menu-name">${m.menu}</div>
            <div class="label-kalori">${m.kalori} kkal &bull; ${m.bentuk}</div>
        </div>
        ${catHtml}
        <div class="label-footer">
            <span class="label-simenu">SIMENU</span>
            <span>${todayStr}</span>
        </div>
    </div>`;
}

// ===================== RENDER PREVIEW =====================
function renderPreview() {
    const area = document.getElementById('previewArea');
    const labels = collectLabels();
    const { pagi, siang, malam } = countByJadwal(labels);

    document.getElementById('cntPagi').textContent   = pagi;
    document.getElementById('cntSiang').textContent  = siang;
    document.getElementById('cntMalam').textContent  = malam;
    document.getElementById('cntTotal').textContent  = labels.length;
    document.getElementById('previewCount').textContent = `${labels.length} label`;

    const show = labels.length > 0;
    document.getElementById('btnCetak').style.display   = show ? 'inline-flex' : 'none';
    document.getElementById('btnPreview').style.display = show ? 'inline-flex' : 'none';

    if (!labels.length) {
        area.innerHTML = `
        <div class="empty-state col-span-full">
            <i class="fa-solid fa-tag" style="font-size:36px;margin-bottom:10px;color:#d1d5db;"></i>
            <p style="font-weight:600;font-size:13px;color:#9ca3af;">Belum ada label yang dipilih</p>
            <p style="font-size:11px;margin-top:4px;">Pilih pasien di sebelah kiri untuk melihat preview label</p>
        </div>`;
        return;
    }
    area.innerHTML = labels.map(l => l.html).join('');
}

// ===================== COLLECT ALL LABELS =====================
function collectLabels() {
    const result = [];
    // Urutkan berdasarkan urutan daftarPasien agar konsisten
    daftarPasien.forEach(p => {
        if (!selectedIds.has(p.id)) return;
        getMenuPasien(p.id).forEach(m => {
            result.push({ html: buildLabel(m, p), jadwal: m.jadwal });
        });
    });
    return result;
}

function countByJadwal(labels) {
    return {
        pagi:  labels.filter(l => l.jadwal === 'Pagi').length,
        siang: labels.filter(l => l.jadwal === 'Siang').length,
        malam: labels.filter(l => l.jadwal === 'Malam').length,
    };
}

// ===================== PREVIEW MODAL =====================
function previewSebelumCetak() {
    const labels = collectLabels();
    document.getElementById('modalPreviewGrid').innerHTML = labels.map(l => l.html).join('');
    document.getElementById('modalPreview').style.display = 'flex';
}
function closeModal() { document.getElementById('modalPreview').style.display = 'none'; }

// ===================== CETAK via IFRAME =====================
// Perbaikan utama: gunakan iframe terpisah untuk mencetak.
// Metode @media print dengan position:fixed/visibility hanya bisa 
// menampilkan 1 halaman karena terikat ke viewport. Dengan iframe,
// browser akan mencetak seluruh konten dokumen iframe tersebut.
function cetakLabel() {
    if (!selectedIds.size) { showToast('Pilih minimal 1 pasien terlebih dahulu!', '#dc2626'); return; }

    const labels = collectLabels();
    if (!labels.length) { showToast('Tidak ada menu untuk jadwal yang dipilih!', '#dc2626'); return; }

    const htmlLabels = labels.map(l => l.html).join('');

    const printDoc = `<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"/>
<title>Cetak Label SIMENU - ${todayStr}</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet"/>
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body {
    font-family: "Inter", sans-serif;
    background: white;
    padding: 10mm;
  }
  .grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 6mm;
  }
  .label-card {
    background: #fff;
    border: 1.5px solid #2B5A73;
    border-radius: 8px;
    padding: 10px 12px;
    position: relative;
    overflow: hidden;
    page-break-inside: avoid;
    break-inside: avoid;
  }
  .label-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 5px;
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
  }
  .label-card.pagi::before  { background: linear-gradient(90deg,#f59e0b,#fcd34d); }
  .label-card.siang::before { background: linear-gradient(90deg,#22c55e,#86efac); }
  .label-card.malam::before { background: linear-gradient(90deg,#8b5cf6,#c4b5fd); }

  .label-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:7px; padding-bottom:5px; border-bottom:1px dashed #d7e3e8; margin-top:4px; }
  .label-nama   { font-size:11px; font-weight:800; color:#1e3a4a; }
  .label-norm   { font-family:"DM Mono",monospace; font-size:8px; color:#7B8A94; }
  .label-badge  { font-size:8px; font-weight:700; padding:2px 7px; border-radius:999px;
                  -webkit-print-color-adjust:exact; print-color-adjust:exact; }
  .badge-pagi   { background:#fef3c7; color:#92400e; }
  .badge-siang  { background:#dcfce7; color:#166534; }
  .badge-malam  { background:#ede9fe; color:#5b21b6; }

  .label-row  { display:flex; justify-content:space-between; font-size:9px; padding:1.5px 0; }
  .label-key  { color:#7B8A94; font-weight:600; }
  .label-val  { color:#1e3a4a; font-weight:700; text-align:right; max-width:55%; }

  .label-menu-box   { background:#f0f8fc; border-radius:5px; padding:5px 7px; margin-top:6px;
                       -webkit-print-color-adjust:exact; print-color-adjust:exact; }
  .label-menu-title { font-size:8px; font-weight:700; color:#4b93b0; margin-bottom:1px; text-transform:uppercase; letter-spacing:.04em; }
  .label-menu-name  { font-size:11px; font-weight:800; color:#1e3a4a; }
  .label-kalori     { font-size:8px; color:#7B8A94; }

  .label-catatan { font-size:8px; color:#92400e; background:#fef9c3; border-radius:4px; padding:2px 5px; margin-top:4px;
                   -webkit-print-color-adjust:exact; print-color-adjust:exact; }
  .label-footer  { margin-top:6px; font-size:8px; color:#7B8A94; display:flex; justify-content:space-between; align-items:center; padding-top:4px; border-top:1px dashed #d7e3e8; }
  .label-simenu  { font-weight:800; color:#2B5A73; font-size:9px; }

  @media print {
    body { padding: 8mm; }
    .label-card::before,
    .label-menu-box,
    .badge-pagi, .badge-siang, .badge-malam,
    .label-catatan {
      -webkit-print-color-adjust: exact;
      print-color-adjust: exact;
    }
  }
</style>
</head>
<body>
<div class="grid">
${htmlLabels}
</div>
</body>
</html>`;

    const iframe = document.getElementById('printFrame');
    // Tulis dokumen ke iframe
    iframe.contentDocument.open();
    iframe.contentDocument.write(printDoc);
    iframe.contentDocument.close();

    // Tunggu font dan render selesai, lalu cetak
    iframe.onload = function () {
        setTimeout(() => {
            iframe.contentWindow.focus();
            iframe.contentWindow.print();
            showToast(`${labels.length} label berhasil dikirim ke printer!`, '#16a34a');
        }, 400);
    };
}

// ===================== TOAST =====================
function showToast(msg, color='#2B5A73') {
    const t = document.getElementById('toast');
    t.style.background = color;
    t.innerHTML = `<i class="fa-solid fa-circle-check"></i> ${msg}`;
    t.style.display = 'flex';
    clearTimeout(t._t);
    t._t = setTimeout(() => t.style.display='none', 3000);
}
</script>
</body>
</html>