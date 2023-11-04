<?php 
session_start();
?>

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

$id=$_SESSION['LOGGED_USER'];

$infoUserStatement = $mysqlclient ->query('SELECT * FROM diver WHERE Id_Diver="'.$id.'"');
$infoUser = $infoUserStatement ->fetch();

if($infoUser['privilege'] !== 'admin' || !isset($_SESSION['LOGGED_USER']) || empty($_SESSION['LOGGED_USER'])): ?>

    <? header('Location: authentification.php'); ?>
    
    <?php endif; ?>
<?php if($infoUser['privilege'] === 'admin') : ?>
  <br>
  <div class="admin-page">
        <h1>Gestion des utilisateurs</h1>
        <p>En tant qu'administrateur, vous avez la capacité de modifier les informations des utilisateurs pour assurer la précision et l'efficacité du site. Ci-dessous, vous trouverez une liste de tous les utilisateurs inscrits sur le site. Cliquez sur le bouton "Modifier" pour changer les informations d'un utilisateur spécifique.</p>
</div>
  <section id="services">
<?php $diverStatement = $mysqlclient -> query('SELECT * FROM diver');
$diver = $diverStatement->fetchALL();

foreach($diver as $diver): ?>
<div class="service-card">
<a><img src="media/avatar.png"></a>
<? echo(''.$diver['Lastname']. ' '); 
echo($diver['Firstname']); ?>

<form action='modif_membre_admin.php' method='post'>
<div class="mb-3 visually-hidden">
<label for="id" class="form-label"></label>
<input type="hidden" class="form-control" id="membre_modif" name="membre_modif" value="<?php echo($diver['Id_Diver']); ?> ">
</div>

<button type="submit" class="btn btn-danger">Modifier</button>
</form>
<form action='post_supprimer_membre_admin.php' method='post'>
<div class="mb-3 visually-hidden">
<label for="id" class="form-label"></label>
<input type="hidden" class="form-control" id="supprimer_membre" name="supprimer_membre" value="<?php echo($diver['Id_Diver']); ?> ">
</div>

<button type="submit" class="btn btn-danger">Supprimer Memmbre</button>
</form>

</div>
<?php endforeach ;?>
</section>
<?php endif; ?>


<footer>
    <p>&copy; 2023 Site de Plongée | Tous droits réservés</p>
  </footer>
</body>
</html>