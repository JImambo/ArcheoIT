<?php
session_start(); 
include 'db.php';

$req = $pdo->query("SELECT * FROM chantiers ORDER BY date_debut DESC");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Chantiers</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>
<body>
 <?php include 'header.php'; ?>

<div class="container mt-5">
  <h1 class="mb-4">Nos chantiers archéologiques</h1>
  <?php while($c = $req->fetch()): ?>
    <div class="card mb-4">
      <img src="images/<?= $c['image'] ?>" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($c['lieu']) ?></h5>
        <p><?= htmlspecialchars($c['description']) ?></p>
        <p><small>Du <?= $c['date_debut'] ?> au <?= $c['date_fin'] ?></small></p>
      </div>
    </div>
  <?php endwhile; ?>
</div>
</body>
<footer class="bg-dark text-white text-center py-3 mt-5">
    &copy; <?= date('Y') ?> Association Archéo - Tous droits réservés
</footer>
</html>
