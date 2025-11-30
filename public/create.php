<?php require '_init.php'; ?>
<!doctype html><html><body>
<h1>Tambah Produk</h1><a href="index.php">&larr; Kembali</a>
<form action="store.php" method="post" enctype="multipart/form-data">
Name:<input name="name" required><br>
Category:<input name="category" required><br>
Price:<input type="number" step="0.01" name="price" required><br>
Stock:<input type="number" name="stock" required><br>
Gambar:<input type="file" name="image" accept="image/jpeg,image/png"><br>
Status:<select name="status"><option value="active">active</option><option value="inactive">inactive</option></select><br>
<button>Simpan</button>
</form></body></html>
