<?php
return [
  'db_host' => '127.0.0.1',
  'db_name' => 'produk_crud',   // ganti sesuai nama DB di phpMyAdmin
  'db_user' => 'root',
  'db_pass' => '',
  'upload_dir' => __DIR__ . '/../public/uploads', // folder fisik
  'upload_url' => '/uploads' // akan di-set dinamis di _init.php
];
