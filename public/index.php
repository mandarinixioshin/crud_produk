<?php
require '_init.php';
$products = $repo->all();
?>
<!doctype html><html><head><meta charset="utf-8"><title>Daftar Produk</title><style>img.thumb{height:60px}</style></head><body>
<h1>Daftar Produk</h1><a href="create.php">Tambah Produk</a>
<table border="1"><tr><th>ID</th><th>Nama</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Gambar</th><th>Aksi</th></tr>
<?php if(empty($products)): ?><tr><td colspan="7">Belum ada produk</td></tr><?php else: foreach($products as $p): ?>
<tr>
<td><?=e($p['id'])?></td>
<td><a href="product.php?id=<?=e($p['id'])?>"><?=e($p['name'])?></a></td>
<td><?=e($p['category'])?></td>
<td><?=number_format($p['price'],2)?></td>
<td><?=e($p['stock'])?></td>
<td><?php if(!empty($p['image_path'])): ?><img src="<?=e($p['image_path'])?>" class="thumb"><?php else: ?>(no image)<?php endif;?></td>
<td><a href="edit.php?id=<?=e($p['id'])?>">Edit</a> | <a href="delete.php?id=<?=e($p['id'])?>">Hapus</a></td>
</tr>
<?php endforeach; endif; ?>
</table></body></html>
