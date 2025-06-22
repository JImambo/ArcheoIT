<?php
session_start();

/* if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../login.php');
    exit;
} */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<title>Admin - Association Archéo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  body {
    min-height: 100vh;
    display: flex;
  }
  nav {
    width: 250px;
    background: #222;
    color: white;
  }
  nav a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 15px 20px;
    border-bottom: 1px solid #444;
  }
  nav a:hover {
    background-color: #555;
  }
  main {
    flex-grow: 1;
    padding: 20px;
  }
</style>
</head>
<body>
<nav>
  <h3 class="p-3">Admin - Menu</h3>
  <a href="index.php">Dashboard</a>
  <a href="ajouter_actu.php">Gestion Actualités</a>
  <a href="gerer_chantiers.php">Gestion Chantiers</a>
  <a href="agenda.php">Agenda</a>
  <a href="logout.php">Déconnexion</a>
</nav>
<main>
