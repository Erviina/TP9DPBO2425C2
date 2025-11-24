<?php

// Mengimpor kelas DB yang mengatur koneksi database dan eksekusi query
include_once("models/DB.php");

// --- Model untuk tabel Pembalap ---
include("models/TabelPembalap.php");

// --- Model untuk tabel Sponsor ---
include("models/TabelSponsor.php");

// View untuk data pembalap (berisi HTML table & form pembalap)
include("views/ViewPembalap.php");

// View untuk data sponsor (berisi HTML table & form sponsor)
include("views/ViewSponsor.php");

// Presenter Pembalap: logika bisnis + menghubungkan model & view
include("presenters/PresenterPembalap.php");

// Presenter Sponsor: logika bisnis + penghubung model & view
include("presenters/PresenterSponsor.php");

// Objek untuk Pembalap
$tabelPembalap = new TabelPembalap('localhost', 'mvp_db', 'root', '');
$viewPembalap = new ViewPembalap();
$presenter = new PresenterPembalap($tabelPembalap, $viewPembalap);

// Objek untuk Sponsor
$tabelSponsor = new TabelSponsor('localhost','mvp_db','root','');
$viewSponsor = new ViewSponsor();
$presenterSponsor = new PresenterSponsor($tabelSponsor, $viewSponsor);

$screen = $_GET['screen'] ?? null;

switch($screen){

    // ----------- Pembalap -----------
    case 'add':   // Menampilkan form tambah pembalap
        echo $presenter->tampilkanFormPembalap();
        exit();

    case 'edit':  // Menampilkan form edit pembalap
        $id = $_GET['id'] ?? null;
        echo $presenter->tampilkanFormPembalap($id);
        exit();

    case 'delete': // Menghapus pembalap
        $id = $_GET['id'] ?? null;
        if($id) $presenter->hapusPembalap($id);
        header("Location: index.php");
        exit();


    // ----------- Sponsor -----------
    case 'add_sponsor': // Form tambah sponsor
        echo $presenterSponsor->tampilkanFormSponsor();
        exit();

    case 'edit_sponsor': // Form edit sponsor
        $id = $_GET['id'] ?? null;
        echo $presenterSponsor->tampilkanFormSponsor($id);
        exit();

    case 'delete_sponsor': // Hapus sponsor
        $id = $_GET['id'] ?? null;
        if($id) $presenterSponsor->hapusSponsor($id);
        header("Location: index.php");
        exit();
}


// handle POST (proses form sumbit)


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $action = $_POST['action'] ?? '';

    // ====== POST Pembalap ======
    if(isset($_POST['pembalap'])){

        // Ambil nilai dari form
        $id = $_POST['id'] ?? null;
        $nama = $_POST['nama'] ?? '';
        $tim = $_POST['tim'] ?? '';
        $negara = $_POST['negara'] ?? '';
        $poinMusim = $_POST['poinMusim'] ?? 0;
        $jumlahMenang = $_POST['jumlahMenang'] ?? 0;

        // Tentukan aksi
        if($action === 'add'){
            // Tambah pembalap baru
            $presenter->tambahPembalap($nama, $tim, $negara, $poinMusim, $jumlahMenang);
        } 
        elseif($action === 'edit' && $id){
            // Update pembalap
            $presenter->ubahPembalap($id, $nama, $tim, $negara, $poinMusim, $jumlahMenang);
        }

        // Kembali ke halaman utama
        header("Location: index.php");
        exit();
    }


    // ====== POST Sponsor ======
    if(isset($_POST['sponsor'])){

        // Ambil input dari form
        $id = $_POST['id'] ?? null;
        $nama = $_POST['nama'] ?? '';
        $negara = $_POST['negara'] ?? '';
        $kontrakMulai = $_POST['kontrakMulai'] ?? null;
        $kontrakSelesai = $_POST['kontrakSelesai'] ?? null;

        // Cek aksi
        if($action === 'add'){
            $presenterSponsor->tambahSponsor($nama, $negara, $kontrakMulai, $kontrakSelesai);
        } 
        elseif($action === 'edit' && $id){
            $presenterSponsor->ubahSponsor($id, $nama, $negara, $kontrakMulai, $kontrakSelesai);
        }

        header("Location: index.php");
        exit();
    }
}


// Jika tidak ada GET/POST, tampilkan list pembalap & sponsor

echo "<h2>Pembalap</h2>";
echo $presenter->tampilkanPembalap();

echo "<hr>";

echo "<h2>Sponsor</h2>";
echo $presenterSponsor->tampilkanSponsor();

?>
