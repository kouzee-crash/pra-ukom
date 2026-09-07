<?php
require_once '../app/models/Barang.php';
require_once '../app/models/ruangan.php';

class BarangController{
    private $db;
    private $barangModel;
    private $ruanganModel;

    public function __construct($db){
        $this->db = $db;
        $this->barangModel = new Barang($db);
        $this->ruanganModel = new Ruangan($db);
    }

    public function tampil(){
        $dataBarang = $this->barangModel->getAll();
        $resultRuangan = $this->ruanganModel->getAll();
        $aksiBarang = null;
        require_once '../app/views/barang/index.php';
    }

    public function tambah(){
        $this->tampil();
    }

    public function prosesTambah(){
        $data = array(
            'kode_barang' => $_POST['kode_barang'],
            'nama_barang' => $_POST['nama_barang'],
            'id_ruangan' => $_POST['id_ruangan'],
            'jumlah' => $_POST['jumlah'],
            'kondisi' => $_POST['kondisi']);

        $this->barangModel->tambahData($data);
        header("Location: index.php?page=barang");
    }

    public function edit(){
        $id = $_GET['id'];
        $dataBarang = $this->barangModel->getAll();
        $resultRuangan = $this->ruanganModel->getAll();
        $aksiBarang = $this->barangModel->getById($id);
        require_once '../app/views/barang/index.php';
    }

    public function prosesEdit(){
        $id = $_POST['id'];
        $data = array(
            'kode_barang' => $_POST['kode_barang'],
            'nama_barang' => $_POST['nama_barang'],
            'id_ruangan' => $_POST['id_ruangan'],
            'jumlah' => $_POST['jumlah'],
            'kondisi' => $_POST['kondisi']);

        $this->barangModel->updateData($id, $data);
        header("Location: index.php?page=barang");
    }

    public function hapus(){
        $id = $_GET['id'];
        $this->barangModel->deleteData($id);
        header("Location: index.php?page=barang");
    }
}