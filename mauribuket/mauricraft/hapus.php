<?php
session_start();
include 'koneksi.php';

// Pastikan hanya admin yang bisa hapus
if($_SESSION['status'] != "login"){
    header("location:login.php");
    exit;
}

// Ambil ID dari URL
if(isset($_GET['hapus'])){ 
    $id = $_GET['hapus']; 
    $query_hapus = mysqli_query($conn, "DELETE FROM produk WHERE id='$id'");
    // ... sisa kode lainnya

    if($query_hapus){
        // Balik ke admin.php setelah berhasil
        echo "<script>alert('Produk MauriCraft Berhasil Dihapus!'); window.location='admin.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus: " . mysqli_error($conn) . "'); window.location='admin.php';</script>";
    }
} else {
    header("location:admin.php");
}
?>