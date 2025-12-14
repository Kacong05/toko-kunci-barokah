<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PemesananController extends Controller
{
    public function index(): View
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();

        return view('pemesanan.index', [
            'orders' => $orders,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_pemesan' => ['required', 'string', 'max:255'],
            'nomor_hp' => ['required', 'string', 'max:30'],
            'jenis_layanan' => ['required', 'string', 'max:255'],
            'detail_kebutuhan' => ['required', 'string'],
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'nama_pemesan' => $validated['nama_pemesan'],
            'nomor_hp' => $validated['nomor_hp'],
            'jenis_layanan' => $validated['jenis_layanan'],
            'detail_kebutuhan' => $validated['detail_kebutuhan'],
            'foto_kunci' => null,
            'status' => 'pending',
        ]);

        // Create notification for admin
        \App\Models\Notification::create([
            'type' => 'order',
            'title' => 'Pesanan Baru Masuk',
            'message' => $validated['jenis_layanan'] . ' dari ' . $validated['nama_pemesan'],
            'data' => [
                'order_id' => $order->id,
                'user_name' => $validated['nama_pemesan'],
                'service' => $validated['jenis_layanan'],
            ],
            'is_read' => false,
        ]);

        return back()->with('success', 'Pemesanan berhasil dikirim');
    }
}

