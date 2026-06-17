<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ChatController extends Controller
{

    // KIRIM CHAT
    public function store(Request $request, $id)
    {
        Message::create([
            'konseling_id' => $id,
            'user_id' => auth()->id(),
            'message' => $request->message
        ]);

        return back();
    }

    // EDIT HALAMAN
    public function edit($id)
    {
        $message = Message::findOrFail($id);

        return view('edit-message', compact('message'));
    }

    // UPDATE PESAN
    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);

        $message->update([
            'message' => $request->message
        ]);

        return back()->with('success', 'Pesan berhasil diupdate');
    }

    // HAPUS PESAN
    public function destroy($id)
    {
        $message = Message::findOrFail($id);

        $message->delete();

        return back()->with('success', 'Pesan berhasil dihapus');
    }

}