<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - BKITA</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#f5f7fb] flex items-center justify-center h-screen">

<div class="flex w-full max-w-5xl h-[560px] bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-200">

    <!-- LEFT IMAGE -->
    <div class="w-1/2 hidden md:block">
        <img src="/images/bg.jpg" class="h-full w-full object-cover">
    </div>

    <!-- RIGHT FORM -->
    <div class="w-full md:w-1/2 p-10 flex flex-col justify-center">

        <!-- TITLE -->
        <h2 class="text-3xl font-bold text-blue-500 text-center">
            BKITA
        </h2>

        <p class="text-center text-gray-500 mb-6 text-sm">
            Silakan login ke akun Anda
        </p>

        <!-- ROLE SWITCH -->
        <div class="flex mb-6 bg-gray-100 rounded-xl overflow-hidden border border-gray-200">

            <label class="w-1/2 cursor-pointer">
                <input type="radio" name="role" value="siswa" checked class="peer hidden">

                <div class="text-center py-2 text-sm font-medium transition
                    peer-checked:bg-blue-500 peer-checked:text-white">
                    Siswa
                </div>
            </label>

            <label class="w-1/2 cursor-pointer">
                <input type="radio" name="role" value="guru" class="peer hidden">

                <div class="text-center py-2 text-sm font-medium transition
                    peer-checked:bg-blue-500 peer-checked:text-white">
                    Guru BK
                </div>
            </label>

        </div>

        <!-- FORM -->
        <form method="POST" action="{{ route('login') }}">

            @csrf

            <!-- EMAIL -->
            <div class="mb-4">
                <label class="block text-sm mb-1 text-gray-600">Email</label>

                <input type="email" name="email" required
                    placeholder="Masukkan email"
                    class="w-full px-4 py-3 rounded-xl bg-gray-100 border border-gray-200 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- PASSWORD -->
            <div class="mb-6">
                <label class="block text-sm mb-1 text-gray-600">Password</label>

                <input type="password" name="password" required
                    placeholder="Masukkan password"
                    class="w-full px-4 py-3 rounded-xl bg-gray-100 border border-gray-200 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- BUTTON -->
            <button type="submit"
                class="w-full bg-blue-500 text-white py-3 rounded-xl hover:bg-blue-600 transition font-semibold">

                Login

            </button>

        </form>

        <!-- REGISTER -->
        <p class="text-sm text-center mt-5 text-gray-500">
            Belum punya akun?
            <a href="/register" class="text-blue-500 font-semibold hover:underline">
                Daftar
            </a>
        </p>

    </div>

</div>

</body>
</html>