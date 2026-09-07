<?php

class Barang{
    private $db;
    private $table = "barang";

    public function __construct($db){
        $this->db = $db;
    }

    public function getAll(){
        $query = mysqli_query($this->db,
        "SELECT barang.*, ruangan.nama_ruangan
        FROM " .$this->table . " LEFT JOIN ruangan ON barang.id_ruangan = ruangan.id_ruangan
        ORDER BY barang.id_barang ASC
");

        return mysqli_fetch_all($query,MYSQLI_ASSOC);
    }

    public function getById($id){
        $query = mysqli_query(
            $this->db,
            "SELECT * FROM " . $this->table . " WHERE id_barang='$id'"
        );
        return mysqli_fetch_assoc($query);
    }

    public function getTotalBarang(){
        $query = mysqli_query(
            $this->db,
            "SELECT COUNT(*) as total_barang FROM " . $this->table
        );
        return mysqli_fetch_assoc($query);
    }

    public function tambahData($data){
        $kode_barang = $data['kode_barang'];
        $nama_barang = $data['nama_barang'];
        $id_ruangan = $data['id_ruangan'];
        $jumlah = $data['jumlah'];
        $kondisi = $data['kondisi'];

        $query = mysqli_query(
            $this->db,
            "INSERT INTO " . $this->table . " (kode_barang, nama_barang, id_ruangan, jumlah, kondisi)
            VALUES ('$kode_barang', '$nama_barang', '$id_ruangan', '$jumlah', '$kondisi')");
            return $query;
    }

    public function updateData($id, $data){
        $kode_barang = $data['kode_barang'];
        $nama_barang = $data['nama_barang'];
        $id_ruangan = $data['id_ruangan'];
        $jumlah = $data['jumlah'];
        $kondisi = $data['kondisi'];

        $query = mysqli_query(
            $this->db,
            "UPDATE " . $this->table . " SET kode_barang='$kode_barang', nama_barang='$nama_barang', id_ruangan='$id_ruangan', jumlah='$jumlah', kondisi='$kondisi' WHERE id_barang='$id'"
        );
        return $query;
    }

    public function deleteData($id){
        $query = mysqli_query(
            $this->db,
            "DELETE FROM " . $this->table . " WHERE id_barang='$id'"
        );
        return $query;
    }
}