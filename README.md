Tahap 1: Instalasi Paket QR Code
Langkah pertama adalah menginstal library Simple QrCode menggunakan Composer. Jalankan perintah berikut di terminal proyek Laravel:
bash
CopyEdit
composer require simplesoftwareio/simple-qrcode
📌 Catatan: Paket ini berbasis pada BaconQrCode, yang digunakan untuk membuat QR Code di PHP.
________________________________________
Tahap 2: Membuat Controller untuk QR Code
Setelah instalasi selesai, buat controller baru untuk menangani pembuatan QR Code:
bash
CopyEdit
php artisan make:controller QRCodeController
📌 Catatan: Controller ini akan digunakan untuk meng-generate QR Code berdasarkan input tertentu.
Setelah perintah ini dijalankan, file controller baru akan muncul di:
📁 app/Http/Controllers/QRCodeController.php
________________________________________
Tahap 3: Membuat Fungsi untuk Generate QR Code
Buka file QRCodeController.php, lalu tambahkan kode berikut:
php
CopyEdit
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function generateQRCode()
    {
        // Membuat QR Code dengan teks atau URL
        $qrCode = QrCode::size(300)->generate('https://example.com');

        // Mengembalikan QR Code dalam bentuk gambar
        return response($qrCode)->header('Content-Type', 'image/png');
    }
}
📌 Penjelasan:
•	QrCode::size(300)->generate('https://example.com'); → Membuat QR Code dengan ukuran 300x300 pixel berisi teks atau URL.
•	response($qrCode)->header('Content-Type', 'image/png'); → Mengembalikan QR Code dalam bentuk gambar PNG.
________________________________________
Tahap 4: Menambahkan Route
Agar QR Code bisa diakses melalui browser, tambahkan route di routes/web.php:
php
CopyEdit
use App\Http\Controllers\QRCodeController;

Route::get('/qrcode', [QRCodeController::class, 'generateQRCode']);
📌 Catatan: Sekarang QR Code bisa diakses dengan membuka http://localhost:8000/qrcode di browser.
________________________________________
Tahap 5: Menampilkan QR Code di Halaman Web (Blade)
Buat file baru di resources/views/qrcode.blade.php dan tambahkan kode berikut:
html
CopyEdit
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
</head>
<body>
    <h2>Scan QR Code Ini:</h2>
    <img src="{{ QrCode::size(200)->generate('https://example.com') }}" alt="QR Code">
</body>
</html>
Kemudian tambahkan route untuk menampilkan halaman ini:
php
CopyEdit
Route::get('/qrcode-view', function () {
    return view('qrcode');
});
📌 Penjelasan:
•	{{ QrCode::size(200)->generate('https://example.com') }} → Membuat QR Code langsung di halaman HTML.
•	img digunakan untuk menampilkan QR Code.
Sekarang buka http://localhost:8000/qrcode-view di browser, dan QR Code akan muncul di halaman web.
________________________________________
Tahap 6: Menyimpan QR Code sebagai File Gambar
Jika Anda ingin menyimpan QR Code sebagai file gambar di storage Laravel, gunakan kode berikut:
php
CopyEdit
use Illuminate\Support\Facades\Storage;

public function saveQRCode()
{
    $qrCode = QrCode::format('png')->size(300)->generate('https://example.com');
    Storage::put('public/qrcodes/my-qrcode.png', $qrCode);

    return "QR Code berhasil disimpan di storage!";
}
📌 Hasil: QR Code akan tersimpan di storage/app/public/qrcodes/my-qrcode.png.
________________________________________
Tahap 7: Kustomisasi QR Code
Paket ini memungkinkan kita untuk menyesuaikan tampilan QR Code, seperti mengubah warna, menambahkan margin, dan memasukkan logo.
🔵 Mengubah Warna QR Code
php
CopyEdit
QrCode::size(300)->color(255, 0, 0)->generate('https://example.com'); // Warna merah
🟠 Menambahkan Margin
php
CopyEdit
QrCode::size(300)->margin(10)->generate('https://example.com');
🟢 Menambahkan Logo (Custom)
Untuk menambahkan logo di tengah QR Code, instal Intervention Image:
bash
CopyEdit
composer require intervention/image
Lalu gunakan kode berikut:
php
CopyEdit
use Intervention\Image\Facades\Image;

$qrCode = QrCode::format('png')->size(300)->generate('https://example.com');

$qrCodeImage = Image::make($qrCode);
$logo = Image::make(public_path('logo.png'))->resize(50, 50);

$qrCodeImage->insert($logo, 'center');

$qrCodeImage->save(public_path('qrcodes/custom-qrcode.png'));
📌 Hasil: QR Code dengan logo akan tersimpan di public/qrcodes/custom-qrcode.png.
________________________________________
Kesimpulan
1.	Instal paket simple-qrcode menggunakan Composer.
2.	Buat controller dan fungsi untuk generate QR Code.
3.	Tambahkan route agar QR Code bisa diakses melalui browser.
4.	Tampilkan QR Code di halaman web dengan Blade.
5.	Simpan QR Code sebagai file gambar di storage Laravel.
6.	Kustomisasi QR Code dengan warna, margin, dan logo.

