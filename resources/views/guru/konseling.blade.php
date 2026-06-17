<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Konseling - BKITA</title>
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
                       class="block px-4 py-3 rounded-xl hover:bg-blue-50 hover:text-blue-500 transition">

                        Data Siswa

                    </a>
                </li>

                <!-- KONSELING -->
                <li>
                    <a href="{{ route('guru.konseling') }}"
                       class="block px-4 py-3 rounded-xl bg-blue-500 text-white font-semibold transition">

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
                        Data Konseling Siswa
                    </h1>

                    <p class="text-gray-500 text-sm mt-1">
                        Kelola seluruh konsultasi siswa
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
            <div class="bg-gradient-to-r from-[#eaf1ff] to-[#f5f7ff] rounded-2xl border border-[#dbe7ff] px-5 py-3 mb-2">

                <div class="flex items-center justify-between gap-6">

                    <!-- LEFT -->
                    <div class="flex items-center gap-6">

                        <!-- IMAGE -->
                        <img src="/images/konseling-guru.png"
                             alt="Konseling Guru"
                             class="w-20 object-contain">

                        <!-- TEXT -->
                        <div>

                            <h2 class="text-3xl font-bold text-[#0f172a] mb-2">
                                Kelola Konseling Siswa 💬
                            </h2>

                            <p class="text-gray-600 text-sm leading-relaxed max-w-xl">
                                Pantau aktivitas konsultasi siswa dan bantu mereka
                                menyelesaikan setiap permasalahan dengan baik.
                            </p>

                        </div>

                    </div>

                    <!-- INFO -->
                    <div class="bg-white px-5 py-4 rounded-2xl border border-gray-200 shadow-sm text-center min-w-[150px]">

                        <p class="text-sm text-gray-500 mb-1">
                            Total Konseling
                        </p>

                        <h2 class="text-3xl font-bold text-blue-500">
                            {{ $data->count() }}
                        </h2>

                    </div>

                </div>

            </div>

            <!-- NOTIF -->
            @if(session('success'))

                <div class="bg-green-500 text-white px-5 py-3 rounded-2xl mb-4 text-sm">

                    {{ session('success') }}

                </div>

            @endif

            <!-- LIST -->
            <div class="flex-1 overflow-y-auto pr-1 space-y-3">

                @forelse($data as $d)

                <div class="bg-white border border-gray-200 rounded-3xl p-5 shadow-sm hover:bg-[#f8fbff] transition">

                    <div class="flex items-center justify-between gap-5">

                        <!-- LEFT -->
                        <div class="flex items-center gap-4 flex-1">

                            <!-- ICON -->
                            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl">
                                💬
                            </div>

                            <!-- CONTENT -->
                            <div class="flex-1">

                                <div class="flex items-center gap-3 mb-1">

                                    <h3 class="font-semibold text-[#0f172a]">
                                        {{ $d->user->name }}
                                    </h3>

                                    @if($d->status == 'menunggu')

                                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-xl text-[11px] font-semibold">
                                            Menunggu
                                        </span>

                                    @else

                                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-xl text-[11px] font-semibold">
                                            Selesai
                                        </span>

                                    @endif

                                </div>

                                <h2 class="text-base font-bold text-blue-500">
                                    {{ $d->topik }}
                                </h2>

                                <p class="text-sm text-gray-600 mt-2 line-clamp-2">
                                    {{ $d->pesan }}
                                </p>

                                <span class="inline-block mt-2 text-xs px-3 py-1 bg-blue-500/20 text-blue-500 rounded-full">
                                    {{ $d->layanan }}
                                </span>

                                <p class="text-xs text-gray-400 mt-3">
                                    {{ $d->created_at->translatedFormat('d F Y • H:i') }}
                                </p>

                            </div>

                        </div>

                        <!-- RIGHT -->
                        <div class="flex items-center gap-3">

                            <!-- CHAT -->
                            <a href="{{ route('chat', $d->id) }}"
                               class="bg-blue-500 text-white px-5 py-3 rounded-2xl hover:bg-blue-600 transition text-sm font-semibold shadow-sm">

                                Chat

                            </a>

                            <!-- SELESAIKAN -->
                            @if($d->status == 'menunggu')

                            <form action="{{ route('guru.konseling.selesai', $d->id) }}"
                                  method="POST">

                                @csrf

                                <button type="submit"
                                    onclick="return confirm('Selesaikan konseling ini?')"
                                    class="bg-green-500 text-white px-5 py-3 rounded-2xl hover:bg-green-600 transition text-sm font-semibold shadow-sm">

                                    Selesai

                                </button>

                            </form>

                            @endif

                        </div>

                    </div>

                </div>

                @empty

                <div class="bg-white border border-gray-200 rounded-3xl p-10 text-center shadow-sm">

                    <img src="/images/empty-konseling.png"
                         class="w-40 mx-auto mb-4 opacity-80">

                    <h2 class="text-lg font-semibold text-gray-700 mb-1">
                        Belum ada data konseling
                    </h2>

                    <p class="text-sm text-gray-500">
                        Data konsultasi siswa akan muncul di sini.
                    </p>

                </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

</body>
</html>