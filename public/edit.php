<?php
require '_init.php';

$id = $_GET['id'];
$p = $repo->find($id);
?>
<!DOCTYPE html>
<html>
<head><title>Edit Produk</title></head>
<body>

<h2>Edit Produk</h2>
<a href="index.php">Kembali</a>

<form action="update.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?=$p['id']?>">

Nama: <input name="name" value="<?=e($p['name'])?>" required><br>
Kategori: <input name="category" value="<?=e($p['category'])?>" required><br>
Harga: <input type="number" step="0.01" name="price" value="<?=$p['price']?>" required><br>
Stok: <input type="number" name="stock" value="<?=$p['stock']?>" required><br>

Gambar saat ini:<br>
<?php if ($p['image_path']): ?>
<img src="<?=$p['image_path']?>" style="height:60px">
<?php endif; ?>
<br>
Ganti gambar: <input type="file" name="image"><br>

Status:
<select name="status">
    <option value="active" <?=$p['status']=='active'?'selected':''?>>active</option>
    <option value="inactive" <?=$p['status']=='inactive'?'selected':''?>>inactive</option>
</select><br>

<button>Simpan</button>
</form>

</body>
</html>
