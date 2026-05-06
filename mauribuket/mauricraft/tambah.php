<?php
session_start();
include 'koneksi.php';
if(isset($_POST['simpan'])){
    $nama = $_POST['nama_produk'];
    $kat  = $_POST['kategori'];
    $hrg  = $_POST['harga'];
    
    // Proses Upload Gambar
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = './img/';

    move_uploaded_file($source, $folder.$nama_file);
    
    // Masukkan ke database
    $insert = mysqli_query($conn, "INSERT INTO produk (nama_produk, kategori, harga, gambar) 
                                   VALUES ('$nama', '$kat', '$hrg', '$nama_file')");
    
    if($insert){
        echo "<script>alert('Produk Mauricraft Berhasil Ditambah!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambah produk: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk - Mauricraft</title>
    <!-- Menggunakan Bootstrap agar tampilan form cantik -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #fce4ec;">

<div class="container mt-5">
    <div class="card mx-auto shadow-sm" style="max-width: 500px; border-radius: 15px;">
        <div class="card-body p-4">
            <h4 class="text-center fw-bold mb-4">Input Produk Mauricraft</h4>
            
            <!-- ATRIBUT WAJIB: enctype="multipart/form-data" agar bisa upload foto -->
            <form method="POST" action="" enctype="multipart/form-data">
                
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" placeholder="Contoh: Buket Bunga Kawat Bulu" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Buket">Buket</option>
                        <option value="Vas Bunga">Vas Bunga</option>
                        <option value="Keychain">Keychain</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control" placeholder="Masukan angka saja" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Produk</label>
                    <input type="file" name="gambar" class="form-control" required>
                    <small class="text-muted">Pastikan folder 'img' sudah Anda buat</small>
                </div>

                <hr>
                <button type="submit" name="simpan" class="btn btn-primary w-100 py-2">Simpan ke Katalog</button>
                <a href="admin.php" class="btn btn-light w-100 mt-2">Batal</a>
                
            </form>
        </div>
    </div>
</div>

</body>
</html>