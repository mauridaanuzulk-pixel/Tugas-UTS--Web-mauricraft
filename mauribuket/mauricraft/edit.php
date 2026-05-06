<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){
    $nama = $_POST['nama_produk'];
    $kat  = $_POST['kategori'];
    $hrg  = $_POST['harga'];
    mysqli_query($conn, "UPDATE produk SET nama_produk='$nama', kategori='$kat', harga='$hrg' WHERE id='$id'");
    header("location:admin.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Produk</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body>
<div class="container mt-5 col-md-5">
    <h4>Edit Produk</h4>
    <form method="POST">
        <input type="text" name="nama_produk" class="form-control mb-2" value="<?php echo $d['nama_produk']; ?>">
        <input type="number" name="harga" class="form-control mb-2" value="<?php echo $d['harga']; ?>">
        <button name="update" class="btn btn-warning w-100">Update Data</button>
    </form>
</div>
</body>
</html>