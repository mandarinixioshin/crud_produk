<?php
if (session_status() === PHP_SESSION_NONE) session_start();

require_once __DIR__ . '/../src/config.php';
require_once __DIR__ . '/../src/Database.php';
require_once __DIR__ . '/../src/Product.php';
require_once __DIR__ . '/../src/ProductRepository.php';

$config = require __DIR__ . '/../src/config.php';
$pdo = Database::getConnection($config);
$repo = new ProductRepository($pdo);

// compute upload_url to work in both built-in server and XAMPP
$scriptDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\'); // e.g. "" or "/crud_produk/public"
$baseUploadsUrl = $scriptDir . '/uploads';
if (substr($baseUploadsUrl, 0, 1) !== '/') $baseUploadsUrl = '/'.ltrim($baseUploadsUrl, '/');
$config['upload_url'] = $baseUploadsUrl;

// ensure physical upload dir exists
if (!is_dir($config['upload_dir'])) @mkdir($config['upload_dir'], 0755, true);

function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES); }
