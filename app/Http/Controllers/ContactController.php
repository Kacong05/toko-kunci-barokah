<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'pesan' => ['required', 'string', 'max:5000'],
        ]);

        $contact = Contact::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'pesan' => $validated['pesan'],
        ]);

        // Create notification for admin
        \App\Models\Notification::create([
            'type' => 'contact',
            'title' => 'Pesan Kontak Baru',
            'message' => 'Pesan dari ' . $validated['nama'],
            'data' => [
                'contact_id' => $contact->id,
                'sender_name' => $validated['nama'],
                'sender_email' => $validated['email'],
            ],
            'is_read' => false,
        ]);

        return back()->with('status', 'Pesan berhasil dikirim');
    }
}

