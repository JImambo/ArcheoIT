<?php
session_start(); 
include 'db.php';
$error='';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $pwd = $_POST['password'];  
  $stmt = $pdo->prepare("SELECT * FROM users WHERE email= ?");
  $stmt->execute([$_POST['email']]);
  $user = $stmt->fetch();
  if($user && password_verify($pwd, $user['password'])){
    $_SESSION['user'] = $user['prenom'];
    header('Location: index.php'); 
    exit;
  } else $error = 'Email ou mot de passe invalide';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include 'header.php'; ?>
  <div class="container mt-5">
    <h1>Connectez-vous</h1>
    <?php if(!empty($confirmation)) echo "<div class='alert alert-success'>$confirmation</div>"; ?>
    <form method="POST">
      <div class="mb-3"><input name="email" type="email" placeholder="Email" required class="form-control"></div>
      <div class="mb-3"><input name="password" type="password" placeholder="password" required class="form-control"></div> 
      <button class="btn btn-primary">Connexion</button>
    </form>
  </div>
</body>
<footer class="bg-dark text-white text-center py-3 mt-5">
    &copy; <?= date('Y') ?> Association Archéo - Tous droits réservés
</footer>
</html>
