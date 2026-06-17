<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Guru - BKITA</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#f5f7fb] text-[#0f172a] overflow-hidden">

<div class="flex h-screen">

    <!-- SIDEBAR -->
    <div class="w-60 bg-white px-5 py-6 border-r border-gray-200 flex flex-col h-screen">

        <!-- SCROLL -->
        <div class="flex-1 overflow-y-auto pr-1">

            <!-- LOGO -->
            <div class="mb-8">

                <h2 class="text-2xl font-bold text-blue-500">
                    BKITA
                </h2>

                <p class="text-gray-500 text-xs mt-1">
                    Layanan Konseling Guru
                </p>

            </div>

            <!-- MENU -->
            <ul class="space-y-2">

                <li>
                    <a href="{{ route('dashboard.guru') }}"
                       class="block px-4 py-3 rounded-xl bg-blue-500 text-white font-semibold transition">

                        Dashboard

                    </a>
                </li>

                <li>
                    <a href="{{ route('guru.siswa') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-50 hover:text-blue-500 transition">

                        Data Siswa

                    </a>
                </li>

                <li>
                    <a href="{{ route('guru.konseling') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-50 hover:text-blue-500 transition">

                        Konseling

                    </a>
                </li>

                <li>
                    <a href="{{ route('guru.laporan') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-50 hover:text-blue-500 transition">

                        Laporan

                    </a>
                </li>

            </ul>

            <!-- GARIS -->
            <div class="border-t border-gray-200 my-6"></div>

            <!-- DROPDOWN -->
            <button onclick="toggleLayanan()"
                class="w-full flex items-center justify-between px-4 py-3 rounded-2xl bg-[#f8faff] border border-[#dbe7ff] hover:bg-blue-50 transition">

                <div class="text-left">

                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">
                        Data Layanan
                    </p>

                    <p class="text-sm font-semibold mt-1">
                        Konseling BK
                    </p>

                </div>

                <span id="iconDropdown"
                      class="text-sm text-gray-500 transition">
                    ▼
                </span>

            </button>

            <!-- CONTENT -->
            <div id="layananMenu"
                 class="hidden mt-3 space-y-2">

                <!-- PRIBADI -->
                <div class="bg-[#f8fbff] border border-[#e4ecff] rounded-2xl p-3 hover:bg-[#edf4ff] transition cursor-pointer">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-pink-100 flex items-center justify-center text-lg">
                            💙
                        </div>

                        <div class="flex-1">

                            <p class="text-sm font-semibold text-[#0f172a]">
                                Bimbingan Pribadi
                            </p>

                            <p class="text-[11px] text-gray-500 mt-1">
                                Konseling masalah pribadi siswa
                            </p>

                        </div>

                    </div>

                </div>

                <!-- SOSIAL -->
                <div class="bg-[#f8fbff] border border-[#e4ecff] rounded-2xl p-3 hover:bg-[#edf4ff] transition cursor-pointer">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-lg">
                            👥
                        </div>

                        <div class="flex-1">

                            <p class="text-sm font-semibold text-[#0f172a]">
                                Bimbingan Sosial
                            </p>

                            <p class="text-[11px] text-gray-500 mt-1">
                                Hubungan sosial antar siswa
                            </p>

                        </div>

                    </div>

                </div>

                <!-- KARIR -->
                <div class="bg-[#f8fbff] border border-[#e4ecff] rounded-2xl p-3 hover:bg-[#edf4ff] transition cursor-pointer">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-yellow-100 flex items-center justify-center text-lg">
                            🚀
                        </div>

                        <div class="flex-1">

                            <p class="text-sm font-semibold text-[#0f172a]">
                                Bimbingan Karir
                            </p>

                            <p class="text-[11px] text-gray-500 mt-1">
                                Jurusan dan masa depan siswa
                            </p>

                        </div>

                    </div>

                </div>

                <!-- BELAJAR -->
                <div class="bg-[#f8fbff] border border-[#e4ecff] rounded-2xl p-3 hover:bg-[#edf4ff] transition cursor-pointer">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center text-lg">
                            📚
                        </div>

                        <div class="flex-1">

                            <p class="text-sm font-semibold text-[#0f172a]">
                                Bimbingan Belajar
                            </p>

                            <p class="text-[11px] text-gray-500 mt-1">
                                Akademik dan pembelajaran siswa
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- LOGOUT -->
        <div class="pt-4 border-t border-gray-200">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                    class="w-full bg-red-500 text-white py-3 rounded-xl hover:bg-red-600 transition text-sm font-semibold">

                    Logout

                </button>

            </form>

        </div>

    </div>

    <!-- MAIN -->
    <div class="flex-1 overflow-hidden">

        <div class="h-screen flex flex-col p-5">

            <!-- TOPBAR -->
            <div class="flex justify-between items-center mb-4">

                <div>

                    <h1 class="text-2xl font-bold">
                        Dashboard Guru
                    </h1>

                    <p class="text-gray-500 text-sm mt-1">
                        Monitoring layanan konseling siswa.
                    </p>

                </div>

                <!-- PROFILE -->
                <div class="bg-white px-4 py-2 rounded-2xl flex items-center gap-3 border border-gray-200 shadow-sm">

                    @if(auth()->user()->foto)

                        <img src="{{ asset('storage/' . auth()->user()->foto) }}"
                             class="w-10 h-10 rounded-full object-cover">

                    @else

                        <div class="w-10 h-10 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold text-sm">
                            {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                        </div>

                    @endif

                    <div>

                        <h2 class="font-semibold text-sm">
                            {{ auth()->user()->name }}
                        </h2>

                        <p class="text-[11px] text-gray-500">
                            Guru BK
                        </p>

                    </div>

                </div>

            </div>

            <!-- BANNER -->
            <div class="bg-gradient-to-r from-[#eaf2ff] to-[#f4f7ff] rounded-3xl border border-[#dbe7ff] px-7 py-5 mb-4">

                <div class="flex items-center justify-between gap-6">

                    <div>
                        
                        <p class="text-gray-600 text-sm mt-2 max-w-xl leading-relaxed">
                            Pantau aktivitas layanan konseling siswa,
                            data konsultasi, serta perkembangan siswa
                            dengan lebih mudah dan terstruktur.
                        </p>

                    </div>

                    <a href="{{ route('guru.konseling') }}"
                       class="bg-blue-500 text-white px-5 py-3 rounded-2xl hover:bg-blue-600 transition text-sm font-semibold shadow">

                        Lihat Konseling

                    </a>

                </div>

            </div>

            <!-- CARDS -->
            <div class="grid grid-cols-3 gap-4 mb-4">

                <!-- TOTAL -->
                <div class="bg-white border border-gray-200 rounded-3xl p-5 shadow-sm">

                    <p class="text-gray-500 text-sm">
                        Total Siswa
                    </p>

                    <h2 class="text-3xl font-bold mt-2 text-[#0f172a]">
                        {{ $totalSiswa }}
                    </h2>

                </div>

                <!-- HARI INI -->
                <div class="bg-white border border-gray-200 rounded-3xl p-5 shadow-sm">

                    <p class="text-gray-500 text-sm">
                        Konseling Hari Ini
                    </p>

                    <h2 class="text-3xl font-bold mt-2 text-blue-500">
                        {{ $konselingHariIni }}
                    </h2>

                </div>

                <!-- LAPORAN -->
                <div class="bg-white border border-gray-200 rounded-3xl p-5 shadow-sm">

                    <p class="text-gray-500 text-sm">
                        Laporan Masuk
                    </p>

                    <h2 class="text-3xl font-bold mt-2 text-orange-500">
                        {{ $laporanMasuk }}
                    </h2>

                </div>

            </div>

            <!-- AKTIVITAS -->
            <div class="flex-1 overflow-y-auto pr-1">

                <div class="bg-white border border-gray-200 rounded-3xl overflow-hidden shadow-sm">

                    <!-- HEADER -->
                    <div class="flex justify-between items-center px-6 py-5 border-b border-gray-200">

                        <div>

                            <h2 class="text-lg font-bold text-[#0f172a]">
                                Aktivitas Terbaru
                            </h2>

                            <p class="text-xs text-gray-500 mt-1">
                                Aktivitas konsultasi siswa terbaru
                            </p>

                        </div>

                        <a href="{{ route('guru.konseling') }}"
                           class="text-blue-500 hover:underline text-sm font-medium">

                            Lihat Semua

                        </a>

                    </div>

                    <!-- CONTENT -->
                    <div class="p-4 space-y-3">

                        @forelse($konseling as $k)

                        <div class="bg-[#f8fbff] border border-[#e4ecff] rounded-2xl p-4 hover:bg-[#edf4ff] transition">

                            <div class="flex items-center justify-between gap-5">

                                <!-- LEFT -->
                                <div class="flex items-center gap-4 flex-1">

                                    <!-- ICON -->
                                    <div class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center text-xl">
                                        💬
                                    </div>

                                    <!-- TEXT -->
                                    <div class="flex-1">

                                        <div class="flex items-center gap-2 flex-wrap">

                                            <h3 class="font-semibold text-sm text-[#0f172a]">
                                                {{ $k->user->name }}
                                            </h3>

                                            <span class="bg-gray-100 text-gray-600 text-[11px] px-2 py-1 rounded-lg">
                                                {{ $k->user->kelas }}
                                            </span>

                                        </div>

                                        <p class="text-sm text-gray-700 mt-1">
                                            {{ $k->topik }}
                                        </p>

                                        <!-- LAYANAN -->
                                        <span class="inline-block mt-2 text-xs px-3 py-1 bg-blue-100 text-blue-600 rounded-full font-medium">
                                            {{ $k->layanan }}
                                        </span>

                                        <p class="text-xs text-gray-500 mt-2">
                                            {{ $k->created_at->translatedFormat('d F Y • H:i') }}
                                        </p>

                                    </div>

                                </div>

                                <!-- BUTTON -->
                                <div>

                                    <a href="/chat/{{ $k->id }}"
                                       class="bg-blue-500 text-white px-4 py-2 rounded-xl text-xs font-semibold hover:bg-blue-600 transition">

                                        Lihat Chat

                                    </a>

                                </div>

                            </div>

                        </div>

                        @empty

                        <div class="bg-[#f8fbff] border border-[#e4ecff] rounded-2xl p-10 text-center text-gray-500">

                            Belum ada aktivitas konseling

                        </div>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- SCRIPT -->
<script>

function toggleLayanan() {

    const menu = document.getElementById('layananMenu');
    const icon = document.getElementById('iconDropdown');

    menu.classList.toggle('hidden');

    if(menu.classList.contains('hidden')) {

        icon.innerHTML = '▼';

    } else {

        icon.innerHTML = '▲';

    }

}

</script>

</body>
</html>