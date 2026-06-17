<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - BKITA</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#f5f7fb] flex items-center justify-center min-h-screen py-6 overflow-y-auto">

<div class="flex w-full max-w-5xl h-[560px] bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-200">

    <!-- LEFT IMAGE -->
    <div class="w-1/2 hidden md:block">
        <img src="/images/bg.jpg"
             class="h-full w-full object-cover">
    </div>

    <!-- RIGHT FORM -->
    <div class="w-full md:w-1/2 px-10 py-8 flex flex-col justify-center overflow-y-auto">

        <!-- TITLE -->
        <h2 class="text-3xl font-bold text-blue-500 text-center">
            BKITA
        </h2>

        <p class="text-center text-gray-500 mb-6 text-sm">
            Buat akun baru
        </p>

        <!-- FORM -->
        <form method="POST" action="{{ route('register') }}">

            @csrf

            <!-- NAMA -->
            <div class="mb-4">

                <label class="block text-sm mb-1 text-gray-600">
                    Nama Lengkap
                </label>

                <input type="text"
                       name="name"
                       required
                       placeholder="Masukkan nama lengkap"
                       class="w-full px-4 py-3 rounded-xl bg-gray-100 border border-gray-200 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </div>

            <!-- EMAIL -->
            <div class="mb-4">

                <label class="block text-sm mb-1 text-gray-600">
                    Email
                </label>

                <input type="email"
                       name="email"
                       required
                       placeholder="Contoh: siswa@gmail.com"
                       class="w-full px-4 py-3 rounded-xl bg-gray-100 border border-gray-200 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </div>

            <!-- ROLE -->
            <div class="mb-4">

                <label class="block text-sm mb-1 text-gray-600">
                    Daftar Sebagai
                </label>

                <select name="role"
                        class="w-full px-4 py-3 rounded-xl bg-gray-100 border border-gray-200 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400">

                    <option value="siswa">
                        Siswa
                    </option>

                    <option value="guru">
                        Guru BK
                    </option>

                </select>

            </div>

            <!-- KELAS -->
            <div class="mb-4">

                <label class="block text-sm mb-1 text-gray-600">
                    Kelas
                </label>

                <select name="kelas"
                        class="w-full px-4 py-3 rounded-xl bg-gray-100 border border-gray-200 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400">

                    <option value="">
                        Pilih Kelas
                    </option>

                    <option>X IPA 1</option>
                    <option>X IPA 2</option>
                    <option>X IPS 1</option>
                    <option>X IPS 2</option>

                    <option>XI IPA 1</option>
                    <option>XI IPA 2</option>
                    <option>XI IPS 1</option>
                    <option>XI IPS 2</option>

                    <option>XII IPA 1</option>
                    <option>XII IPA 2</option>
                    <option>XII IPS 1</option>
                    <option>XII IPS 2</option>

                </select>

            </div>

            <!-- PASSWORD -->
            <div class="mb-4">

                <label class="block text-sm mb-1 text-gray-600">
                    Password
                </label>

                <input type="password"
                       name="password"
                       required
                       placeholder="Minimal 8 karakter"
                       class="w-full px-4 py-3 rounded-xl bg-gray-100 border border-gray-200 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </div>

            <!-- KONFIRMASI -->
            <div class="mb-5">

                <label class="block text-sm mb-1 text-gray-600">
                    Konfirmasi Password
                </label>

                <input type="password"
                       name="password_confirmation"
                       required
                       placeholder="Ulangi password"
                       class="w-full px-4 py-3 rounded-xl bg-gray-100 border border-gray-200 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400">

            </div>

            <!-- BUTTON -->
            <button type="submit"
                    class="w-full bg-blue-500 text-white py-3 rounded-xl hover:bg-blue-600 transition font-semibold">

                Register

            </button>

        </form>

        <!-- LOGIN -->
        <p class="text-sm text-center mt-5 text-gray-500">

            Sudah punya akun?

            <a href="/login"
               class="text-blue-500 font-semibold hover:underline">

                Login

            </a>

        </p>

    </div>

</div>

</body>
</html>