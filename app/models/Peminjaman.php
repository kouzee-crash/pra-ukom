<?php 
class Peminjaman{
    private $db;
    private $table = "peminjaman";

    public function __construct($db){
        $this->db = $db;
    }

    public function getAll(){
        $query = mysqli_query($this->db,
        "SELECT peminjaman.*, barang.nama_barang, ruangan.nama_ruangan
        FROM " .$this->table . " LEFT JOIN barang ON peminjaman.id_barang = barang.id_barang
        LEFT JOIN ruangan ON barang.id_ruangan = ruangan.id_ruangan
        ORDER BY peminjaman.id_peminjaman ASC
        ");

        return mysqli_fetch_all($query,MYSQLI_ASSOC);
    }

    public function getById($id){
        $query = mysqli_query(
            $this->db,
            "SELECT * FROM " . $this->table . " WHERE id_peminjaman='$id'"
        );
        return mysqli_fetch_assoc($query);
    }

    public function getTotalPeminjaman(){
        $query = mysqli_query(
            $this->db,
            "SELECT COUNT(*) as total_peminjaman FROM " . $this->table
        );
        return mysqli_fetch_assoc($query);
    }

    public function tambahData($data){
        $id_barang = $data['id_barang'];
        $nama_peminjam = $data['nama_peminjam'];
        $tanggal_pinjam = $data['tanggal_pinjam'];
        $tanggal_kembali = $data['tanggal_kembali'];

        $query = mysqli_query(
            $this->db,
            "INSERT INTO " . $this->table . " (id_barang, nama_peminjam, tanggal_pinjam, tanggal_kembali)
            VALUES ('$id_barang', '$nama_peminjam', '$tanggal_pinjam', '$tanggal_kembali')");
            return $query;
    }

    public function updateData($id, $data){
        $id_barang = $data['id_barang'];
        $nama_peminjam = $data['nama_peminjam'];
        $tanggal_pinjam = $data['tanggal_pinjam'];
        $tanggal_kembali = $data['tanggal_kembali'];

        $query = mysqli_query(
            $this->db,
            "UPDATE " . $this->table . " SET id_barang='$id_barang', nama_peminjam='$nama_peminjam', tanggal_pinjam='$tanggal_pinjam', tanggal_kembali='$tanggal_kembali' WHERE id_peminjaman='$id'"
        );
        return $query;
    }

    public function hapusData($id){
        $query = mysqli_query(
            $this->db,
            "DELETE FROM " . $this->table . " WHERE id_peminjaman='$id'"
        );
        return $query;
    }
}