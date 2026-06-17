<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa - BKITA</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-900 text-white">

<div class="flex">

    <!-- SIDEBAR -->
    <div class="w-64 h-screen bg-black p-5">
        <h2 class="text-2xl font-bold text-blue-400 mb-10">BKITA</h2>

        <ul>
            <li class="mb-4 text-blue-400">Dashboard</li>
            <li class="mb-4 hover:text-blue-400 cursor-pointer">Konsultasi</li>
            <li class="mb-4 hover:text-blue-400 cursor-pointer">Riwayat</li>
            <li class="mb-4 hover:text-blue-400 cursor-pointer">Profil</li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="flex-1 p-10">

        <h1 class="text-2xl font-bold mb-4">
            Selamat datang, {{ auth()->user()->name }}
        </h1>

        <div class="grid grid-cols-3 gap-6 mt-6">

            <!-- CARD -->
            <div class="bg-black p-5 rounded-xl shadow">
                <h3 class="text-lg">Total Konsultasi</h3>
                <p class="text-3xl text-blue-400 mt-2">0</p>
            </div>

            <div class="bg-black p-5 rounded-xl shadow">
                <h3 class="text-lg">Menunggu</h3>
                <p class="text-3xl text-yellow-400 mt-2">0</p>
            </div>

            <div class="bg-black p-5 rounded-xl shadow">
                <h3 class="text-lg">Selesai</h3>
                <p class="text-3xl text-green-400 mt-2">0</p>
            </div>

        </div>

    </div>

</div>

</body>
</html>