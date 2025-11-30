<?php
require '_init.php';
$id=(int)($_POST['product_id']??0); $qty=max(1,(int)($_POST['qty']??1));
$p = $repo->find($id); if(!$p) header('Location:index.php');
if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];
if(isset($_SESSION['cart'][$id])) $_SESSION['cart'][$id]['qty'] += $qty; else $_SESSION['cart'][$id]=['id'=>$p['id'],'name'=>$p['name'],'price'=>$p['price'],'qty'=>$qty,'image_path'=>$p['image_path']];
header('Location: cart.php'); exit;
