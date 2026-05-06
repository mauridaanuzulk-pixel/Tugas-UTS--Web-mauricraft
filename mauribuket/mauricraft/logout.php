<?php
session_start();

// Menghapus semua session
session_destroy();

// Mengarahkan kembali ke halaman login
echo "<script>
        alert('Anda telah logout dari sistem MauriCraft');
        window.location='login.php';
      </script>";
?>