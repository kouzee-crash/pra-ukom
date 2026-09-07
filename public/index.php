<?php
require_once "../app/config/database.php";
require_once "../app/controllers/dashboardController.php";
require_once "../app/models/Barang.php";
require_once "../app/controllers/barangController.php";

$db = new Database();

// Tentukan controller default jika tidak ada parameter 'page' atau 'controller'
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'dashboard';
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

// Routing pemilihan Controller
if ($page == 'dashboard') {
    $controller = new DashboardController($db->getConnection());
    $controller->index();
}
elseif ($page == 'barang') {
    $controller = new BarangController($db->getConnection());
    $controller->tampil();

    /*if ($action == "tambah") {
    $controller->prosesTambah();
} elseif ($action == "hapus") {
    $controller->hapus();
} elseif ($action == "edit") {
    $controller->edit();
} elseif ($action == "prosesEdit") {
    $controller->prosesEdit();
} else {
    $controller->tampil();
}
}
elseif ($page == 'peminjaman') {
    $controller = new PeminjamanController($db);
    $controller->tampil();

    if ($action == "tambah") {
        $controller->prosesTambah();
    } elseif ($action == "hapus") {
        $controller->hapus();
    } elseif ($action == "edit") {
        $controller->edit();
    } elseif ($action == "prosesEdit") {
        $controller->prosesEdit();
    } else {
        $controller->tampil();
    }
} 
elseif ($page == 'ruangan') {
    require_once "../app/controllers/ruanganController.php";
    $controller = new RuanganController();
    $controller->tampil();

    if ($action == "tambah") {
        $controller->prosesTambah();
    } elseif ($action == "hapus") {
        $controller->hapus();
    } elseif ($action == "edit") {
        $controller->edit();
    } elseif ($action == "prosesEdit") {
        $controller->prosesEdit();
    } else {
        $controller->tampil();
    }*/
}
else {
    echo "Halaman tidak ditemukan.";
}


