<?php
require_once "../app/models/Barang.php";
require_once "../app/models/Peminjaman.php";
require_once "../app/models/Ruangan.php";


class DashboardController{
    private $db;
    private $barangModel;
    private $kategoriModel;
    private $peminjamanModel;
    private $ruanganModel;

    public function __construct($db){
        $this->db = $db;
        $this->barangModel = new Barang($this->db);
        $this->peminjamanModel = new Peminjaman($this->db);
        $this->ruanganModel = new Ruangan($this->db);
    }

    public function index(){
        $total_barang = $this->barangModel->getTotalBarang();
        $total_peminjaman = $this->peminjamanModel->getTotalPeminjaman();
        $total_ruangan = $this->ruanganModel->getTotalRuangan();
        require_once "../app/views/dashboard/index.php";
    }
}