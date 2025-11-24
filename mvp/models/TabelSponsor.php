<?php
include_once("DB.php");               // Mengimpor kelas DB untuk koneksi & eksekusi query
include_once("KontrakSponsor.php");   // Mengimpor kontrak interface yang harus diimplementasikan

class TabelSponsor extends DB implements KontrakSponsor {

    // Konstruktor memanggil parent untuk membuat koneksi ke database
    public function __construct($host, $db_name, $username, $password){
        parent::__construct($host, $db_name, $username, $password);
    }

    // Mengambil semua data sponsor dari tabel "sponsor"
    public function getAllSponsor(): array {
        $this->executeQuery("SELECT * FROM sponsor");  // Eksekusi query tanpa parameter
        return $this->getAllResult();                  // Kembalikan hasil seluruh baris
    }

    // Mengambil detail satu sponsor berdasarkan ID-nya
    public function getSponsorById($id): ?array {
        // Query dengan parameter binding untuk keamanan (mencegah SQL Injection)
        $this->executeQuery("SELECT * FROM sponsor WHERE id=:id", ['id'=>$id]);
        $results = $this->getAllResult();
        return $results[0] ?? null;   // Jika ada hasil, ambil baris pertama; jika tidak, null
    }

    // Menambahkan sponsor baru ke tabel
    public function addSponsor($nama, $negara, $kontrakMulai, $kontrakSelesai): void {
        $query = "INSERT INTO sponsor (nama, negara, kontrakMulai, kontrakSelesai)
                  VALUES (:nama, :negara, :kontrakMulai, :kontrakSelesai)";

        // Parameter dikirim dalam bentuk array asosiatif
        $params = [
            'nama'=>$nama,
            'negara'=>$negara,
            'kontrakMulai'=>$kontrakMulai,
            'kontrakSelesai'=>$kontrakSelesai
        ];

        $this->executeQuery($query, $params);  // Eksekusi query dengan parameter
    }

    // Mengupdate data sponsor berdasarkan ID
    public function updateSponsor($id, $nama, $negara, $kontrakMulai, $kontrakSelesai): void {
        $query = "UPDATE sponsor
                  SET nama=:nama, negara=:negara, kontrakMulai=:kontrakMulai, kontrakSelesai=:kontrakSelesai
                  WHERE id=:id";

        // Parameter update
        $params = [
            'id'=>$id,
            'nama'=>$nama,
            'negara'=>$negara,
            'kontrakMulai'=>$kontrakMulai,
            'kontrakSelesai'=>$kontrakSelesai
        ];

        $this->executeQuery($query, $params);  // Jalankan query update
    }

    // Menghapus sponsor berdasarkan ID
    public function deleteSponsor($id): void {
        $this->executeQuery("DELETE FROM sponsor WHERE id=:id", ['id'=>$id]);
    }
}
?>
