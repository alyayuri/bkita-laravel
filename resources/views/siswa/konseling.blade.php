<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Konseling - BKITA</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#f5f7fb] text-[#1e293b] overflow-hidden">

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
                    Layanan Konseling Siswa
                </p>

            </div>

            <!-- MENU -->
            <ul class="space-y-2">

                <li>
                    <a href="{{ route('dashboard.siswa') }}"
                       class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-500 transition">

                        Dashboard

                    </a>
                </li>

                <li>
                    <a href="{{ route('konseling') }}"
                       class="block px-4 py-3 rounded-2xl bg-blue-500 text-white font-semibold shadow-sm">

                        Konsultasi

                    </a>
                </li>

                <li>
                    <a href="{{ route('riwayat') }}"
                       class="block px-4 py-3 rounded-2xl hover:bg-blue-50 hover:text-blue-500 transition">

                        Riwayat

                    </a>
                </li>

            </ul>

        </div>

        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="w-full bg-red-500 text-white py-3 rounded-2xl hover:bg-red-600 transition text-sm">

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
                        Konsultasi
                    </h1>

                    <p class="text-gray-500 text-sm mt-1">
                        Sampaikan masalahmu kepada guru BK.
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
                            Siswa
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
                        <img src="/images/konseling.png"
                             alt="Konseling"
                             class="w-44 object-contain">

                        <!-- TEXT -->
                        <div>

                            <h2 class="text-2xl font-bold text-[#0f172a] mb-2">
                                Kamu tidak sendirian 💙
                            </h2>

                            <p class="text-gray-600 text-sm leading-relaxed max-w-lg">
                                Ceritakan apa yang kamu rasakan.
                                Guru BK siap membantu dan mendengarkan
                                setiap masalah yang kamu hadapi.
                            </p>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <button onclick="toggleForm()"
                        class="bg-blue-500 text-white px-5 py-3 rounded-2xl hover:bg-blue-600 transition text-sm font-semibold whitespace-nowrap shadow">

                        + Konseling Baru

                    </button>

                </div>

            </div>

            <!-- FILTER -->
            <div class="flex gap-3 mb-4 flex-wrap">

                <button onclick="filterKonseling('all', this)"
                    class="filter-btn bg-blue-500 text-white px-5 py-2 rounded-2xl text-sm font-semibold transition shadow-sm">

                    Semua

                </button>

                <button onclick="filterKonseling('menunggu', this)"
                    class="filter-btn bg-white border border-gray-200 px-5 py-2 rounded-2xl text-sm hover:bg-blue-50 transition">

                    Menunggu

                </button>

                <button onclick="filterKonseling('selesai', this)"
                    class="filter-btn bg-white border border-gray-200 px-5 py-2 rounded-2xl text-sm hover:bg-blue-50 transition">

                    Selesai

                </button>

                <!-- FILTER LAYANAN -->
                <button onclick="filterLayanan('Pribadi', this)"
                    class="layanan-btn bg-white border border-gray-200 px-5 py-2 rounded-2xl text-sm hover:bg-blue-50 transition">

                    Pribadi

                </button>

                <button onclick="filterLayanan('Sosial', this)"
                    class="layanan-btn bg-white border border-gray-200 px-5 py-2 rounded-2xl text-sm hover:bg-blue-50 transition">

                    Sosial

                </button>

                <button onclick="filterLayanan('Karir', this)"
                    class="layanan-btn bg-white border border-gray-200 px-5 py-2 rounded-2xl text-sm hover:bg-blue-50 transition">

                    Karir

                </button>

                <button onclick="filterLayanan('Belajar', this)"
                    class="layanan-btn bg-white border border-gray-200 px-5 py-2 rounded-2xl text-sm hover:bg-blue-50 transition">

                    Belajar

                </button>

            </div>

            <!-- LIST -->
            <div id="konselingList"
                 class="flex-1 overflow-y-auto space-y-3 pr-1">

                @forelse($data as $k)

                <div class="konseling-item bg-white border border-gray-200 rounded-3xl p-4 hover:bg-[#f8fbff] transition shadow-sm"
                     data-status="{{ $k->status }}"
                     data-layanan="{{ $k->layanan }}">

                    <div class="flex items-center justify-between gap-5">

                        <!-- LEFT -->
                        <div class="flex items-center gap-4 flex-1">

                            <!-- ICON -->
                            <div class="w-11 h-11 rounded-2xl bg-blue-100 flex items-center justify-center text-lg">
                                💬
                            </div>

                            <!-- CONTENT -->
                            <div class="flex-1">

                                <div class="flex items-center gap-2 mb-1 flex-wrap">

                                    <a href="/chat/{{ $k->id }}"
                                       class="font-semibold hover:text-blue-500 transition text-base text-[#0f172a]">

                                        {{ $k->topik }}

                                    </a>

                                    <!-- BADGE LAYANAN -->
                                    <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-xl text-[11px] font-semibold">
                                        {{ $k->layanan }}
                                    </span>

                                </div>

                                <p class="text-sm text-gray-500 mt-1 truncate">
                                    {{ $k->pesan }}
                                </p>

                                <p class="text-xs text-gray-400 mt-2">
                                    {{ $k->created_at->diffForHumans() }}
                                </p>

                            </div>

                        </div>

                        <!-- STATUS -->
                        <div>

                            @if($k->status == 'menunggu')

                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-xl text-xs font-semibold">
                                    Menunggu
                                </span>

                            @else

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-xl text-xs font-semibold">
                                    Selesai
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

                @empty

                <div class="bg-white rounded-3xl p-10 text-center text-gray-500 border border-gray-200 shadow-sm">

                    Belum ada konsultasi

                </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

<!-- MODAL FORM -->
<div id="modalForm"
     class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50 backdrop-blur-sm">

    <div class="bg-white w-full max-w-2xl rounded-3xl border border-gray-200 p-6 relative shadow-2xl">

        <!-- CLOSE -->
        <button onclick="toggleForm()"
            class="absolute top-4 right-4 text-gray-400 hover:text-black text-xl">

            ✕

        </button>

        <!-- TITLE -->
        <h2 class="text-2xl font-bold text-[#0f172a] mb-1">
            Konseling Baru
        </h2>

        <p class="text-gray-500 text-sm mb-6">
            Ceritakan masalahmu kepada guru BK.
        </p>

        <!-- FORM -->
        <form method="POST" action="/konseling">

            @csrf

            <!-- LAYANAN -->
            <div class="mb-4">

                <label class="block text-sm mb-2 text-gray-600">
                    Pilih Layanan Konseling
                </label>

                <select name="layanan"
                    class="w-full p-4 rounded-2xl bg-[#f8fafc] border border-gray-200 text-sm text-[#0f172a] focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <option value="">-- Pilih Layanan --</option>
                    <option value="Pribadi">Bimbingan Pribadi</option>
                    <option value="Sosial">Bimbingan Sosial</option>
                    <option value="Karir">Bimbingan Karir</option>
                    <option value="Belajar">Bimbingan Belajar</option>

                </select>

            </div>

            <!-- TOPIK -->
            <div class="mb-4">

                <label class="block text-sm mb-2 text-gray-600">
                    Topik
                </label>

                <input type="text"
                    name="topik"
                    placeholder="Masukkan topik masalah"
                    class="w-full p-4 rounded-2xl bg-[#f8fafc] border border-gray-200 text-sm text-[#0f172a] focus:outline-none focus:ring-2 focus:ring-blue-500">

            </div>

            <!-- PESAN -->
            <div class="mb-5">

                <label class="block text-sm mb-2 text-gray-600">
                    Cerita Konseling
                </label>

                <textarea name="pesan"
                    rows="5"
                    placeholder="Ceritakan masalahmu..."
                    class="w-full p-4 rounded-2xl bg-[#f8fafc] border border-gray-200 text-sm text-[#0f172a] focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>

            </div>

            <!-- BUTTON -->
            <div class="flex justify-end gap-3">

                <button type="button"
                    onclick="toggleForm()"
                    class="px-5 py-3 rounded-2xl bg-gray-200 hover:bg-gray-300 transition text-sm text-[#0f172a]">

                    Batal

                </button>

                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-3 rounded-2xl hover:bg-blue-600 transition text-sm font-semibold shadow">

                    Kirim Konseling

                </button>

            </div>

        </form>

    </div>

</div>

<!-- SCRIPT -->
<script>

    // MODAL
    function toggleForm() {

        const modal = document.getElementById('modalForm');

        modal.classList.toggle('hidden');
        modal.classList.toggle('flex');

    }

    // FILTER STATUS
    function filterKonseling(status, element) {

        const items = document.querySelectorAll('.konseling-item');
        const buttons = document.querySelectorAll('.filter-btn');

        buttons.forEach(btn => {

            btn.classList.remove(
                'bg-blue-500',
                'text-white',
                'shadow-sm'
            );

            btn.classList.add(
                'bg-white',
                'border',
                'border-gray-200'
            );

        });

        element.classList.remove(
            'bg-white',
            'border',
            'border-gray-200'
        );

        element.classList.add(
            'bg-blue-500',
            'text-white',
            'shadow-sm'
        );

        items.forEach(item => {

            const itemStatus = item.getAttribute('data-status');

            if (status === 'all') {

                item.style.display = 'block';

            } else {

                if (itemStatus === status) {

                    item.style.display = 'block';

                } else {

                    item.style.display = 'none';

                }

            }

        });

    }

    // FILTER LAYANAN
    function filterLayanan(layanan, element) {

        const items = document.querySelectorAll('.konseling-item');
        const buttons = document.querySelectorAll('.layanan-btn');

        buttons.forEach(btn => {

            btn.classList.remove(
                'bg-blue-500',
                'text-white'
            );

            btn.classList.add(
                'bg-white',
                'border',
                'border-gray-200'
            );

        });

        element.classList.remove(
            'bg-white',
            'border',
            'border-gray-200'
        );

        element.classList.add(
            'bg-blue-500',
            'text-white'
        );

        items.forEach(item => {

            const itemLayanan = item.getAttribute('data-layanan');

            if (itemLayanan === layanan) {

                item.style.display = 'block';

            } else {

                item.style.display = 'none';

            }

        });

    }

</script>

</body>
</html>