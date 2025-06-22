<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<?php
include '../db.php';
include 'header_admin.php';

// Stats simples
$nbActualites = $pdo->query("SELECT COUNT(*) FROM actualites")->fetchColumn();
$nbChantiers = $pdo->query("SELECT COUNT(*) FROM chantiers")->fetchColumn();
?>
<h1>Tableau de bord</h1>
<div class="row">
  <div class="col-md-6 mb-4">
    <div class="card text-bg-primary p-3">
      <h3>Actualités</h3>
      <p class="fs-2"><?= $nbActualites ?></p>
      <a href="ajouter_actu.php" class="btn btn-light">Gérer</a>
    </div>
  </div>
  <div class="col-md-6 mb-4">
    <div class="card text-bg-success p-3">
      <h3>Chantiers</h3>
      <p class="fs-2"><?= $nbChantiers ?></p>
      <a href="gerer_chantiers.php" class="btn btn-light">Gérer</a>
    </div>
    <div class="col-md-4 mb-4">
    <div class="card text-bg-secondary p-3">
      <h3>Agenda</h3>
      <p class="fs-2">Voir</p>
      <a href="agenda.php" class="btn btn-light">Consulter</a>
    </div>
  </div>
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

