<?php
include_once(__DIR__ . '/../models/TabelSponsor.php');
include_once(__DIR__ . '/../views/ViewSponsor.php');

class PresenterSponsor {

    private $tabelSponsor;
    private $viewSponsor;
    private $listSponsor = [];

    public function __construct($tabelSponsor, $viewSponsor){
        $this->tabelSponsor = $tabelSponsor;
        $this->viewSponsor = $viewSponsor;
        $this->initListSponsor();
    }

    public function initListSponsor(){
        $this->listSponsor = $this->tabelSponsor->getAllSponsor();
    }

    public function tampilkanSponsor(): string {
        return $this->viewSponsor->tampilSponsor($this->listSponsor);
    }

    public function tampilkanFormSponsor($id = null): string {
        $data = $id !== null ? $this->tabelSponsor->getSponsorById($id) : null;
        return $this->viewSponsor->tampilFormSponsor($data);
    }

    public function tambahSponsor($nama, $negara, $kontrakMulai, $kontrakSelesai): void {
        $this->tabelSponsor->addSponsor($nama, $negara, $kontrakMulai, $kontrakSelesai);
        $this->initListSponsor();
    }

    public function ubahSponsor($id, $nama, $negara, $kontrakMulai, $kontrakSelesai): void {
        $this->tabelSponsor->updateSponsor($id, $nama, $negara, $kontrakMulai, $kontrakSelesai);
        $this->initListSponsor();
    }

    public function hapusSponsor($id): void {
        $this->tabelSponsor->deleteSponsor($id);
        $this->initListSponsor();
    }

}
?>
