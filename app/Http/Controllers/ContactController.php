<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Filament\Notifications\Notification;

class ContactController extends Controller
{

    public function index()
    {
        return view('kontak.kontak');
    }

    public function send(Request $request)
    {
        // 1. Validasi Input dari Form
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            // 2. Kirim Email ke Gmail Sekolah
            // Pastikan file app/Mail/ContactUs.php sudah ada
            Mail::to('contact.smpalhusainiyyah@gmail.com')->send(new ContactUs($data));

            // 3. Kirim Notifikasi ke Lonceng Filament
            // Mengambil user pertama sebagai admin penerima notif
            $recipient = User::first();

            if ($recipient) {
                Notification::make()
                    ->title('Pesan Kontak Baru! Cek Gmail Sekolah')
                    ->icon('heroicon-o-envelope')
                    ->iconColor('success')
                    ->body("Dari: **{$data['name']}**\nSubjek: {$data['subject']}")
                    ->sendToDatabase($recipient);
            }

            return back()->with('success','pesan Anda telah terkirim ke Gmail kami!');

        } catch (\Exception $e) {
            // Jika ada error (misal koneksi SMTP mati), tampilkan pesan errornya
            return back()->with('error', 'gagal kirim pesan: ' . $e->getMessage());
        }
    }
}
