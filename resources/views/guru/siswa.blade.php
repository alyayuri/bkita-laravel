<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa - BKITA</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#f5f7fb] text-[#0f172a] overflow-hidden">

<div class="flex h-screen">

    <!-- SIDEBAR -->
    <div class="w-60 bg-white px-5 py-6 flex flex-col justify-between border-r border-gray-200">

        <div>

            <div class="mb-8">

                <h2 class="text-2xl font-bold text-blue-500">
                    BKITA
                </h2>

                <p class="text-gray-500 text-xs mt-1">
                    Layanan Konseling Guru
                </p>

            </div>

            <ul class="space-y-2">

                <li>
                    <a href="{{ route('dashboard.guru') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-50 hover:text-blue-500 transition">
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('guru.siswa') }}"
                       class="block px-4 py-3 rounded-xl bg-blue-500 text-white font-semibold transition">
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

        </div>

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

                <div>
                    <h1 class="text-2xl font-bold">Data Siswa</h1>
                    <p class="text-gray-500 text-sm mt-1">
                        Kelola data seluruh siswa yang terdaftar.
                    </p>
                </div>

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
                        <h2 class="font-semibold text-sm">{{ auth()->user()->name }}</h2>
                        <p class="text-[11px] text-gray-500">Guru BK</p>
                    </div>

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

                <div class="bg-white border rounded-3xl p-5 shadow-sm">
                    <p class="text-gray-500 text-sm">Total Siswa</p>
                    <h2 class="text-3xl font-bold mt-2">{{ $total }}</h2>
                </div>

                <div class="bg-white border rounded-3xl p-5 shadow-sm">
                    <p class="text-gray-500 text-sm">Bulan Ini</p>
                    <h2 class="text-3xl font-bold mt-2 text-blue-500">{{ $bulanIni }}</h2>
                </div>

                <div class="bg-white border rounded-3xl p-5 shadow-sm">
                    <p class="text-gray-500 text-sm">Semester Ini</p>
                    <h2 class="text-3xl font-bold mt-2 text-orange-500">{{ $semester }}</h2>
                </div>

            </div>

            <!-- TABLE -->
            <div class="flex-1 overflow-y-auto pr-1">

                <div class="bg-white border rounded-3xl overflow-hidden shadow-sm">

                    <div class="flex justify-between items-center px-6 py-5 border-b">

                        <div>
                            <h2 class="text-lg font-bold">Data Seluruh Siswa</h2>
                            <p class="text-xs text-gray-500 mt-1">Informasi akun siswa BKITA</p>
                        </div>

                    </div>

                    <div class="p-4 space-y-3">

                        @forelse($siswa as $s)

                        <div class="bg-[#f8faff] border rounded-2xl p-4 hover:bg-[#eef4ff] transition">

                            <div class="flex items-center justify-between gap-5">

                                <!-- LEFT -->
                                <div class="flex items-center gap-4 flex-1">

                                    @if($s->foto)
                                        <img src="{{ asset('storage/' . $s->foto) }}"
                                             class="w-12 h-12 rounded-2xl object-cover border">
                                    @else
                                        <div class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center text-lg font-bold text-blue-500">
                                            {{ strtoupper(substr($s->name,0,1)) }}
                                        </div>
                                    @endif

                                    <div class="flex-1">

                                        <h3 class="font-semibold text-sm">{{ $s->name }}</h3>

                                        <p class="text-sm text-gray-600 mt-1">{{ $s->email }}</p>

                                        <!-- ✅ TAMBAHAN KELAS -->
                                        <span class="inline-block mt-2 text-xs px-3 py-1 bg-blue-500/20 text-blue-500 rounded-full">
                                            {{ $s->kelas }}
                                        </span>

                                    </div>

                                </div>

                                <!-- RIGHT -->
                                <div class="flex items-center gap-3">

                                    <a href="{{ route('guru.konseling.siswa', $s->id) }}"
                                       class="bg-blue-500 text-white px-4 py-2 rounded-xl text-xs font-semibold hover:bg-blue-600 transition">
                                        Lihat
                                    </a>

                                    <form action="{{ route('guru.siswa.hapus', $s->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('Yakin hapus siswa?')"
                                            class="bg-red-500 text-white px-4 py-2 rounded-xl text-xs font-semibold hover:bg-red-600 transition">
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                        @empty

                        <div class="bg-[#f8faff] border rounded-2xl p-10 text-center text-gray-500">
                            Belum ada siswa
                        </div>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>