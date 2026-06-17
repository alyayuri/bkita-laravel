<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pesan</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#f5f7fb] flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-3xl shadow w-full max-w-lg relative">

    <h1 class="text-2xl font-bold mb-5 text-blue-500">
        Edit Pesan
    </h1>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- FORM --}}
    <form method="POST" action="{{ route('message.update', $message->id) }}">

        @csrf
        @method('PUT')

        <textarea
            name="message"
            rows="6"
            class="w-full border border-gray-200 rounded-2xl p-4 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"
        >{{ old('message', $message->message) }}</textarea>

        {{-- BUTTON AREA --}}
        <div class="flex gap-3 mt-6">

            {{-- UPDATE BUTTON --}}
            <button type="submit"
                class="bg-blue-500 text-white px-5 py-3 rounded-2xl hover:bg-blue-600 transition font-semibold w-full">

                Update

            </button>

            {{-- BACK BUTTON (FIXED) --}}
            <a href="{{ route('message.edit', $message->id) }}"
               onclick="window.history.back(); return false;"
               class="bg-gray-200 text-center px-5 py-3 rounded-2xl hover:bg-gray-300 transition font-medium w-full block">

                Kembali

            </a>

        </div>

    </form>

</div>

</body>
</html>