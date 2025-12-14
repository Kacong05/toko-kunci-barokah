<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::where('role', 'user')->count(),
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'total_ratings' => Rating::count(),
            'avg_rating' => Rating::avg('rating') ?? 0,
            'total_contacts' => Contact::count(),
        ];

        $recent_orders = Order::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $recent_ratings = Rating::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_orders', 'recent_ratings'));
    }

    public function orders()
    {
        $orders = Order::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.orders', compact('orders'));
    }

    public function updateOrderStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,proses,selesai',
        ]);

        $order->update(['status' => $request->status]);

        return back()->with('success', 'Status pesanan berhasil diupdate!');
    }

    public function users()
    {
        $users = User::where('role', 'user')
            ->withCount(['orders', 'ratings'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.users', compact('users'));
    }

    public function ratings()
    {
        $ratings = Rating::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.ratings', compact('ratings'));
    }

    public function deleteRating(Rating $rating)
    {
        $rating->delete();
        return back()->with('success', 'Rating berhasil dihapus!');
    }

    public function contacts()
    {
        $contacts = Contact::orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.contacts', compact('contacts'));
    }

    public function deleteContact(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Pesan berhasil dihapus!');
    }
}

