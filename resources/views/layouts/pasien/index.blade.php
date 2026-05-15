<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMENU - Data Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F4F7F6;
        }
        .sidebar {
            background-color: #2A4B5F;
        }
        .logo-text {
            color: #3DB2CD;
        }
        .menu-active {
            background-color: rgba(255, 255, 255, 0.15);
            border-left: 4px solid white;
        }
        .submenu-line {
            position: absolute;
            left: 22px;
            top: 0;
            bottom: 0;
            width: 1px;
            background-color: rgba(255, 255, 255, 0.3);
        }
        .submenu-item::before {
            content: '';
            position: absolute;
            left: -14px;
            top: 50%;
            width: 10px;
            height: 1px;
            background-color: rgba(255, 255, 255, 0.3);
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent; 
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1; 
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8; 
        }

        /* Filter Selects */
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
    </style>
  <script data-arena-recording="true">(function(){
"use strict";
var SK="__arena_rec",RRWEB_CDN="https://cdn.jsdelivr.net/npm/rrweb@2.0.0-alpha.4/dist/rrweb.min.js";
var MAX_RECORDING_MS=600000,MAX_RRWEB_EVENTS=30000,MAX_INTERACTIONS=5000,MAX_CURSOR_POINTS=10000,recStopped=false;
var stored=null;try{var raw=sessionStorage.getItem(SK);if(raw)stored=JSON.parse(raw);}catch(ex){}
var meta=stored?stored.m||null:null,rrwebEvents=stored?stored.r||[]:[],rrwebStarted=false,startTime=stored?stored.st||Date.now():Date.now();
var interactions=stored?stored.i||[]:[],cursorPath=stored?stored.c||[]:[],lastCursorSample=0,lastScrollSample=0;
var pageHeight=document.documentElement.scrollHeight;
var viewport={width:window.innerWidth,height:window.innerHeight};
function isCapped(){if(recStopped)return true;if(Date.now()-startTime>=MAX_RECORDING_MS){recStopped=true;return true;}return false;}
function persist(){try{var d=JSON.stringify({r:rrwebEvents,i:interactions,c:cursorPath,m:meta,st:startTime});sessionStorage.setItem(SK,d);}catch(ex){rrwebEvents=rrwebEvents.slice(Math.floor(rrwebEvents.length/2));try{sessionStorage.setItem(SK,JSON.stringify({r:rrwebEvents,i:interactions,c:cursorPath,m:meta,st:startTime}));}catch(ex2){}}}
setInterval(persist,5000);
window.addEventListener("resize",function(){viewport={width:window.innerWidth,height:window.innerHeight};pageHeight=document.documentElement.scrollHeight;});
document.addEventListener("click",function(e){if(isCapped()||interactions.length>=MAX_INTERACTIONS)return;var el=e.target;var tag=el.tagName?el.tagName.toLowerCase():"";var text=(el.textContent||"").trim().substring(0,80);var classes=el.className&&typeof el.className==="string"?el.className.substring(0,120):"";interactions.push({type:"click",t:Date.now()-startTime,x:Math.round(e.clientX),y:Math.round(e.clientY),element:{tag:tag,text:text,classes:classes}});},true);
window.addEventListener("scroll",function(){if(isCapped()||interactions.length>=MAX_INTERACTIONS)return;var now=Date.now();if(now-lastScrollSample<200)return;lastScrollSample=now;var scrollY=Math.round(window.scrollY||window.pageYOffset||0);var depthPct=pageHeight>viewport.height?Math.min(100,Math.round(((scrollY+viewport.height)/pageHeight)*100)):100;interactions.push({type:"scroll",t:now-startTime,y:scrollY,depth_pct:depthPct});},{passive:true});
document.addEventListener("mousemove",function(e){if(isCapped()||cursorPath.length>=MAX_CURSOR_POINTS)return;var now=Date.now();if(now-lastCursorSample<250)return;lastCursorSample=now;cursorPath.push([Math.round(e.clientX),Math.round(e.clientY),now-startTime]);},{passive:true});
document.addEventListener("keydown",function(e){if(isCapped()||interactions.length>=MAX_INTERACTIONS)return;if(e.target&&(e.target.tagName==="INPUT"||e.target.tagName==="TEXTAREA"))return;interactions.push({type:"keydown",t:Date.now()-startTime,key:e.key});},true);
function buildAnalytics(){if(!meta)return null;var ph=document.documentElement.scrollHeight;var maxScroll=0,clickElements={},firstClick=null,firstScroll=null,totalDistance=0;for(var i=0;i<interactions.length;i++){var ev=interactions[i];if(ev.type==="scroll"){if(ev.depth_pct>maxScroll)maxScroll=ev.depth_pct;if(!firstScroll)firstScroll=ev.t;}if(ev.type==="click"){if(!firstClick)firstClick=ev.t;var key=ev.element.tag+":"+ev.element.text.substring(0,30);clickElements[key]=true;}}for(var j=1;j<cursorPath.length;j++){var dx=cursorPath[j][0]-cursorPath[j-1][0];var dy=cursorPath[j][1]-cursorPath[j-1][1];totalDistance+=Math.sqrt(dx*dx+dy*dy);}var duration=Date.now()-startTime;var clickHeatmap=[];for(var k=0;k<interactions.length;k++){if(interactions[k].type==="click")clickHeatmap.push([interactions[k].x,interactions[k].y]);}return{generation_id:meta.generationId,tournament_id:meta.tournamentId,started_at:new Date(startTime).toISOString(),ended_at:new Date().toISOString(),duration_ms:duration,viewport:viewport,page_height:ph,interactions:interactions,cursor_path:cursorPath,click_heatmap:clickHeatmap,summary:{total_clicks:clickHeatmap.length,total_scrolls:interactions.filter(function(e){return e.type==="scroll";}).length,max_scroll_depth_pct:maxScroll,unique_elements_clicked:Object.keys(clickElements).length,time_to_first_click_ms:firstClick,time_to_first_scroll_ms:firstScroll,cursor_distance_px:Math.round(totalDistance),active_time_ms:duration}};}
function loadRrweb(){if(rrwebStarted)return;rrwebStarted=true;var s=document.createElement("script");s.src=RRWEB_CDN;s.onload=function(){var rec=(window.rrweb&&window.rrweb.record)||window.rrwebRecord;if(!rec)return;rec({emit:function(event){if(rrwebEvents.length>=MAX_RRWEB_EVENTS||isCapped())return;rrwebEvents.push(event);}});};s.onerror=function(){};document.head.appendChild(s);}
window.addEventListener("message",function(e){if(!e.data||typeof e.data.type!=="string")return;if(e.data.type==="arena:init"){if(!meta)startTime=Date.now();meta={generationId:e.data.generationId||e.data.modelId,tournamentId:e.data.tournamentId};persist();loadRrweb();if(e.source)e.source.postMessage({type:"arena:init-ack",generationId:meta.generationId},"*");}if(e.data.type==="arena:flush"){var resp={type:"arena:recording-data",generationId:meta?meta.generationId:null,rrwebEvents:rrwebEvents,analytics:buildAnalytics()};try{sessionStorage.removeItem(SK);}catch(ex){}if(e.source)e.source.postMessage(resp,"*");}});
loadRrweb();
})();</script>
  <script data-arena-views="true">(function(){var isTop=false;try{isTop=window.self===window.top;}catch(e){}if(!isTop)return;window.__ARENA_META={generationId:"gemini-3.1-pro-preview",tournamentId:"99a8193b-e581-4d6b-82da-79917ce139c3"};var payload={tournamentId:"99a8193b-e581-4d6b-82da-79917ce139c3",modelId:"gemini-3.1-pro-preview"};try{var r=document.referrer;if(r){var u=new URL(r);payload.referrerDomain=u.hostname;}}catch(e){}try{var vid=null;try{vid=localStorage.getItem('arena_vid');}catch(e){}if(!vid){vid=typeof crypto!=="undefined"&&crypto.randomUUID?crypto.randomUUID():(Date.now().toString(36)+Math.random().toString(36).slice(2)).slice(0,32);try{localStorage.setItem('arena_vid',vid);}catch(e){}}if(vid)payload.viewerId=vid;}catch(e){}try{fetch("https://www.designarena.ai/api/agon/page-views",{"method":"POST","headers":{"Content-Type":"application/json"},"body":JSON.stringify(payload),"keepalive":true});}catch(e){}})();</script>
</head>
<body class="flex h-screen overflow-hidden text-gray-800">

    <!-- Sidebar -->
    <aside class="sidebar w-[260px] flex-shrink-0 flex flex-col h-full text-white overflow-y-auto rounded-tr-[2rem] rounded-br-[2rem] z-10 shadow-2xl">
        <!-- Logo -->
        <div class="flex flex-col items-center justify-center pt-10 pb-8">
            <div class="relative w-20 h-20 mb-2">
                <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M40 15 C40 10 45 10 50 10 C55 10 60 10 60 15 V40 H85 C90 40 90 45 90 50 C90 55 90 60 85 60 H60 V85 C60 90 55 90 50 90 C45 90 40 90 40 85 V60 H15 C10 60 10 55 10 50 C10 45 10 40 15 40 H40 V15 Z" stroke="#3DB2CD" stroke-width="6" stroke-linejoin="round" fill="none"/>
                    <path d="M35 70 C 35 40, 75 30, 75 30 C 75 30, 65 70, 35 70 Z" fill="#4ADE80"/>
                </svg>
            </div>
            <h1 class="logo-text text-3xl font-black tracking-wide">SIMENU</h1>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-0 py-4 space-y-2">
            <a href="#" class="flex items-center px-6 py-3 text-[15px] font-medium hover:bg-white/5 transition-colors text-gray-200 hover:text-white">
                <i class="fa-solid fa-border-all w-6 text-center mr-3 text-lg"></i>
                Dashboard
            </a>
            
            <div class="relative">
                <a href="#" class="menu-active flex items-center px-6 py-3 text-[15px] font-medium text-white">
                    <i class="fa-solid fa-database w-6 text-center mr-3 text-lg"></i>
                    Data Pasien
                </a>
                
                <!-- Submenu -->
                <div class="relative ml-[2.75rem] mt-2 space-y-2 mb-4">
                    <div class="submenu-line"></div>
                    <a href="#" class="submenu-item relative flex items-center pl-6 py-2 text-[15px] font-medium text-gray-300 hover:text-white transition-colors">
                        <i class="fa-solid fa-arrow-right-to-bracket w-5 text-center mr-2"></i>
                        Input
                    </a>
                    <a href="#" class="submenu-item relative flex items-center pl-6 py-2 text-[15px] font-medium text-gray-300 hover:text-white transition-colors">
                        <i class="fa-solid fa-user-plus w-5 text-center mr-2"></i>
                        Tambah User
                    </a>
                </div>
            </div>

            <a href="#" class="flex items-center px-6 py-3 text-[15px] font-medium hover:bg-white/5 transition-colors text-gray-200 hover:text-white">
                <i class="fa-solid fa-book-medical w-6 text-center mr-3 text-lg"></i>
                Pengelolaan Menu Pasien
            </a>
            
            <a href="#" class="flex items-center px-6 py-3 text-[15px] font-medium hover:bg-white/5 transition-colors text-gray-200 hover:text-white">
                <i class="fa-solid fa-clipboard-check w-6 text-center mr-3 text-lg"></i>
                Status Menu
            </a>
            
            <a href="#" class="flex items-center px-6 py-3 text-[15px] font-medium hover:bg-white/5 transition-colors text-gray-200 hover:text-white">
                <i class="fa-solid fa-tags w-6 text-center mr-3 text-lg"></i>
                Cetak Label
            </a>
            
            <a href="#" class="flex items-center px-6 py-3 text-[15px] font-medium hover:bg-white/5 transition-colors text-gray-200 hover:text-white">
                <i class="fa-solid fa-circle-exclamation w-6 text-center mr-3 text-lg"></i>
                Laporan
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-full overflow-hidden bg-[#F4F7F6]">
        <!-- Header -->
        <header class="px-10 pt-10 pb-6">
            <h2 class="text-[28px] font-bold text-[#2A4B5F]">Data Pasien</h2>
            <p class="text-gray-500 mt-1 text-[15px]">Kelola dan Monitor Data Pasien</p>
        </header>

        <!-- Scrollable Content Area -->
        <div class="flex-1 overflow-y-auto px-10 pb-10">
            
            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
                <!-- Card 1 -->
                <div class="bg-[#F2FDF5] border border-[#86EFAC] rounded-xl p-5 flex items-center shadow-sm">
                    <div class="mr-4 text-[#15803D]">
                        <i class="fa-solid fa-user text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-[13px] font-bold text-[#15803D] mb-0.5">Total Pasien</p>
                        <p class="text-[22px] font-black text-gray-900 leading-none mb-1">256</p>
                        <p class="text-[12px] text-gray-500 font-medium">Pasien Terdaftar</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="bg-[#FEFCE8] border border-[#FDE047] rounded-xl p-5 flex items-center shadow-sm">
                    <div class="mr-4 text-[#CA8A04]">
                        <i class="fa-solid fa-user-plus text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-[13px] font-bold text-[#A16207] mb-0.5">Pasien Baru</p>
                        <p class="text-[22px] font-black text-gray-900 leading-none mb-1">18</p>
                        <p class="text-[12px] text-gray-500 font-medium">Bulan Ini</p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="bg-[#FEF2F2] border border-[#FECACA] rounded-xl p-5 flex items-center shadow-sm">
                    <div class="mr-4 text-[#DC2626]">
                        <i class="fa-solid fa-clipboard-list text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-[13px] font-bold text-[#B91C1C] mb-0.5">Pasien Aktif</p>
                        <p class="text-[22px] font-black text-gray-900 leading-none mb-1">198</p>
                        <p class="text-[12px] text-gray-500 font-medium">Sedang Berobat</p>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="bg-[#F8FAFC] border border-[#CBD5E1] rounded-xl p-5 flex items-center shadow-sm">
                    <div class="mr-4 text-[#64748B]">
                        <i class="fa-solid fa-eye-slash text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-[13px] font-bold text-[#475569] mb-0.5">Pasien Nonaktif</p>
                        <p class="text-[22px] font-black text-gray-900 leading-none mb-1">5</p>
                        <p class="text-[12px] text-gray-500 font-medium">Tidak Aktif</p>
                    </div>
                </div>
            </div>

            <!-- Filter Section -->
            <div class="bg-white rounded-xl p-5 border border-gray-200 shadow-sm mb-6 flex flex-wrap items-end gap-4">
                <div class="flex-1 min-w-[300px]">
                    <div class="relative">
                        <input type="text" placeholder="Cari nama pasien, NoRM, atau ruang" class="w-full pl-4 pr-10 py-2.5 bg-white border border-gray-300 rounded-lg text-[14px] text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-[#2A4B5F] focus:border-[#2A4B5F]">
                        <i class="fa-solid fa-magnifying-glass absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>
                
                <div class="w-56">
                    <label class="block text-[13px] font-semibold text-gray-700 mb-1.5">Jenis Kelamin</label>
                    <div class="relative">
                        <select class="w-full pl-4 pr-10 py-2.5 bg-white border border-gray-300 rounded-lg text-[14px] text-gray-700 focus:outline-none focus:ring-1 focus:ring-[#2A4B5F] focus:border-[#2A4B5F] cursor-pointer">
                            <option>Semua</option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 pointer-events-none text-xs"></i>
                    </div>
                </div>
                
                <div class="w-56">
                    <label class="block text-[13px] font-semibold text-gray-700 mb-1.5">Status</label>
                    <div class="relative">
                        <select class="w-full pl-4 pr-10 py-2.5 bg-white border border-gray-300 rounded-lg text-[14px] text-gray-700 focus:outline-none focus:ring-1 focus:ring-[#2A4B5F] focus:border-[#2A4B5F] cursor-pointer">
                            <option>Status</option>
                            <option>Aktif</option>
                            <option>Nonaktif</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 pointer-events-none text-xs"></i>
                    </div>
                </div>
                
                <button class="flex items-center justify-center px-5 py-2.5 bg-[#F8FAFC] border border-[#CBD5E1] text-[#475569] rounded-lg text-[14px] font-semibold hover:bg-gray-100 transition-colors h-[44px]">
                    <i class="fa-solid fa-arrow-rotate-left mr-2"></i>
                    Reset Filter
                </button>
            </div>

            <!-- Table Section -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden flex flex-col">
                <!-- Table Header Area -->
                <div class="px-6 py-5 border-b border-gray-200 flex justify-between items-center bg-white">
                    <h3 class="text-[20px] font-bold text-gray-900">Daftar Pasien</h3>
                    <button class="flex items-center px-4 py-2.5 bg-[#2A4B5F] text-white rounded-lg text-[14px] font-medium hover:bg-[#1f3847] transition-colors shadow-sm">
                        <i class="fa-solid fa-user-plus mr-2"></i>
                        Tambah Pasien
                    </button>
                </div>
                
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[900px]">
                        <thead>
                            <tr class="bg-[#F8FAFC] text-[#475569] text-[13px] border-b border-gray-200">
                                <th class="px-6 py-4 font-bold w-16">No</th>
                                <th class="px-6 py-4 font-bold">Nama Pasien</th>
                                <th class="px-6 py-4 font-bold">NoRM</th>
                                <th class="px-6 py-4 font-bold">Jenis Kelamin</th>
                                <th class="px-6 py-4 font-bold">Tgl Lahir</th>
                                <th class="px-6 py-4 font-bold">Diagnosis</th>
                                <th class="px-6 py-4 font-bold">Status</th>
                                <th class="px-6 py-4 font-bold text-center">Lihat</th>
                            </tr>
                        </thead>
                        <tbody class="text-[13px] text-gray-800 divide-y divide-gray-100 font-medium">
                            <!-- Row 1 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-gray-600">1</td>
                                <td class="px-6 py-4 font-bold text-gray-900">ALUNA IZZATI WIDIASTUTIK</td>
                                <td class="px-6 py-4 font-bold text-gray-900">0987654321</td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-3 py-1 bg-[#FCE7F3] text-[#BE185D] rounded-full text-[12px] font-bold">Perempuan</span>
                                </td>
                                <td class="px-6 py-4 font-bold text-gray-900">24/05/1995</td>
                                <td class="px-6 py-4 font-bold text-gray-900">Migraine</td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-3 py-1 bg-[#DCFCE7] text-[#15803D] rounded-full text-[12px] font-bold">Aktif</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" class="text-[#1D4ED8] font-bold hover:underline">Detail</a>
                                </td>
                            </tr>
                            <!-- Row 2 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-gray-600">2</td>
                                <td class="px-6 py-4 font-bold text-gray-900">BUDI SANTOSO</td>
                                <td class="px-6 py-4 font-bold text-gray-900">0987654322</td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-3 py-1 bg-[#DBEAFE] text-[#1D4ED8] rounded-full text-[12px] font-bold">Laki-laki</span>
                                </td>
                                <td class="px-6 py-4 font-bold text-gray-900">12/03/1988</td>
                                <td class="px-6 py-4 font-bold text-gray-900">Hipertensi</td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-3 py-1 bg-[#DCFCE7] text-[#15803D] rounded-full text-[12px] font-bold">Aktif</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" class="text-[#1D4ED8] font-bold hover:underline">Detail</a>
                                </td>
                            </tr>
                            <!-- Row 3 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-gray-600">3</td>
                                <td class="px-6 py-4 font-bold text-gray-900">CITRA WULANDARI</td>
                                <td class="px-6 py-4 font-bold text-gray-900">0987654323</td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-3 py-1 bg-[#FCE7F3] text-[#BE185D] rounded-full text-[12px] font-bold">Perempuan</span>
                                </td>
                                <td class="px-6 py-4 font-bold text-gray-900">30/11/1992</td>
                                <td class="px-6 py-4 font-bold text-gray-900">Diabetes Tipe 2</td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-3 py-1 bg-[#DCFCE7] text-[#15803D] rounded-full text-[12px] font-bold">Aktif</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" class="text-[#1D4ED8] font-bold hover:underline">Detail</a>
                                </td>
                            </tr>
                            <!-- Row 4 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-gray-600">4</td>
                                <td class="px-6 py-4 font-bold text-gray-900">DANIEL ARYANTO</td>
                                <td class="px-6 py-4 font-bold text-gray-900">0987654324</td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-3 py-1 bg-[#DBEAFE] text-[#1D4ED8] rounded-full text-[12px] font-bold">Laki-laki</span>
                                </td>
                                <td class="px-6 py-4 font-bold text-gray-900">05/07/1990</td>
                                <td class="px-6 py-4 font-bold text-gray-900">Asma</td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-3 py-1 bg-[#DCFCE7] text-[#15803D] rounded-full text-[12px] font-bold">Aktif</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" class="text-[#1D4ED8] font-bold hover:underline">Detail</a>
                                </td>
                            </tr>
                            <!-- Row 5 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-gray-600">5</td>
                                <td class="px-6 py-4 font-bold text-gray-900">EKA PRATIWI</td>
                                <td class="px-6 py-4 font-bold text-gray-900">0987654325</td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-3 py-1 bg-[#FCE7F3] text-[#BE185D] rounded-full text-[12px] font-bold">Perempuan</span>
                                </td>
                                <td class="px-6 py-4 font-bold text-gray-900">17/02/1997</td>
                                <td class="px-6 py-4 font-bold text-gray-900">Gastritis</td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-3 py-1 bg-[#DCFCE7] text-[#15803D] rounded-full text-[12px] font-bold">Aktif</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" class="text-[#1D4ED8] font-bold hover:underline">Detail</a>
                                </td>
                            </tr>
                            <!-- Row 6 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-gray-600">6</td>
                                <td class="px-6 py-4 font-bold text-gray-900">RINI SAFITRI</td>
                                <td class="px-6 py-4 font-bold text-gray-900">0987654326</td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-3 py-1 bg-[#FCE7F3] text-[#BE185D] rounded-full text-[12px] font-bold">Perempuan</span>
                                </td>
                                <td class="px-6 py-4 font-bold text-gray-900">21/05/1999</td>
                                <td class="px-6 py-4 font-bold text-gray-900">Hepatitis</td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-3 py-1 bg-[#DCFCE7] text-[#15803D] rounded-full text-[12px] font-bold">Aktif</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" class="text-[#1D4ED8] font-bold hover:underline">Detail</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-between mt-6 pb-6">
                <p class="text-[14px] font-medium text-gray-900">Menampilkan 1-6 dari 256 data</p>
                <div class="flex space-x-2">
                    <button class="w-9 h-9 flex items-center justify-center rounded border border-gray-300 bg-white text-gray-500 hover:bg-gray-50 transition-colors">
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </button>
                    <button class="w-9 h-9 flex items-center justify-center rounded border border-transparent bg-[#2A4B5F] text-white font-bold shadow-sm">
                        1
                    </button>
                    <button class="w-9 h-9 flex items-center justify-center rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 font-bold transition-colors">
                        2
                    </button>
                    <button class="w-9 h-9 flex items-center justify-center rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 font-bold transition-colors">
                        3
                    </button>
                    <button class="w-9 h-9 flex items-center justify-center rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 font-bold transition-colors">
                        4
                    </button>
                    <button class="w-9 h-9 flex items-center justify-center rounded border border-gray-300 bg-white text-gray-500 hover:bg-gray-50 transition-colors">
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </button>
                </div>
            </div>

        </div>
    </main>

</body>
</html>