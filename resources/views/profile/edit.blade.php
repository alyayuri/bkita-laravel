<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Profile Saya') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-[#0f172a] py-10">

        <div class="max-w-4xl mx-auto px-4">

            <!-- CARD PROFILE -->
            <div class="bg-[#1e293b] rounded-3xl shadow-xl border border-gray-700 overflow-hidden">

                <!-- TOP -->
                <div class="bg-gradient-to-r from-blue-500 to-cyan-500 h-40 relative">

                    <!-- FOTO -->
                    <div class="absolute -bottom-14 left-10">

                        @if(auth()->user()->foto)

                            <img src="{{ asset('storage/' . auth()->user()->foto) }}"
                                 class="w-28 h-28 rounded-full border-4 border-[#1e293b] object-cover shadow-lg">

                        @else

                            <div class="w-28 h-28 rounded-full border-4 border-[#1e293b] bg-blue-500 flex items-center justify-center text-4xl font-bold shadow-lg">

                                {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                            </div>

                        @endif

                    </div>

                </div>

                <!-- CONTENT -->
                <div class="pt-20 pb-8 px-8">

                    <!-- USER -->
                    <div class="mb-8">

                        <h1 class="text-2xl font-bold text-white">
                            {{ auth()->user()->name }}
                        </h1>

                        <p class="text-gray-400 text-sm mt-1">
                            {{ auth()->user()->email }}
                        </p>

                    </div>

                    <!-- FORM -->
                    <div class="max-w-lg">

                        <form method="POST"
                              action="{{ route('profile.update') }}"
                              enctype="multipart/form-data">

                            @csrf
                            @method('PATCH')

                            <!-- FOTO -->
                            <div class="mb-5">

                                <label class="block text-sm mb-2 text-gray-300">
                                    Upload Foto Profile
                                </label>

                                <input type="file"
                                       name="foto"
                                       class="w-full p-3 rounded-xl bg-[#0f172a] border border-gray-700 text-sm text-white">

                            </div>

                            <!-- NAMA -->
                            <div class="mb-5">

                                <label class="block text-sm mb-2 text-gray-300">
                                    Nama Lengkap
                                </label>

                                <input type="text"
                                       name="name"
                                       value="{{ old('name', auth()->user()->name) }}"
                                       class="w-full p-4 rounded-xl bg-[#0f172a] border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                            </div>

                            <!-- EMAIL -->
                            <div class="mb-5">

                                <label class="block text-sm mb-2 text-gray-300">
                                    Email
                                </label>

                                <input type="email"
                                       name="email"
                                       value="{{ old('email', auth()->user()->email) }}"
                                       class="w-full p-4 rounded-xl bg-[#0f172a] border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                            </div>

                            <!-- PASSWORD -->
                            <div class="mb-5">

                                <label class="block text-sm mb-2 text-gray-300">
                                    Password Baru
                                </label>

                                <input type="password"
                                       name="password"
                                       placeholder="Kosongkan jika tidak diubah"
                                       class="w-full p-4 rounded-xl bg-[#0f172a] border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                            </div>

                            <!-- KONFIRMASI -->
                            <div class="mb-6">

                                <label class="block text-sm mb-2 text-gray-300">
                                    Konfirmasi Password
                                </label>

                                <input type="password"
                                       name="password_confirmation"
                                       class="w-full p-4 rounded-xl bg-[#0f172a] border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                            </div>

                            <!-- BUTTON -->
                            <div class="flex gap-3">

                                <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-600 transition px-6 py-3 rounded-xl font-semibold text-white">

                                    Simpan Perubahan

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>