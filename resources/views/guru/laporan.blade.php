<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan - BKITA</title>
    @vite('resources/css/app.css')

    <!-- PRINT STYLE -->
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #printArea, #printArea * {
                visibility: visible;
            }

            #printArea {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }

            .no-print {
                display: none !important;
            }
        }
    </style>

</head>

<body class="bg-[#f5f7fb] text-[#0f172a] overflow-hidden">

<div class="flex h-screen">

    <!-- SIDEBAR (TIDAK IKUT PRINT) -->
    <div class="w-60 bg-white px-5 py-6 flex flex-col justify-between border-r border-gray-200 no-print">

        <div>

            <div class="mb-8">
                <h2 class="text-2xl font-bold text-blue-500">BKITA</h2>
                <p class="text-gray-500 text-xs mt-1">Layanan Konseling Guru</p>
            </div>

            <ul class="space-y-2">

                <li>
                    <a href="{{ route('dashboard.guru') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-50">
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('guru.siswa') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-50">
                        Data Siswa
                    </a>
                </li>

                <li>
                    <a href="{{ route('guru.konseling') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-50">
                        Konseling
                    </a>
                </li>

                <li>
                    <a href="{{ route('guru.laporan') }}"
                       class="block px-4 py-3 rounded-xl bg-blue-500 text-white">
                        Laporan
                    </a>
                </li>

            </ul>

        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full bg-red-500 text-white py-3 rounded-xl text-sm">
                Logout
            </button>
        </form>

    </div>

    <!-- MAIN -->
    <div class="flex-1 overflow-hidden">

        <div class="h-screen flex flex-col p-5">

            <!-- TOPBAR -->
            <div class="flex justify-between items-center mb-4 no-print">

                <div>
                    <h1 class="text-2xl font-bold">Laporan Konseling</h1>
                    <p class="text-gray-500 text-sm mt-1">
                        Ringkasan data konseling siswa.
                    </p>
                </div>

                <div class="bg-white px-4 py-2 rounded-2xl border flex items-center gap-3">

                    <div class="w-10 h-10 rounded-full bg-blue-500 text-white flex items-center justify-center">
                        {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                    </div>

                    <div>
                        <h2 class="font-semibold text-sm">{{ auth()->user()->name }}</h2>
                        <p class="text-[11px] text-gray-500">Guru BK</p>
                    </div>

                </div>

            </div>

            <!-- CARD (NO PRINT) -->
            <div class="grid grid-cols-3 gap-4 mb-4 no-print">

                <div class="bg-white border rounded-3xl p-5">
                    <p class="text-gray-500 text-sm">Total Konseling</p>
                    <h2 class="text-3xl font-bold mt-2">{{ $total }}</h2>
                </div>

                <div class="bg-white border rounded-3xl p-5">
                    <p class="text-gray-500 text-sm">Menunggu</p>
                    <h2 class="text-3xl font-bold mt-2 text-yellow-500">{{ $menunggu }}</h2>
                </div>

                <div class="bg-white border rounded-3xl p-5">
                    <p class="text-gray-500 text-sm">Selesai</p>
                    <h2 class="text-3xl font-bold mt-2 text-green-500">{{ $selesai }}</h2>
                </div>

            </div>

            <!-- PRINT BUTTON -->
            <div class="mb-4 no-print">

                <button onclick="window.print()"
                    class="bg-blue-500 text-white px-5 py-3 rounded-2xl hover:bg-blue-600 transition text-sm font-semibold shadow">

                    Cetak Laporan

                </button>

            </div>

            <!-- PRINT AREA (INI YANG AKAN DICETAK) -->
            <div id="printArea" class="flex-1 overflow-y-auto pr-1">

                <div class="bg-white border rounded-3xl overflow-hidden">

                    <div class="px-6 py-5 border-b">

                        <h2 class="text-lg font-bold">Data Konseling</h2>
                        <p class="text-xs text-gray-500 mt-1">
                            Laporan aktivitas siswa
                        </p>

                    </div>

                    <div class="p-4 space-y-3">

                        @forelse($data as $d)

                        <div class="border rounded-2xl p-4 bg-[#f8fbff]">

                            <div class="flex justify-between items-center">

                                <div>

                                    <h3 class="font-semibold text-sm">
                                        {{ $d->user->name }}
                                    </h3>

                                    <p class="text-sm text-gray-700 mt-1">
                                        {{ $d->topik }}
                                    </p>

                                    <p class="text-xs text-gray-500 mt-2">
                                        {{ $d->created_at->translatedFormat('d F Y') }}
                                    </p>

                                </div>

                                <div>

                                    @if($d->status == 'menunggu')
                                        <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-xl text-xs">
                                            Menunggu
                                        </span>
                                    @else
                                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-xl text-xs">
                                            Selesai
                                        </span>
                                    @endif

                                </div>

                            </div>

                        </div>

                        @empty

                        <div class="text-center text-gray-500 p-10">
                            Belum ada laporan konseling
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