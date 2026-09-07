<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Ruangan - Inventaris Sekolah</title>
</head>
<body>
    <h2>Daftar Ruangan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Ruangan</th>
                <th>Nama Ruangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($dataRuangan as $ruangan):
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $ruangan['kode_ruangan']; ?></td>
                <td><?php echo $ruangan['nama_ruangan']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $ruangan['id_ruangan']; ?>">Edit</a>
                    <a href="hapus.php?id=<?php echo $ruangan['id_ruangan']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="tambah.php">Tambah Data</a>
</body>
</html>