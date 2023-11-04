<?php
session_start();
include_once('mysql.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Page d'accueil - Site de Plongée</title>
  <meta charset="UTF-8"/>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <?php include_once('header.php'); ?>
      </ul>
    </nav>
  </header>
  <section id="hera">
    <div class="hero-content">
        <h1>Réservation</h1>
    </div>
    <div class="container">
        <h1>Ajouter une recette</h1>
        <form action="create_dive.php" method="POST">
            <button type="submit" class="btn btn-primary">Créer une palanquée</button>
        </form>
        <br />
    </div>
    <div class="container">
          <h1>
            <?php  
            $id=$_SESSION['LOGGED_USER'];           
            $plannedStatement= $mysqlclient -> query('SELECT * FROM planned_dive');
            $planned= $plannedStatement->fetch();

            $inscritStatement = $mysqlclient -> query('SELECT * FROM diver INNER JOIN planned_dive ON "'.$id.'"  = planned_dive.Diver_Id_Diver');
            $inscrit=$inscritStatement->fetchALL(); ?>
            <?php if(isset($planned['Planned_Time']) && isset($planned['Planned_Date'])) : ?>

                <? echo('Vous êtes inscrit à une palanquée à ' . $planned['Planned_Time'] . ' le ' . $planned['Planned_Date'] . '');
                echo('Cliquez ici pour la voir :'); ?>
            
                <li><a class="link-warning" href="palanquée_inscrit.php" id=<?php echo($planned['Id_Planned_Dive']); ?> > Palanquée </a></li>

            <?php endif; ?>
            
            


            
          </h1>
          <form action="palanquée.php" method="POST">
              <div class="mb-3 visually-hidden">
                  <label for="id" class="form-label"></label>
                  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo($_SESSION['LOGGED_USER']); ?> ">
              </div>
              
              <button type="submit" class="btn btn-danger">S'inscrire à la plongée</button>
          </form>
          <br />
      </div>
  </section>
  <section id="services">
    <h2>Nos Services</h2>
    <div class="service-card">
      <a href="site de plongée.html"><img src="https://littoralenpartage.files.wordpress.com/2021/11/a56-080214leportelequihen090.jpeg?w=1024" alt="Plongée guidée"></a>
      <h3>site de plongée guidée</h3>
      <p>Découvrez les sites de plongée les plus incroyables en compagnie de nos guides experts.</p>
    </div>
    <div class="service-card">
      <a href="https://www.youtube.com/watch?v=n6gaRzqLW64&ab_channel=Universit%C3%A9dePauetdesPaysdel%27Adour"></li><img src="https://contents.mediadecathlon.com/p1434157/k$7e5f7b0429ec81f7b2416f3dbcecbdcf/1800x0/250pt150/500xcr300/bienfaits-plongee-sous-marine-decouverte-subea-decathlon.jpg?format=auto" alt="Cours de plongée"></a>
      <h3>Cours de Plongée</h3>
      <p>Apprenez à plonger ou améliorez vos compétences avec nos instructeurs qualifiés.</p>
    </div>
    <div class="service-card">
      <img src="https://www.fadis-diving.net/ressources/common/equipement04.jpg" alt="Location d'équipement">
      <h3>Équipement de plongée</h3>
      <p>Profitez de notre équipement de plongée de haute qualité en le louant à des tarifs abordables.</p>
    </div>
  </section>

 

  <footer>
    <p>&copy; 2023 Site de Plongée | Tous droits réservés</p>
  </footer>
</body>
</html>