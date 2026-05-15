<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMENU Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        sidebar: '#2a4f66',
                        sidebarActive: '#688e9f',
                        logoText: '#1ea4ce',
                        bgMain: '#f5f7f9',
                        textDark: '#2a4f66',
                        textLight: '#6c8694',
                        cardRight: '#f1f6fa',
                        pinkBg: '#fcedf0',
                        pinkTitle: '#d25f6e',
                        pinkText: '#a08488',
                        greenBg: '#e8f8f0',
                        greenBorder: '#28a745',
                        greenText: '#155724',
                        yellowBg: '#fdf6e3',
                        yellowBorder: '#d4b106',
                        yellowText: '#66512c',
                        grayBg: '#eef2f7',
                        grayBorder: '#a1b3c6',
                        grayText: '#2a4f66',
                        chartBgDark: '#013b52',
                        chartBgLight: '#013b52',
                        chartLine: '#00d2ff',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #f5f7f9;
            color: #2a4f66;
        }
        .sidebar-item {
            transition: all 0.2s ease;
        }
        .sidebar-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .sidebar-item.active {
            background-color: #688e9f;
            border-radius: 0 12px 12px 0;
            margin-right: 16px;
        }
        
        .chart-container {
            background: linear-gradient(180deg, #013b52 0%, #012030 100%);
        }
        .grid-line {
            stroke: rgba(255, 255, 255, 0.05);
            stroke-width: 1;
        }
        .chart-path {
            fill: none;
            stroke: #00d2ff;
            stroke-width: 4;
            filter: drop-shadow(0 0 8px rgba(0, 210, 255, 0.8));
        }
        .chart-fill {
            fill: url(#chartGradient);
            opacity: 0.6;
        }
        
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        
        .avatar-border {
            border: 2px solid #82b1c7;
            padding: 2px;
            border-radius: 50%;
        }
        
        .calendar-day.active {
            background-color: #008b9c;
            color: white;
            border-radius: 50%;
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
  <script data-arena-views="true">(function(){var isTop=false;try{isTop=window.self===window.top;}catch(e){}if(!isTop)return;window.__ARENA_META={generationId:"gemini-3-pro-preview",tournamentId:"2106cf01-a2b5-4e1b-9aae-5f57eb0b224f"};var payload={tournamentId:"2106cf01-a2b5-4e1b-9aae-5f57eb0b224f",modelId:"gemini-3-pro-preview"};try{var r=document.referrer;if(r){var u=new URL(r);payload.referrerDomain=u.hostname;}}catch(e){}try{var vid=null;try{vid=localStorage.getItem('arena_vid');}catch(e){}if(!vid){vid=typeof crypto!=="undefined"&&crypto.randomUUID?crypto.randomUUID():(Date.now().toString(36)+Math.random().toString(36).slice(2)).slice(0,32);try{localStorage.setItem('arena_vid',vid);}catch(e){}}if(vid)payload.viewerId=vid;}catch(e){}try{fetch("https://www.designarena.ai/api/agon/page-views",{"method":"POST","headers":{"Content-Type":"application/json"},"body":JSON.stringify(payload),"keepalive":true});}catch(e){}})();</script>
</head>
<body class="flex h-screen overflow-hidden font-sans antialiased">

    <aside class="w-[280px] bg-sidebar text-white flex flex-col flex-shrink-0 z-20 shadow-xl">
        <div class="flex flex-col items-center justify-center py-12">
            <div class="relative w-20 h-20 mb-2">
                <svg viewBox="0 0 100 100" class="w-full h-full drop-shadow-md">
                    <path d="M 35 20 L 65 20 C 70 20 70 25 70 25 L 70 35 L 80 35 C 85 35 85 40 85 40 L 85 60 C 85 65 80 65 80 65 L 70 65 L 70 75 C 70 80 65 80 65 80 L 35 80 C 30 80 30 75 30 75 L 30 65 L 20 65 C 15 65 15 60 15 60 L 15 40 C 15 35 20 35 20 35 L 30 35 L 30 25 C 30 20 35 20 35 20 Z" fill="none" stroke="#1ea4ce" stroke-width="6" stroke-linejoin="round"/>
                    <path d="M 40 70 C 40 70 30 50 50 40 C 70 30 70 30 70 30 C 70 30 70 50 50 60 C 40 65 40 70 40 70 Z" fill="#4ade80" />
                </svg>
            </div>
            <h1 class="text-[24px] font-bold text-logoText tracking-wider mt-2">SIMENU</h1>
        </div>

        <nav class="flex-1 overflow-y-auto py-2">
            <a href="#" class="sidebar-item active flex items-center px-6 py-4 text-[14px] font-semibold">
                <i class="fa-solid fa-border-all w-8 text-lg text-center"></i>
                <span>Dashboard</span>
            </a>
            
            <div class="mt-2">
                <a href="#" class="sidebar-item flex items-center px-6 py-4 text-[14px] font-semibold text-gray-100">
                    <i class="fa-solid fa-database w-8 text-lg text-center"></i>
                    <span>Data Pasien</span>
                </a>
                <div class="flex flex-col">
                    <a href="#" class="sidebar-item flex items-center pl-[56px] pr-6 py-3 text-[13px] font-medium text-gray-200">
                        <i class="fa-solid fa-pen-to-square w-6 text-sm"></i>
                        <span>Input</span>
                    </a>
                    <a href="#" class="sidebar-item flex items-center pl-[56px] pr-6 py-3 text-[13px] font-medium text-gray-200">
                        <i class="fa-solid fa-user-plus w-6 text-sm"></i>
                        <span>Tambah User</span>
                    </a>
                </div>
            </div>

            <a href="#" class="sidebar-item flex items-center px-6 py-4 text-[14px] font-semibold text-gray-100 mt-2">
                <i class="fa-solid fa-book-medical w-8 text-lg text-center"></i>
                <span>Pengelolaan Menu Pasien</span>
            </a>

            <a href="#" class="sidebar-item flex items-center px-6 py-4 text-[14px] font-semibold text-gray-100">
                <i class="fa-solid fa-clipboard-check w-8 text-lg text-center"></i>
                <span>Status Menu</span>
            </a>

            <a href="#" class="sidebar-item flex items-center px-6 py-4 text-[14px] font-semibold text-gray-100">
                <i class="fa-solid fa-tags w-8 text-lg text-center"></i>
                <span>Cetak Label</span>
            </a>

            <a href="#" class="sidebar-item flex items-center px-6 py-4 text-[14px] font-semibold text-gray-100">
                <i class="fa-solid fa-circle-exclamation w-8 text-lg text-center"></i>
                <span>Laporan</span>
            </a>
        </nav>
    </aside>

    <main class="flex-1 flex overflow-hidden">
        
        <div class="flex-1 flex flex-col overflow-y-auto p-8 gap-6">
            
            <div>
                <h2 class="text-[28px] font-bold text-textDark leading-tight">Dashboard</h2>
                <p class="text-[14px] text-textLight mt-1">Selamat datang di SIMENU</p>
            </div>

            <div class="grid grid-cols-3 gap-6 mt-2">
                <div class="bg-greenBg border border-greenBorder rounded-xl p-5 flex items-center gap-4 shadow-sm">
                    <div class="text-greenText text-xl pl-2">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div>
                        <p class="text-[12px] font-bold text-greenText mb-1">Total Pasien Hari Ini</p>
                        <div class="flex items-baseline gap-1.5">
                            <span class="text-[24px] font-bold text-black leading-none">128</span>
                            <span class="text-[12px] text-gray-600 font-medium">Pasien</span>
                        </div>
                    </div>
                </div>

                <div class="bg-yellowBg border border-yellowBorder rounded-xl p-5 flex flex-col justify-center shadow-sm">
                    <p class="text-[12px] font-bold text-yellowText mb-1 text-center">Total Menu Aktif</p>
                    <div class="flex items-baseline justify-center gap-1.5">
                        <span class="text-[24px] font-bold text-black leading-none">128</span>
                        <span class="text-[12px] text-gray-600 font-medium">Menu</span>
                    </div>
                </div>

                <div class="bg-grayBg border border-grayBorder rounded-xl p-5 flex flex-col justify-center shadow-sm">
                    <p class="text-[12px] font-bold text-grayText mb-1 text-center">Distribusi Hari Ini</p>
                    <div class="flex items-baseline justify-center gap-1.5">
                        <span class="text-[24px] font-bold text-black leading-none">128</span>
                        <span class="text-[12px] text-gray-600 font-medium">Distribusi</span>
                    </div>
                </div>
            </div>

            <div class="bg-pinkBg rounded-xl p-6 shadow-sm border border-red-100">
                <h3 class="text-[18px] font-bold text-pinkTitle mb-2">Tentang Sistem</h3>
                <p class="text-[13px] font-bold text-pinkText leading-relaxed max-w-4xl">
                    SIMENU adalah Sistem Informasi Pengelolaan Menu pasien terintegrasi, memfasilitasi kolaborasi dari Dokter, Ahli Gizi, hingga Petugas Dapur untuk standar asuhan gizi terbaik
                </p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200 flex-1 flex flex-col min-h-[450px]">
                <h3 class="text-[18px] font-bold text-textDark mb-6">Grafik Distribusi</h3>
                
                <div class="chart-container rounded-2xl flex-1 relative p-6 flex flex-col overflow-hidden">
                    <div class="absolute top-6 right-6 flex items-center gap-3 z-20">
                        <div class="flex items-center gap-2 bg-white/10 px-4 py-1.5 rounded-full backdrop-blur-sm">
                            <div class="w-5 h-2.5 bg-[#00d2ff] rounded-sm"></div>
                            <span class="text-white text-xs font-medium">Distribusi</span>
                        </div>
                        <div class="text-white text-2xl font-bold flex items-center gap-2">
                            128 <i class="fa-solid fa-arrow-up text-[#00d2ff] text-lg"></i>
                        </div>
                    </div>

                    <div class="absolute left-6 top-8 bottom-16 flex flex-col justify-between text-[#00d2ff] text-[11px] font-medium z-10 w-8">
                        <span>140</span>
                        <span>120</span>
                        <span>100</span>
                        <span>80</span>
                        <span>60</span>
                        <span>40</span>
                        <span>20</span>
                        <span>0</span>
                    </div>
                    
                    <div class="absolute left-2 top-1/2 -translate-y-1/2 -rotate-90 text-white text-[10px] font-bold tracking-widest z-10">
                        JUMLAH
                    </div>

                    <div class="ml-14 flex-1 relative mt-4">
                        <svg class="w-full h-full absolute inset-0" viewBox="0 0 800 300" preserveAspectRatio="none">
                            <defs>
                                <linearGradient id="chartGradient" x1="0" y1="0" x2="0" y2="1">
                                    <stop offset="0%" stop-color="#00d2ff" stop-opacity="0.8"/>
                                    <stop offset="100%" stop-color="#00d2ff" stop-opacity="0.0"/>
                                </linearGradient>
                            </defs>
                            
                            <line x1="0" y1="0" x2="800" y2="0" class="grid-line" />
                            <line x1="0" y1="42.8" x2="800" y2="42.8" class="grid-line" />
                            <line x1="0" y1="85.7" x2="800" y2="85.7" class="grid-line" />
                            <line x1="0" y1="128.5" x2="800" y2="128.5" class="grid-line" />
                            <line x1="0" y1="171.4" x2="800" y2="171.4" class="grid-line" />
                            <line x1="0" y1="214.2" x2="800" y2="214.2" class="grid-line" />
                            <line x1="0" y1="257.1" x2="800" y2="257.1" class="grid-line" />
                            <line x1="0" y1="300" x2="800" y2="300" class="grid-line" />

                            <path d="M 150 280 C 350 280, 450 40, 650 40 L 650 300 L 150 300 Z" class="chart-fill" />
                            
                            <path d="M 150 280 C 350 280, 450 40, 650 40" class="chart-path" />
                            
                            <circle cx="150" cy="280" r="7" fill="white" filter="drop-shadow(0 0 6px #00d2ff)" />
                            <circle cx="650" cy="40" r="7" fill="white" filter="drop-shadow(0 0 6px #00d2ff)" />
                        </svg>

                        <div class="absolute bottom-[-30px] left-0 w-full flex justify-between text-white text-xs font-bold tracking-wider">
                            <span style="margin-left: 110px;">DIMASAK</span>
                            <span style="margin-right: 130px;">SIAP</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="w-[320px] flex-shrink-0 p-8 pl-0 overflow-y-auto flex flex-col gap-6">
            
            <div class="bg-cardRight rounded-2xl p-5 flex items-center gap-5 shadow-sm border border-gray-200">
                <div class="w-12 h-12 rounded-full avatar-border bg-white flex items-center justify-center overflow-hidden flex-shrink-0">
                    <i class="fa-solid fa-user text-gray-400 text-xl"></i>
                </div>
                <div>
                    <h4 class="font-bold text-textDark text-[15px]">dr. Luna Lestari</h4>
                    <p class="text-[#008b9c] text-[13px] font-medium">Dokter</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h4 class="font-bold text-textDark text-[16px] flex items-center gap-2 cursor-pointer">
                        Mei 2026 <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                    </h4>
                    <div class="flex gap-4 text-gray-400">
                        <i class="fa-solid fa-chevron-left cursor-pointer hover:text-textDark text-xs"></i>
                        <i class="fa-solid fa-chevron-right cursor-pointer hover:text-textDark text-xs"></i>
                    </div>
                </div>
                
                <div class="grid grid-cols-7 gap-y-3 text-center text-[13px]">
                    <div class="text-gray-400 font-medium text-[11px] mb-2">SUN</div>
                    <div class="text-gray-400 font-medium text-[11px] mb-2">MON</div>
                    <div class="text-gray-400 font-medium text-[11px] mb-2">TUE</div>
                    <div class="text-gray-400 font-medium text-[11px] mb-2">WED</div>
                    <div class="text-gray-400 font-medium text-[11px] mb-2">THU</div>
                    <div class="text-gray-400 font-medium text-[11px] mb-2">FRI</div>
                    <div class="text-gray-400 font-medium text-[11px] mb-2">SAT</div>
                    
                    <div></div><div></div><div></div><div></div>
                    
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">1</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">2</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">3</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">4</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">5</div>
                    <div class="calendar-day active font-bold w-8 h-8 flex items-center justify-center mx-auto shadow-md cursor-pointer">6</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">7</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">8</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">9</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">10</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">11</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">12</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">13</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">14</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">15</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">16</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">17</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">18</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">19</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">20</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">21</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">22</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">23</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">24</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">25</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">26</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">27</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">28</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">29</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">30</div>
                    <div class="font-medium text-textDark hover:bg-gray-100 rounded-full w-8 h-8 flex items-center justify-center mx-auto cursor-pointer">31</div>
                </div>
            </div>

            <div class="bg-cardRight rounded-2xl p-6 shadow-sm border border-gray-200">
                <h4 class="font-bold text-[#5586a3] text-[15px] mb-5">Pengingat</h4>
                
                <div class="flex flex-col gap-5">
                    <div class="flex items-center gap-4">
                        <div class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center flex-shrink-0">
                            <i class="fa-regular fa-bell text-gray-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-[13px] font-bold text-black leading-tight">Input Data Pasien</p>
                            <p class="text-[11px] text-gray-500 mt-1">06 Mei, Senin</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <div class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center flex-shrink-0">
                            <i class="fa-regular fa-bell text-gray-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-[13px] font-bold text-black leading-tight">Diagnosis Pasien</p>
                            <p class="text-[11px] text-gray-500 mt-1">06 Mei, Senin</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <div class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center flex-shrink-0">
                            <i class="fa-regular fa-bell text-gray-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-[13px] font-bold text-black leading-tight">Input Jenis Diet Pasien</p>
                            <p class="text-[11px] text-gray-500 mt-1">06 Mei, Senin</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-cardRight rounded-2xl p-6 shadow-sm border border-gray-200 flex-1">
                <h4 class="font-bold text-[#5586a3] text-[15px] mb-5">Online Users</h4>
                
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full avatar-border bg-white flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-user text-gray-400 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-[13px] font-bold text-textDark leading-tight">dr. Budi Santoso</p>
                            <p class="text-[11px] text-[#008b9c] mt-1 font-medium">09876543212345678</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full avatar-border bg-white flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-user text-gray-400 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-[13px] font-bold text-textDark leading-tight">dr. Citra Dewi Lestari</p>
                            <p class="text-[11px] text-[#008b9c] mt-1 font-medium">09876543212345678</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full avatar-border bg-white flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-user text-gray-400 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-[13px] font-bold text-textDark leading-tight">Petugas Dapur A</p>
                            <p class="text-[11px] text-[#008b9c] mt-1 font-medium">09876543212345678</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
</body>
</html>