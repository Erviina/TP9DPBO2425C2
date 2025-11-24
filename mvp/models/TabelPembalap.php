<?php

include_once ("models/DB.php");
include_once ("KontrakModel.php");

class TabelPembalap extends DB implements KontrakModel {

    // Konstruktor untuk inisialisasi database dan melakukan koneksi database
    public function __construct($host, $db_name, $username, $password) {
        parent::__construct($host, $db_name, $username, $password);
    }

    // Method untuk mendapatkan semua pembalap dari tabel
    public function getAllPembalap(): array {
        $query = "SELECT *FROM pembalap";
        $this->executeQuery($query);    // menjalankan query
        return $this->getAllResult();   // mengembalikan seluruh hasil
    }

    // mengambil satu pembalap berdasarkan ID
    public function getPembalapById($id): ?array {
        // query menggunakan parameter :id
        $this->executeQuery("SELECT * FROM pembalap WHERE id = :id", ['id' => $id]);

        // ambil semua hasil
        $results = $this->getAllResult();

        // jika ada data, return data pertama. Jika tidak, return null.
        return $results[0] ?? null;
    }

    // create
    public function addPembalap($nama, $tim, $negara, $poinMusim, $jumlahMenang): void {
        //query insert
       $query = "INSERT INTO pembalap (nama, tim, negara, poinMusim, jumlahMenang) 
                  VALUES (:nama, :tim, :negara, :poinMusim, :jumlahMenang)";
        
        // Data yang akan di-binding ke query
        $params = [
            'nama' => $nama,
            'tim' => $tim,
            'negara' => $negara,
            'poinMusim' => $poinMusim,
            'jumlahMenang' => $jumlahMenang
        ];

        // eksekusi insert
        $this->executeQuery($query, $params);
    }

    // update
    public function updatePembalap($id, $nama, $tim, $negara, $poinMusim, $jumlahMenang): void {

        // Query update
        $query = "UPDATE pembalap 
                  SET nama = :nama, tim = :tim, negara = :negara, poinMusim = :poinMusim, jumlahMenang = :jumlahMenang
                  WHERE id = :id";

        $params = [
            'id' => $id,
            'nama' => $nama,
            'tim' => $tim,
            'negara' => $negara,
            'poinMusim' => $poinMusim,
            'jumlahMenang' => $jumlahMenang
        ];

        // eksekusi update
        $this->executeQuery($query, $params);
    }

    // delete
    public function deletePembalap($id): void {
        $query = "DELETE FROM pembalap WHERE id = :id";

        // Hapus berdasarkan id
        $this->executeQuery($query, ['id' => $id]);
    }

}

?>