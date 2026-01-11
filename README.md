# Brat Generator

Keluarkan vibe brat Anda dengan setiap irama! Buat gambar teks yang bergaya dan dapat disesuaikan dengan warna-warna cerah dan estetika trendi.

## 🎨 Fitur

- **Input Teks Mudah**: Masukkan teks hingga 50 karakter dan lihat pratinjau secara real-time
- **Kustomisasi Warna**: Pilih dari 9 preset warna yang dirancang termasuk:
  - Brat Green (#8ace00)
  - Putih Klasik, Hitam, dan berbagai warna cerah
  - Opsi Biru, Kuning, Magenta, Cyan, Oranye, dan Pink
- **Perataan Teks**: Ratakan teks Anda ke kiri, tengah, atau kanan
- **Dukungan Mode Gelap**: Beralih antara tema terang dan gelap dengan penyimpanan lokal
- **Informasi PNG**: Gambar menyertakan informasi file untuk organisasi yang lebih baik
- **Unduh Sekali Klik**: Unduh gambar yang dihasilkan langsung ke perangkat Anda
- **Desain Responsif**: Bekerja dengan mulus di perangkat desktop dan mobile

## 🚀 Memulai

### Prasyarat
- PHP 7.0 atau lebih tinggi
- Server web (Apache, Nginx, dll.)
- Browser web modern dengan JavaScript diaktifkan

### Instalasi

1. Clone repository:
```bash
git clone https://github.com/ricoagista/Brat-Generator.git
cd Brat-Generator
```

2. Letakkan file proyek di server web Anda:
```
/var/www/html/Brat-Generator/  # atau root web Anda
```

3. Pastikan server web memiliki izin menulis untuk file sementara.

4. Akses aplikasi:
```
http://localhost/Brat-Generator/
```

## 📁 Struktur Proyek

```
Brat-Generator/
├── index.php           # Antarmuka HTML utama
├── generate.php        # Pembuatan gambar backend
├── script.js           # Interaktivitas frontend dan logika
├── style.css           # Gaya dan tema
└── assets/
    └── font.ttf        # Font kustom untuk rendering teks
```

## 💻 Cara Penggunaan

1. **Masukkan Teks**: Ketik teks yang diinginkan di bidang input (maks 50 karakter)
2. **Pilih Warna**: Klik preset warna atau pilih warna kustom Anda
3. **Atur Perataan**: Gunakan dropdown untuk memilih perataan kiri, tengah, atau kanan
4. **Pratinjau**: Lihat pratinjau real-time gambar Anda
5. **Unduh**: Klik tombol unduh untuk menyimpan gambar yang dihasilkan sebagai PNG

### Pintasan Keyboard & Tips
- Teks default adalah "brat" jika Anda membiarkan input kosong
- Jumlah karakter diperbarui secara real-time
- Preferensi tema disimpan di penyimpanan lokal browser Anda
- Semua gambar yang dihasilkan adalah format PNG dengan dukungan informasi lengkap

## 🛠️ Detail Teknis

### Frontend (JavaScript)
- Event listener untuk update real-time
- Pembuatan URL gambar dinamis dengan parameter
- Penyimpanan lokal untuk persistensi tema
- Pratinjau kanvas dengan efek fade

### Backend (PHP)
- Pembuatan gambar dinamis menggunakan library GD
- Penyisipan informasi PNG untuk deskripsi gambar
- Dukungan untuk penentuan posisi teks dan perataan kustom
- Rendering font dengan dukungan TTF

## 🎯 Cara Kerjanya

1. Pengguna memasukkan teks, memilih warna, dan memilih perataan
2. JavaScript membuat URL dengan parameter yang dikodekan
3. Permintaan dikirim ke `generate.php`
4. PHP membuat gambar PNG dengan:
   - Warna latar belakang kustom
   - Teks yang dirender dengan font yang dipilih
   - Perataan teks yang tepat
   - Informasi file untuk organisasi
5. Gambar dikembalikan ke browser untuk ditampilkan/diunduh

## 🌙 Dukungan Tema

Aplikasi ini menyertakan tombol toggle mode terang/gelap bawaan:
- Klik tombol tema (🌙 untuk mode terang, ☀️ untuk mode gelap)
- Preferensi Anda disimpan secara otomatis di penyimpanan lokal browser
- Tetap ada di seluruh sesi

## 📝 Lisensi

Proyek ini dilisensikan di bawah lisensi bebas. Siapa saja boleh menggunakan, memodifikasi, dan mendistribusikan kode ini sesuai kebutuhan mereka tanpa batasan.

## 👤 Penulis

[Rico Agista](https://github.com/ricoagista)

## 🤝 Berkontribusi

Kontribusi sangat diterima! Silakan:
1. Fork repository
2. Buat branch fitur (`git checkout -b feature/FiturBaru`)
3. Commit perubahan Anda (`git commit -m 'Tambah FiturBaru'`)
4. Push ke branch (`git push origin feature/FiturBaru`)
5. Buka Pull Request

## 📞 Dukungan

Jika Anda mengalami masalah atau memiliki pertanyaan, silakan buka issue di repository GitHub.

## 🚀 Peningkatan Masa Depan

- Opsi font tambahan
- Color picker kustom (di luar preset)
- Pembuatan gambar batch
- Integrasi media sosial untuk berbagi dengan mudah
- Efek teks animasi
- Opsi informasi file tambahan

---

**Selamat membuat vibe brat Anda! 🎨✨**
