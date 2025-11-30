<?php
require '_init.php';

function validateProduct($post,$file){ $errors=[]; if(empty(trim($post['name']??''))) $errors[]='Nama wajib'; if(!isset($post['price'])||!is_numeric($post['price'])) $errors[]='Harga'; if(!isset($post['stock'])||!is_numeric($post['stock'])) $errors[]='Stok'; 
 if(!empty($file['image']['name'])){ if($file['image']['error']!==UPLOAD_ERR_OK) $errors[]='Upload error'; if($file['image']['size']>2*1024*1024) $errors[]='Max 2MB'; $f = new finfo(FILEINFO_MIME_TYPE); $mime=$f->file($file['image']['tmp_name']); if(!in_array($mime,['image/jpeg','image/png'])) $errors[]='Tipe salah'; }
 return $errors;
}

$errors = validateProduct($_POST,$_FILES);
if($errors){ echo implode('<br>',$errors).'<br><a href="create.php">Kembali</a>'; exit; }

$uploadDir = $config['upload_dir']; if(!is_dir($uploadDir)) mkdir($uploadDir,0755,true);
$image_path = null;
if(!empty($_FILES['image']['name'])){
  $ext = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
  $fn = uniqid('img_',true).'.'.$ext;
  $target = rtrim($uploadDir,DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$fn;
  if(!move_uploaded_file($_FILES['image']['tmp_name'],$target)){ echo 'Gagal upload'; exit; }
  $image_path = rtrim($config['upload_url'],'/').'/'.$fn;
}
$data=['name'=>trim($_POST['name']),'category'=>trim($_POST['category']),'price'=>number_format((float)$_POST['price'],2,'.',''),'stock'=>(int)$_POST['stock'],'image_path'=>$image_path,'status'=>$_POST['status']??'active'];
$repo->create($data);
header('Location: index.php');
exit;
