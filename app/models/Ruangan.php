<?php 

class Ruangan {
    private $db;
    private $table = "ruangan";

    public function __construct($db){
        $this->db = $db;
    }

    public function getAll(){
        $query = mysqli_query($this->db, "SELECT * FROM " . $this->table . " ORDER BY id_ruangan ASC");
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    public function getById($id){
        $query = mysqli_query($this->db, "SELECT * FROM " . $this->table . " WHERE id_ruangan='$id'");
        return mysqli_fetch_assoc($query);
    }

    public function getTotalRuangan(){
        $query = mysqli_query($this->db, "SELECT COUNT(*) as total_ruangan FROM " . $this->table);
        return mysqli_fetch_assoc($query);
    }

    public function tambahData($data){
        $nama_ruangan = $data['nama_ruangan'];
        $lokasi = $data['lokasi'];

        $query = mysqli_query(
            $this->db,
            "INSERT INTO " . $this->table . " (nama_ruangan, lokasi) VALUES ('$nama_ruangan', '$lokasi')"
        );
        return $query;
    }

    public function updateData($id, $data){
        $nama_ruangan = $data['nama_ruangan'];
        $lokasi = $data['lokasi'];

        $query = mysqli_query(
            $this->db,
            "UPDATE " . $this->table . " SET nama_ruangan='$nama_ruangan', lokasi='$lokasi' WHERE id_ruangan='$id'"
        );
        return $query;
    }

    public function hapusData($id){
        $query = mysqli_query(
            $this->db,
            "DELETE FROM " . $this->table . " WHERE id_ruangan='$id'"
        );
        return $query;
    }
}