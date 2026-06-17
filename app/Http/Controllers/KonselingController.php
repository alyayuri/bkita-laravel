<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konseling;
use App\Models\Message;
use App\Models\User;

class KonselingController extends Controller
{
    // =====================
    // HALAMAN KONSELING SISWA
    // =====================
    public function create()
    {
        $userId = auth()->id();

        $data = Konseling::where('user_id', $userId)
            ->latest()
            ->get();

        return view('siswa.konseling', compact('data'));
    }

    // =====================
    // SIMPAN KONSELING
    // =====================
    public function store(Request $request)
    {
        $request->validate([
            'topik' => 'required',
            'pesan' => 'required',
            'layanan' => 'required',
        ]);

        Konseling::create([
            'user_id' => auth()->id(),
            'topik' => $request->topik,
            'pesan' => $request->pesan,
            'layanan' => $request->layanan,
            'status' => 'menunggu',
        ]);

        return redirect('/konseling')
            ->with('success', 'Konseling berhasil dikirim!');
    }

    // =====================
    // DASHBOARD SISWA
    // =====================
    public function dashboardSiswa()
    {
        $userId = auth()->id();

        $total = Konseling::where('user_id', $userId)->count();

        $menunggu = Konseling::where('user_id', $userId)
            ->where('status', 'menunggu')
            ->count();

        $selesai = Konseling::where('user_id', $userId)
            ->where('status', 'selesai')
            ->count();

        $riwayat = Konseling::where('user_id', $userId)
            ->latest()
            ->get();

        $notif = Message::whereHas('konseling', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            })
            ->where('user_id', '!=', $userId)
            ->latest()
            ->take(5)
            ->get();

        return view('siswa.dashboard', compact(
            'total',
            'menunggu',
            'selesai',
            'riwayat',
            'notif'
        ));
    }

    // =====================
    // RIWAYAT SISWA
    // =====================
    public function riwayat()
    {
        $userId = auth()->id();

        $riwayat = Konseling::where('user_id', $userId)
            ->latest()
            ->get();

        return view('siswa.riwayat', compact('riwayat'));
    }

    // =====================
    // DASHBOARD GURU
    // =====================
    public function dashboardGuru()
    {
        $konseling = Konseling::with('user')
            ->latest()
            ->take(5)
            ->get();

        $totalSiswa = User::where('role', 'siswa')->count();

        $konselingHariIni = Konseling::whereDate('created_at', now())->count();

        $laporanMasuk = Konseling::where('status', 'menunggu')->count();

        return view('guru.dashboard', compact(
            'konseling',
            'totalSiswa',
            'konselingHariIni',
            'laporanMasuk'
        ));
    }

    // =====================
    // DATA SISWA (FIX + SUPPORT VIEW LAMA & BARU)
    // =====================
    public function dataSiswa()
    {
        $siswa = User::where('role', 'siswa')
            ->latest()
            ->get();

        $kelasX = User::where('role', 'siswa')
            ->where('kelas', 'like', 'X %')
            ->latest()
            ->get();

        $kelasXI = User::where('role', 'siswa')
            ->where('kelas', 'like', 'XI %')
            ->latest()
            ->get();

        $kelasXII = User::where('role', 'siswa')
            ->where('kelas', 'like', 'XII %')
            ->latest()
            ->get();

        $total = $siswa->count();

        $bulanIni = User::where('role', 'siswa')
            ->whereMonth('created_at', now()->month)
            ->count();

        $semester = User::where('role', 'siswa')
            ->whereYear('created_at', now()->year)
            ->count();

        return view('guru.siswa', compact(
            'siswa',
            'kelasX',
            'kelasXI',
            'kelasXII',
            'total',
            'bulanIni',
            'semester'
        ));
    }

    // =====================
    // KONSELING BERDASARKAN SISWA
    // =====================
    public function konselingBySiswa($id)
    {
        $data = Konseling::with('user')
            ->where('user_id', $id)
            ->latest()
            ->get();

        return view('guru.konseling', compact('data'));
    }

    // =====================
    // LAPORAN
    // =====================
    public function laporan()
    {
        $data = Konseling::with('user')
            ->latest()
            ->get();

        $total = Konseling::count();
        $menunggu = Konseling::where('status', 'menunggu')->count();
        $selesai = Konseling::where('status', 'selesai')->count();

        return view('guru.laporan', compact(
            'data',
            'total',
            'menunggu',
            'selesai'
        ));
    }

    // =====================
    // GURU LIHAT SEMUA KONSELING
    // =====================
    public function index()
    {
        $data = Konseling::with('user')
            ->latest()
            ->get();

        return view('guru.konseling', compact('data'));
    }

    // =====================
    // SELESAIKAN KONSELING
    // =====================
    public function selesai($id)
    {
        $konseling = Konseling::findOrFail($id);

        $konseling->update([
            'status' => 'selesai'
        ]);

        return redirect('/guru/konseling')
            ->with('success', 'Konseling berhasil diselesaikan!');
    }

    // =====================
    // HAPUS DATA SISWA
    // =====================
    public function hapusSiswa($id)
    {
        $siswa = User::findOrFail($id);

        Konseling::where('user_id', $id)->delete();

        $siswa->delete();

        return back()->with('success', 'Data siswa berhasil dihapus!');
    }

    // =====================
    // CHAT
    // =====================
    public function chat($id)
    {
        $konseling = Konseling::with('messages.user')
            ->findOrFail($id);

        if (
            $konseling->user_id != auth()->id() &&
            auth()->user()->role != 'guru'
        ) {
            abort(403);
        }

        return view('chat', compact('konseling'));
    }

    // =====================
    // KIRIM PESAN
    // =====================
    public function sendMessage(Request $request, $id)
    {
        $request->validate([
            'message' => 'required'
        ]);

        Message::create([
            'konseling_id' => $id,
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        return back();
    }
}