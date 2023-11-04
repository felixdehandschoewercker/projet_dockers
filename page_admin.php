

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Page d'accueil - Site de Plongée</title>
  <meta charset="UTF-8"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="sections.css">
</head>
<body>
  <header>
  <?php include_once('header.php'); ?>
  </header>
  <section id="hero">

    
  </section>

<?php include_once('mysql.php');
session_start();

$id=$_SESSION['LOGGED_USER'];

$infoUserStatement = $mysqlclient ->query('SELECT * FROM diver WHERE Id_Diver="'.$id.'"');
$infoUser = $infoUserStatement ->fetch();

if($infoUser['privilege'] !== 'admin' || !isset($_SESSION['LOGGED_USER']) || empty($_SESSION['LOGGED_USER'])): ?>

    <? header('Location: authentification.php'); ?>
    
    <?php endif; ?>
<?php if($infoUser['privilege'] === 'admin') : ?>
    <br>
    <br>
    <div class="admin-page">
        <h1>Bienvenue sur le tableau de bord de l'administrateur</h1>
        <p>En tant qu'administrateur, vous avez le pouvoir de gérer tous les aspects de votre site. Utilisez les options ci-dessous pour commencer :</p>
        
        <div class="admin-actions">
    <form action='validation_membre.php' method='post'>
    <h2>Vérifier les certificats</h2>
                <p>Accédez à cette page pour vérifier les certificats des utilisateurs et assurez-vous qu'ils sont valides et à jour.</p>
<div class="mb-3 visually-hidden">
<label for="id" class="form-label"></label>
<input type="hidden" class="form-control" id="validation_membre" name="validation_membre">
</div>

<button type="submit" class="btn btn-danger">Page de validation</button>
</form>
<form action='list-user-admin.php' method='post'>
<h2>Gérer les utilisateurs</h2>
                <p>Accédez à cette page pour visualiser la liste des utilisateurs, modifier leurs données et gérer leurs privilèges.</p>
<div class="mb-3 visually-hidden">
<label for="id" class="form-label"></label>
<input type="hidden" class="form-control" id="list-user-admin" name="list-user-admin">
</div>

<button type="submit" class="btn btn-danger">Aficher</button>
</form>
        </div>
</div>
<br>
<br>
<?php endif; ?>



<footer>
    <p>&copy; 2023 Site de Plongée | Tous droits réservés</p>
  </footer>
</body>
</html>