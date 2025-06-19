<?php
session_start(); include 'db.php';
$errors = $success = '';
if($_POST){
    $email = $_POST['email'];
    $mode = $_POST['mode'];
    $pwd = trim(shell_exec("python3 generate_password.py $mode"));
    $hash = password_hash($pwd, PASSWORD_DEFAULT);
    try {
      $stmt = $pdo->prepare("INSERT INTO users(nom,prenom,email,password) VALUES(?,?,?,?)");
      $stmt->execute([$_POST['nom'],$_POST['prenom'], $email, $hash]);
      $success = "Inscription réussie. Mot de passe : $pwd";
    } catch(Exception $e){
      $errors = 'Erreur ou email déjà utilisé';
    }
}
?>
<!DOCTYPE html><html lang="fr"><head>…</head><body><nav>…</nav>
<div class="container mt-5">
  <?php if($errors): ?><div class="alert alert-danger"><?= $errors ?></div><?php endif; ?>
  <?php if($success): ?><div class="alert alert-success"><?= $success ?></div><?php endif; ?>
  <form method="post">
    <div class="row mb-3"><div class="col"><input name="nom" placeholder="Nom" required class="form-control"></div><div class="col"><input name="prenom" placeholder="Prénom" required class="form-control"></div></div>
    <div class="mb-3"><input name="email" type="email" placeholder="Email" required class="form-control"></div>
    <div class="mb-3">
      <select name="mode" class="form-select" required>
        <option value="">-- Type de mot de passe --</option>
        <option value="alpha">Alphabetique</option>
        <option value="alnum">Alphanumérique</option>
        <option value="special">Alphanumérique + spéciaux</option>
      </select>
    </div>
    <button class="btn btn-primary">S’inscrire</button>
  </form>
</div><footer>…</footer></body></html>
