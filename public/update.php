<?php
require '_init.php';

$id = $_POST['id'];
$existing = $repo->find($id);

$image_path = $existing['image_path'];

if (!empty($_FILES['image']['name'])) {
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $filename = uniqid('img_') . '.' . $ext;
    $dest = $config['upload_dir'] . '/' . $filename;
    move_uploaded_file($_FILES['image']['tmp_name'], $dest);
    $image_path = $config['upload_url'] . "/" . $filename;
}

$data = [
    'name' => $_POST['name'],
    'category' => $_POST['category'],
    'price' => $_POST['price'],
    'stock' => $_POST['stock'],
    'image_path' => $image_path,
    'status' => $_POST['status']
];

$repo->update($id, $data);

header("Location: index.php");
