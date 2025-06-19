<?php
session_start(); include 'db.php';
$msg = '';
if($_SERVER['REQUEST_METHOD']==='POST'){
  $stmt = $pdo->prepare("INSERT INTO contacts(nom,prenom,email,sujet,message)
    VALUES(?,?,?,?,?)");
  $stmt->execute([$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['sujet'],$_POST['message']]);
  $msg = 'Merci ! Votre message a été envoyé.';
}
?>
<!DOCTYPE html><html lang="fr"><head>…</head><body><nav>…</nav>
<div class="container mt-5">
<?php if($msg): ?><div class="alert alert-success"><?= $msg ?></div><?php endif; ?>
<form method="post">
  <div class="row mb-3">
    <div class="col"><input name="nom" placeholder="Nom" required class="form-control"></div>
    <div class="col"><input name="prenom" placeholder="Prénom" required class="form-control"></div>
  </div>
  <div class="mb-3"><input name="email" type="email" placeholder="Email" required class="form-control"></div>
  <div class="mb-3">
    <select name="sujet" class="form-select" required>
      <option value="">---- Sujet ----</option>
      <option>Demande d'infos</option>
      <option>Demande de Rendez-vous</option>
      <option>autre</option>
    </select>
  </div>
  <div class="mb-3"><textarea name="message" rows="5" placeholder="Message" class="form-control" required></textarea></div>
  <button class="btn btn-primary">Envoyer</button>
</form>
</div><footer>…</footer></body></html>
