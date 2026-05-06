<?php // Jika login berhasil
session_start();
$_SESSION['username'] = "username";
$_SESSION['status'] = "login"; // Ini kunci utamanya
header("location:index.php"); // Kembali ke halaman utama setelah sukses
?>