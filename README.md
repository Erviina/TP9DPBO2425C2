Saya Ervina Kusnanda dengan NIM 2409082 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain Pemogramana Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

## Desain Program ##

1. MODEL (/models)
   Model bertugas mengurus:
   - koneksi database (DB.php)
   - query ke tabel (TabelPembalap.php, TabelSponsor.php)
   - struktur objek data (Pembalap.php)
   
   Fungsi model:
   - Mengambil semua pembalap, getAllPembalap()
   - Mengambil pembalap by ID, getPembalapById()
   - Insert pembalap, addPembalap()
   - Update pembalap, updatePembalap()
   - Delete pembalap, deletePembalap()

2. VIEW (/views)
   View bertugas:
   - menampilkan tabel pembalap/sponsor
   - menampilkan form input (tambah/edit)
   - menerima data dari presenter, tapi TIDAK BOLEH query langsung
   
   File penting:
   - ViewPembalap.php
   - ViewSponsor.php
   - KontrakView.php (interface view pembalap)
   - KontrakSponsorView.php (interface view sponsor)
   
   View tidak boleh:
   - mengakses database
   - mengubah data
   - menjalankan logika bisnis

   View hanya: merender HTML

3. PRESENTER ( /presenters)
   Presenter adalah otak dari program, bertugas:
   - Mengambil data dari Model
   - Mengirim data ke View
   - Mengatur alur aplikasi (tambah, edit, hapus)
   - Menghubungkan index.php dengan Model dan View
   
   File penting:
   - PresenterPembalap.php
   - PresenterSponsor.php
   - KontrakPresenter.php (interface presenter pembalap)

4. INDEX (/index.php)
   index.php bertugas:
   - menerima request screen=add, screen=edit, screen=delete
   - membuat instance Model, View, Presenter
   - memanggil presenter sesuai kebutuhan


## Alur Program ##

1. Menampilkan daftar pembalap
   User membuka browser, index.php?screen=list

   index.php membuat:
   - TabelPembalap (model)
   - ViewPembalap (view)
   - PresenterPembalap (presenter)
   - Presenter memanggil:
   - initListPembalap()
   
   untuk mengambil semua data dari database, model

   Presenter mengirim data ke view:
   $this->viewPembalap->tampilPembalap($this->listPembalap)
   View merender skin.html dan menampilkan tabel.

2. User klik tombol EDIT
   - User klik: index.php?screen=edit&id=3
   - index.php memanggil:PresenterPembalap->tampilkanFormPembalap(3)
   - Presenter ambil data pembalap berdasarkan ID:$data = $this->tabelPembalap->getPembalapById(3)
   - Presenter ambil dropdown sponsor: $listSponsor = $this->tabelSponsor->getAllSponsor()
   - Presenter mengirim ke view:tampilFormPembalap($data, $listSponsor)
   - View mengisi form (nama, negara, sponsor, dll) dengan data yang benar.

3. User klik SIMPAN (edit / tambah)
   - Form mengirim POST ke:index.php?screen=save
   - index.php membaca:apakah ada $_POST['id']
   - apakah ini tambah atau update
   - Jika tambah:$presenter->tambahPembalap(...)
   - Jika edit:$presenter->ubahPembalap(...)
   - Presenter memanggil model untuk mengeksekusi SQL INSERT / UPDATE
   - Presenter memanggil ulang list:initListPembalap()
   - Kembali ke halaman tabel.

4. User klik HAPUS
   - User klik:index.php?screen=delete&id=4
   - index.php memanggil:$presenter->hapusPembalap(4)
   - Presenter → model:deletePembalap(4)
   - Data terhapus → kembali ke tabel.


## Dokumentasi ##
![add pembalap](https://github.com/Erviina/TP9DPBO2425C2/blob/main/Dokumentasi/addPembalap.gif?raw=true)

![edit pembalap](https://github.com/Erviina/TP9DPBO2425C2/blob/main/Dokumentasi/editPembalap.gif?raw=true)

![hapus pembalap](https://github.com/Erviina/TP9DPBO2425C2/blob/main/Dokumentasi/hapusPembalap.gif?raw=true) 

![add sponsor](https://github.com/Erviina/TP9DPBO2425C2/blob/main/Dokumentasi/addSponsor.gif?raw=true) 

![edit sponsor](https://github.com/Erviina/TP9DPBO2425C2/blob/main/Dokumentasi/editSponsor.gif?raw=true) 

![hapus sponsor](https://github.com/Erviina/TP9DPBO2425C2/blob/main/Dokumentasi/hapusSponsor.gif?raw=true) 


