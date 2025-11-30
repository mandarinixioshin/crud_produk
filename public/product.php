<?php require '_init.php';
$id=(int)($_GET['id']??0); $p = $repo->find($id); if(!$p) { echo 'Tidak ditemukan'; exit; }
?>
<h1><?=e($p['name'])?></h1>
<?php if(!empty($p['image_path'])): ?><img src="<?=e($p['image_path'])?>" style="height:200px"><?php endif;?>
<p>Harga: <?=number_format($p['price'],2)?></p>
<form action="add_to_cart.php" method="post"><input type="hidden" name="product_id" value="<?=e($p['id'])?>">Qty:<input name="qty" type="number" value="1" min="1"><button>Tambah</button></form>
