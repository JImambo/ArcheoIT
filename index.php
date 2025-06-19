<!-- FICHIER : index.php - Page d'accueil du site -->
<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil - Association Archéo</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Feuille de style personnalisée -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Barre de navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">Association Archéo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="chantiers.php">Chantiers</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="inscription.php">Inscription</a></li>
          <?php if (isset($_SESSION['user'])): ?>
            <li class="nav-item"><a class="nav-link text-warning" href="#">Bienvenue <?= htmlspecialchars($_SESSION['user']) ?></a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Déconnexion</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Contenu principal -->
  <div class="container mt-5">
    <h1 class="mb-4 text-center">Actualités de l'association</h1>
    <?php
      // Limite les actualités à 3 pour les non-inscrits
      $limit = isset($_SESSION['user']) ? '' : 'LIMIT 3';
      $query = $pdo->query("SELECT * FROM actualites ORDER BY date DESC $limit");
      while($actu = $query->fetch()) {
        echo '<div class="card mb-4">';
        echo '<img src="uploads/'.htmlspecialchars($actu['image']).'" class="card-img-top" alt="Image actu">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">'.htmlspecialchars($actu['titre']).'</h5>';
        echo '<p class="card-text">'.nl2br(htmlspecialchars($actu['contenu'])).'</p>';
        echo '<p class="text-muted"><small>Publié le '.date('d/m/Y à H:i', strtotime($actu['date'])).'</small></p>';
        echo '</div></div>';
      }
    ?>
    <?php if (!isset($_SESSION['user'])): ?>
      <div class="alert alert-info text-center">
        Connectez-vous pour voir toutes les actualités de l'association.
      </div>
    <?php endif; ?>
  </div>

  <!-- Pied de page -->
  <footer class="bg-dark text-white text-center py-3 mt-5">
    &copy; <?= date('Y') ?> Association Archéo - Tous droits réservés
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
