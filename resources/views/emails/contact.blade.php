<x-mail::message>
# 📩 Pesan Kontak Baru

Halo Admin, ada pesan baru yang masuk melalui formulir kontak di website **SMP Al Husainiyah**. Berikut adalah rinciannya:

<x-mail::panel>
### **Informasi Pengirim**
* **Nama:** {{ $data['name'] }}
* **Email:** {{ $data['email'] }}
* **Subjek:** {{ $data['subject'] }}
</x-mail::panel>

### **Isi Pesan:**
{{ $data['message'] }}

---

<x-mail::button :url="'mailto:' . $data['email'] . '?subject=Re: ' . urlencode($data['subject']) . '&body=Halo ' . urlencode($data['name']) . ',%0D%0A%0D%0A'">
Balas Pesan Sekarang
</x-mail::button>

Terima kasih,<br>
**SMP Al Husainiyah**
</x-mail::message>
