<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RatingController extends Controller
{
    public function index(): View
    {
        $userRating = Rating::where('user_id', Auth::id())->first();
        $ratings = Rating::with('user')->latest()->get();

        return view('rating.index', compact('userRating', 'ratings'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'komentar' => ['nullable', 'string', 'max:5000'],
        ]);
        
        $rating = Rating::updateOrCreate(
            ['user_id' => Auth::id()],
            ['rating' => $validated['rating'], 'komentar' => $validated['komentar'] ?? null]
        );

        // Create notification for admin
        \App\Models\Notification::create([
            'type' => 'rating',
            'title' => 'Rating Baru',
            'message' => Auth::user()->name . ' memberikan rating ' . $validated['rating'] . ' bintang',
            'data' => [
                'rating_id' => $rating->id,
                'user_name' => Auth::user()->name,
                'rating_value' => $validated['rating'],
            ],
            'is_read' => false,
        ]);

        return back()->with('status', 'Rating berhasil dikirim');
    }
}
