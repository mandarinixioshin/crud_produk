<?php
require '_init.php';
$id = $_GET['id'];
$repo->delete($id);
header("Location: index.php");
