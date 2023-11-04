<?php 
session_start();
include_once('mysql.php');
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
 
    <div class="hero-content">
      
    
      <h1>Deep Dive Direct </h1>
      <br>
      <h2>Votre   Plongée,   Votre Aventure.</h2>
      <br>
      <?php if(isset($_SESSION['LOGGED_USER'])) : ?>
         <a href="Reservation2.php" class="btn">Réserver maintenant</a>
      <?php endif; ?>
      </div>

    
  </section>

<div class="content-section">
  <div class="text-content">
    <h2>Prêt à plonger ? Deep Dive Direct vous attend !</h2>
    <p>Explorez vos futures plongées et ne manquez aucune occasion d'explorer les merveilles sous-marines.</p>
    <a href="Reservation2.php" class="custom-button">S'inscrire ➜</a>
  </div>
  <div class="image-content">
    <img src="media/jump_in_water.png" alt="Description of image">
  </div>
</div>

<div class="content-section">
  <div class="image-content">
    <img src="media/out_of_water.png" alt="Description of image">
  </div>
  <div class="text-content">
    <h2 text-align: center;>- Le meilleur en gestion de systèmes de plongée.-</h2>
    <p><br>Chez Deep Dive Direct, nous sommes fiers d'être les leaders en gestion de systèmes de plongée.
    <br>
      <br>Profitez de chaque moment sous l'eau avec Deep Dive Direct.</p>
  </div>

</div>




  <footer>
    <p>&copy; 2023 Site de Plongée | Tous droits réservés</p>
  </footer>
</body>
</html>