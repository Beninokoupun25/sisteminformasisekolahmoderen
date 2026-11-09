<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Contact::class, 'contact');
    }

    public function index()
    {
        return view('admin.contacts.index', [
            'contacts' => Contact::latest()->paginate(10),
        ]);
    }

    public function show(Contact $contact)
    {
        if (!$contact->read_at) {
            $contact->update(['read_at' => now()]);
        }

        return view('admin.contacts.show', [
            'contact' => $contact,
        ]);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Pesan kontak berhasil dihapus.');
    }
}
