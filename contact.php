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
  <br>
  <br>
  <div class="contact-container">

  <h1 class="contact-h1">Formulaire de contact</h1>
  <form action="/action_page.php">
    <label class="contact-label" for="fname">Nom & prénom</label>
    <input type="text" id="fname" class="contact-text" name="firstname" placeholder="Votre nom et prénom">

    <label class="contact-label" for="sujet">Sujet</label>
    <input type="text" id="sujet" class="contact-text" name="sujet" placeholder="L'objet de votre message">

    <label class="contact-label" for="emailAddress">Email</label>
    <input id="emailAddress" class="contact-email" type="email" name="email" placeholder="Votre email">

    <label class="contact-label" for="subject">Message</label>
    <textarea id="subject" class="contact-text" name="subject" placeholder="Votre message" style="height:200px"></textarea>

    <input type="submit" class="contact-submit" value="Envoyer">
  </form>

</div>
<br>
<br>
  <footer>
    <p>&copy; 2023 Site de Plongée | Tous droits réservés</p>
  </footer>
</body>
</html>