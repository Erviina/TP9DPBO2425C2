<?php
interface KontrakSponsor {
    public function getAllSponsor(): array;         // mengambil semua data sponsor dari database
    public function getSponsorById($id): ?array;    // mengambil satu sponsor berdasarkan ID
    public function addSponsor($nama, $negara, $kontrakMulai, $kontrakSelesai): void;           // menambahkan sponsor baru ke database
    public function updateSponsor($id, $nama, $negara, $kontrakMulai, $kontrakSelesai): void;   // mengupdate data sponsor berdasarkan ID
    public function deleteSponsor($id): void;        // menghapus sponsor dari database berdasarkan ID
}
?>
