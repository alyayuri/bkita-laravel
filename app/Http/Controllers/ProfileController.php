<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // HALAMAN PROFILE
    public function edit()
    {
        return view('siswa.profile', [
            'user' => Auth::user()
        ]);
    }

    // UPDATE PROFILE
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // UPLOAD FOTO
        if ($request->hasFile('foto')) {

            $foto = $request->file('foto')->store('profile', 'public');

            $user->foto = $foto;
        }

        // UPDATE DATA
        $user->name = $request->name;
        $user->email = $request->email;

        // UPDATE PASSWORD
        if ($request->password) {

            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.edit')
            ->with('success', 'Profile berhasil diupdate!');
    }
}