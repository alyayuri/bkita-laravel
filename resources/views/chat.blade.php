<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat Konseling - BKITA</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#f5f7fb] text-[#0f172a] overflow-hidden">

<div class="flex h-screen">

    <!-- SIDEBAR -->
    <div class="w-60 bg-white px-5 py-6 flex flex-col justify-between border-r border-gray-200">

        <!-- ATAS -->
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

                {{-- =========================
                     SIDEBAR GURU
                ========================== --}}
                @if(auth()->user()->role == 'guru')

                    <li>
                        <a href="{{ route('dashboard.guru') }}"
                           class="block px-4 py-3 rounded-xl hover:bg-blue-50 hover:text-blue-500 transition">

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
                           class="block px-4 py-3 rounded-xl bg-blue-500 text-white font-semibold transition">

                            Konseling

                        </a>
                    </li>

                    <li>
                        <a href="{{ route('guru.laporan') }}"
                           class="block px-4 py-3 rounded-xl hover:bg-blue-50 hover:text-blue-500 transition">

                            Laporan

                        </a>
                    </li>

                {{-- =========================
                     SIDEBAR SISWA
                ========================== --}}
                @else

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
                           class="block px-4 py-3 rounded-xl bg-blue-500 text-white font-semibold transition">

                            Riwayat

                        </a>
                    </li>

                @endif

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
    <div class="flex-1 flex flex-col overflow-hidden">

        <!-- HEADER -->
        <div class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">

            <!-- LEFT -->
            <div>

                <h1 class="text-xl font-bold text-[#0f172a]">
                    {{ $konseling->topik }}
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Detail percakapan konseling
                </p>

            </div>

            <!-- RIGHT -->
            <div class="flex items-center gap-4">

                <!-- STATUS -->
                @if($konseling->status == 'menunggu')

                    <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-xl text-xs font-semibold">
                        Menunggu
                    </span>

                @else

                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-xl text-xs font-semibold">
                        Selesai
                    </span>

                @endif

                {{-- TOMBOL KEMBALI --}}
                @if(auth()->user()->role == 'guru')

                    <a href="{{ route('guru.konseling') }}"
                       class="text-blue-500 hover:underline text-sm font-medium">

                        Kembali

                    </a>

                @else

                    <a href="{{ route('riwayat') }}"
                       class="text-blue-500 hover:underline text-sm font-medium">

                        Kembali

                    </a>

                @endif

            </div>

        </div>

        <!-- CHAT -->
        <div class="flex-1 overflow-y-auto px-6 py-5 space-y-4 bg-[#f5f7fb]">

            @forelse($konseling->messages as $msg)

                {{-- PESAN SENDIRI --}}
                @if($msg->user_id == auth()->id())

                    <div class="flex justify-end">

                        <div class="max-w-md">

                            <!-- NAME -->
                            <div class="text-right text-xs text-gray-500 mb-1">
                                Kamu
                            </div>

                            <!-- CHAT -->
                            <div class="bg-blue-500 text-white px-5 py-3 rounded-2xl rounded-br-md shadow-sm text-sm leading-relaxed">

                                {{ $msg->message }}

                            </div>

                            <!-- TIME + ACTION -->
                            <div class="flex justify-end items-center gap-3 mt-1">

                                <span class="text-[11px] text-gray-400">
                                    {{ $msg->created_at->format('H:i') }}
                                </span>

                                <!-- EDIT -->
                                <a href="{{ route('message.edit', $msg->id) }}"
                                   class="text-[11px] text-blue-500 hover:underline font-medium">

                                    Edit

                                </a>

                                <!-- DELETE -->
                                <form action="{{ route('message.delete', $msg->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus pesan ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="text-[11px] text-red-500 hover:underline font-medium">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                {{-- PESAN ORANG LAIN --}}
                @else

                    <div class="flex justify-start">

                        <div class="max-w-md">

                            <!-- NAME -->
                            <div class="text-xs text-gray-500 mb-1">
                                {{ $msg->user->name ?? 'Guru BK' }}
                            </div>

                            <!-- CHAT -->
                            <div class="bg-white border border-gray-200 px-5 py-3 rounded-2xl rounded-bl-md shadow-sm text-sm text-[#0f172a] leading-relaxed">

                                {{ $msg->message }}

                            </div>

                            <!-- TIME -->
                            <div class="text-[11px] text-gray-400 mt-1">
                                {{ $msg->created_at->format('H:i') }}
                            </div>

                        </div>

                    </div>

                @endif

            @empty

                <!-- EMPTY -->
                <div class="h-full flex items-center justify-center">

                    <div class="text-center">

                        <img src="/images/chat-empty.png"
                             class="w-44 mx-auto mb-4 opacity-80">

                        <h2 class="text-lg font-semibold text-gray-700 mb-1">
                            Belum ada percakapan
                        </h2>

                        <p class="text-sm text-gray-500">
                            Mulai kirim pesan untuk memulai konsultasi.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

        <!-- INPUT -->
        <div class="bg-white border-t border-gray-200 px-6 py-4">

            <form method="POST"
                  action="/chat/{{ $konseling->id }}"
                  class="flex items-center gap-3">

                @csrf

                <!-- INPUT -->
                <input type="text"
                       name="message"
                       placeholder="Ketik pesan..."
                       class="flex-1 bg-[#f5f7fb] border border-gray-200 rounded-2xl px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                <!-- BUTTON -->
                <button type="submit"
                        class="bg-blue-500 text-white px-6 py-3 rounded-2xl hover:bg-blue-600 transition text-sm font-semibold shadow-sm">

                    Kirim

                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>