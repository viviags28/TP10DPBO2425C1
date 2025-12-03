# Janji
Saya Vivi Agustina Suryana dengan NIM 2400456 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek Untuk keberkahan-Nya, maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan.

# Jadwal Idol Management System

## Struktur Database
Database: `jadwal_idol`  

<img width="876" height="208" alt="image" src="https://github.com/user-attachments/assets/0d0832a2-13b3-40f0-815c-e66224d10901" />


Tabel-tabel utama:
1. **agensi**  
   - Menyimpan informasi agensi (nama, alamat, kontak).  
   - Contoh: YG, SM, MAPPA.  

2. **idol**  
   - Menyimpan data idol (nama, umur, grup, agensi_id).  
   - Relasi: banyak idol → satu agensi.  

3. **event**  
   - Menyimpan data event (nama_event, lokasi, tipe_event).  
   - Contoh: Winter Live Showcase, Asian Games, Fansign.  

4. **jadwal**  
   - Menyimpan jadwal idol mengikuti event (idol_id, event_id, tanggal, jam).  
   - Relasi: banyak jadwal → satu idol & satu event.  

---

## Struktur Folder Proyek
```
jadwal_idol/
│
├── config/
│   └── Database.php                # Koneksi & konfigurasi database (PDO)
│
│
├── models/                         # Model adalah representasi tabel DB
│   ├── Idol.php                    # CRUD untuk tabel idol
│   ├── Event.php                   # CRUD untuk tabel event
│   ├── Jadwal.php                  # CRUD untuk tabel jadwal
│   └── Agensi.php                  # CRUD untuk tabel agensi
│
├── viewmodels/                     # ViewModel adalah penghubung model ↔ view
│   ├── IdolViewModel.php           # Logic untuk Idol + ambil list agensi
│   ├── EventViewModel.php          # Logic untuk Event
│   ├── JadwalViewModel.php         # Logic untuk Jadwal + ambil list idol & event
│   └── AgensiViewModel.php         # Logic untuk Agensi
│
├── views/                          # Semua view CRUD + template
│   ├── template/                   # Template umum
│   │   ├── header.php              # Header HTML + navbar
│   │   └── footer.php              # Footer HTML
│   │
│   ├── idol_list.php               # List semua idol + tombol edit/hapus
│   ├── idol_form.php               # Form tambah/edit idol + dropdown agensi
│   ├── event_list.php              # List semua event
│   ├── event_form.php              # Form tambah/edit event
│   ├── jadwal_list.php             # List semua jadwal
│   ├── jadwal_form.php             # Form tambah/edit jadwal + dropdown idol/event
│   ├── agensi_list.php             # List semua agensi
│   └── agensi_form.php             # Form tambah/edit agensi
│
└── index.php                       # Router utama aplikasi (entity & action)
```

---

## Alur Program
1. **Routing**
   - `index.php` menangani URL dengan parameter:
     - `entity` → menentukan tabel yang akan diakses (`idol`, `event`, `jadwal`, `agensi`)
     - `action` → aksi CRUD (`list`, `add`, `edit`, `save`, `update`, `delete`)

2. **Model**
   - Berisi CRUD langsung ke database.
   - Contoh: `Idol.php` memiliki method `getAll()`, `getById()`, `create()`, `update()`, `delete()`.

3. **ViewModel**
   - Menghubungkan **view** dengan **model**.
   - Menambahkan logika seperti mengambil data tambahan untuk dropdown.
   - Contoh: `JadwalViewModel.php` mengambil daftar semua idol & event untuk form.

4. **View**
   - File PHP untuk menampilkan data di browser.
   - `*_list.php` → tabel daftar data.
   - `*_form.php` → form tambah/edit data.
   - Semua halaman memakai template `header.php` & `footer.php` untuk konsistensi tampilan.

5. **Proses CRUD**
   - **Create / Save:** Submit form → panggil ViewModel → insert ke DB → redirect ke list.
   - **Read / List:** Ambil semua data → tampilkan di tabel.
   - **Update:** Edit form → submit → update DB → redirect ke list.
   - **Delete:** Klik tombol hapus → hapus data → redirect ke list.

---

# Dokumentasi
<<<<<<< HEAD
=======

## Tampilan Awal Agensi

<img width="1366" height="720" alt="1  Tampilan Awal Agensi" src="https://github.com/user-attachments/assets/22e7d7b6-0f3e-4593-bdc7-bf4419f3a848" />


## Tampilan Awal Idol

<img width="1366" height="777" alt="2  Tampilan Awal Idol" src="https://github.com/user-attachments/assets/ada1860b-6185-41bc-88e0-7d428f432c6c" />


## Tampilan Awal Event

<img width="1366" height="720" alt="3  Tampilan Awal Event" src="https://github.com/user-attachments/assets/ffaf098a-0520-4a45-99a9-fab5b0105936" />


## Tampilan Awal Jadwal

<img width="1366" height="720" alt="4  Tampilan Awal Jadwal" src="https://github.com/user-attachments/assets/25cae3b3-a40e-4956-9cea-87a5192e9a18" />


## Full Implementasi CRUD


https://github.com/user-attachments/assets/7b4d66b7-b153-4e63-9f12-a784831eeed1



>>>>>>> 11580f9ac0a209166ade4016f9e0da3a2ee789cd
