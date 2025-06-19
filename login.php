<?php
session_start(); include 'db.php';
$error='';
if($_POST){
  $stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
  $stmt->execute([$_POST['email']]);
  $u = $stmt->fetch();
  if($u && password_verify($_POST['password'], $u['password'])){
    $_SESSION['user'] = $u['prenom'];
    header('Location: index.php'); exit;
  } else $error = 'Email ou mot de passe invalide';
}
?>
<!-- formulaire login similaire à contact -->
