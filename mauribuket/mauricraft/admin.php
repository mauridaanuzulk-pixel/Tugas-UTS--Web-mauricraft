<?php
session_start();
if($_SESSION['status']!="login"){ header("location:login.php"); }
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4 p-4 bg-blue shadow-sm" style="border-radius: 15px;">
    <h2>Kelola Katalog MauriCraft</h2>
    <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Produk</a>
    <a href="logout.php" class="btn btn-danger mb-3 float-end">Logout</a>
    
    <table class="table table-hover">
        <thead>
            <tr><th>Gambar</th><th>Nama</th><th>Kategori</th><th>Harga</th><th>Aksi</th></tr>
        </thead>
        <tbody>
    <?php
    $data = mysqli_query($conn, "SELECT * FROM produk");
    while($row = mysqli_fetch_array($data)){
    ?>
    <tr>
        <!-- 1. Kolom Gambar -->
        <td class="align-middle">
            <img src="img/<?php echo $row['gambar']; ?>" width="60" style="border-radius: 5px;">
        </td>
        
        <!-- 2. Kolom Nama -->
        <td class="align-middle"><?php echo $row['nama_produk']; ?></td>
        
        <!-- 3. Kolom Kategori -->
        <td class="align-middle"><?php echo $row['kategori']; ?></td>
        
        <!-- 4. Kolom Harga -->
        <td class="align-middle">Rp <?php echo number_format($row['harga']); ?></td>
        
        <!-- 5. Kolom Aksi (Tombol Edit & Hapus ditaruh di sini) -->
        <td class="align-middle text-center">
            <!-- Tombol Edit -->
            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
            
            <!-- Tombol Hapus (Menggunakan parameter ?hapus= sesuai URL Anda yang terakhir) -->
            <a href="hapus.php?hapus=<?php echo $row['id']; ?>" 
               class="btn btn-danger btn-sm" 
               onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</tbody>
    </table>
</div>
</body>
</html>