# Foto Staff dan Guru SMKN 4 Bogor

## Cara Menambahkan Foto Staff

### 1. Format File
- **Format**: JPG atau PNG
- **Ukuran**: Minimal 300x300 pixels (akan di-crop menjadi lingkaran)
- **Rasio**: 1:1 (persegi) untuk hasil terbaik
- **Kualitas**: High quality, jelas, dan profesional

### 2. Nama File
Gunakan nama file sesuai dengan nama staff yang sebenarnya:

```
ABDUL RACHMAN, A.Ma.Pust.jpg      - Kepala Sekolah
ACHMAD KHAER.jpg                  - Wakil Kepala Sekolah
MUJIONO, S.KOM.jpg               - Guru PPLG
IWAN SETIAWAN.jpg                - Guru TJKT
WAWAN NUGRAHA.jpg                - Guru TO
SUDARYANTO.jpg                   - Guru TPFL
DRA. DIDAH NURUL HIDAYAH.jpg     - Staff Tata Usaha
ATIKAH, S.I.Pust.jpg             - Pustakawan
```

### 3. Cara Upload
1. Simpan foto dengan nama yang sesuai di folder ini
2. Pastikan format file adalah .jpg atau .png
3. Foto akan otomatis muncul di halaman informasi
4. Jika foto tidak ada, akan muncul icon default

### 4. Tips Foto
- **Pose**: Formal, tersenyum, menghadap kamera
- **Background**: Netral atau background sekolah
- **Pakaian**: Seragam sekolah atau pakaian formal
- **Lighting**: Cukup terang, tidak terlalu gelap atau terang
- **Crop**: Foto akan di-crop menjadi lingkaran, pastikan wajah di tengah

### 5. Fallback System
Jika foto tidak ditemukan, sistem akan menampilkan:
- Icon default sesuai dengan posisi staff
- Warna background biru gradient
- Tetap terlihat profesional

## Struktur Folder
```
public/images/staff/
├── README.md
├── ABDUL RACHMAN, A.Ma.Pust.jpg
├── ACHMAD KHAER.jpg
├── MUJIONO, S.KOM.jpg
├── IWAN SETIAWAN.jpg
├── WAWAN NUGRAHA.jpg
├── SUDARYANTO.jpg
├── DRA. DIDAH NURUL HIDAYAH.jpg
└── ATIKAH, S.I.Pust.jpg
```

## Update Staff Baru
Jika ada staff baru, tambahkan:
1. Foto dengan nama yang sesuai
2. Update data di file `resources/views/user/informasi.blade.php`
3. Pastikan nama file sesuai dengan yang digunakan di kode
