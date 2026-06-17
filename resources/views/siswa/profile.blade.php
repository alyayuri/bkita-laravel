<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile - BKITA</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#0f172a] text-white overflow-hidden">

<div class="flex h-screen">

    <!-- SIDEBAR -->
    <div class="w-60 bg-[#020617] px-5 py-6 flex flex-col justify-between border-r border-gray-800">

        <!-- MENU -->
        <div>

            <!-- LOGO -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-blue-400">
                    BKITA
                </h2>

                <p class="text-gray-400 text-xs mt-1">
                    Layanan Konseling Siswa
                </p>
            </div>

            <!-- MENU -->
            <ul class="space-y-2">

                <li>
                    <a href="{{ route('dashboard.siswa') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-500 transition">
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('konseling') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-500 transition">
                        Konseling
                    </a>
                </li>

                <li>
                    <a href="{{ route('riwayat') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-blue-500 transition">
                        Riwayat
                    </a>
                </li>
            </ul>
        </div>

        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="w-full bg-red-500 py-3 rounded-xl hover:bg-red-600 transition text-sm">

                Logout

            </button>
        </form>

    </div>

    <!-- MAIN -->
    <div class="flex-1 overflow-y-auto">

        <div class="p-6">

            <!-- TOPBAR -->
            <div class="flex justify-between items-center mb-6">

                <!-- TITLE -->
                <div>
                    <h1 class="text-2xl font-bold">
                        Profile Saya
                    </h1>

                    <p class="text-gray-400 text-sm mt-1">
                        Kelola informasi akun dan profile kamu.
                    </p>
                </div>

                <!-- USER -->
                <div class="bg-[#1e293b] px-4 py-2 rounded-xl flex items-center gap-3 border border-gray-700">

                    @if(auth()->user()->foto)

                        <img src="{{ asset('storage/' . auth()->user()->foto) }}"
                             class="w-10 h-10 rounded-full object-cover">

                    @else

                        <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center font-bold text-sm">
                            {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                        </div>

                    @endif

                    <div>
                        <h2 class="font-semibold text-sm">
                            {{ auth()->user()->name }}
                        </h2>

                        <p class="text-[11px] text-gray-400">
                            Siswa
                        </p>
                    </div>

                </div>

            </div>

            <!-- SUCCESS -->
            @if(session('success'))

            <div class="bg-green-500/20 border border-green-500 text-green-300 p-3 rounded-xl mb-4 text-sm">
                {{ session('success') }}
            </div>

            @endif

            <!-- ERROR -->
            @if ($errors->any())

            <div class="bg-red-500/20 border border-red-500 text-red-300 p-3 rounded-xl mb-4 text-sm">

                <ul class="space-y-1">

                    @foreach ($errors->all() as $error)

                        <li>• {{ $error }}</li>

                    @endforeach

                </ul>

            </div>

            @endif

            <!-- CONTENT -->
            <div class="flex justify-center">

                <!-- CARD -->
                <div class="w-full max-w-3xl bg-[#1e293b] border border-gray-700 rounded-2xl p-6">

                    <!-- PROFILE -->
                    <div class="flex items-center gap-5 mb-8">

                        <!-- FOTO -->
                        <div>

                            @if(auth()->user()->foto)

                                <img src="{{ asset('storage/' . auth()->user()->foto) }}"
                                     class="w-24 h-24 rounded-full object-cover border-4 border-blue-500">

                            @else

                                <div class="w-24 h-24 rounded-full bg-blue-500 flex items-center justify-center text-3xl font-bold border-4 border-blue-400">
                                    {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                                </div>

                            @endif

                        </div>

                        <!-- INFO -->
                        <div>

                            <h2 class="text-xl font-bold">
                                {{ auth()->user()->name }}
                            </h2>

                            <p class="text-gray-400 text-sm mt-1">
                                {{ auth()->user()->email }}
                            </p>

                            <div class="mt-3 inline-block bg-blue-500/20 text-blue-300 text-xs px-3 py-1 rounded-lg">
                                Siswa BKITA
                            </div>

                        </div>

                    </div>

                    <!-- FORM -->
                    <form method="POST"
                          action="{{ route('profile.update') }}"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PATCH')

                        <!-- FOTO -->
                        <div class="mb-4">

                            <label class="block text-sm mb-2 text-gray-300">
                                Upload Foto
                            </label>

                            <input type="file"
                                   name="foto"
                                   class="w-full text-sm bg-[#0f172a] border border-gray-700 rounded-xl p-3">

                        </div>

                        <!-- NAMA -->
                        <div class="mb-4">

                            <label class="block text-sm mb-2 text-gray-300">
                                Nama Lengkap
                            </label>

                            <input type="text"
                                   name="name"
                                   value="{{ old('name', auth()->user()->name) }}"
                                   class="w-full p-3 rounded-xl bg-[#0f172a] border border-gray-700 text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                        </div>

                        <!-- EMAIL -->
                        <div class="mb-4">

                            <label class="block text-sm mb-2 text-gray-300">
                                Email
                            </label>

                            <input type="email"
                                   name="email"
                                   value="{{ old('email', auth()->user()->email) }}"
                                   class="w-full p-3 rounded-xl bg-[#0f172a] border border-gray-700 text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                        </div>

                        <!-- PASSWORD -->
                        <div class="grid grid-cols-2 gap-4 mb-5">

                            <!-- PASSWORD -->
                            <div>

                                <label class="block text-sm mb-2 text-gray-300">
                                    Password Baru
                                </label>

                                <input type="password"
                                       name="password"
                                       placeholder="Kosongkan jika tidak diubah"
                                       class="w-full p-3 rounded-xl bg-[#0f172a] border border-gray-700 text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                            </div>

                            <!-- KONFIRMASI -->
                            <div>

                                <label class="block text-sm mb-2 text-gray-300">
                                    Konfirmasi Password
                                </label>

                                <input type="password"
                                       name="password_confirmation"
                                       placeholder="Konfirmasi password"
                                       class="w-full p-3 rounded-xl bg-[#0f172a] border border-gray-700 text-sm text-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                            </div>

                        </div>

                        <!-- BUTTON -->
                        <div class="flex justify-end">

                            <button type="submit"
                                class="bg-blue-500 px-5 py-3 rounded-xl hover:bg-blue-600 transition text-sm font-semibold">

                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>