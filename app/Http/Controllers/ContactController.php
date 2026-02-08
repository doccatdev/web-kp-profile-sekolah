<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        // Mengambil data pertama dari database
        $kontak = Contact::first();

        // Jika data belum diisi di Filament, buat objek kosong agar FE tidak error
        if (!$kontak) {
            $kontak = (object) [
                'address' => 'Alamat belum diatur',
                'phone' => '-',
                'email' => '-',
                'location' => ['lat' => -6.880095, 'lng' => 107.606583]
            ];
        }

        return view('kontak.kontak', compact('kontak'));
    }
}
