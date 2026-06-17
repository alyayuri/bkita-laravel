<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa - BKITA</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#f5f7fb] text-[#1e293b] overflow-hidden">

<div class="flex h-screen">

    <!-- SIDEBAR -->
    <div class="w-60 bg-white px-5 py-6 flex flex-col justify-between border-r border-gray-200 overflow-y-auto">

        <!-- MENU -->
        <div>

            <!-- LOGO -->
            <div class="mb-8">

                <h2 class="text-2xl font-bold text-blue-500">
                    BKITA
                </h2>

                <p class="text-gray-500 text-xs mt-1">
                    Layanan Konseling Siswa
                </p>

            </div>

            <!-- NAVIGATION -->
            <ul class="space-y-2 mb-6">

                <li>
                    <a href="{{ route('dashboard.siswa') }}"
                       class="block px-4 py-3 rounded-xl bg-blue-500 text-white font-semibold transition">

                        Dashboard

                    </a>
                </li>

                <li>
                    <a href="{{ route('konseling') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-50 hover:text-blue-500 transition">

                        Konsultasi

                    </a>
                </li>

                <li>
                    <a href="{{ route('riwayat') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-50 hover:text-blue-500 transition">

                        Riwayat

                    </a>
                </li>

            </ul>

            <!-- DATA LAYANAN -->
            <div class="border-t border-gray-200 pt-5">

                <button onclick="toggleLayanan()"
                    class="w-full flex items-center justify-between px-4 py-3 rounded-xl bg-[#f8fbff] hover:bg-blue-50 transition">

                    <div class="text-left">

                        <p class="text-sm font-semibold text-[#0f172a]">
                            Data Layanan
                        </p>

                        <p class="text-[11px] text-gray-500 mt-1">
                            Jenis layanan konseling
                        </p>

                    </div>

                    <span id="iconLayanan"
                          class="text-blue-500 text-lg transition">
                        +
                    </span>

                </button>

                <!-- DROPDOWN -->
                <div id="layananMenu"
                     class="hidden mt-3 space-y-3">

                    <!-- PRIBADI -->
                    <div class="bg-[#f8fbff] border border-[#e4ecff] rounded-2xl p-3">

                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11 rounded-2xl bg-pink-100 flex items-center justify-center text-lg">
                                💙
                            </div>

                            <div>

                                <h3 class="text-sm font-semibold text-[#0f172a]">
                                    Bimbingan Pribadi
                                </h3>

                                <p class="text-[11px] text-gray-500 mt-1">
                                    Membantu masalah pribadi siswa
                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- SOSIAL -->
                    <div class="bg-[#f8fbff] border border-[#e4ecff] rounded-2xl p-3">

                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11 rounded-2xl bg-blue-100 flex items-center justify-center text-lg">
                                👥
                            </div>

                            <div>

                                <h3 class="text-sm font-semibold text-[#0f172a]">
                                    Bimbingan Sosial
                                </h3>

                                <p class="text-[11px] text-gray-500 mt-1">
                                    Hubungan sosial dan pertemanan
                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- KARIR -->
                    <div class="bg-[#f8fbff] border border-[#e4ecff] rounded-2xl p-3">

                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11 rounded-2xl bg-yellow-100 flex items-center justify-center text-lg">
                                🚀
                            </div>

                            <div>

                                <h3 class="text-sm font-semibold text-[#0f172a]">
                                    Bimbingan Karir
                                </h3>

                                <p class="text-[11px] text-gray-500 mt-1">
                                    Jurusan dan masa depan siswa
                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- BELAJAR -->
                    <div class="bg-[#f8fbff] border border-[#e4ecff] rounded-2xl p-3">

                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11 rounded-2xl bg-green-100 flex items-center justify-center text-lg">
                                📚
                            </div>

                            <div>

                                <h3 class="text-sm font-semibold text-[#0f172a]">
                                    Bimbingan Belajar
                                </h3>

                                <p class="text-[11px] text-gray-500 mt-1">
                                    Membantu akademik dan belajar
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}" class="mt-6">
            @csrf

            <button type="submit"
                class="w-full bg-red-500 text-white py-3 rounded-xl hover:bg-red-600 transition text-sm">

                Logout

            </button>

        </form>

    </div>

    <!-- MAIN -->
    <div class="flex-1 overflow-hidden">

        <div class="h-screen flex flex-col p-5">

            <!-- TOPBAR -->
            <div class="flex justify-between items-center mb-4">

                <!-- TITLE -->
                <div>

                    <h1 class="text-2xl font-bold text-[#0f172a]">
                        Dashboard Siswa
                    </h1>

                    <p class="text-gray-500 text-sm mt-1">
                        Selamat datang di layanan BKITA.
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

                        <h2 class="font-semibold text-sm text-[#0f172a]">
                            {{ auth()->user()->name }}
                        </h2>

                        <p class="text-[11px] text-gray-500">
                            {{ auth()->user()->kelas ?? 'Siswa' }}
                        </p>

                    </div>

                </div>

            </div>

            <!-- BANNER -->
            <div class="bg-gradient-to-r from-[#eaf2ff] to-[#f4f7ff] rounded-3xl border border-[#dbe7ff] px-7 py-5 mb-4">

                <div class="flex items-center justify-between gap-5">

                    <!-- LEFT -->
                    <div class="flex items-center gap-6">

                        <!-- IMAGE -->
                        <img src="/images/dashboard.png"
                             alt="Dashboard"
                             class="w-44 object-contain">

                        <!-- TEXT -->
                        <div>

                            <h2 class="text-3xl font-bold text-[#0f172a] mb-2">
                                Selamat datang, {{ auth()->user()->name }}
                            </h2>

                            <p class="text-gray-600 text-sm leading-relaxed max-w-lg">
                                Kami siap mendengarkan dan membantu
                                setiap masalah yang sedang kamu hadapi.
                            </p>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <a href="{{ route('konseling') }}"
                       class="bg-blue-500 text-white px-5 py-3 rounded-2xl hover:bg-blue-600 transition text-sm font-semibold whitespace-nowrap shadow">

                        + Konseling Baru

                    </a>

                </div>

            </div>

            <!-- SUCCESS -->
            @if(session('success'))

                <div class="bg-green-500 text-white px-5 py-3 rounded-2xl mb-4 text-sm">
                    {{ session('success') }}
                </div>

            @endif

            <!-- CARDS -->
            <div class="grid grid-cols-3 gap-4 mb-4">

                <!-- TOTAL -->
                <div class="bg-white border border-gray-200 rounded-3xl p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-gray-500 text-sm">
                                Total Konseling
                            </p>

                            <h2 class="text-3xl font-bold mt-2 text-[#0f172a]">
                                {{ $total ?? 0 }}
                            </h2>

                        </div>

                    </div>

                </div>

                <!-- MENUNGGU -->
                <div class="bg-white border border-gray-200 rounded-3xl p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-gray-500 text-sm">
                                Menunggu
                            </p>

                            <h2 class="text-3xl font-bold mt-2 text-yellow-500">
                                {{ $menunggu ?? 0 }}
                            </h2>

                        </div>

                    </div>

                </div>

                <!-- SELESAI -->
                <div class="bg-white border border-gray-200 rounded-3xl p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-gray-500 text-sm">
                                Selesai
                            </p>

                            <h2 class="text-3xl font-bold mt-2 text-green-500">
                                {{ $selesai ?? 0 }}
                            </h2>

                        </div>

                    </div>

                </div>

            </div>

            <!-- LIST -->
            <div class="flex-1 overflow-y-auto pr-1">

                <div class="bg-white border border-gray-200 rounded-3xl overflow-hidden shadow-sm">

                    <!-- HEADER -->
                    <div class="flex justify-between items-center px-5 py-4 border-b border-gray-200">

                        <div>

                            <h2 class="text-lg font-bold text-[#0f172a]">
                                Konsultasi Terbaru
                            </h2>

                            <p class="text-xs text-gray-500 mt-1">
                                Aktivitas konsultasi terbaru kamu
                            </p>

                        </div>

                        <a href="{{ route('riwayat') }}"
                           class="text-blue-500 hover:underline text-sm font-medium">

                            Lihat Semua

                        </a>

                    </div>

                    <!-- CONTENT -->
                    <div class="p-4 space-y-3">

                        @forelse($riwayat as $r)

                        <div class="bg-[#f8fbff] border border-[#e4ecff] rounded-2xl p-4 hover:bg-[#edf4ff] transition">

                            <div class="flex items-center justify-between gap-5">

                                <!-- LEFT -->
                                <div class="flex items-center gap-4 flex-1">

                                    <!-- ICON -->
                                    <div class="w-11 h-11 rounded-2xl bg-blue-100 flex items-center justify-center text-lg">
                                        💬
                                    </div>

                                    <!-- TEXT -->
                                    <div class="flex-1">

                                        <div class="flex items-center gap-2 flex-wrap">

                                            <a href="/chat/{{ $r->id }}"
                                               class="font-semibold hover:text-blue-500 transition text-sm text-[#0f172a]">

                                                {{ $r->topik }}

                                            </a>

                                            @if($r->layanan)

                                            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-[10px] font-semibold">
                                                {{ $r->layanan }}
                                            </span>

                                            @endif

                                        </div>

                                        <p class="text-xs text-gray-500 mt-1 truncate">
                                            {{ $r->pesan }}
                                        </p>

                                        <p class="text-[11px] text-gray-400 mt-2">
                                            {{ $r->created_at->translatedFormat('d F Y • H:i') }}
                                        </p>

                                    </div>

                                </div>

                                <!-- RIGHT -->
                                <div class="text-right">

                                    @if($r->status == 'menunggu')

                                        <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-xl text-[11px] font-semibold">
                                            Menunggu
                                        </span>

                                    @else

                                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-xl text-[11px] font-semibold">
                                            Selesai
                                        </span>

                                    @endif

                                    <div class="mt-3">

                                        <a href="/chat/{{ $r->id }}"
                                           class="text-blue-500 text-xs hover:underline font-medium">

                                            Lihat Detail

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                        @empty

                        <div class="bg-[#f8fbff] border border-[#e4ecff] rounded-2xl p-10 text-center text-gray-500">

                            Belum ada data konseling

                        </div>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>
    function toggleLayanan() {

        const menu = document.getElementById('layananMenu');
        const icon = document.getElementById('iconLayanan');

        menu.classList.toggle('hidden');

        if(menu.classList.contains('hidden')) {
            icon.innerHTML = '+';
        } else {
            icon.innerHTML = '−';
        }
    }
</script>

</body>
</html>