<?php

class Pembalap{
    // properti private agar hanya bisa diakses melalui getter/setter
    private $id;
    private $nama;
    private $tim;
    private $negara;
    private $poinMusim;
    private $jumlahMenang;

    // constructor untuk menginisialisasi object Pembalap
    public function __construct($id, $nama, $tim, $negara, $poinMusim, $jumlahMenang){
        $this->id = $id;
        $this->nama = $nama;
        $this->tim = $tim;
        $this->negara = $negara;
        $this->poinMusim = $poinMusim;
        $this->jumlahMenang = $jumlahMenang;
    }

    // getter mengambil nilai properti
    public function getId(){
        return $this->id;
    }
    public function getNama(){
        return $this->nama;
    }
    public function getTim(){
        return $this->tim;
    }
    public function getNegara(){
        return $this->negara;
    }
    public function getPoinMusim(){
        return $this->poinMusim;
    }
    public function getJumlahMenang(){
        return $this->jumlahMenang;
    }

    // setter mengubah nilai properti
    public function setNama($nama){
        $this->nama = $nama;
    }
    public function setTim($tim){
        $this->tim = $tim;
    }
    public function setNegara($negara){
        $this->negara = $negara;
    }
    public function setPoinMusim($poinMusim){
        $this->poinMusim = $poinMusim;
    }
    public function setJumlahMenang($jumlahMenang){
        $this->jumlahMenang = $jumlahMenang;
    }
}
?>