<?php
session_start();
// Cek apakah admin sudah login atau belum
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php");
    exit;
}

include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MauriCraft - Dashboard Katalog</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body { background-color: #f7bace; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar { background: white; border-bottom: 2px solid #f7f6f4; }
        .navbar-brand { font-weight: bold; color: #b9989d !important; }
        
        .hero-header {
            background: linear-gradient(135deg, #f7bace 0%, #bfdff5 100%);
            padding: 60px 0;
            text-align: center;
            margin-bottom: 30px;
        }

        .card-produk {
            border: none;
            border-radius: 15px;
            transition: 0.3s;
            background: white;
            overflow: hidden;
        }
        .card-produk:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(200, 100, 124, 0.1);
        }
        .img-produk {
            height: 250px;
            object-fit: cover;
        }

        .btn-wa { background-color: #ca8993; border: none; color: white; font-weight: bold; border-radius: 10px; }
        .btn-wa:hover { background-color: #d3a7af; color: white; }

        .btn-shopee { background-color: #7ea3c2; border: none; color: white; font-weight: bold; border-radius: 10px; }
        .btn-shopee:hover { background-color: #7e9fc4; color: white; }

        footer { background-color: #212529; }
    </style>
</head>
<body>

<!-- Navbar dengan Logo -->
<nav class="navbar navbar-expand-lg sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold" href="index.php">
            <!-- Logo Gambar -->
            <img src="logo mauricraft.jpeg" alt="Logo Mauri Craft" width="40" height="40" class="d-inline-block align-text-top me-2" style="border-radius: 50%;">
            MauriCraft
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto d-flex align-items-center">
                <a class="nav-link me-3 fw-bold text-success" href="admin.php">
                    Admin
                </a>
                <a class="btn btn-danger btn-sm px-3 text-white" href="logout.php" onclick="return confirm('Apakah Anda yakin ingin logout?')">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero-header">
    <div class="container">
        <h1 class="display-5 fw-bold" style="color: #6a5acd;">Poduk Handmade MauriCraft</h1>
        <p class="lead text-muted">Buket Bunga, Vas, dan Keychain Kawat Bulu.</p>
    </div>
</div>

<!-- Katalog Produk -->
<div class="container mb-5">
    <div class="row g-4">
        <?php
        $sql = "SELECT * FROM produk ORDER BY id DESC";
        $query = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($query) > 0) {
            while($p = mysqli_fetch_array($query)) {
        ?>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card card-produk shadow-sm h-100">
                <!-- Gambar Produk -->
                <img src="img/<?php echo $p['gambar']; ?>" class="card-img-top img-produk" alt="<?php echo $p['nama_produk']; ?>">
                
                <div class="card-body d-flex flex-column text-center">
                    <p class="text-muted small mb-1"><?php echo $p['kategori']; ?></p>
                    <h6 class="fw-bold mb-2"><?php echo $p['nama_produk']; ?></h6>
                    <p class="text-primary fw-bold mb-3">Rp <?php echo number_format($p['harga'], 0, ',', '.'); ?></p>
                    
                    <!-- Link WhatsApp -->
                    <a href="https://wa.me/62882003041536?text=Halo kak, saya tertarik dengan produk <?php echo $p['nama_produk']; ?>" 
                       target="_blank" class="btn btn-wa mb-2 mt-auto py-2">
                         Pesan via WA
                    </a>
                    <!-- Tombol Pesan via Shopee (Baru) -->
                    <a href="https://shopee.co.id/mauri.ridaa" 
                       target="_blank" class="btn btn-shopee btn-sm py-2">
                         <i class="bi bi-bag-check"></i> Pesan via Shopee
                    </a>
                </div>
            </div>
        </div>
        <?php 
            }
        } else {
            echo "<div class='text-center w-100 mt-5'><p class='text-muted'>Belum ada produk.</p></div>";
        }
        ?>
    </div>
</div>

<!-- Footer (Instagram & Shopee ada di sini) -->
<footer class="text-white pt-5 pb-4">
    <div class="container text-center text-md-start">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">MauriCraft</h5>
                <p>Handmade buket & keychain berkualitas dari Jogja. Open request model dan warna!</p>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact MauriCraft</h5>
                <p><i class="bi bi-instagram me-2"></i> @mauricraft.id</p>
                <p><i class="bi bi-whatsapp me-2"></i> 0882-0030-41536</p>
                <p><i class="bi bi-tiktok me-2"></i> mauricraft.id</p>
                <p><i class="bi bi-geo-alt me-2"></i> Jogja</p>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3 text-center">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Sosmed MauriCraft</h5>
                <a href="https://www.instagram.com/mauricraft.id/" target="_blank" class="btn btn-outline-light mb-2 btn-sm w-100">DM Instagram</a>
                <a href="https://www.tiktok.com/@mauricraft.id" target="_blank" class="btn btn-outline-light btn-sm w-100">Tiktok</a> 
            </div>
        </div>
        <hr class="my-4">
        <div class="text-center">
            <p>© 2026 Mauri Craft - All Rights Reserved</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

