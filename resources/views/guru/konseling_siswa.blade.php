<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Konseling Siswa - BKITA</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#f5f7fb] text-[#0f172a] overflow-hidden">

<div class="flex h-screen">

    <!-- SIDEBAR -->
    <div class="w-60 bg-white px-5 py-6 flex flex-col justify-between border-r border-gray-200">

        <!-- MENU -->
        <div>

            <!-- LOGO -->
            <div class="mb-8">

                <h2 class="text-2xl font-bold text-blue-500">
                    BKITA
                </h2>

                <p class="text-gray-500 text-xs mt-1">
                    Layanan Konseling Guru
                </p>

            </div>

            <!-- NAVIGATION -->
            <ul class="space-y-2">

                <!-- DASHBOARD -->
                <li>
                    <a href="{{ route('dashboard.guru') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-50 hover:text-blue-500 transition">

                        Dashboard

                    </a>
                </li>

                <!-- DATA SISWA -->
                <li>
                    <a href="{{ route('guru.siswa') }}"
                       class="block px-4 py-3 rounded-xl bg-blue-500 text-white font-semibold transition">

                        Data Siswa

                    </a>
                </li>

                <!-- KONSELING -->
                <li>
                    <a href="{{ route('guru.konseling') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-50 hover:text-blue-500 transition">

                        Konseling

                    </a>
                </li>

                <!-- LAPORAN -->
                <li>
                    <a href="{{ route('guru.laporan') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-50 hover:text-blue-500 transition">

                        Laporan

                    </a>
                </li>

            </ul>

        </div>

        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}">
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

                    <h1 class="text-2xl font-bold">
                        Konseling Siswa
                    </h1>

                    <p class="text-gray-500 text-sm mt-1">
                        Daftar riwayat konseling siswa.
                    </p>

                </div>

                <!-- PROFILE -->
                <div class="bg-white px-4 py-2 rounded-2xl flex items-center gap-3 border border-gray-200 shadow-sm">

                    @if($siswa->foto)

                        <img src="{{ asset('storage/' . $siswa->foto) }}"
                             class="w-10 h-10 rounded-full object-cover">

                    @else

                        <div class="w-10 h-10 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold text-sm">
                            {{ strtoupper(substr($siswa->name,0,1)) }}
                        </div>

                    @endif

                    <div>

                        <h2 class="font-semibold text-sm">
                            {{ $siswa->name }}
                        </h2>

                        <p class="text-[11px] text-gray-500">
                            Siswa
                        </p>

                    </div>

                </div>

            </div>

            <!-- BANNER -->
            <div class="bg-gradient-to-r from-[#eaf1ff] to-[#f5f7ff] rounded-3xl border border-[#dbe7ff] px-7 py-5 mb-4">

                <div class="flex items-center justify-between gap-6">

                    <!-- LEFT -->
                    <div class="flex items-center gap-6">

                        <!-- IMAGE -->
                        <img src="/images/konseling-siswa.png"
                             alt="Konseling Siswa"
                             class="w-44 object-contain">

                        <!-- TEXT -->
                        <div>

                            <h2 class="text-3xl font-bold text-[#0f172a] mb-2">
                                Riwayat Konseling 👨‍🎓
                            </h2>

                            <p class="text-gray-600 text-sm leading-relaxed max-w-xl">
                                Lihat seluruh aktivitas dan percakapan
                                konseling dari siswa {{ $siswa->name }}.
                            </p>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <a href="{{ route('guru.siswa') }}"
                       class="bg-blue-500 text-white px-5 py-3 rounded-2xl hover:bg-blue-600 transition text-sm font-semibold whitespace-nowrap shadow-sm">

                        ← Kembali

                    </a>

                </div>

            </div>

            <!-- LIST -->
            <div class="flex-1 overflow-y-auto pr-1">

                <div class="space-y-3">

                    @forelse($konseling as $k)

                    <div class="bg-white border border-gray-200 rounded-3xl p-5 shadow-sm hover:shadow-md transition">

                        <div class="flex items-center justify-between gap-5">

                            <!-- LEFT -->
                            <div class="flex items-center gap-4 flex-1">

                                <!-- ICON -->
                                <div class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center text-xl">
                                    💬
                                </div>

                                <!-- CONTENT -->
                                <div class="flex-1">

                                    <!-- TOPIK -->
                                    <h2 class="font-semibold text-[#0f172a] text-base">
                                        {{ $k->topik }}
                                    </h2>

                                    <!-- PESAN -->
                                    <p class="text-sm text-gray-600 mt-1 line-clamp-2">
                                        {{ $k->pesan }}
                                    </p>

                                    <!-- WAKTU -->
                                    <p class="text-xs text-gray-500 mt-2">
                                        {{ $k->created_at->translatedFormat('d F Y • H:i') }}
                                    </p>

                                </div>

                            </div>

                            <!-- RIGHT -->
                            <div class="text-right">

                                <!-- STATUS -->
                                @if($k->status == 'menunggu')

                                    <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-xl text-xs font-semibold">
                                        Menunggu
                                    </span>

                                @else

                                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-xl text-xs font-semibold">
                                        Selesai
                                    </span>

                                @endif

                                <!-- BUTTON -->
                                <div class="mt-3">

                                    <a href="/chat/{{ $k->id }}"
                                       class="bg-blue-500 text-white px-4 py-2 rounded-xl text-xs font-semibold hover:bg-blue-600 transition inline-block">

                                        Buka Chat

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                    @empty

                    <!-- EMPTY -->
                    <div class="bg-white border border-gray-200 rounded-3xl p-12 text-center shadow-sm">

                        <img src="/images/empty.png"
                             class="w-40 mx-auto mb-4 opacity-80">

                        <h2 class="text-lg font-semibold text-gray-700 mb-1">
                            Belum Ada Konseling
                        </h2>

                        <p class="text-sm text-gray-500">
                            Siswa ini belum pernah melakukan konseling.
                        </p>

                    </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>