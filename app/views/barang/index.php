<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang - Inventaris Sekolah</title>
</head>
<body>
    <h2>Daftar Barang</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Ruangan</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($dataBarang as $barang):
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $barang['kode_barang']; ?></td>
                <td><?php echo $barang['nama_barang']; ?></td>
                <td><?php echo $barang['nama_ruangan']; ?></td>
                <td><?php echo $barang['jumlah']; ?></td>
                <td><?php echo $barang['kondisi']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $barang['id_barang']; ?>">Edit</a>
                    <a href="hapus.php?id=<?php echo $barang['id_barang']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="tambah.php">Tambah Data</a>
</body>
</html>