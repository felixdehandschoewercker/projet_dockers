<?php session_start();
include_once('mysql.php'); ?>

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
  <div class="layer">

    </div>
    
  </section>


<?
// if(!isset($_SESSION['LOGGED_USER']) || empty($_SESSION['LOGGED_USER'])){
//     header('Location: authentification.php');
// }

$id=$_SESSION['LOGGED_USER'];

$infoUserStatement = $mysqlclient ->query('SELECT * FROM diver WHERE Id_Diver="'.$id.'"');
$infoUser = $infoUserStatement ->fetch();

if($infoUser['privilege'] !== 'admin' || !isset($_SESSION['LOGGED_USER']) || empty($_SESSION['LOGGED_USER'])): ?>

<? header('Location: authentification.php'); ?>

<?php endif; ?>

<?php if($infoUser['privilege'] === 'admin') : ?>
    <section id="services">
<?php $NonCertifieStatement = $mysqlclient -> query('SELECT * FROM diver WHERE certifie=0');
$NonCertifie = $NonCertifieStatement ->fetchALL();

foreach($NonCertifie as $NonCertifie) : ?><div class="service-card"><a><img src="media/avatar.png"></a>
<?php $license=substr($NonCertifie['chemin_license'],21); 
$certificat=substr($NonCertifie['chemin_certificat_medical'],21); ?>
<?echo(''.$NonCertifie['Firstname'].' '.$NonCertifie['Lastname']. ''); ?>
&nbsp;<br>
&nbsp;<br>
<a class="btn" href="<?php echo($license) ;?>" download="license de <?php echo($NonCertifie['Lastname']); ?>">License</a> 
<a class="btn" href="<?php echo($certificat) ;?>" download="certificat de <?php echo($NonCertifie['Lastname']); ?>">Certificat</a> 
<br>&nbsp;
<form action="post_validation_membre.php" method="POST">
              <div class="mb-3 visually-hidden">
                  <label for="id" class="form-label"></label>
                  <input type="hidden" class="form-control" id="certifie" name="certifie" value="<?php echo($NonCertifie['Id_Diver']); ?> ">
              </div>
              
              <button type="submit" class="btn btn-danger">Valider le compte de <?echo(''.$NonCertifie['Firstname'].' '.$NonCertifie['Lastname']. ''); ?></button>
          </form>
</div>
<?php endforeach ; ?>
</section>
<?php endif; ?>
<footer>
    <p>&copy; 2023 Site de Plongée | Tous droits réservés</p>
  </footer>
</body>
</html>