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

  <div class="hero-content">
  <h1>Création de plongée</h1>
    </div>

  </section>
  <div class="profile-container">
    <form method="post" action='post-dive.php'>
        
            <label for="planned-date">Date prévu :</label>
            <input type="date" id="planned-date" name="planned-date" required>

            <label for="planned-time">Heure prévu :</label>
            <input type="time" id="planned-time" name="planned-time" required>

            <label for="Comments">Commentaire:</label>
            <input type="text" id="Comments" name="Comments" required>
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo($_SESSION['LOGGED_USER']); ?> ">

            <label for="Nb_divers">Nombre de plongeurs max: </label>
            <input type="number" id="Nb_divers" name="Nb_divers" min='1' max='5' required>


            <button class="btn" type="reset">Réinitialiser</button><button class="custom-button" type="submit">Valider</button> 
    </form>
    </div>
    <footer>
    <p>&copy; 2023 Site de Plongée | Tous droits réservés</p>
  </footer>
</body>
</html>

