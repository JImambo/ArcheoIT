<?php
$host = 'localhost'; $db = 'archeo'; $user = 'root'; $pass = 'root';
$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
?>
