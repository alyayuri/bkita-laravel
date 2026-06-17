<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Konseling - BKITA</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#f5f7fb] text-[#1e293b] overflow-hidden">

<div class="flex h-screen">

    <!-- SIDEBAR -->
    <div class="w-60 bg-white px-5 py-6 flex flex-col justify-between border-r border-gray-200">

        <div>

            <div class="mb-8">
                <h2 class="text-2xl font-bold text-blue-500">BKITA</h2>
                <p class="text-gray-500 text-xs mt-1">Layanan Konseling Siswa</p>
            </div>

            <ul class="space-y-2">

                <li>
                    <a href="{{ route('dashboard.siswa') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-50 hover:text-blue-500 transition">
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
                       class="block px-4 py-3 rounded-xl bg-blue-500 text-white font-semibold">
                        Riwayat
                    </a>
                </li>

            </ul>

        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full bg-red-500 text-white py-3 rounded-xl hover:bg-red-600 transition text-sm">
                Logout
            </button>
        </form>

    </div>

    <!-- MAIN -->
    <div class="flex-1 overflow-hidden">

        <div class="h-screen flex flex-col p-6 gap-5">

            <!-- TOPBAR -->
            <div class="flex justify-between items-start">

                <div>
                    <h1 class="text-2xl font-bold text-[#0f172a]">
                        Riwayat Konsultasi
                    </h1>
                    <p class="text-gray-500 text-sm mt-1">
                        Semua percakapan tersimpan dan dapat kamu akses kapan saja
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
                        <h2 class="font-semibold text-sm">
                            {{ auth()->user()->name }}
                        </h2>
                        <p class="text-[11px] text-gray-500">Siswa</p>
                    </div>

                </div>

            </div>

            <!-- FILTER -->
            <div class="flex gap-3">

                <div class="flex-1 relative">

                    <input type="text"
                           id="searchInput"
                           placeholder="Cari topik konsultasi..."
                           class="w-full bg-white border border-gray-200 rounded-2xl py-3 pl-12 pr-4 text-sm focus:ring-2 focus:ring-blue-500 outline-none shadow-sm">

                    <div class="absolute left-4 top-3.5 text-gray-400">🔍</div>

                </div>

                <select id="statusFilter"
                        class="bg-white border border-gray-200 rounded-2xl px-4 text-sm shadow-sm focus:ring-2 focus:ring-blue-500 outline-none">

                    <option value="semua">Semua</option>
                    <option value="menunggu">Menunggu</option>
                    <option value="selesai">Selesai</option>

                </select>

            </div>

            <!-- LIST -->
            <div id="riwayatContainer"
                 class="flex-1 overflow-y-auto space-y-4 pr-1">

                @forelse($riwayat as $k)

                <div class="riwayat-item bg-white border border-gray-200 rounded-3xl p-5 shadow-sm hover:shadow-md transition"
                     data-status="{{ strtolower($k->status) }}"
                     data-topik="{{ strtolower($k->topik) }}">

                    <div class="flex justify-between gap-5">

                        <!-- LEFT -->
                        <div class="flex gap-4 flex-1">

                            <div class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center text-xl">
                                💬
                            </div>

                            <div class="flex-1">

                               <h3>{{ $k->topik }}</h3>

                               <span class="text-xs text-blue-400 font-semibold">
                                   {{ $k->layanan }}
                               </span>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ Str::limit($k->pesan, 80) }}
                                </p>

                                <p class="text-xs text-gray-400 mt-2">
                                    {{ $k->created_at->translatedFormat('d F Y • H:i') }}
                                </p>

                            </div>

                        </div>

                        <!-- RIGHT -->
                        <div class="flex flex-col items-end gap-3">

                            <span class="text-xs px-3 py-1 rounded-xl font-semibold
                                {{ $k->status == 'menunggu'
                                    ? 'bg-yellow-100 text-yellow-700'
                                    : 'bg-green-100 text-green-700' }}">
                                {{ ucfirst($k->status) }}
                            </span>

                            <a href="/chat/{{ $k->id }}"
                               class="bg-blue-500 text-white px-4 py-2 rounded-xl text-sm hover:bg-blue-600 transition">
                                Lihat Detail
                            </a>

                        </div>

                    </div>

                </div>

                @empty

                <div class="bg-white border border-gray-200 rounded-3xl p-12 text-center text-gray-500 shadow-sm">

                    <div class="text-5xl mb-3">📭</div>

                    Belum ada riwayat konsultasi

                </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

<!-- FILTER SCRIPT -->
<script>

    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const items = document.querySelectorAll('.riwayat-item');

    function filter() {

        const search = searchInput.value.toLowerCase();
        const status = statusFilter.value;

        items.forEach(item => {

            const topik = item.dataset.topik;
            const itemStatus = item.dataset.status;

            const matchSearch = topik.includes(search);
            const matchStatus = status === 'semua' || itemStatus === status;

            item.style.display = (matchSearch && matchStatus) ? 'block' : 'none';

        });

    }

    searchInput.addEventListener('keyup', filter);
    statusFilter.addEventListener('change', filter);

</script>

</body>
</html>