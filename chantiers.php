<?php
session_start(); include 'db.php';
$req = $pdo->query("SELECT * FROM chantiers ORDER BY date_debut DESC");
?>
<!DOCTYPE html><html lang="fr"><head>…bootstrap…</head><body>
<nav>…</nav>
<div class="container mt-5">
  <?php while($c = $req->fetch()): ?>
    <div class="card mb-4">
      <img src="uploads/<?= $c['image'] ?>" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($c['lieu']) ?></h5>
        <p><?= htmlspecialchars($c['description']) ?></p>
        <p><small>Du <?= $c['date_debut'] ?> au <?= $c['date_fin'] ?></small></p>
      </div>
    </div>
  <?php endwhile; ?>
</div>
<footer>…</footer></body></html>
