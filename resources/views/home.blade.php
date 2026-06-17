<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKITA - Layanan Konseling Digital</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-[#f5f7fb] overflow-x-hidden">

<!-- BACKGROUND -->
<div class="fixed inset-0">
    <img src="/images/bg.jpg" class="w-full h-full object-cover">

    <!-- overlay lebih soft & modern -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#0b1220]/85 via-[#1e3a8a]/60 to-[#0b1220]/85"></div>
</div>

<!-- CONTENT -->
<div class="relative z-10 min-h-screen flex flex-col">

    <!-- NAV -->
    <nav class="flex items-center justify-between px-6 md:px-12 py-5">

        <div>
            <h1 class="text-2xl font-bold text-white tracking-wide">BKITA</h1>
            <p class="text-blue-100 text-xs">Layanan Konseling Digital</p>
        </div>

    </nav>

    <!-- HERO -->
    <main class="flex-1 flex items-center justify-center px-6 md:px-12">

        <div class="max-w-6xl w-full grid md:grid-cols-2 gap-10 items-center">

            <!-- LEFT -->
            <div class="text-center md:text-left">

                <!-- badge -->
                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 backdrop-blur-md px-4 py-2 rounded-full mb-6">
                    <span class="w-2 h-2 bg-green-400 rounded-full"></span>
                    <p class="text-xs text-white">Platform Konseling</p>
                </div>

                <!-- title -->
                <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight">
                    BKITA <br>
                    <span class="text-blue-300">Bimbingan Konseling</span>
                    Digital
                </h1>

                <!-- desc -->
                <p class="text-blue-100 text-sm md:text-base mt-5 max-w-xl mx-auto md:mx-0 leading-relaxed">
                    Platform layanan konseling digital untuk membantu siswa berkonsultasi dengan guru BK secara mudah, nyaman, dan aman kapan saja.
                </p>

                <!-- button -->
                <div class="mt-8 flex flex-col md:flex-row md:items-center gap-4 md:gap-6">

                    <a href="/login"
                       class="inline-flex justify-center items-center gap-2 bg-blue-500 text-white px-7 py-3 rounded-2xl hover:bg-blue-600 transition font-semibold text-sm shadow-lg w-full md:w-auto">

                        Masuk Sekarang 
                    </a>

                </div>

                <p class="text-blue-100 text-xs mt-4">
                    Belum punya akun?
                    <a href="/register" class="text-white font-semibold hover:underline">
                        Register sekarang
                    </a>
                </p>

                <!-- stats -->
                <div class="flex justify-center md:justify-start gap-10 mt-10">

                    <div>
                        <h2 class="text-xl font-bold text-white">24/7</h2>
                        <p class="text-blue-100 text-xs">Akses Konseling</p>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-white">Aman</h2>
                        <p class="text-blue-100 text-xs">Privasi Terjaga</p>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-white">Mudah</h2>
                        <p class="text-blue-100 text-xs">Digunakan</p>
                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>